<?php

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$gallery = $app['controllers_factory'];

$gallery->get('/', function (Request $request) use ($app) {
    return $app['twig']->render('gallery/index.html', array(
        'title' => 'Gallery'
    ));
})
->bind('gallery');

return $gallery;