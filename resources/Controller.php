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

    public function __construct(PDO $db)
    {
        $this->model = new Model($db);
    }

    public function index()
    {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($page))
            require('view/start.php');
        elseif ($page === "show") {
            if (isset($_POST['delete'])){
                $id = $_POST['delete'];
                $this->model->deleteById($id);
            }
            require('view/viewAlbums.php');
        } elseif ($page === "create") {
            if (isset($_POST['insert'])) {
                $album = new Album();
                $album->setTitle($_POST['title']);
                $album->setArtist($_POST['artist']);
                $album->setYear($_POST['year']);
                $success = $this->createAlbum($album);
                header('Location: view/start.php?success=' . (int)$success . '&id=' . $album->getId());
            }
            require('view/create.php');
        } elseif ($page === "update.php") {
            require('view/update.php');
        } else {
            require_once('view/start.php');
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

    public function deleteAlbum(Album $id)
    {

        return $this->model->deleteById($id);
    }

    public function createAlbum(Album $album)
    {
        return $this->model->saveAlbum($album);
    }
}