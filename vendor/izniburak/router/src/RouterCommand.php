<?php

namespace Buki\Router;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use Reflector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouterCommand
{
    /**
     * @var RouterCommand Class instance variable
     */
    protected static $instance = null;

    /**
     * @var string
     */
    protected $baseFolder;

    /**
     * @var array
     */
    protected $paths;

    /**
     * @var array
     */
    protected $namespaces;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var array
     */
    protected $middlewares = [];

    /**
     * @var array
     */
    protected $markedMiddlewares = [];

    /**
     * RouterCommand constructor.
     *
     * @param string   $baseFolder
     * @param array    $paths
     * @param array    $namespaces
     * @param Request  $request
     * @param Response $response
     * @param array    $middlewares
     */
    public function __construct(
        string $baseFolder,
        array $paths,
        array $namespaces,
        Request $request,
        Response $response,
        array $middlewares
    ) {
        $this->baseFolder = $baseFolder;
        $this->paths = $paths;
        $this->namespaces = $namespaces;
        $this->request = $request;
        $this->response = $response;
        $this->middlewares = $middlewares;

        // Execute general Middlewares
        foreach ($this->middlewares['middlewares'] as $middleware) {
            $this->beforeAfter($middleware);
        }

    }

    /**
     * @return array
     */
    public function getMiddlewareInfo(): array
    {
        return [
            'path' => "{$this->baseFolder}/{$this->paths['middlewares']}",
            'namespace' => $this->namespaces['middlewares'],
        ];
    }

    /**
     * @return array
     */
    public function getControllerInfo(): array
    {
        return [
            'path' => "{$this->baseFolder}/{$this->paths['controllers']}",
            'namespace' => $this->namespaces['controllers'],
        ];
    }

    /**
     * @param string   $baseFolder
     * @param array    $paths
     * @param array    $namespaces
     * @param Request  $request
     * @param Response $response
     * @param array    $middlewares
     *
     * @return RouterCommand
     */
    public static function getInstance(
        string $baseFolder,
        array $paths,
        array $namespaces,
        Request $request,
        Response $response,
        array $middlewares
    ) {
        if (null === self::$instance) {
            self::$instance = new static(
                $baseFolder, $paths, $namespaces,
                $request, $response, $middlewares
            );
        }

        return self::$instance;
    }

    /**
     * Run Route Middlewares
     *
     * @param $command
     *
     * @return mixed|void
     * @throws
     */
    public function beforeAfter($command)
    {
        if (empty($command)) {
            return;
        }

        $info = $this->getMiddlewareInfo();
        if (is_array($command)) {
            foreach ($command as $value) {
                $this->beforeAfter($value);
            }
        } elseif (is_string($command)) {
            $middleware = explode(':', $command);
            $params = [];
            if (count($middleware) > 1) {
                $params = explode(',', $middleware[1]);
            }

            $resolvedMiddleware = $this->resolveMiddleware($middleware[0]);
            $response = false;
            if (is_array($resolvedMiddleware)) {
                foreach ($resolvedMiddleware as $middleware) {
                    $response = $this->runMiddleware(
                        $command,
                        $this->resolveMiddleware($middleware),
                        $params,
                        $info
                    );
                }
                return $response;
            }

            return $this->runMiddleware($command, $resolvedMiddleware, $params, $info);
        }

        return;
    }

    /**
     * Run Route Command; Controller or Closure
     *
     * @param $command
     * @param $params
     *
     * @return mixed|void
     * @throws
     */
    public function runRoute($command, $params = [])
    {
        $info = $this->getControllerInfo();
        if (!is_object($command)) {
            [$class, $method] = explode('@', $command);
            $class = str_replace([$info['namespace'], '\\', '.'], ['', '/', '/'], $class);

            $controller = $this->resolveClass($class, $info['path'], $info['namespace']);
            if (!method_exists($controller, $method)) {
                return $this->exception("{$method} method is not found in {$class} class.");
            }

            if (property_exists($controller, 'middlewareBefore') && is_array($controller->middlewareBefore)) {
                foreach ($controller->middlewareBefore as $middleware) {
                    $this->beforeAfter($middleware);
                }
            }

            $response = $this->runMethodWithParams([$controller, $method], $params);

            if (property_exists($controller, 'middlewareAfter') && is_array($controller->middlewareAfter)) {
                foreach ($controller->middlewareAfter as $middleware) {
                    $this->beforeAfter($middleware);
                }
            }

            return $response;
        }

        return $this->runMethodWithParams($command, $params);
    }

