<?php
/* @var Controller $this */
?>
<?php
require ('header.php');
?>
    <form action="update.php" method="post">
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $editAlbum->getId(); ?>"
                   readonly>
        </div>
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title"
                   value="<?php echo $editAlbum->getTitle(); ?>" required>
        </div>
        <div class="form-group">
            <label for="altTitle">Alternative title: </label>
            <input type="text" name="altTitle" class="form-control" id="altTitle"
                   value="<?php echo $editAlbum->getArtist(); ?>">
        </div>
        <div class="form-group">
            <label for="year">Year: </label>
            <input type="text" name="year" class="form-control" id="year" value="<?php echo $editAlbum->getYear(); ?>"
                   required>
        </div>
        <button type="submit" class="btn btn-default" name="btn-update">Update</button>
    </form>

<?php
require('view/footer.php');
?>