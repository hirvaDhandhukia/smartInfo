<?php

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	require_once 'config.php';
	require_once 'functions.inc.php';

	if(emptyInputLogin($email, $password) !== false) {
		header("location: ../login-admin.php?error=emptyinput");
		exit();
	}
	loginAdmin($conn, $email, $password);
} 

else {
	header("location: ../login-admin.php");
	exit();
}