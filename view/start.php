<?php
require "header.php";
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

    <h1>Welcome</h1>
    <p>Welcome to my album database.</p>
    <img class="img-responsive" src="https://www.wired.com/images_blogs/business/2009/08/tomcoatesquilt.jpg">

<?php
require('footer.php');
?>