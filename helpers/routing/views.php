<?php

// GET / : Homepage
$app->get('/',function() use ($app) {
	$app->render("main.html");
});

// GET /discover : Discover page
$app->get('/discover',function() use ($app) {
	$app->render("discover.html");
});

// $app->get('/register', function() use($app){
// 	$app->render("register.html");
// });

// $app->post('/signup', function() use($app){
// 	$params = $app->request->post();

// 	$newUID = User::createNew($params['email'], $params['username'],
// 												    $params['pwd'], $params['firstname'],
// 												    $params['lastname'], $params['location']);

// 	echo $newUID;
// });

// $app->post('/login', function() use($app){
// 	$params = $app->request->post();
// 	echo User::verifyCredentials($params['email'], $params['password']);
// 	// create a User obj and keep it 
// });
