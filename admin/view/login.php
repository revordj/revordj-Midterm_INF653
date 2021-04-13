<?php
if(isset($login_message)){
	echo($login_message);
}
?>
<form action="." method="post" id="list__header_select" class="list__header_select">
	<input type="hidden" name="action" value="login"> 
	<label for='username'>Login Name: </label>
    <input type='text' name='username' class='username'></br>
	<label for='password'>Password: </label>
    <input type='text' name='password' class='password'></br>
	
    <button class="reg-button"> Log in </button>
</form>
