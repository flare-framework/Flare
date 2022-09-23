<?php

$router = new Bramus\Router\Router() ;
$router->setNamespace('Controllers');
$router->get('/','BaseController@index');
$router->get('/home','BaseController@alldata');
$router->post('/ajax','BaseController@alldata2');


$router->get('/about', function() {
    echo 'Powerful like the king';
});

$router->set404(function() {
   return View2('404/404') ;
});

$router->run();
