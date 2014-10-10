<?php

// Load Slim framework
error_reporting(-1);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

global $app;
$app = new \Slim\Slim(array(
	'debug' => true,
	'templates.path' => './views'
));

// Error 500 handler
$app->error(function (\Exception $e) use ($app) {
    // $app->render();
});

// Error 404 Handler
$app->notFound(function () use ($app) {
    // $app->render();
});

// Run Slim Application
$app->run();
