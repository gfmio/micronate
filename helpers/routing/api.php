<?php

// Example GET request to the API
$app->get('/api','APIrequest',function() use($app){
	//this request will have full json responses

	$app->render(200,array(
		'msg' => 'welcome to my API!',
	));
});

$app->post('/api/authenticate_user', function() use($app){

	$params = $app->request->post();

	$api_key = $params['api_key'];

	$appId = Application::findId($api_key);
	if ($appId == 0) {
		$app->render(401, array(
				'msg' => 'Api key not valid',
		));
	}

	$application = new Application($appId);

	$userId = User::verifyCredentials($params['email'], $params['password']
	if ($userId == 0) {
    	$app->render(401, array(
					'msg' => 'User credentials not valid',
			));
	}

	$user = new User($userId);
	$user_token = $user->authorizeApp($application);


});
