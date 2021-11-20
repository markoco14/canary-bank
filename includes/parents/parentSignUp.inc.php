<?php

if (isset($_POST["submit"])) {
	$sid = $_POST["studentid"];
	$email = $_POST["email"];
	$pwd = $_POST["password"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once "../dbh.inc.php";
	require_once "parentFunctions.inc.php";

	//or you can have a parents table? 
	//they can input a studentID, email, and password and that can make requests of the students table using that students ID? they can make multiple student IDs in their table?
	
	/*$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../studentSignUp.php?error=stmtfailed");
		exit();
	} else {
		header("location: ../studentSignUp.php?error=itworked")
	}*/

	if (emptyInputSignup($sid, $email, $pwd, $pwdRepeat) !== false) {
		header("location: ../../studentSignUp.php?error=emptyinput");
		exit();

	}

	if (invalidEmail($email) !== false) {
		header("location: ../../studentSignUp.php?error=invalidemail");
		exit();

	}

	//hash the password for added security
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	$result = mysqli_query($conn, "UPDATE students SET studentsEmail='$email', studentsPassword='$hashedPwd' WHERE studentsId='$sid'");
	if ($result) {
		header("location: ../../studentSignUp.php?error=none");
	}

	//check for errors
	//empty inputs
	//check for invalid e
	//student id doesn't exist
	//invalid password

	//parentSignUp($conn, $sid, $email, $pwd, $pwdrepeat)
}