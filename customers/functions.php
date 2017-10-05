<?php

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

function index()
{
    global $customers;
    $customers = find_all('customers');
    
}

function add()
{
    if(!empty($_POST['customer']))
    {
        $today = date_create('now', new DateTimeZone('America/Recife'));

        $customer = $_POST['customer'];
        $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
        
        save('customers',$customer);
        header('location: index.php');
    }
}

function edit()
{
    $now = date_create('now', new DateTimeZone('America/Recife'));

    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        if(isset($_POST['customer']))
        {
            $customer = $_POST['customer'];
            $customer['modified'] = $now->format("Y-m-d H:i:s");

            
            update('customers', $id, $customer);
            header('location: index.php');
        }
        else
        {
            
            global $customer;
            $customer = find('customers',$id);
        }
    }
    else
    {
        header('location: index.php');
    }
}

function view($id = null)
{
    global $customer;
    $customer = find('customers', $id);
}

function remove($id = null)
{

    if($id)
    {
        delete('customers', $id);
    }
    else
    {
        $_SESSION['message'] = "Por favor informe o quarto o usuário a ser excluído";
        $_SESSION['type'] = 'danger';
    }

    header('location: index.php');
}