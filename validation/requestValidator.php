<?php

include_once "IrequestValidator.php";

class RequestValidator implements IRequestValidator 
{
    private $resources;
    private $userKeys;
    private $exploitKeys;
    private $infoKeys;

    public function __construct()
    {
        $this->resources = array("user" => "userKeys" ,
                                "exploit" => "exploitKeys", 
                                "info" => "infoKeys",
                                "test" => array("all"));
        $this->operations = array ("", "disable");
        $this->userKeys = array("name", "registernumber", "username", "institution", "id_tipo", "ativo", "password");
        $this->exploitKeys = array("idexploit", "porta", "desc", "type", "file", "plataforma", "ativo");
        $this->infoKeys = array("idexploit", "porta", "desc", "grau", "codigo", "ativo");
    }

    public function isMethodValid($method) {

        if($method != 'GET' && $method != 'POST' && $method != 'PUT') {
            return false;
        }

        return true;		
    }

    public function isProtocolValid($protocol) {
        $substring = substr($protocol, -3, 3);
        if (strcmp($substring, "1.0") == 0 || strcmp($substring, "1.1") == 0)
        {
            $substring = substr($protocol, 0, 6);
            if (strcmp($substring, "HTTPS/") == 0)
            {
                return true;
            }
			
            $substring = substr($protocol, 0, 5);
            if (strcmp($substring, "HTTP/") == 0)
            {
                return true;
            }
        }
        return false;
    }

    public function isQueryStringValid($queryString) {
        if ($queryString != "")
        {
            $queryString = explode('&', $queryString);
            $validParameters = array("registernumber", "desc", "idexploit", "porta", "codigo", "grau", "file");
            $countParameters = count($queryString);
            for ($i = 0; $i < $countParameters; $i++)
            {
                $queryString[$i] = strtok($queryString[$i], '=');
                if (!in_array($queryString[$i], $validParameters))
                {
                    return false;
                }
            }
        }
        return true;
    }

    public function isUriValid($uri) {
        $uri = explode('/', strtok($_SERVER["REQUEST_URI"],'?'));

        if (in_array($uri[3], array_keys($this->resources))) 
            return (($uri[3] == "user" && $uri[4] == "login") || (in_array($uri[4], $this->operations)));
        return false;
    }

    public function verifyBodyKeys($countKeys, $chaves, $keys)
    {
        for ($i=0; $i < $countKeys; $i++) {
            if (!in_array($chaves[$i], $keys))
            {
                return false;
            }
        }
        return true;
    }

    public function isBodyValid($body, $uri) {

        $uri = explode('/', strtok($_SERVER["REQUEST_URI"],'?'));
		
        $uri = $uri[3]; // resource

        if ($body == NULL)
        {
            return true;
        }
		
        $chaves = array_keys($body);

        $resources = array_keys($this->resources);

        $countKeys = count($body);
		
        foreach ($resources as $resource)
        {
            if(strcmp($uri, $resource) == 0)
            {
                switch ($uri) {
                    case 'user':
                        return $this->verifyBodyKeys($countKeys, $chaves, $this->userKeys);
                    case 'exploit':
                        return $this->verifyBodyKeys($countKeys, $chaves, $this->exploitKeys);
                    case 'info':
                        return $this->verifyBodyKeys($countKeys, $chaves, $this->infoKeys);
					
                    default:
                        return $this->verifyBodyKeys($countKeys, $chaves);
                }
            }
        }
        return false;
    }
}