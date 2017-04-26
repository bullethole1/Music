<?php

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-19
 * Time: 10:27
 */
class Controller
{
    private $model;
    private $album;

    public function __construct(PDO $db, $album)
    {
        $this->model = new Model($db);
        $this->album = new Album($album);
    }

    public function index()
    {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($page))
            require('view/start_image.php');
        elseif ($page === "show") {
            require('view/viewAlbums.php');
        } elseif ($page === "create") {
            require('view/create.php');
        } elseif ($page === "update.php") {
            require('view/update.php');
        } else {
            require_once('view/start_image.php');
        }

    }

    public function getAllAlbums()
    {
        return $this->model->getAllAlbums();
    }

    public function editAlbum()
    {
        return $this->model->updateAlbum();
    }

    public function deleteAlbum()
    {
        if (isset($_POST['button_delete'])) {
            $id = $_POST['delete'];
        }

        return $this->model->deleteById($id);
    }

    public function createAlbum()
    {
        if (isset($_POST['insert'])) {
            $title = $_POST['title'];
            $this->album->setTitle($title);
            $artist = $_POST['artist'];
            $this->album->setArtist($artist);
            $year = $_POST['year'];
            $this->album->setYear($year);
        }
        return $this->model->saveAlbum($title, $artist, $year);
    }
}