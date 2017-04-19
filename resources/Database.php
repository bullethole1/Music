<?php

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 23:37
 */
class Database extends PDO
{

    function __construct($config)
    {

        try {
            parent::__construct($config['db_type'] . ':host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_username'], $config['db_password']);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
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