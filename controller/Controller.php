<?php

class Controller
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index()
    {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($page)) {
            require('view/start.php');
        } elseif ($page === "show") {
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
                $album->setUrl($_POST['artwork_url']);
                $success = $this->createAlbum($album);
                header('Location:/?page=show&success=' . (int)$success . '&id=' . $album->getId());
                exit();
            }
            require('view/create.php');

        } elseif ($page === 'update') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $album = $this->getById('albums', $id);
                require('view/update.php');
            }
            if (isset($_POST['btn-update'])) {
                $album = new Album();
                $album->setId($_POST['id']);
                $album->setTitle($_POST['title']);
                $album->setArtist($_POST['artist']);
                $album->setYear($_POST['year']);
                $album->setUrl($_POST['artwork_url']);
                $update_success = $this->editAlbum($album);
                header('Location:/?page=show&update_success=' . (int)$update_success . '&id=' . $album->getId());
                exit();
            }
        } else {
            require('view/start.php');
        }
    }

    public
    function getAllAlbums($table)
    {
        return $this->db->getAll($table);
    }

    public
    function editAlbum(Album $album)
    {
        return $this->db->update('albums', $album->getId(), $album->toArray());
    }

    public
    function deleteAlbum($id)
    {

        return $this->db->delete('albums', $id);
    }

    public
    function createAlbum(Album $album)
    {
        return $this->db->create('albums', $album->toArray());
    }

    public
    function getById($table, $id)
    {
        return $this->db->getById($table, $id);
    }

    public function getByAlbumId($id)
    {
        return $this->db->getByAlbumId($id);
    }
}