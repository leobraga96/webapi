<?php

interface IUserValidator
{
    public function isNameValid($name);

    public function isregisternumberValid($registernumber);

    public function isUsernameValid($username);

    public function isemailValid($email);

    public function isPasswordValid($password);
}