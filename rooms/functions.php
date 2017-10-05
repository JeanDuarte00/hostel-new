<?php

require_once('../config.php');
require_once(DBAPI);
session_start();

$rooms = null;
$room = null;

function index()
{
    global $rooms;
    $rooms = find_all('rooms');
    
}

function add()
{
    if(!empty($_POST['room']))
    {
        $room = $_POST['room'];

        $now = date_create('now', new DateTimeZone('America/Recife'));

        $room['updated_at'] = $room['created_at'] = $now->format('Y-m-d H:i:s');

        save('rooms', $room);
        header('location: index.php');
    }
}

function edit()
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        if(!empty($_POST['room']))
        {
            $now = date_create('now', new DateTimeZone('America/Recife'));

            $room = $_POST['room'];
            $room['updated_at'] = $now->format('Y-m-d H:i:s');

            update('rooms', $id, $room);
            header('location: index.php');
        }
        else
        {
            global $room;
            $room = find('rooms', $id);
        }
    }
    else
    {
        header('location: index.php');
    }
}

function remove($id = null)
{

    if($id)
    {
        delete('rooms', $id);
    }
    else
    {
        $_SESSION['message'] = "Por favor informe o quarto a ser excluído";
        $_SESSION['type'] = 'danger';
    }

    header('location: index.php');
}