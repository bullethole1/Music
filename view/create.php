<?php
/**
 * Created by PhpStorm.
 * User: johanlund
 * Date: 2017-04-24
 * Time: 13:32
 */
?>
<form action="../index.php" method="post">
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
