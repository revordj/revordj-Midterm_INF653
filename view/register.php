<?php include('view/header.php') ?>
<?php 
$testing = 'This is the test value';
$actionlocal = $_GET['action'];
?>
</br>
Please enter your firstname:
<form action="." method="get" id="list__header_select" class="list__header_select">
	<input type="hidden" name="action" value="register"> 
	<label for='newclass'>Name: </label>
    <input type='text' name='firstname' class='firstname'></br>
    <button class="reg-button"> Register </button>
</form>
<?php include('view/footer.php') ?>