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
            require_once('view/viewAlbums.php');
        elseif ($page === "albums") {
            require_once('view/viewAlbums.php');
        } else {
            //require_once('templates/start.php');
        }

    }

    public function getAllAlbums()
    {
        return $this->model->getAllAlbums();
    }

    public function editAlbum(){
        return $this->model->updateAlbum();
    }

    public function deleteAlbum(){
        return $this->model->deleteById();
    }

    public function createAlbum(){
        return $this->model->saveAlbum();
    }
}