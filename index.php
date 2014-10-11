<?php

// Load Slim framework
error_reporting(-1);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require_once 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require_once 'helpers/mainview.php';

global $app;
$app = new \Slim\Slim(array(
	'debug' => true,
	'templates.path' => './views',
    'view' => new MainView()
));

// Including helper files (Everything is loaded from here)
// Routing is in helpers/routing, except for the initial landing page and error pages
<<<<<<< Updated upstream
require 'helpers/helpers.php';

// GET / : Homepage
$app->get('/',function() use($app){
	require_once 'views/landing.html';
});

$app->get('/site', function() use($app){
    require_once './index2.php';
});   

$app->get('/sentEmails', function() use($app){
    require_once './sentEmails.php';
});         
=======
require 'helpers/helpers.php';        
>>>>>>> Stashed changes

$app->error(function (\Exception $e) use ($app) {
	if (strpos($_SERVER['REQUEST_URI'],'/api') === false) {
        $app->render("error500.html", array(), 500);
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
        $app->render("error404.html", array(), 404);
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
