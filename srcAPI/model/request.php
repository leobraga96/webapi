<?php

require_once('validation/requestValidator.php');
require_once('exception/requestException.php');

class Request {
	
    private $method;
    private $protocol;
    private $uri;
    private $queryString;
    private $body;
    private $validateRequest;
    private $resource;

public function __construct($method, $protocol, $host, $uri = null, $queryString = null, $body = null) 
{
    $this->validateRequest = new RequestValidator();

    $this->setMethod($method);
    $this->setProtocol($protocol);
    $this->setHost($host);
    $this->setUri($uri);
    $this->setQueryString($queryString);
    $this->setBody($body);
    $this->setResource();
    $this->setPorteration();
}

public function getMethod() {
    return $this->method;
} 

public function getUri() {
    return $this->uri;
} 

public function getBody() {
    return $this->body;
} 

public function getQueryString() {
    return $this->queryString;
} 

public function getProtocol() {
    return $this->protocol;
} 

public function getResource() {
    return $this->resource;
} 

public function getOperation() {
    return $this->operation;
} 

public function setMethod($method)
{
    if (!$this->validateRequest->isMethodValid($method))
    {
        http_response_code(405);
        throw new RequestException('405', 'Method not allowed');

    }
    $this->method = $method;
}

public function setProtocol($protocol)
{
    if (!$this->validateRequest->isProtocolValid($protocol))
    {
        http_response_code(400);
        throw new RequestException('400', 'Bad Request: invalid protocol');
    }
    $this->protocol = $protocol;
}

public function setUri($uri)
{
    $uri = strtok($uri, '?');
    if (!$this->validateRequest->isUriValid($uri))
    {
        http_response_code(400);
        throw new RequestException('400', 'Bad Request: invalid URI');
    }
    $this->uri = $uri;
}

public function setHost($host)
{
    $this->host = $host;
}

public function setQueryString($queryString)
{
    if ($queryString != NULL)
    {
        if (!$this->validateRequest->isQueryStringValid($queryString))
        {
            http_response_code(400);
            throw new RequestException('400', 'Bad Request: invalid query string');
        }
        $paramValue = explode('&', $queryString);
        $queryString = [];
        $countParameters = count($paramValue);
        for ($i = 0; $i < $countParameters; $i++)
        {
            $element = explode('=', $paramValue[$i]);
            $queryString += [$element[0] => $element[1]];
        }
        $this->queryString = $queryString;
    } else 
    {
        $this->queryString = NULL;
    }
}

public function setBody($body)
{
    if (!$this->validateRequest->isBodyValid($body, $this->uri))
    {
        http_response_code(400);
        throw new RequestException('400', 'Bad Request: invalid body');
    }
    $this->body = $body;
}

private function setResource()
{
    $explodedUri = explode('/', $this->uri);
    $this->resource = $explodedUri[3];
}

private function setPorteration()
{
    $explodedUri = explode('/', $this->uri);
    if (count($explodedUri) > 4) {
            $this->operation = $explodedUri[4];
    } else {
            $this->operation = "";
    }
    }
     
}

