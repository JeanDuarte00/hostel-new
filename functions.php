<?php

require_once('config.php');
require_once(DBAPI);

$images = null;

function index()
{
    global $images;
    $images = find_all('images');
}
