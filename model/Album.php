<?php

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 14:12
 */
/*Object to hold album information*/

class Album
{
    private $id;
    private $title;
    private $artist;
    private $year;

    function __construct(Database $db, array $values = [])
    {
        $this->db = $db;
        foreach ($values as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function create()
    {
        return $this->db->saveAlbum('albums', $this->title, $this->artist, $this->year);

    }

    public function read()
    {
        return $this->db->viewAlbum($this->id, 'albums');
    }

    public function update()
    {
        return $this->db->updateAlbum($this->id, 'albums', $this->title, $this->artist, $this->year);
    }

    public function delete()
    {
        return $this->db->deleteAlbumById($this->id, 'albums');
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

}