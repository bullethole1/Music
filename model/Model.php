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
        $update_stm->execute([':id' => $album->getId(), ':title' => $album->getTitle(), ':artist' => $album->getArtist(), ':year' => $album->getYear()]);
        return $update_stm;
    }

    public function deleteById($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `albums` WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        //$results = $delete_stm->fetchAll(PDO::FETCH_ASSOC);
        return $delete_stm;
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