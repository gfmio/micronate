<?php

// Load Slim framework
error_reporting(-1);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require_once 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require_once 'helpers/mainview.php';
require_once 'helpers/simpleview.php';

global $app;
$app = new \Slim\Slim(array(
	'debug' => true,
	'templates.path' => './views',
    'view' => new MainView()
));

// Including helper files (Everything is loaded from here)
// Routing is in helpers/routing, except for the initial landing page and error pages
require 'helpers/helpers.php';

$app->get('/sentEmails', function() use($app){
    require_once './sentEmails.php';
});

$app->error(function (\Exception $e) use ($app) {
	if (strpos($_SERVER['REQUEST_URI'],'/api') === false) {
        $app->render("Error500View", array(
            "title" => "Micronate - Error 500"
        ), 500);
    } else {
        APIrequest();
        $app->render(500, array(
            'msg' => 'error',
            'error' => true
        ));
    }
});

$app->notFound(function () use ($app) {
    if (strpos($_SERVER['REQUEST_URI'],'/api') === false) {
        $app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);
    } else {
        APIrequest();
        $app->render(404, array(
            'msg' => 'error',
            'error' => true
        ));
    }
});

// Run Slim Application
$app->run();
