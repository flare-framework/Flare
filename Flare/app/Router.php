<?php
use Bramus\Router\Router;
$router = new Router() ;
$router->setNamespace('Controllers');
//  Middlewares

$router->before('GET|POST', '/about', function() {
  \Middlewares\AdminFilter::filter();
});
//Controllers

$router->get('/','Home@index');
$router->get('/latte','Home@lattev');
$router->get('/ajax','Home@alldata');
$router->post('/ajax','Home@alldata2' );
$router->get('/debug','Home@debugbar' );
$router->get('/about', function() {
    echo 'Powerful like the king !';
});

$router->set404(function() {
   return View2('404/404') ;
});

$router->run();
