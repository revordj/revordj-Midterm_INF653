<?php include('view/header.php') ?>
<?php 
$testing = 'This is the test value';
$actionlocal = $_GET['action'];
?>
</br>
<?php if(isset($_SESSION['userid'])) {?>
<section name='login_logout' id='login_logout'>
<p name='msg' id='msg'> Thank you for registering, <?php echo($_SESSION['userid']) ?>! </p>
<p> <a href='index.php'> Click Here </a> to view our vehicle list. </a>
</section>
<?php } else { ?>
Please enter your firstname:
</br>

<form action="." method="get" id="list__header_select" class="list__header_select">
	<input type="hidden" name="action" value="register"> 
	<label for='newclass'>Name: </label>
    <input type='text' name='firstname' class='firstname'></br>
    <button class="reg-button"> Register </button>
</form>

<?php } ?>
<?php include('view/footer.php') ?>