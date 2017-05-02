<?php
require('header.php');
?>
<form action="/resources/Controller.php?page=create" method="GET">
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
    <button type="submit" class="btn btn-default" name="insert" id="insert">Insert Album</button>
</form>
<?php
require('footer.php');
?>