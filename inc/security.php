<?php

function isLogged()
{
    session_start();
    
    if(!isset($_SESSION['hasAdmin']) || $_SESSION['hasAdmin'] == false) 
    {
        header('location:'. BASEURL. 'login/index.php');
    }
}

function loginAdmin()
{
    session_start();
    $_SESSION['hasAdmin'] = true;
}

function logout()
{
    session_start();

    if(isset($_SESSION['hasAdmin']))
    {
        $_SESSION['hasAdmin'] = false;
    }
}