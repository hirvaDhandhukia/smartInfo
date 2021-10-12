<?php

if(isset($_POST["submit"])) {

	// grabbing the data from the url
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$aadharno = $_POST["aadharno"];
	$dob = $_POST["dob"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];

	// error handling
	require_once 'config.php';
	require_once 'functions.inc.php';

	if(emptyInputRegister($fname, $lname, $email, $aadharno, $dob, $password, $cpassword) !== false) {
		header("location: ../register.php?error=emptyinput");
		exit();
	}
	if(invalidAadhar($aadharno) !== false) {
		header("location: ../register.php?error=invalidaadhar");
		exit();
	}
	if(invalidEmail($email) !== false) {
		header("location: ../register.php?error=invalidemail");
		exit();
	}
	if(pwdMatch($password, $cpassword) !== false) {
		header("location: ../register.php?error=passwordsdontmatch");
		exit();
	}
	if(emailExists($conn, $email, $aadharno) !== false) {
		header("location: ../register.php?error=emailtaken");
		exit();
	}

	// if we are here now then, user made no mistakes
	// so we can signup the user into our website
	createUser($conn, $fname, $lname, $email, $aadharno, $dob, $password);
	addUserMedHist($conn, $aadharno);

} else {
	header("location: ../register.php");
		exit();
}