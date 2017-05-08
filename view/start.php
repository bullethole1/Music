<?php
require "header.php";
?>
<?php if (isset($_GET['success']) && $_GET['success']): ?>
    <p>Your album was successfully created! if you want to see your album <a
                href="update.php?id=<?= $_GET['id'] ?>">här</a></p>
<?php endif; ?>

<?php if (isset($_GET['success']) && !$_GET['success']): ?>
    <p>Något gick fel :(</p>
<?php endif; ?>

<?php if (isset($_GET['update_success']) && $_GET['update_success']): ?>
    <p>Your album was successfully updated! If you want to see your album click <a
                href="/index.php?page=update&id=<?php echo $_GET['id'] ?>">here</a></p>
<?php endif; ?>

    <h1>Welcome</h1>
    <p>Welcome to my album database.</p>
    <img class="img-responsive" src="https://www.wired.com/images_blogs/business/2009/08/tomcoatesquilt.jpg">

<?php
require('footer.php');
?>