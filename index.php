<?php
require('Controller/Controller.php');
require('model/Model.php');
require('model/Album.php');

$config = require('resources/config.php');
$pdo = new PDO($config['db_type'] . ':host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_username'], $config['db_password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$controller = new Controller($pdo);
$controller->index();