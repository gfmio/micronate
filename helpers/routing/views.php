<?php

$app->get('/',function() use($app) {
    $app->render("landing.html", array(
		"title" => "Micronate - Home"
	));
});

// GET / : Homepage
$app->get('/site',function() use ($app) {
	$app->render("main.html", array(
		"title" => "Micronate - Home"
	));
});

// GET /discover : Discover page
$app->get('/discover', function() use ($app) {
	$app->render("discover.html", array(
		"title" => "Micronate - Discover"
	));
});

// Sign up / in
$app->get('/get-started', function() use ($app) {
	$app->render("get_started.html", array(
		"title" => "Micronate - Get started"
	));
});

// Creating a campaign
$app->get('/campagins/new', function() use ($app) {
	$app->render("new_campaign.html", array(
		"title" => "Micronate - New Campaign"
	));
});

// Viewing a campaign
$app->get('/campagins/:id', function($id) use ($app) {
	$app->render("campaign.html", array(
		"title" => "Micronate - CAMPAIGNNAME"
	));
});

// Editing a campaign
$app->get('/campagins/:id/edit', function($id) use ($app) {
	$app->render("edit_campaign.html", array(
		"title" => "Micronate - CAMPAIGNNAME - Edit Campaign"
	));
});

// View Profile
$app->get('/profile/:id', function($id) use ($app) {
	$app->render("profile.html", array(
		"title" => "Micronate - Profile"
	));
});

// Edit Profile
$app->get('/profile/:id/edit', function($id) use ($app) {
	$app->render("edit_profile.html", array(
		"title" => "Micronate - Edit Profile"
	));
});

// View Transactions of the registered user
$app->get('/profile/transactions', function($id) use ($app) {
	$app->render("transactions.html", array(
		"title" => "Micronate - Edit Profile"
	));
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
