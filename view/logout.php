<?php include('view/header.php') ?>
	<section name='login_logout' id='login_logout'>
		<p name='msg' id='msg'> Thank you for logging out, <?php echo($_SESSION['userid']) ?>! </p>
		<p> <a href='index.php'> Click Here </a> to view our vehicle list. </a>
</section>
<?php 
	$_SESSION = array(); //clear session data
	session_destroy(); // clean session id

	//delete the session cookie
	$name = session_name();
	$expire = strtotime('-1 year');
	$params = session_get_cookie_params();
	$path = $params['path'];
	$domain = $params['domain'];
	$secure = $params['secure'];
	$httponly = $params['httponly'];
	setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
?>
<?php include('view/footer.php') ?>