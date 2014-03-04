<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->get('/hello', function() {
    return 'Hello!';
});

$app->get('/hello/{name}', function($name) {
    return "Hello, {$name}!";
});

$app->get('/', function() use ($app) {
    return $app['twig']->render('index.php.twig');
});

$app->run();
