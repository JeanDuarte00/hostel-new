<?php

function isLogged()
{
    session_start();
    
    if(!isset($_SESSION['hasLogin']) || $_SESSION['hasLogin'] == false) 
    {
        header('location:'. BASEURL. 'login/index.php');
    }
}