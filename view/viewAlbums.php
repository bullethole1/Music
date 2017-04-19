<?php
require('model/Album.php');

foreach ($album as $albums) {
    echo 'album' . $albums->getTitle();
}