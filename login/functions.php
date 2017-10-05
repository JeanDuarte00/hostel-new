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
    if(isset($_POST['user']))
    {   

        session_start();
        $login = $_POST['user'];
        $password = $login['\'password\''];
        $password = sha1(md5($password));
        
        $sql = "SELECT * FROM users WHERE email = '".$login['\'email\''] . "' and password = '". $password . "';";
        
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
    loginAdmin();
    isLogged();
}