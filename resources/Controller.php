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

    function __construct()
    {
        $this->model = new Model();
    }

    public function index()
    {
        $model = new Model();

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($page))
            require_once('view/viewAlbums.php');
        elseif ($page === "animals") {
            $albums = $model->getAlbums();
            // kolla $albums är en array
            require_once('view/viewAlbums.php');
        } else
            require_once('templates/start.php');

    }


}