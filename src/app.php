<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Symfony\Component\HttpFoundation\Request;

date_default_timezone_set('Europe/Amsterdam'); // @fixme

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...
    // see customization: http://silex.sensiolabs.org/doc/1.3/providers/twig.html#customization
    return $twig;
});

$app->before(function (Request $request) use ($app) {
    $app['twig']->addGlobal('currentUrl', $request->getUri());
});

$app->mount('/blog', include 'blog/blog.php');
$app->mount('/demo', include 'demo/demo.php');
$app->mount('/gallery', include 'gallery/gallery.php');

return $app;
