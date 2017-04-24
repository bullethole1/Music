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

    function __construct($data = [])
    {
        /*
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }*/

        if (isset($data['id'])) {
            $this->id = $data['id'];
            $this->title = @$data['Title'];
            $this->artist = @$data['Artist'];
            $this->year = @$data['Year'];
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

}