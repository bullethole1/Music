<?php

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Model
{
    public function saveAlbum($title, $artist, $year)
    {
        $save_stm = $this->prepare("INSERT INTO `albums` ($title, $artist, $year) VALUES(:title, :artist, :year)");
        $save_stm->execute([':title' => $title, ':artist' => $artist, ':year' => $year]);
        return $save_stm;
    }


    public function updateAlbum($id, $title, $artist, $year)
    {
        $update_stm = $this->prepare("UPDATE 'albums' SET title = :title, artist = :artist, year = :year WHERE id = :id");
        $update_stm->execute([':id' => $id, ':title' => $title, ':artist' => $artist, ':year' => $year]);
        return $update_stm;
    }

    public function deleteById($id)
    {
        $delete_stm = $this->prepare("DELETE FROM 'albums' WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        $delete_stm->setFetchMode(PDO::FETCH_CLASS, 'Album');
        return $delete_stm->fetch();
    }

    public function getAllAlbums()
    {
        $get_stm = $this->prepare("SELECT * FROM 'albums'");
        $get_stm->execute();
        return $get_stm->setFetchMode(PDO::FETCH_CLASS, 'Album');
    }
}