<?php
/* @var Controller $this */
require('view/header.php');
?>
<?php if (isset($_GET['success']) && $_GET['success']): ?>
    <p>Your album was successfully created!</p>
<?php endif; ?>

<?php if (isset($_GET['success']) && !$_GET['success']): ?>
    <p>Something went wrong :(</p>
<?php endif; ?>

<?php if (isset($_GET['update_success']) && $_GET['update_success']): ?>
    <p>Your album was successfully updated!</p>
<?php endif; ?>

<?php if (isset($_GET['update_success']) && !$_GET['update_success']): ?>
    <p>Something went wrong :(</p>
<?php endif; ?>
    <h2>Johans Albums</h2>
    <table class="table-striped">
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Year</th>
            <th>Artwork</th>
            <th></th>
        </tr>
        <?php
        foreach ($this->getAllAlbums('albums') as $value) {
            /* @var Album $row */
            ?>
            <tr>
                <td><?= $value['title']; ?></td>
                <td><?= $value['artist']; ?></td>
                <td><?= $value['year']; ?></td>
                <td><?= $value['artwork_url']; ?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update&id=<?php echo $value['id']; ?>">Edit</a>
                </td>
                <td>
                    <form action="../index.php?page=show" method="post">
                        <input type="hidden" name="delete" value="<?php echo $value['id']; ?>"/>
                        <button type="submit" class="btn btn-default" id="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>

<?php
require('view/footer.php');
?>