<?php
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

if (isset($_POST["submit"])) {

	$studentName = $_POST["name"];
	$studentId = $_POST["id"];
	$studentClassUid = $_POST["class"];
	// $classuid = $_POST["classuid"];
	$studentAge = $_POST["age"];
	$studentGender = $_POST["gender"];
	$studentHappyFaces = $_POST["happyfaces"];
	$studentTokens = $_POST["tokens"];

	// $query = "SELECT `classesName` FROM classes WHERE `classesUid` = '{$studentClass}'";
	$query = "SELECT * FROM classes WHERE `classesUid` = '{$studentClassUid}'";
	$query_results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($query_results)){
		$studentClassName = $row['classesName'];
	}
	
	//check for errors
	// 
	// 
	// 
	// THERE IS A PROBLEM WITH THE emptyStudentInfo CHECK
	// 
	// 
	// 
	// if (emptyStudentInfo($studentName, $studentId, $studentClassuid, $studentAge, $studentGender, $studentHappyFaces, $studentTokens) !== false) {
	// 	header("location: ../teacher.php?error=emptyinput");
	// 	exit();
	// }

	if (invalidStudentId($studentId) !== false) {
		header("location: ../teacher.php?error=invalidstudentid");
		exit();
	}

	if (invalidClass($studentClassName) !== false) {
		header("location: ../teacher.php?error=invalidclass");
		exit();
	}

	/*if (invalidGender($gender) !== false) {
		header("location: ../teacher.php?error=invalidgender");
		exit();
	}*/

	if (ageNotNumber($studentAge) !== false) {
		header("location: ../teacher.php?error=agenotnumber");
		exit();
	}

	if (facesNotNumber($studentHappyFaces) !== false) {
		header("location: ../teacher.php?error=facesnotnumber");
		exit();
	}

	if (tokensNotNumber($studentTokens) !== false) {
		header("location: ../teacher.php?error=tokensnotnumber");
		exit();
	}


	if (studentIdExists($conn, $studentId) !== false) {
		header("location: ../teacher.php?error=studentidtaken");
		exit();
	}
//create user needs to be last here
	//when all the checks are passed
	//we can take the results of the functions.inc.php 
	//and pass them back into the create user function
	newStudentAccount($conn, $studentName, $studentId, $studentClassName, $studentClassUid, $studentAge, $studentGender, $studentHappyFaces, $studentTokens);
} else {
	header("location: ../teacher.php");
	exit();
}