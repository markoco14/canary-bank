<?php

if (isset($_POST["submit"])) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	//$classname = $_POST["classname"];
	//$classuid = $_POST["classuid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	//program will connect to the database
	require_once "dbh.inc.php";
	//program will fire off the functions now
	//and return the results
	require_once "functions.inc.php";

	//the results of the require_once
	//are passed into the checks


	if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if (invalidUid($username) !== false) {
		header("location: ../signup.php?error=invaliduid");
		exit();
	}

	/*if (invalidClassUid($classuid) !== false) {
		header("location: ../signup.php?error=invalidclassuid");
		exit();
	}*/

	if (invalidEmail($email) !== false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}

	if (pwdMatch($pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}

	if (uidExists($conn, $username, $email) !== false) {
		header("location: ../signup.php?error=usernametaken");
		exit();
	}

	/*if (classUidExists($conn, $classuid) !== false) {
		header("location: ../signup.php?error=classuidtaken");
		exit();
	}*/

	//create user needs to be last here
	//when all the checks are passed
	//we can take the results of the functions.inc.php 
	//and pass them back into the create user function
	createUser($conn, $name, $email, $username, $pwd);
} else {
	header("location: ../signup.php");
	exit();
}