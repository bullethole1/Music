<?php

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Model
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAlbumById($id)
    {
        $id_stm = $this->db->prepare("SELECT * FROM `albums` WHERE id= :id");
        $id_stm->execute([':id' => $id]);
        $id_stm->setFetchMode(PDO::FETCH_ASSOC);
        return new Album($id_stm->fetch());
    }

    public function saveAlbum(Album $album)
    {
        $save_stm = $this->db->prepare("INSERT INTO `albums` (`title`, `artist`, `year`) VALUES(:title, :artist, :year)");
        $success = $save_stm->execute([':title' => $album->getTitle(), ':artist' => $album->getArtist(), ':year' => $album->getYear()]);
        if ($success) {
            $album->setId($this->db->lastInsertId());
        }
        return $success;
    }


    public function updateAlbum(Album $album)
    {
        $update_stm = $this->db->prepare("UPDATE `albums` SET title = :title, artist = :artist, year = :year WHERE id = :id");
        return $update_stm->execute([':id' => $album->getId(), ':title' => $album->getTitle(), ':artist' => $album->getArtist(), ':year' => $album->getYear()]);
    }

    public function deleteById($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `albums` WHERE id = :id");
        return $delete_stm->execute([':id' => $id]);
    }

    public function getAllAlbums()
    {
        $get_stm = $this->db->prepare("SELECT * FROM `albums`");
        $get_stm->execute();
        $results = $get_stm->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function ($item) {
            return new Album($item);
        }, $results);
    }
}