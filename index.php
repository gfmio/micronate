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

// Example GET request to a normal page
$app->get('/home',function() use($app){
	//regular html response
	$app->render("template.tpl");
});

// Example GET request to the API
$app->get('/api','APIrequest',function() use($app){
	//this request will have full json responses

	$app->render(200,array(
		'msg' => 'welcome to my API!',
	));
});

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
