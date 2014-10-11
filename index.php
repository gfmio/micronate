<?php
require 'model/User.php';
// Load Slim framework
error_reporting(-1);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

// Including helper files
require 'helpers/helpers.php';

global $app;
$app = new \Slim\Slim(array(
	'debug' => true,
	'templates.path' => './views'
));

// GET / : Homepage
$app->get('/',function() use($app){
	require_once 'views/landing.html';
});

$app->get('/register', function() use($app){
	$app->render("register.html");
});

$app->post('/signup', function() use($app){
	$params = $app->request->post();

	$newUID = User::createNew($params['email'], $params['username'],
												    $params['pwd'], $params['firstname'],
												    $params['lastname'], $params['location']);

	echo $newUID;
});

$app->post('/login', function() use($app){
	$params = $app->request->post();
	echo User::verifyCredentials($params['email'], $params['password']);
	// create a User obj and keep it 
});

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
    echo "Error 500";
    // $app->render();
});

// Error 404 Handler
$app->notFound(function () use ($app) {
    echo "Error 404";
    // $app->render();
});

// Run Slim Application
$app->run();
