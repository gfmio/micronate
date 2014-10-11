<?php


$app->group('/api', 'APIrequest', function () use ($app) {
	// User

	$app->get('/user',function() use ($app) {
		
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/user',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->put('/user',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->delete('/user',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	// Session

	$app->post('/session',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->delete('/session',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	// Credit Card Details

	$app->post('/user/payments/details',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/user/payments/key',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/user/payments/charge/:amount',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->get('/user/payments/transactions',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/user/payments/donate/:project/:amount',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	// Projects

	$app->get('/projects/:id',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/projects',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->put('/projects/:id',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->delete('/projects/:id',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->get('/projects/transactions',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	// Messages

	$app->get('/projects/:id/messages',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->post('/projects/:id/messages',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->put('/projects/:id/messages/:message',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});

	$app->delete('/projects/:id/messages',function() use ($app) {
		$app->render(200,array(
			'msg' => 'welcome to my API!',
		));
	});
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
