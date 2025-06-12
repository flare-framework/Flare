<?php
use Bramus\Router\Router;
$router = new Router() ;
$router->setNamespace('Controllers');

//  Middlewares
$router->before('GET|POST', '/about', function() {
  \Middlewares\AdminFilter::filter();
});
$router->before('GET|POST', '/debug', function() {
    \Middlewares\AdminFilter::spaFalse();

});
//Controllers
$router->get('/','Welcome@index');
$router->get('/lattev','Welcome@lattev');

$router->get('/hi', function() {
    echo '<h1>hi king !<h1>';
});

$router->get('/about', function() {
    echo 'Powerful like the king !';
});

$router->set404(function() {
   return View2('404/404') ;
});

$router->run();
