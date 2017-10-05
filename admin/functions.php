<?php

require_once('../config.php');
require_once(DBAPI); 
require_once(SECURITY);

function index()
{
    validIfLogged();
}

function validIfLogged()
{
    isLogged();
}

function login()
{
    if(!empty($_POST['login']))
    {
        $user = $_POST['login'];
        $user['password'] = sha1(mdr($user['password']));
        dd($user);
        die();
    }
}