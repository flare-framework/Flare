<?php

namespace Middlewares;

class AdminFilter
{
   public static function filter()
    {
    if (empty($_SESSION['id'])){
        die("You don't have access".'<hr><a href="'.URL.'">'.URL.' </a>'  );}
    }
    public static function spaFalse()
    {
        global $CONF_SPA ;
        $CONF_SPA=false;
    }
}
