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


    /*public function saveAlbum($table, $title, $artist, $year)
    {
        $save_stm = $this->prepare("INSERT INTO $table ($title, $artist, $year) VALUES(:title, :artist, :year)");
        $save_stm->execute([':table' => $table, ':title' => $title, ':artist' => $artist, ':year' => $year]);
        return true;
    }*/



    public function updateAlbum($id, $table, $title, $artist, $year)
    {
        $update_stm = $this->prepare("UPDATE $table SET title = :title, artist = :artist, year = :year WHERE id = :id");
        $update_stm->execute([':id' => $id, ':table' => $table, ':title' => $title, ':artist' => $artist, ':year' => $year]);
        return true;
    }

    public function deleteById($id, $table)
    {
        $delete_stm = $this->prepare("DELETE FROM $table WHERE id = :id");
        $delete_stm->execute([':table' => $table, ':id' => $id]);
        return true;
    }

    public function getAllAlbums($id, $table){
        $get_stm = $this->prepare("SELECT * FROM $table WHERE id = :id");
        $get_stm->execute([':table' => $table, ':id' => $id]);
        return true;
    }
}