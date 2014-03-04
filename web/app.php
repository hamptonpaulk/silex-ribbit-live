<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

class RibbitApplication extends Application
{
    use Application\TwigTrait;
    // more traits in the future
}

$app = new RibbitApplication();
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
    return $app->render('index.php.twig');
});

$app->run();
