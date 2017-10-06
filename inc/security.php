<?php

function isLogged()
{
    
    start_session();
    
    if(!isset($_SESSION['hasAdmin']) || $_SESSION['hasAdmin'] == false) 
    {
        
        header('location:'. BASEURL. 'login/index.php');
    }

}

function loginAdmin()
{
    start_session();
    $_SESSION['hasAdmin'] = TRUE;
}

function logout()
{
    start_session();

    if(isset($_SESSION['hasAdmin']))
    {
        unset($_SESSION["hasAdmin"]);
    }
}

function start_session()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}