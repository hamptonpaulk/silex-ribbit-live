<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/hello', function() {
    return 'Hello!';
});

$app->get('/hello/{name}', function($name) {
    return "Hello, {$name}!";
});

$app->get('/', function() use ($app) {
    return $app->redirect('/hello');
});

$app->run();
