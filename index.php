<?php
require('Controller/Controller.php');
require('model/Model.php');
require('model/Album.php');
require ('model/Database.php');

$config = require('resources/config.php');
$pdo = new PDO($config['db_type'] . ':host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_username'], $config['db_password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = new Database($pdo);
$controller = new Controller($db);
$controller->index();