<?php include('view/header.php') ?>
<?php 
$testing = 'This is the test value';
$actionlocal = $_GET['action'];
?>
This is the register page

The action variable is set to <?= $actionlocal ?>. The testing variable is set to: <?= $testing ?>
<?php include('view/footer.php') ?>