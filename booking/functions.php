<?php

require_once('../config.php');
require_once(DBAPI);

$rooms = null;

function index()
{
    global $rooms;
    $rooms = find_all("rooms");

}

function add()
{

}

function edit()
{

}

function remove()
{

}

function view()
{

}