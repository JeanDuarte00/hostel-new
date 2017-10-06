<?php

require_once('../config.php');
require_once(SECURITY);
require_once(DBAPI);

$user = null;

function index()
{
    
}

function login()
{
    if(isset($_POST['email']))
    {   
        
        $password = $_POST['password'];
        $password = sha1(md5($password));
        $email = $_POST['email'];
        
        $sql = "SELECT * FROM users WHERE email = '".$email . "' and password = '". $password . "';";

        $result = find_with_sql($sql);

        
        if($result)
        {
            loginAdmin();
            header('location:'. BASEURL . 'admin/index.php');
        }
        else
        {
            $_SESSION['message'] = "Nenhum registro encontrado";
            $_SESSION['type'] = "danger";
        }
        
    }
}

function logoutAdmin()
{
    logout();
    isLogged();
}