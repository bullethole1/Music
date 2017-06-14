<?php
require('header.php');
?>
    <form action="/index.php?page=create" method="post">
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="altTitle">Artist: </label>
            <input type="text" name="artist" class="form-control" id="artist" placeholder="Artist">
        </div>
        <div class="form-group">
            <label for="year">Year: </label>
            <input type="text" name="year" class="form-control" id="year" placeholder="Year" required>
        </div>
        <div class="form-group">
            <label for="url">Url:</label>
            <input type="text" name="artwork_url" class="form-control" id="artwork_url" placeholder="Url">
        </div>
        <button type="submit" class="btn btn-default" name="insert" id="insert">Insert Album</button>
    </form>
<?php
require('footer.php');
?>