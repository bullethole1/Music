<?php
/* @var Controller $this */
require('view/header.php');
?>
    <h2>Johans Albums</h2>
    <table class="table-striped">
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Year</th>
        </tr>
        <?php
        foreach ($this->getAllAlbums() as $row) {
            /* @var Album $row */
            ?>
            <tr>
                <td><?= $row->getTitle(); ?></td>
                <td><?= $row->getArtist(); ?></td>
                <td><?= $row->getYear(); ?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update&id=<?php echo $row->getId(); ?>">Edit</a>
                </td>
                <td>
                    <form action="../index.php?page=show" method="post">
                        <input type="hidden" name="delete" value="<?php echo $row->getId(); ?>"/>
                        <button type="submit" class="btn btn-default" id="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>

<?php
require('view/footer.php');
?>