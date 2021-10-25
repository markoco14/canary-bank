<?php
session_start();

///////////////////////////////////////////////////////////////
/////CREATE NEW TEACHER USER/////////////
///////////////////////////////////////////////////////////////

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the user name contains the proper characters
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the email is valid
//php has built in functions for us
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the passwords match
function pwdMatch($pwd, $pwdRepeat) {
	$result;
	if ($pwd !== $pwdRepeat) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the username already exists
function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}


//we've finished all our error checking
//now we create the function that actually lets us
//make the new user
//this createUser is where I specify which table
//I want to send the data to...
function createUser($conn, $name, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//hash the password for added security
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	// "ssss" because 4 parameters
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
}

//we are creating log in functions
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd) {
	//we are using $username twice because the second one 
	//is replacing $email
	//then the program will automatically fit the log in username
	//into the database existing username or email
	$uidExists = uidExists($conn, $username, $username);

	//check if this function returns as false
	if ($uidExists === False) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	//now we need to check the password with the hashed password
	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["username"] = $uidExists["usersName"];
		header("location: ../teacher.php");
		exit();
	}
}

///////////////////////////////////////////////////////////////
//UPDATE TEACHER CLASS LIST SECTION 
///////////////////////////////////////////////////////////////

function emptyClassInput($classname, $classuid) {
	$result;
	if (empty($classname) || empty($classuid)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the class uid contains the proper characters
function invalidClassUid($classuid) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $classuid)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the classuid exists
function classUidExists($conn, $classuid) {
	$sql = "SELECT * FROM classes WHERE classesUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//only 1 "s" because only 1 paramenter
	mysqli_stmt_bind_param($stmt, "s", $classuid);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

//change this into addNewClass function
function addNewClass($conn, $classname, $classuid) {
	$teachername = ($_SESSION["username"]);
	$teacheruid = ($_SESSION["useruid"]);

	$sql = "INSERT INTO classes (classesName, classesUid, classesTeachername, classesTeacheruid) VALUES (?, ?, '".$teachername."', '".$teacheruid."');";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../teacher.php?error=stmtfailed");
		exit();
	}
	// "ss" because 2 parameters
	mysqli_stmt_bind_param($stmt, "ss", $classname, $classuid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../teacher.php?error=success");
	exit();
}


///////////////////////////////////////////////////////////////
//MAKE NEW STUDENT ACCOUNTS SECTION
///////////////////////////////////////////////////////////////

function emptyStudentInfo($name, $id, $class, $age, $gender, $happyFaces, $tokens) {
	$result;
	if (empty($name) || empty($id) || empty($class) || empty($age) || empty($gender) || empty($happyFaces) || empty($tokens)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidStudentId($id) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidClass($class) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $class)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

/*function invalidGender($gender) {
	$result;
	if ($gender !== "boy" || $gender !== "Boy" || $gender !== "girl" || $gender !== "Girl") {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}*/

function ageNotNumber($age) {
	$result;
	if (!preg_match("/^[0-9]*$/", $age)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function facesNotNumber($happyFaces) {
	$result;
	if (!preg_match("/^[0-9]*$/", $happyFaces)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function tokensNotNumber($tokens) {
	$result;
	if (!preg_match("/^[0-9]*$/", $tokens)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function studentIdExists($conn, $id) {
	$sql = "SELECT * FROM students WHERE studentsId = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../teacher.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

//this is where I need to insert my teacher name/uid
//and class name/uid
//teacher should be easy
//just repeat from the class section.
function newStudentAccount($conn, $name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens) {
	$teachername = ($_SESSION["username"]);
	$teacheruid = ($_SESSION["useruid"]);
	$sql = "INSERT INTO students (studentsName, studentsId, studentsClass, studentsClassuid, studentsAge, studentsGender, studentsFaces, studentsTokens, studentsTeachername, studentsTeacheruid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '".$teachername."', '".$teacheruid."');";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../teacher.php?error=stmtfailed");
		exit();
	}

	// "ssssssss" because 8 parameters
	mysqli_stmt_bind_param($stmt, "ssssssss", $name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../teacher.php?error=none");
	exit();
}

//////
//UPDATE TOKENS SECTION
//////

/*function addNewTokens($conn, $tokens, $sid) {
	$sql = "UPDATE `students` SET `studentsTokens`='[$tokens]' WHERE `studentsId`='[$sid]';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../teacher.php?error=stmtfailed");
		exit();
	}

	// "ss" because 2 parameters
	mysqli_stmt_bind_param($stmt, 'ss', $tokens, $sid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../teacher.php?error=none");
	exit();
}*/