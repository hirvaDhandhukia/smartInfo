<?php

function emptyInputRegister($fname, $lname, $email, $aadharno, $dob, $password, $cpassword) {
	$result;
	if(empty($fname) || empty($lname) || empty($email) || empty($aadharno) || empty($dob) || empty($password) || empty($cpassword)) {
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

function emailExists($conn, $email, $aadharno) {
	$sql = "SELECT * FROM users WHERE email = ? OR aadharno = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $email, $aadharno);
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

function aadhDNE($conn, $aadharno) {
	$sql = "SELECT * FROM users WHERE aadharno = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../../admin/index-admin.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $aadharno);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($resultData)) {
		return $row;
		$result = false;
		echo 'yes aadh exist';
	} else {
		return $result;
		echo 'NO aadh dne';
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $aadharno, $dob, $password) {
	$sql = "INSERT INTO users (fname, lname, email, aadharno, dob, password) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailedcreateuser");
		exit();
	}

	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $aadharno, $dob, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../register.php?error=none");
	exit();
}

function emptyInputLogin($email, $password) {
	$result;
	if(empty($email) || empty($password)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $email, $password) {
	$emailExists = emailExists($conn, $email, $email);

	if ($emailExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $emailExists['password'];
	$checkPwd = password_verify($password, $pwdHashed);
	if($checkPwd === false) {
		// incorrect password
		header("location: ../login.php?error=wronglogin");
		exit();
	} else if ($checkPwd === true) {
		// start session and login the user
		session_start();
		// creating superglobal session variables
		$_SESSION["userid"] = $emailExists["id"];
		$_SESSION["useraadh"] = $emailExists["aadharno"];
		header("location: ../index.php");
		exit();
	}
}

function emptyInputContactus($fname, $lname, $email, $message) {
	$result;
	if(empty($fname) || empty($lname) || empty($email) || empty($message)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function sendMsg($conn, $fname, $lname, $email, $message) {
	$sql = "INSERT INTO contactus (fname, lname, email, message) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../contactus.php?error=stmtfailedsendmsg");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $message);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../contactus.php?error=none");
	exit();
}

function printUserName($conn, $useraadh) {
	$sql = "SELECT * FROM users WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index-admin.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		// return $row;
		echo $row['fname'] . ' ' . $row['lname'];
	} else {
		// $result = false;
		// return $result;
		echo "error!";
	}

	mysqli_stmt_close($stmt);

	// $sql = "SELECT * FROM users WHERE aadharno='$useraadh';";
 //      $result = mysqli_query($conn, $sql);
 //      if(mysqli_num_rows($result)>0) {
 //          $row = mysqli_fetch_assoc($result);
 //          echo $row['fname'] . ' ' . $row['lname'];
 //      } else {
 //          echo "Row not found";
 //      }
}

function printUserDOB($conn, $useraadh) {
	$sql = "SELECT * FROM users WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index-admin.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		// return $row;
		echo $row['dob'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserEmail($conn, $useraadh) {
	$sql = "SELECT * FROM users WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index-admin.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		// return $row;
		echo $row['email'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserAadh($conn, $useraadh) {
	$sql = "SELECT * FROM users WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index-admin.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		// return $row['aadharno'];
		echo $row['aadharno'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserBloodGroup($conn, $useraadh) {
	$sql = "SELECT * FROM med_history WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: alluserinfo.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		return $row['bloodgroup'];
		// echo $row['bloodgroup'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserAllergies($conn, $useraadh) {
	$sql = "SELECT * FROM med_history WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: alluserinfo.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		return $row['allergies'];
		// echo $row['bloodgroup'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserMedHistory($conn, $useraadh) {
	$sql = "SELECT * FROM med_history WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: alluserinfo.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		return $row['med_hist'];
		// echo $row['bloodgroup'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

function printUserAge($conn, $useraadh) {
	$sql = "SELECT * FROM med_history WHERE aadharno = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: alluserinfo.php?error=stmtfailedsearch");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useraadh);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)) {
		return $row['age'];
		// echo $row['bloodgroup'];
	} else {
		echo "error try again!";
	}

	mysqli_stmt_close($stmt);
}

// function addUserMedHist($conn, $aadharno) {
// 	$sql = "INSERT INTO med_history (aadharno) VALUES (?);";
// 	$stmt = mysqli_stmt_init($conn);
// 	if(!mysqli_stmt_prepare($stmt, $sql)) {
// 		header("location: ../register.php?error=stmtfailedsendmsg");
// 		exit();
// 	}

// 	mysqli_stmt_bind_param($stmt, "s", $aadharno);
// 	mysqli_stmt_execute($stmt);
// 	mysqli_stmt_close($stmt);

// 	header("location: ../register.php?error=none");
// 	exit();
// }


// function addUserMedHist($conn, $aadharno) {
// 	$sql = "INSERT INTO med_history (aadharno, age, bloodgroup, allergies, med_history) VALUES (?, ?, ?, ?, ?);";
// 	$stmt = mysqli_stmt_init($conn);
// 	if(!mysqli_stmt_prepare($stmt, $sql)) {
// 		header("location: ../register.php?error=stmtfailedcreateuser");
// 		exit();
// 	}

// 	mysqli_stmt_bind_param($stmt, "sssss", $aadharno, $age, $bloodgroup, $allergies, $med_history);
// 	mysqli_stmt_execute($stmt);
// 	mysqli_stmt_close($stmt);

// 	header("location: ../register.php?error=none");
// 	exit();
// }