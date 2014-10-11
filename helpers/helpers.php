<?php

require_once 'jsonapi/JsonApiMiddleware.php';
require_once 'jsonapi/JsonApiView.php';
require_once 'DB.php';

function APIrequest(){
	$app = \Slim\Slim::getInstance();
	$app->view(new \JsonApiView());
	$app->add(new \JsonApiMiddleware());
}

// require_once 'model/User.php';

require_once 'routing/views.php';
require_once 'routing/api.php';
