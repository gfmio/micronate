<?php

require_once 'views/landingview.php';
require_once 'views/homeview.php';
require_once 'views/discoverview.php';
require_once 'views/getstartedview.php';
require_once 'views/newcampaignview.php';
require_once 'views/campaignview.php';
require_once 'views/editcampaignview.php';
require_once 'views/profileview.php';
require_once 'views/editprofileview.php';
require_once 'views/usertransactionview.php';

require_once 'views/headerview.php';
require_once 'views/error404view.php';
require_once 'views/error500view.php';

$app->get('/',function() use($app) {
    $app->render("LandingView", array(
		"title" => "Micronate - Home"
	));
});

// GET / : Homepage
$app->get('/site',function() use ($app) {
	$app->render("HomeView", array(
		"title" => "Micronate - Home"
	));
});

// GET /discover : Discover page
$app->get('/discover', function() use ($app) {
	// Data to be provided

	// Test data

	$campaigns = array();
	$campaigns[] = new StdClass();
	$campaigns[0]->id = 1;
	$campaigns[0]->title = "Example Title 1";
	$campaigns[0]->description = "Lorem ipsum dolor sit amet. And some more...";
	$campaigns[0]->location = "Berlin, Germany";
	$campaigns[0]->goal = 20000; // $200.00
	$campaigns[0]->startDateTime = new DateTime();
	$campaigns[0]->startDateTime->setDate(2014, 9, 1);
	$campaigns[0]->startDateTime->setTime(12, 0, 0);
	$campaigns[0]->endDateTime = new DateTime();
	$campaigns[0]->endDateTime->setDate(2014, 12, 1);
	$campaigns[0]->endDateTime->setTime(12, 0, 0);
	$campaigns[0]->creatorId = 3;
	$campaigns[0]->creator = new User($campaigns[0]->creatorId);
	// $campagins[0]->creator->firstName = $campaigns[0]->creator->getFirstName();
	// $campagins[0]->creator->lastName = $campaigns[0]->creator->getLastName();

	$campaigns[] = new StdClass();
	$campaigns[1]->id = 2;
	$campaigns[1]->title = "Example Title 2";
	$campaigns[1]->description = "Lorem ipsum dolor sit amet. And some more... And even more.";
	$campaigns[1]->location = "London, United Kingdom";
	$campaigns[1]->goal = 30000; // $300.00
	$campaigns[1]->startDateTime = new DateTime();
	$campaigns[1]->startDateTime->setDate(2014, 8, 15);
	$campaigns[1]->startDateTime->setTime(12, 0, 0);
	$campaigns[1]->endDateTime = new DateTime();
	$campaigns[1]->endDateTime->setDate(2014, 11, 1);
	$campaigns[1]->endDateTime->setTime(18, 0, 0);
	$campaigns[1]->creatorId = 4;
	$campaigns[1]->creator = new User($campaigns[1]->creatorId);
	// $campagins[0]->creator->firstName = $campaigns[0]->creator->getFirstName();
	// $campagins[0]->creator->lastName = $campaigns[0]->creator->getLastName();

	$app->render("DiscoverView", array(
		"title" => "Micronate - Discover",
		"campaigns" => $campaigns
	));
});

// Sign up / in
$app->get('/get-started', function() use ($app) {
	$app->render("GetStartedView", array(
		"title" => "Micronate - Get started"
	));
});

// Creating a campaign
$app->get('/campagins/new', function() use ($app) {
	$app->render("NewCampaignView", array(
		"title" => "Micronate - New Campaign"
	));
});

// Viewing a campaign
$app->get('/campagins/:id', function($id) use ($app) {
	$campaign = new Campaign($id);

	if ($campaign->getId() !== NULL) {
		$app->render("CampaignView", array(
			"title" => "Micronate - ".$campaign->getTitle()
		));
	} else {
		$app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);
	}	
});

// Editing a campaign
$app->get('/campagins/:id/edit', function($id) use ($app) {
	$app->render("EditCampaignView", array(
		"title" => "Micronate - ".$campaign->getTitle()." - Edit Campaign"
	));
});

// View Profile
$app->get('/profile/:id', function($id) use ($app) {
	$user = new User($id);
	if ($user->getId() !== NULL) {

		$userObj = new StdClass();
		$userObj->firstName = $user->getFirstName();
		$userObj->surname = $user->getLastName();
		$userObj->location = $user->getLocation();
		$userObj->campaigns = $user->getCampaigns();

		$app->render("ProfileView", array(
			"title" => "Micronate - Profile",
			"user" => $userObj
		));
	} else {
		$app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);
	}
});

// Edit Profile
$app->get('/profile/:id/edit', function($id) use ($app) {
	$app->render("EditProfileView", array(
		"title" => "Micronate - Edit Profile"
	));
});

// View Transactions of the registered user
$app->get('/profile/transactions', function($id) use ($app) {
	$app->render("UserTransactionView", array(
		"title" => "Micronate - User transactions"
	));
});
