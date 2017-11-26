<?php

interface IUserValidator
{
    public function isNameValid($name);

    public function isregisternumberValid($registernumber);

    public function isUsernameValid($username);

    public function isinstitutionValid($institution);

    public function isPasswordValid($password);
}