<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

include __DIR__.'/inc/all.inc.php';

$container = new \App\support\Container();

$container->bind('pdo', function(){
    return require __DIR__.'/inc/db.inc.php';
});

$container->bind('errorHandler', function(){
    return new \App\support\ErrorHandler();
});

$container->bind('contactRepository', function() use($container){ 
    $pdo = $container->get('pdo');
    return new \App\api\repository\ContactRepository($pdo);
});

$container->bind('contactController', function() use($container){ 
    $contactRepository = $container->get('contactRepository');
    return new \App\api\controller\ContactController($contactRepository);
});

$errorHandler = $container->get('errorHandler');
set_error_handler($errorHandler::class . '::handleError');
set_exception_handler($errorHandler::class . '::handleException');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = explode('/', $url);

$route = (string) $path[1];

$method = $_SERVER['REQUEST_METHOD'];

if ($route === 'create') {
    $contactController = $container->get('contactController');
    $contactController->processRequest($method);
} 
else {
    http_response_code(404);
    exit;
}
