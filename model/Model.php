<?php
/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Model
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function saveAlbum($title, $artist, $year)
    {
        $save_stm = $this->db->prepare("INSERT INTO `albums` ($title, $artist, $year) VALUES(:title, :artist, :year)");
        $save_stm->execute([':title' => $title, ':artist' => $artist, ':year' => $year]);
        return $save_stm;
    }


    public function updateAlbum($id, $title, $artist, $year)
    {
        $update_stm = $this->db->prepare("UPDATE `albums` SET title = :title, artist = :artist, year = :year WHERE id = :id");
        $update_stm->execute([':id' => $id, ':title' => $title, ':artist' => $artist, ':year' => $year]);
        return $update_stm;
    }

    public function deleteById($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `albums` WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        $results = $delete_stm->fetchAll(PDO::FETCH_ASSOC);
        return $results->fetch();
    }

    public function getAllAlbums()
    {
        $get_stm = $this->db->prepare("SELECT * FROM `albums`");
        $success = $get_stm->execute();

        $results = $get_stm->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($item) {
            return new Album($item);
        }, $results);
    }
}