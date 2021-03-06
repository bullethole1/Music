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
    private $url;

    function __construct($album_data = [])
    {

        if (isset($album_data['id'])) {
            $this->id = $album_data['id'];
            $this->title = @$album_data['title'];
            $this->artist = @$album_data['artist'];
            $this->year = @$album_data['year'];
            $this->url = @$album_data['artwork_url'];
        }
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

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function toArray()
    {
        return [
            "artwork_url" => $this->getUrl()
        ];
    }
}