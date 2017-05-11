<?php
require('resources/Database.php');
require('resources/Controller.php');
require('model/Model.php');
require('model/Album.php');

$config = require('resources/config.php');
$db = new Database($config);

$controller = new Controller($db);
$controller->index();