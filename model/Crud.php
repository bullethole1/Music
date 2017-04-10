<?php
require 'resourses/config.php';
require 'Albums.php';

/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-10
 * Time: 15:24
 */
class Crud
{
    public function createAlbum()
    {

    }

    public function getAlbums()
    {

    }

    public function deleteAlbum()
    {
        if (isset($_POST['delete_album'])) {
            $sql = "DELETE FROM `albums` WHERE `id` = :id";
            $stm_delete = $pdo->prepare($sql);
            $stm_delete->execute(array('id' => ($_POST['delete_album'])));
        }

    }

    public function updateAlbums()
    {
        if (isset($_POST['delete_album'])) {
            $rows = ['title', 'artist', 'year'];
            foreach ($rows as $row) {
                $updateStm = $pdo->prepare("UPDATE `albums` SET `{$row}` = :{$row} WHERE `id`= :id");
                $updateStm->execute(["{$row}" => $_POST[$row], 'id' => ($_POST['id'])]);
            }
        }

    }
}