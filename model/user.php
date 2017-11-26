<?php

require_once ('validation/userValidator.php');
require_once ('exception/userException.php');

class User {
	
    private $name;
    private $registernumber;
    private $username;
    private $institution;
    private $password;
    private $validateUser;

    public function __construct($name, $registernumber, $username, $institution, $password) {
            $this->validateUser = new UserValidator();

            $this->setName($name);
            $this->setregisternumber($registernumber);
        $this->setUsername($username);
        $this->setinstitution($institution);
        $this->setPassword($password);
    }

    public function setName($name)
    {
        if(!$this->validateUser->isNameValid($name))
		
        {
            http_response_code(400);
            throw new UserException("400", "Bad Request: invalid name for user");
        }
        $this->name = $name;
    }

    public function setregisternumber($registernumber)
    {
        if(!$this->validateUser->isregisternumberValid($registernumber))
        {
            http_response_code(400);
            throw new UserException("400", "Bad Request: invalid register number");
        }
        $this->registernumber = $registernumber;
    }

    public function setUsername($username)
    {
        if(!$this->validateUser->isUsernameValid($username))
        {
            http_response_code(400);
            throw new UserException("400", "Bad Request: invalid username");
        }
        $this->username = $username;
    }
    public function setinstitution($institution)
    {
        if(!$this->validateUser->isinstitutionValid($institution))
        {
            http_response_code(400);
            throw new UserException("400", "Bad Request: invalid user institution");
        }
        $this->institution = $institution;
    }
    public function setPassword($password)
    {
        if(!$this->validateUser->isPasswordValid($password))
        {
            http_response_code(400);
            throw new UserException("400", "Bad Request: invalid user password");
        }
        $this->password = $password;
    }


}