    /**
     * Resolve Controller or Middleware class.
     *
     * @param string $class
     * @param string $path
     * @param string $namespace
     *
     * @return object
     * @throws
     */
    protected function resolveClass(string $class, string $path, string $namespace)
    {
        $class = str_replace([$namespace, '\\'], ['', '/'], $class);
        $file = realpath("{$path}/{$class}.php");
        if (!file_exists($file)) {
            return $this->exception("{$class} class is not found. Please check the file.");
        }

        $class = $namespace . str_replace('/', '\\', $class);
        if (!class_exists($class)) {
            require_once($file);
        }

        return new $class();
    }

    /**
     * @param array|Closure $function
     * @param array         $params
     *
     * @return Response|mixed
     * @throws ReflectionException
     */
    protected function runMethodWithParams($function, array $params)
    {
        $reflection = is_array($function)
            ? new ReflectionMethod($function[0], $function[1])
            : new ReflectionFunction($function);
        $parameters = $this->resolveCallbackParameters($reflection, $params);
        $response = call_user_func_array($function, $parameters);
        return $this->sendResponse($response);
    }

    /**
     * @param Reflector $reflection
     * @param array     $uriParams
     *
     * @return array
     * @throws
     */
    protected function resolveCallbackParameters(Reflector $reflection, array $uriParams): array
    {
        $parameters = [];
        foreach ($reflection->getParameters() as $key => $param) {
            $class = $param->getType() && !$param->getType()->isBuiltin()
               ? new ReflectionClass($param->getType()->getName())
                : null;
            if (!is_null($class) && $class->isInstance($this->request)) {
                $parameters[] = $this->request;
            } elseif (!is_null($class) && $class->isInstance($this->response)) {
                $parameters[] = $this->response;
            } elseif (!is_null($class)) {
                $parameters[] = null;
            } else {
                if (empty($uriParams)) {
                    continue;
                }
                $uriParams = array_reverse($uriParams);
                $parameters[] = array_pop($uriParams);
                $uriParams = array_reverse($uriParams);
            }
        }

        return $parameters;
    }

    /**
     * @param $command
     * @param $middleware
     * @param $params
     * @param $info
     *
     * @return bool|RouterException
     * @throws ReflectionException
     */
    protected function runMiddleware(string $command, string $middleware, array $params, array $info)
    {
        $middlewareMethod = 'handle'; // For now, it's constant.
        $controller = $this->resolveClass($middleware, $info['path'], $info['namespace']);

        if (in_array($className = get_class($controller), $this->markedMiddlewares)) {
            return true;
        }
        array_push($this->markedMiddlewares, $className);

        if (!method_exists($controller, $middlewareMethod)) {
            return $this->exception("{$middlewareMethod}() method is not found in {$middleware} class.");
        }

        $parameters = $this->resolveCallbackParameters(new ReflectionMethod($controller, $middlewareMethod), $params);
        $response = call_user_func_array([$controller, $middlewareMethod], $parameters);
        if ($response !== true) {
            $this->sendResponse($response);
            exit;
        }

        return $response;
    }

    /**
     * @param string $middleware
     *
     * @return array|string
     */
    protected function resolveMiddleware(string $middleware)
    {
        $middlewares = $this->middlewares;
        if (isset($middlewares['middlewareGroups'][$middleware])) {
            return $middlewares['middlewareGroups'][$middleware];
        }

        $name = explode(':', $middleware)[0];
        if (isset($middlewares['routeMiddlewares'][$name])) {
            return $middlewares['routeMiddlewares'][$name];
        }

        return $middleware;
    }

    /**
     * @param $response
     *
     * @return Response|mixed
     */
    protected function sendResponse($response)
    {
        if (is_array($response)) {
            $this->response->headers->set('Content-Type', 'application/json');
            return $this->response
                ->setContent(json_encode($response))
                ->send();
        }

        if (!is_string($response)) {
            return $response instanceof Response ? $response->send() : print($response);
        }

        return $this->response->setContent($response)->send();
    }

    /**
     * Throw new Exception for Router Error
     *
     * @param string $message
     * @param int    $statusCode
     *
     * @return RouterException
     * @throws Exception
     */
    protected function exception($message = '', $statusCode = 500)
    {
        return new RouterException($message, $statusCode);
    }
}
