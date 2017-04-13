<?php
require 'resources/Database.php';
require 'model/Album.php';
require 'view/viewAlbums.php';
$config = require 'resources/config.php';

//this file will work as a controller

class Controller
{
    public function __construct(Database $db)
    {
    }

}

if (isset($_POST['addAlbum'])){

}