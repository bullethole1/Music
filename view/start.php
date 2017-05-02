<?php
require "header.php";
?>
    <?php if (isset($_GET['success']) && $_GET['success']): ?>
        <p>Your album was successfully created! Om du vill se ditt album klicka <a href="update.php?id=<?= $_GET['id'] ?>">här</a></p>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && !$_GET['success']): ?>
        <p>Något gick fel :(</p>
    <?php endif; ?>

    <h1>Welcome</h1>
    <p>Welcome to my album database.</p>
    <img class="img-responsive" src="https://www.wired.com/images_blogs/business/2009/08/tomcoatesquilt.jpg">

<?php
require('footer.php');
?>