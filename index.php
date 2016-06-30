<?php

    // If you installed via composer, just use this code to require autoloader on the top of your projects.
    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/vendor/illuminate/support/helpers.php';
    require __DIR__.'/config/database.php';

    Illuminate\Support\ClassLoader::register();

    // use the str_finish helper method to assure a trailing slash at the end of path string

    $basePath = str_finish(dirname(__FILE__), '/');

    // if you have other directories define the path to them too
    $controllers  = $basePath . 'Controllers';
    $models       = $basePath . 'Models';

    // register directories into autoloader
    Illuminate\Support\ClassLoader::addDirectories(array($controllers, $models));

    $app = new Illuminate\Container\Container();
    $app->bind('app', $app);

    // also bind the base path for some helper methods to use
    // Overcome the mental block, you can bind literally anything into the container

    $app->bind('path.base', $basePath);

    // set environment
    $app->bind('env', 'production');

    // Yes, that is an abstract class but you can still access
    // static methods
    Illuminate\Support\Facades\Facade::setFacadeApplication($app);

    with(new Illuminate\Events\EventServiceProvider($app))->register();
    with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

    require $basePath . 'routes.php';

    // Instantiate the request
    $request = Illuminate\Http\Request::createFromGlobals();

    // Dispatch the router
    $response = $app['router']->dispatch($request);

    // Send the response
    $response->send();
