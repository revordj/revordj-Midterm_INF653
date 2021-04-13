<?php include('view/header.php') ?>
<?php 
if(!empty($errors)){
	foreach($errors as $err){
		echo($err . "<br>");
	}
}

?>
<form action="." method="post" id="list__header_select" class="list__header_select">
	<input type="hidden" name="action" value="register"> 
	<label for='username'>Login Name: </label>
    <input type='text' name='username' class='username'></br>
	<label for='password'>Password: </label>
    <input type='text' name='password' class='password'></br>
	<label for='confirm_password'>Confirm Password: </label>
    <input type='text' name='confirm_password' class='confirm_password'></br>
    <button class="reg-button"> Register </button>
</form>
<?php include('view/footer.php') ?>