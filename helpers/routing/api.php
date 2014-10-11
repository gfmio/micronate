<?php

// Example GET request to the API
$app->get('/api','APIrequest',function() use($app){
	//this request will have full json responses

	$app->render(200,array(
		'msg' => 'welcome to my API!',
	));
});
