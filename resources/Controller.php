<?php

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
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
                $delete_success = $this->deleteAlbum($id);
            }
            require('view/viewAlbums.php');
        } elseif ($page === "create") {
            if (isset($_POST['insert'])) {
                $album = new Album();
                $album->setTitle($_POST['title']);
                $album->setArtist($_POST['artist']);
                $album->setYear($_POST['year']);
                $success = $this->createAlbum($album);
                header('Location:view/start.php?success=' . (int)$success . '&id=' . $album->getId());
                exit();
            }
            require('view/create.php');

        } elseif ($page === 'update') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $album = $this->getById($id);
                require('view/update.php');
            }
            if (isset($_POST['btn-update'])) {
                $album = new Album();
                $album->setId($_POST['id']);
                $album->setTitle($_POST['title']);
                $album->setArtist($_POST['artist']);
                $album->setYear($_POST['year']);
                $update_success = $this->editAlbum($album);
                header('Location:view/start.php?update_success=' . (int)$update_success . '&id=' . $album->getId());
                exit();
            }
        } else {
            require('view/start.php');
        }
    }

    public
    function getAllAlbums()
    {
        return $this->model->getAllAlbums();
    }

    public
    function editAlbum(Album $album)
    {
        return $this->model->updateAlbum($album);
    }

    public
    function deleteAlbum($id)
    {

        return $this->model->deleteById($id);
    }

    public
    function createAlbum(Album $album)
    {
        return $this->model->saveAlbum($album);
    }

    public
    function getById($id)
    {
        return $this->model->getAlbumById($id);
    }
}