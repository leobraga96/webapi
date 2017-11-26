<?php

require_once ("model/user.php");
require_once ("database/database.php");
require_once ("exception/userException.php");

class UserController {
	
    private $request;
	
    public function __construct($request) 
    {
        $this->request = $request;
    }

    public function routeOperation()
    {
        $body = $this->request->getBody(); 
        $queryString = $this->request->getQueryString();
        if ($this->request->getOperation() == 'disable' && $this->request->getMethod() == 'PUT')
            return $this->delete($body);
        switch($this->request->getMethod())
        {
            case "GET":
                return $this->search($queryString);
            case "POST":
                if ($this->request->getOperation() == 'login')
                    return $this->login($body);
                return $this->create($body);
            case "PUT":
                return $this->update($body, $queryString);
            default:
                return json_encode(array("404"=>"Object not found"));
        }		
    }

    private function create($body) 
    {
        try 
        {			
        //var_dump($body);
            new User($body["name"], $body["registernumber"], $body["username"], $body["institution"], $body["id_tipo"], $body["password"]);
            $body = $body + Array("ativo" => 1);
        //var_dump($body);
            return (new DBHandler())->insert($body, 'users'); 
		
        }
        catch (UserException $ue)
        {
            return $ue->toJson();
            http_response_code(400);

        }
    }

    private function update($body, $queryString)
    {
        try{

            $conditions = $queryString;
            $set = ['$set' => $body];
            return (new DBHandler())->update($conditions, $set, 'users');

        }catch(RequestException $ue) {
            http_response_code(400);
            return $ue->toJson();
        }
    }

    private function delete($body)
    {
        try{
            $set = ['$set' => ['ativo' => 0]];
            $conditions = $body;
            return (new DBHandler())->update($conditions, $set, 'users');

        }
        catch(RequestException $ue) 
        {
            http_response_code(400);
            return $ue->toJson();
        }
    }
	
    private function search($queryString)
    {
        $conditions = $queryString + ["ativo" => 1];
        return (new DBHandler())->search($conditions, 'users');
    }
	
    private function verifyPassword($body, $userFound) 
    {
        if ($body['password'] == $userFound->password)
            return json_encode(array('200' => 'Ok'));
        http_response_code(401);
        return json_encode(array('401' => 'Unauthorized'));
    }
	
    private function login($body)
    {
        $conditions = array("ativo" => 1, "username" => $body['username']);
        $result = json_decode((new DBHandler())->search($conditions, 'users'));
        if(count($result) > 0)
            return $this->verifyPassword($body, $result[0]);

        http_response_code(401);
        return json_encode(array('401' => 'Unauthorized'));
    }
}
