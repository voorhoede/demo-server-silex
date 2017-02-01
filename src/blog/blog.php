<?php

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$blog = $app['controllers_factory'];

$blog->get('/', function (Request $request) use ($app) {
    return $app['twig']->render('blog/index.html', array(
        'title' => 'Blog'
    ));
})
->bind('blog');

return $blog;