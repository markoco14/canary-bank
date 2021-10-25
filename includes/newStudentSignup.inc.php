<?php

if (isset($_POST["submit"])) {

	$name = $_POST["name"];
	$id = $_POST["id"];
	$class = $_POST["class"];
	$classuid = $_POST["classuid"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$happyFaces = $_POST["happyfaces"];
	$tokens = $_POST["tokens"];

	//connect to the necessary php scripts
	//dbh.inc.php gets us to the database
	//we choose where later
	require_once "dbh.inc.php";
	//functions.inc.php gives us access to the functions
	//we will define a new student account function
	//in the functions php script
	require_once "functions.inc.php";
	//maybe I will make this a new functions script??
	//or make a very clear new section in the functions 
	//document

	//check for errors
	if (emptyStudentInfo($name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens) !== false) {
		header("location: ../teacher.php?error=emptyinput");
		exit();
	}

	if (invalidStudentId($id) !== false) {
		header("location: ../teacher.php?error=invalidstudentid");
		exit();
	}

	if (invalidClass($class) !== false) {
		header("location: ../teacher.php?error=invalidclass");
		exit();
	}

	/*if (invalidGender($gender) !== false) {
		header("location: ../teacher.php?error=invalidgender");
		exit();
	}*/

	if (ageNotNumber($age) !== false) {
		header("location: ../teacher.php?error=agenotnumber");
		exit();
	}

	if (facesNotNumber($happyFaces) !== false) {
		header("location: ../teacher.php?error=facesnotnumber");
		exit();
	}

	if (tokensNotNumber($tokens) !== false) {
		header("location: ../teacher.php?error=tokensnotnumber");
		exit();
	}


	if (studentIdExists($conn, $id) !== false) {
		header("location: ../teacher.php?error=studentidtaken");
		exit();
	}
//create user needs to be last here
	//when all the checks are passed
	//we can take the results of the functions.inc.php 
	//and pass them back into the create user function
	newStudentAccount($conn, $name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens);
} else {
	header("location: ../teacher.php");
	exit();
}