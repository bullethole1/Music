<?php
require 'resources/Database.php';
require 'model/Albums.php';
require 'model/Crud.php';
require 'view/viewAlbums.php';
$config = require 'resources/config.php';

//this file will work as a controller

class Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteAlbums()
    {
        $crud = new Crud();

        $data['albums'] = $crud->deleteAlbums();


        $this->view('templates/header', $data);

    }
}