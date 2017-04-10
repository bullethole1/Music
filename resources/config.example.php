<?php
include 'database.php';

$config = array(
    'db_type' => 'mysql',
    'db_host' => '',
    'db_name' => '',
    'db_username' => '',
    'db_password' => ''
);

$db = new Database($config);