<?php

require_once ("exception/userException.php");
include_once ('IuserValidator.php');

class UserValidator implements IUserValidator
{
    public function isNameValid($name)
    {
        if (count($name) > 40)
            return false;
        if (is_numeric($name[0]))
            return false;
        return true;
    }

    public function isregisternumberValid($registernumber)
    {
        if (!is_numeric($registernumber))
            return false;
        if (ctype_space($registernumber))
            return false;
        return true;
    }

    public function isUsernameValid($username)
    {
        if (count($username) > 15)
            return false;
        return true;
    }

    public function isinstitutionValid($institution)
    {
        if (count($institution) > 40)
            return false;
        if (is_numeric($institution[0]))
            return false;
        return true;
    }

    public function isPasswordValid($password) 
    {
        if (count($password) > 20) 
            return false;
        return true;
    }
}