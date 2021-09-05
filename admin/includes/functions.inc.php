<?php 

function emptyInputRegister($fname, $lname, $email, $aadharno, $dob, $regno, $speciality, $password, $cpassword) {
	$result;
	if(empty($fname) || empty($lname) || empty($email) || empty($aadharno) || empty($dob) || empty($regno) || empty($speciality) || empty($password) || empty($cpassword)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidAadhar($aadharno) {
	// it should be 12 digit long number
	// "/^[1-9][0-9]{12}$/"
	// "^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$"
	// "/^[0-9]{12}*$/" it is
	$result;
	if(preg_match('/^[1-9][0-9]{12}$/', $aadharno)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($password, $cpassword) {
	$result;
	if($password !== $cpassword) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function emailExists($conn, $email, $aadharno, $regno) {
	$sql = "SELECT * FROM users WHERE email = ? OR aadharno = ? OR regno = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register-admin.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sss", $email, $aadharno, $regno);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createAdmin($conn, $fname, $lname, $email, $aadharno, $dob, $regno, $speciality, $password) {
	$sql = "INSERT INTO admin (fname, lname, email, aadharno, dob, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register-admin.php?error=stmtfailedcreateadmin");
		exit();
	}

	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $email, $aadharno, $dob, $regno, $speciality, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../register-admin.php?error=none");
	exit();
}

