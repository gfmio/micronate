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
require_once 'views/sentEmailsview.php';

require_once 'views/headerview.php';
require_once 'views/error404view.php';
require_once 'views/error500view.php';

function refactorMessage($messageObj) {
  $message = new StdClass();
  $message->id = $messageObj->getId();
  $message->content = $messageObj->getContent();
  $message->datetime = $messageObj->getDateTime();
  $message->author_id = $messageObj->getAuthor()->getId();
  $message->author_name = $messageObj->getAuthor()->getName();
  $message->author_image = $messageObj->getAuthor()->getGravatarUrl();
  return $message;
}

function refactorMessages($messageList) {
  $messages = array();
  foreach ($messageList as $messageObj) {
    $messages[] = refactorMessages($messageObj);
  }
  return $messages;
}

function refactorDonation($donationObj) {
  $donation = new StdClass();
  $donation->id = $donationObj->getId();
  $donation->datetime = $donationObj->getDateTime();
  $donation->amount = $donationObj->getAmountGiven();
  $donation->donor_id = $donationObj->getUser()->getId();
  $donation->donor_name = $donationObj->getUser()->getFullName();
  $donation->donor_image = $donationObj->getUser()->getGravatarUrl();
  return $donation;
}

function refactorDonations($donationsList) {
  $donations = array();
  foreach ($donationsList as $donationObj) {
    $donations[] = refactorDonation($donationObj);
  }
  return $donations;
}

function refactorCampaign($campaignObj) {
  $campaign = new StdClass();
  $campaign->id = $campaignObj->getId();
  $campaign->title = $campaignObj->getTitle();
  $campaign->description = $campaignObj->getDescription();
  $campaign->location = new StdClass();
  $campaign->location->longitude = $campaignObj->getLongitude();
  $campaign->location->latitude = $campaignObj->getLatitude();
  $campaign->goal = $campaignObj->getGoal();
  $campaign->total_reached = $campaignObj->getTotalDonations();
  $campaign->startDateTime = $campaignObj->getId();
  $campaign->endDateTime = $campaignObj->getId();

  $creator = $campaignObj->getCreator();
  $campaign->creator_id = $creator->getId();
  $campaign->creator_name = $creator->getFullName();
  $campaign->creator_image = $creator->getGravatarUrl();

  $campaign->donations = refactorDonations($campaignObj->getDonations());

  $campaign->messages = refactorMessages($campaignObj->getMessages());
  return $campaign;
}

function refactorCampaigns($campaignsList) {
  $campaigns = array();

  foreach ($campaignsList as $campaignObj) {
    $campaigns[] = refactorCampaign($campaignObj);
  }
  return $campaigns;
}

function refactorTransaction($transactionObj) {
  $transaction = new StdClass();
  $transaction->id = $transactionObj->getId();
  $transaction->app_name = $transactionObj->getApplication()->getName();
  $transaction->amount = $transactionObj->getAmount();
  $transaction->date_time = $transactionObj->getDateTime();
  return $transactions;
}

function refactorTransactions($transactionsList) {
  $transactions = array();
  foreach ($transactionsList as $transactionObj) {
    $transactions[] = refactorTransaction($transactionObj);
  }
  return $transactions;

}

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
  $campaignsList = Campaign::getAll();

  $campaigns = refactorCampaigns($campaignsList);

  // Test data
/*
  $campaigns = array();
  $campaigns[] = new StdClass();
  $campaigns[0]->id = 1;
  $campaigns[0]->title = "Example Title 1";
  $campaigns[0]->description = "Lorem ipsum dolor sit amet. And some more...";
  $campaigns[0]->location = new StdClass();
  $campaigns[0]->location->longitude = -0.04;
  $campaigns[0]->location->latitude = 48.0;
  $campaigns[0]->goal = 20000; // $200.00
  $campaigns[0]->startDateTime = new DateTime();
  $campaigns[0]->startDateTime->setDate(2014, 9, 1);
  $campaigns[0]->startDateTime->setTime(12, 0, 0);
  $campaigns[0]->endDateTime = new DateTime();
  $campaigns[0]->endDateTime->setDate(2014, 12, 1);
  $campaigns[0]->endDateTime->setTime(12, 0, 0);
  $campaigns[0]->creator_id = 3;

  $campaigns[] = new StdClass();
  $campaigns[1]->id = 2;
  $campaigns[1]->title = "Example Title 2";
  $campaigns[1]->description = "Lorem ipsum dolor sit amet. And some more... And even more.";
  $campaigns[1]->location = new StdClass();
  $campaigns[1]->location->longitude = -0.04;
  $campaigns[1]->location->latitude = -48.0;
  $campaigns[1]->goal = 30000; // $300.00
  $campaigns[1]->startDateTime = new DateTime();
  $campaigns[1]->startDateTime->setDate(2014, 8, 15);
  $campaigns[1]->startDateTime->setTime(12, 0, 0);
  $campaigns[1]->endDateTime = new DateTime();
  $campaigns[1]->endDateTime->setDate(2014, 11, 1);
  $campaigns[1]->endDateTime->setTime(18, 0, 0);
  $campaigns[1]->creator_id = 4;
*/

  $app->render("DiscoverView", array(
    "title" => "Micronate - Discover",
    "campaigns" => $campaigns,
  ));
});

