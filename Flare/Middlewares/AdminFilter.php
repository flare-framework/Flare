<?php

namespace Middlewares;

class AdminFilter
{
   public static function filter()
    {
    if (empty($_SESSION['id'])){
        die("You don't have access");
    }
    }
}
