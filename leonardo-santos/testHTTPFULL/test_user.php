<?php include_once ("httpful.phar");

	function testGetUser() {
		$uri = "http://localhost/RP/index.php/user/?registernumber=34356";
		$response = \Httpful\Request::get($uri)->send();
		echo $response;
	}

	function testUserInsertValido() {
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "leonardo Braga",
					"registernumber": "34356", 
					"username": "braga96",
					"password": "123456",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertValido -> {"200":"Ok"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}

	function testUserInsertBodyInvalido() { //colocando campo 'name' como 'nome'
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"nome": "leonardo Braga", 
					"registernumber": "34356", 
					"username": "braga96",
					"password": "123456",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertBodyInvalido -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}
	
	function testUserInsertInvalidoName() { //Name Invalido
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "34356",
					"registernumber": "34356", 
					"username": "braga96",
					"password": "123456",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertInvalidoName -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}

	function testUserInsertInvalidoRegisternumber() { //Register number Invalido
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "leonardo Braga",
					"registernumber": "braga", 
					"username": "braga96",
					"password": "123456",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertInvalidoRegisternumber -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}

	function testUserInsertInvalidoUsername() { //Username Invalido
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "leonardo Braga",
					"registernumber": "34356", 
					"username": "12345678912345678",
					"password": "123456",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertInvalidoUsername -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}

	function testUserInsertInvalidoPassword() {
	$uri = 'http://localhost/RP/index.php/user/'; //password Invalido
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "leonardo Braga",
					"registernumber": "34356", 
					"username": "braga96",
					"password": "123456789012345678901",
					"email":"uniceub@uniceub.com",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertInvalidoPassword -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}

	function testUserInsertInvalidoInstitution() { //Institution Invalido
	$uri = 'http://localhost/RP/index.php/user/';
	$response = \Httpful\Request::post($uri)
	->sendsJson()->body(
		'{			"name": "leonardo Braga",
					"registernumber": "34356", 
					"username": "braga96",
					"password": "123456",
					"email":"123",
					"id_tipo": 1
		}')
	->send();
	return strcmp($response->body, 'testUserInsertInvalidoInstitution -> {"400": "Bad Request"}') == 0;
	echo __FUNCTION__. " ". "Teste Funcionou";
	}