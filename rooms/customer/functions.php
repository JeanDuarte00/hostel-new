<?php

require_once('../../config.php');
require_once(DBAPI);

$rooms = null;
$room = null;

function index()
{
    global $rooms;

    $sql = "SELECT c.id, r.name, c.date_start, c.date_end, c.value, c.updated_at FROM hostel.custom_value c LEFT JOIN rooms r ON c.room_id = r.id";

    $rooms = find_with_sql($sql);
    
}

function add()
{
    if(!empty($_POST['room']))
    {
         $today = date_create('now', new DateTimeZone('America/Recife'));

         $room = $_POST['room'];
         $room['updated_at'] = $room['created_at'] = $today->format("Y-m-d H:i:s");

         save("custom_value", $room);
         header('location: index.php');
    }
    else
    {
        global $rooms;
        $rooms = find("rooms");
    }
    
}

function edit()
{

    if(isset($_GET['id']))
    {
        if(isset($_POST['room']))
        {

            $today = date_create('now', new DateTimeZone('America/Recife'));

            $room = $_POST['room'];

            $room['updated_at'] = $today->format('Y-m-d H:i:s');

            update("custom_value", $_GET['id'], $room);
            header("location: index.php");
        }
        else
        {
            global $rooms;
            $rooms = find_all("rooms");

            $id = $_GET['id'];

            global $room;
            $room = find("custom_value", $id);
        }

    }
    
}

function remove()
{
    if(isset($_GET['id']))
    {
        delete("custom_value", $_GET['id']);
    }

    header("location: index.php");
}