<?php
/* @var Controller $this */
/* @var Album $album */
require "header.php";
?>

<form action="/index.php?page=update" method="post">
    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $album->getId(); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" value="<?php echo $album->getTitle(); ?>"
               required>
    </div>
    <div class="form-group">
        <label for="artist">Artist: </label>
        <input type="text" name="artist" class="form-control" id="artist" value="<?php echo $album->getArtist(); ?>"
               required>
    </div>
    <div class="form-group">
        <label for="year">Year: </label>
        <input type="text" name="year" class="form-control" id="year" value="<?php echo $album->getYear(); ?>" required>
    </div>
    <div class="form-group">
        <label for="artwork_url">Artwork: </label>
        <input type="text" name="artwork_url" class="form-control" id="artwork_url" value="<?php echo $album->getUrl(); ?>" >
    </div>
    <button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php
require "footer.php";
?>
