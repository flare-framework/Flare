<?php
use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$router = new \Buki\Router\Router([
    'paths' => [
        'controllers' => CONFIG.'../Controllers',
        'middlewares' => CONFIG.'../Middlewares',
    ],
    'namespaces' => [
        'controllers' => 'Controllers',
        'middlewares' => 'Middlewares',
    ],
]);
// https://github.com/izniburak/php-router/wiki/5.-Controllers
$router->get('/hi',function (){
    View2('Welcome/Welcome');
});
$router->get('/', 'EFTEKHARI@index');
$router->get('/create', 'EFTEKHARI@create');
$router->post('/store', 'EFTEKHARI@store');
$router->put('/update/:id', 'EFTEKHARI@update');
$router->delete('/delete/:id', 'EFTEKHARI@delete');
$router->error(function() {
    View('404/404') ;
});
$router->run();
