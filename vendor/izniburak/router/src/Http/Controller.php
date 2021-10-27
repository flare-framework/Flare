<?php

namespace Buki\Router\Http;

abstract class Controller extends Http
{
    /**
     * @var array Before Middlewares
     */
    public $middlewareBefore = [];

    /**
     * @var array After Middlewares
     */
    public $middlewareAfter = [];
}