<?php

class UserException extends Exception
{
    protected $code;
    protected $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function toJson() {
        return json_encode(Array("code" => $this->code,
                                    "message" => $this->message));
    }
}