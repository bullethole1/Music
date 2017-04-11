<?php
$config = require 'resources/config.php';

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Crud
{
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createAlbum($id, $table)
    {
        $db = new Database();
    }

    public function deleteAlbums($id, $table)
    {
        $db = new Database();
        $sql = "DELETE FROM $table WHERE id=:id";
        $delete_stm = $this->$db->prepare($sql);
        $delete_stm->execute(array(':id' => $id));
        return true;
    }
}