<?php
use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$router = new \Buki\Router\Router([
    'paths' => [
        'controllers' => CONFIG.'../Controllers',
    ],
    'namespaces' => [
        'controllers' => 'Controllers',
    ],
]);

// https://github.com/izniburak/php-router/wiki/5.-Controllers

$router->get('/hi', function(Request $request, Response $response) {
    $response->setContent('Hello World');
    return $response;
});

$router->get('/', 'EFTEKHARI@index');

$router->get('/create', 'EFTEKHARI@create');
$router->post('/store', 'EFTEKHARI@store');
$router->get('/edit/:id', 'EFTEKHARI@edit');
$router->put('/update/:id', 'EFTEKHARI@update');
$router->delete('/delete/:id', 'EFTEKHARI@delete');
$router->error(function() {
    View('404/404') ;
});
$router->run();
