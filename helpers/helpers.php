<?php

require_once 'jsonapi/JsonApiMiddleware.php';
require_once 'jsonapi/JsonApiView.php';
require_once 'DB.php';

function APIrequest(){
	$app = \Slim\Slim::getInstance();
	$app->view(new \JsonApiView());
	$app->add(new \JsonApiMiddleware());
}

require_once 'model/User.php';
require_once 'model/Campaign.php';
require_once 'model/Donation.php';
require_once 'model/Message.php';
require_once 'model/MicroTransaction.php';

require_once 'routing/views.php';
require_once 'routing/api.php';
