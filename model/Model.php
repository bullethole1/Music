<?php
$config = require 'resources/config.php';

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Model
{
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createAlbum($id, $table)
    {

    }

}