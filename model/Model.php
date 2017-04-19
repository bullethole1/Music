<?php
$config = require 'resources/config.php';

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Model extends Database
{
    protected $db;

    function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAlbums() {
        return $this->getAllAlbums($this->id, 'albums');
    }


    public function read()
    {
        return $this->readAlbum($this->id, 'albums');
    }

    public function delete()
    {
        return $this->deleteById($this->id, 'albums');
    }
}