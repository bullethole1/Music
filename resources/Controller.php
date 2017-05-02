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
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $this->model->deleteById($id);
            }
            require('view/viewAlbums.php');
        } elseif ($page === "create") {
            if (isset($_GET['insert'])) {
                $album = new Album();
                $album->setTitle($_GET['title']);
                $album->setArtist($_GET['artist']);
                $album->setYear($_GET['year']);
                $success = $this->createAlbum($album);
                header('Location:view/start.php?success=' . (int)$success . '&id=' . $album->getId());
                exit();
            }
            require('view/create.php');
        } elseif ($page === "update.php") {
            require('view/update.php');
        } else {
            require('view/start.php');
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