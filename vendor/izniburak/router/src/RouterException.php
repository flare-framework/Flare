<?php

namespace Buki\Router;

use Exception;

class RouterException
{
    /**
     * @var bool $debug Debug mode
     */
    public static $debug = false;

    /**
     * Create Exception Class.
     *
     * @param string $message
     *
     * @param int    $statusCode
     *
     * @throws Exception
     */
    public function __construct(string $message, int $statusCode = 500)
    {
        http_response_code($statusCode);
        if (self::$debug) {
            throw new Exception($message, $statusCode);
        }
        die("<h2>Opps! An error occurred.</h2> {$message}");
    }
}