// Sign up / in
$app->get('/get-started', function() use ($app) {
  $app->render("GetStartedView", array(
    "title" => "Micronate - Get started"
  ));
});

// Creating a campaign
$app->get('/campaigns/new', function() use ($app) {
  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $app->render("NewCampaignView", array(
    "title" => "Micronate - New Campaign",
    "user_full_name" => $user->getFullName(),
    "user_image_url" => $user->getGravatarUrl(),
  ));
});

// Viewing a campaign
$app->get('/campaigns/:id', function($id) use ($app) {

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $campaignObj = new Campaign($id);
  if ($campaignObj->getId() == NULL) {
    $app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);

  }

  $campaign = refactorCampaign($campaignObj);

  if ($campaign->getId() !== NULL) {
    $app->render("CampaignView", array(
      "title" => "Micronate - ".$campaign->getTitle(),
      "user_full_name" => $user->getFullName(),
      "user_image_url" => $user->getGravatarUrl(),
      "campaign" => $campaign,
    ));
  } else {
    $app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);
  }
});

// Editing a campaign
$app->get('/campaigns/:id/edit', function($id) use ($app) {

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $app->render("EditCampaignView", array(
    "title" => "Micronate - ".$campaign->getTitle()." - Edit Campaign",
    "user_full_name" => $user->getFullName(),
    "user_image_url" => $user->getGravatarUrl(),
  ));
});

// View Profile
$app->get('/profile/:id', function($id) use ($app) {

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $loggedUser = new User($_SESSION['userId']);

  $user = new User($id);
  if ($user->getId() !== NULL) {

    $userObj = new StdClass();
    $userObj->firstName = $user->getFirstName();
    $userObj->surname = $user->getLastName();
    $userObj->email = $user->getEmail();
    $userObj->username = $user->getUsername();
    $userObj->location = $user->getLocation();
    $userObj->campaigns = refactorCampaigns($user->getCampaigns());

    $app->render("ProfileView", array(
      "title" => "Micronate - Profile",
      "user" => $userObj,
      "logged_user_full_name" => $loggedUser->getFullName(),
      "logged_user_image_url" => $loggedUser->getGravatarUrl(),
    ));
  } else {
    $app->render("Error404View", array(
            "title" => "Micronate - Error 404"
        ), 404);
  }
});

// Edit Profile
$app->get('/profile/:id/edit', function($id) use ($app) {

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $app->render("EditProfileView", array(
    "title" => "Micronate - Edit Profile",
    "user_full_name" => $user->getFullName(),
    "user_image_url" => $user->getGravatarUrl(),
  ));
});

// View Transactions of the registered user
$app->get('/profile/transactions', function($id) use ($app) {

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $app->render("UserTransactionView", array(
    "title" => "Micronate - User transactions",
    "user_full_name" => $user->getFullName(),
    "user_image_url" => $user->getGravatarUrl(),
    "transactions" => refactorTransactions($user->getMicroTransactions()),
  ));
});

//Counted EMails

$app->get('/usecase',function() use($app) {
    $app->render("sentEmailsview", array(
		"title" => "Micronate - UseCase"
	));
});

$app->post('/signup', function() use($app){
   $params = $app->request->post();

   $newUID = User::create($params['email'], $params['username'],
                             $params['pwd'], $params['first_name'],
                             $params['last_name'], "");

  session_start();
  $_SESSION['userId'] = $newUID;

  $app->redirect('/discover');
});

$app->post('/login', function() use($app){
   $params = $app->request->post();
   $userId = User::verifyCredentials($params['email'], $params['password']);

  session_start();
  $_SESSION['userId'] = $userId;

  $app->redirect('/discover');

});

$app->get('/logout', function() use($app) {
  unset($_SESSION['userId']);
  $app->redirect('/get-started');
});

$app->post('/campaigns/create', function() use($app){

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $params = $app->request->post();

  $newUID = Campaign::createNew($user, $params['title'], $params['description'],
                                   $params['location'], $params['goal'], $params['start_date'],
                                   $params['end_date']);

  if ($newUID == 0)
    $app->redirect("/campaigns/new");

  $app->redirect("/campaigns/{$newUID}");
});


$app->post('/campaigns/:id/addmessage', function($id) use($app){

  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $params = $app->request->post();

  $newUID = Campaign::createNew( $params['content'], $user, new Campaign($id));

  $app->redirect("/campaigns/:id");
});

$app->post('/campaigns/:id/donate', function($id) use($app){
  if (!isset($_SESSION['userId']))
    $app->redirect('/get-started');
  $user = new User($_SESSION['userId']);

  $params = $app->request->post();

  $id = Donation::process($user, new Campaign($id), $params['amount']);
  if ($id == 0) {
    $app->render(200, array(
        'msg' => 'insufficent balance',
    ));
  }

  $app->render(200, array(
      'msg' => 'Thank you!',
   ));

});
?>
