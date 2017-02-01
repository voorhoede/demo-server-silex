<?php

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$demo = $app['controllers_factory'];

$demo->get('/', function (Request $request) use ($app) {
    $lang = $request->query->get('lang', 'en');
    $data = array();
    return $app['twig']->render('demo/viewer/viewer.html', $data);
})
->bind('demo');


$demo->get('/linker.css', function () use ($app) {
    return $app->sendFile(__DIR__ . '/linker/linker.css');
})
->bind('demo/linker.css');


$demo->get('/linker.js', function () use ($app) {
    return $app->sendFile(__DIR__ . '/linker/linker.js');
})
->bind('demo/linker.js');


$demo->get('/mapping.json', function () use ($app) {
    $finder = new Finder();
    $files = $finder->in(__DIR__ . '/../')->files()->name('*.demo.html');
    $mapping = array();
    foreach ($files as $file) {
        $filename = $file->getRelativePathname();
        $parts = explode('/', $filename);
        $name = $parts[1];
        $selector = '.' . $name . ', ' . '[data-' . $name . ']';
        $mapping[$selector] = array(
            'name' => $name,
            'url' => $filename
        );
    }
    return $app->json($mapping);
})
->bind('demo/mapping.json');


$demo->get('/modules', function() use ($app) {
    $finder = new Finder();
    $files = $finder->in(__DIR__ . '/../')->files()->name('*.demo.html');
    $modules = array();
    foreach ($files as $file) {
        $filename = $file->getRelativePathname();
        $parts = explode('/', $filename);
        $item = array(
            'group' => $parts[0],
            'name' => $parts[1],
            'url' => 'modules/'. $filename,
        );
        array_push($modules, $item);
    }
    return $app->json($modules);
})
->bind('demo/modules');


$demo->get('/modules/{modulePath}', function ($modulePath) use ($app) {
    return $app['twig']->render($modulePath, array());
})
->assert('modulePath', '.+');


return $demo;