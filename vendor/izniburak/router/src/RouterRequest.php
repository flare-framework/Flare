<?php

namespace Buki\Router;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouterRequest
{
    /**
     * @var string $validMethods Valid methods for Router
     */
    protected $validMethods = 'GET|POST|PUT|DELETE|HEAD|OPTIONS|PATCH|ANY|AJAX|XPOST|XPUT|XDELETE|XPATCH';
    /**
     * @var Request $request
     */
    private $request;
    /**
     * @var Response $response
     */
    private $response;

    /**
     * RouterRequest constructor.
     *
     * @param Request  $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function symfonyRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function symfonyResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function validMethods(): string
    {
        return $this->validMethods;
    }

    /**
     * Request method validation
     *
     * @param string $data
     * @param string $method
     *
     * @return bool
     */
    public function validMethod(string $data, string $method): bool
    {
        $valid = false;
        if (strstr($data, '|')) {
            foreach (explode('|', $data) as $value) {
                $valid = $this->checkMethods($value, $method);
                if ($valid) {
                    break;
                }
            }
        } else {
            $valid = $this->checkMethods($data, $method);
        }

        return $valid;
    }

    /**
     * Get the request method used, taking overrides into account
     *
     * @return string
     */
    public function getMethod(): string
    {
        $method = $this->request->getMethod();
        $formMethod = $this->request->request->get('_method');
        if (!empty($formMethod)) {
            $method = strtoupper($formMethod);
        }

        return $method;
    }

    /**
     * check method valid
     *
     * @param string $value
     * @param string $method
     *
     * @return bool
     */
    protected function checkMethods(string $value, string $method): bool
    {
        if (in_array($value, explode('|', $this->validMethods))) {
            if ($this->request->isXmlHttpRequest() && $value === 'AJAX') {
                return true;
            }

            if ($this->request->isXmlHttpRequest() && strpos($value, 'X') === 0
                && $method === ltrim($value, 'X')) {
                return true;
            }

            if (in_array($value, [$method, 'ANY'])) {
                return true;
            }
        }

        return false;
    }
}
