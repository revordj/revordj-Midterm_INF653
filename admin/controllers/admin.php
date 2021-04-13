<?php
	session_start();
	require_once('model/database.php');
	require_once('model/admin_db.php');

	$action = filter_input(INPUT_POST, 'action');
	if($action == NULL) {
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			$action = 'show_admin_menu';
		}
	}

	if(!isset($_SESSION['is_valid_admin'])){
		$action = 'login';
	}

	switch($action){
		case 'login':
			$username = filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			if(is_valid_admin_login($email, $password)) {
				$_SESSION['is_valid_admin'] = true;
				include('view/inventory.php');
			}
			else{
				$login_message = 'You must login to view this page';
				include('view/login.php');
			}
			break;
		case 'show_login':
			include('view/login');
			break;
		case 'register':
			include('util/valid_register.php');
			$username = filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			$confirm_password = filter_input(INPUT_POST, 'confirm_password');
			valid_registration($username, $password, $confirm_password);
			if(!empty($errors)){
				include('view/register.php');
			}
			else{
				$username = filter_input(INPUT_POST, 'username');
				$password = filter_input(INPUT_POST, 'password');
				add_admin($username, $password);
				$_SESSION['is_valid_admin'] = true;
				header(index.php/?action=display_Inventory);
			}
			break;
		case 'show_register':
			include('view/register');
			break;
		case 'logout':
			$_SESSION = array();
			session_destroy();
			$login_message = 'You have been logged out';
			include('view/login.php');
			break;

	}
	?>