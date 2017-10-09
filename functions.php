<?php

require_once('config.php');
require_once(DBAPI);

$images = null;
$rooms = null;

function index()
{
    global $rooms;
    $rooms = find_all("rooms");
}
