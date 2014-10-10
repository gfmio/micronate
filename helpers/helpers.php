<?php

require_once 'jsonapi/JsonApiMiddleware.php';
require_once 'jsonapi/JsonApiView.php';

function APIrequest(){
	$app = \Slim\Slim::getInstance();
	$app->view(new \JsonApiView());
	$app->add(new \JsonApiMiddleware());
}
