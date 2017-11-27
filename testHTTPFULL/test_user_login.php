<?php include_once ("httpful.phar");

	function testUserLogin() 
	{
	$uri = 'http://localhost/RP/index.php/user/login';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"username": "braga96",
					"password": "123456"
		}')
	->send();
	return strcmp($response->body, 'testUserLogin -> {"200":"Ok"}') == 0;
	echo __FUNCTION__. " ". "Login realizado";
	}

	function testUserLoginInvalido() 
	{
	$uri = 'http://localhost/RP/index.php/user/login';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"username": "braga96",
					"password": "12345"
		}')
	->send();
	return strcmp($response->body, 'testUserLoginInvalido -> {"401":"Unauthorized"}') == 0;
	echo __FUNCTION__. " ". "Login Unauthorized";
	}