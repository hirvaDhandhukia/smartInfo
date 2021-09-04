<?php

if(isset($_POST["submit"])) {

	// grabbing the data from the url
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	// error handling
	require_once 'config.php';
	require_once 'functions.inc.php';

	if(emptyInputRegister($fname, $lname, $email, $message) !== false) {
		header("location: ../contactus.php?error=emptyinput");
		exit();
	}
	if(invalidEmail($email) !== false) {
		header("location: ../contactus.php?error=invalidemail");
		exit();
	}

	// if we are here now then, user made no mistakes
	// so we can signup the user into our website
	sendMsg($conn, $fname, $lname, $email, $message);

} else {
	header("location: ../contactus.php");
		exit();
}