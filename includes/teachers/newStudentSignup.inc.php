<?php

require_once "../dbh.inc.php";

require_once "../functions.inc.php";

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
	if (emptyStudentInfo($studentName, $studentId, $studentClassUid, $studentAge, $studentGender, $studentHappyFaces, $studentTokens) !== false) {
		header("location: ../../teacher.php?error=emptyinput");
		exit();
	}

	if (invalidStudentId($studentId) !== false) {
		header("location: ../../teacher.php?error=invalidstudentid");
		exit();
	}

	if (invalidClass($studentClassName) !== false) {
		header("location: ../../teacher.php?error=invalidclass");
		exit();
	}

	// gender check no longer necessary because the empty input sign up does it.
	// but it would be nice to improve the UX by separating the gender check out of the empty input sign up
	// because then we could give more specific guidance to the user about which input is empty
	// if (invalidGender($gender) !== false) {
	// 	header("location: ../teacher.php?error=invalidgender");
	// 	exit();
	// }

	if (ageNotNumber($studentAge) !== false) {
		header("location: ../../teacher.php?error=agenotnumber");
		exit();
	}

	if (facesNotNumber($studentHappyFaces) !== false) {
		header("location: ../../teacher.php?error=facesnotnumber");
		exit();
	}

	if (tokensNotNumber($studentTokens) !== false) {
		header("location: ../../teacher.php?error=tokensnotnumber");
		exit();
	}


	if (studentIdExists($conn, $studentId) !== false) {
		header("location: ../../teacher.php?error=studentidtaken");
		exit();
	}


	// update the classesTotalstudents column in the `classes` table
	// because the number of the students in the class just increased
	$class_count_query = "SELECT * FROM classes WHERE `classesUid` = '$studentClassUid'";
	$class_count_query_result = mysqli_query($conn, $class_count_query);
	while($row = mysqli_fetch_array($class_count_query_result)) {
		$classCount = $row['classesTotalstudents'];
	}
	$increasedClassCount = $classCount+1;
	$update_class_count_query = "UPDATE classes SET classesTotalstudents = '$increasedClassCount' WHERE classesUid = '$studentClassUid'";
	$update_class_count_results = mysqli_query($conn, $update_class_count_query);
	
	if (!$update_class_count_results) {
            die("query failed" . mysqli_error($conn));
        }
  
	// create user needs to be last here
	//when all the checks are passed
	//we can take the results of the functions.inc.php 
	//and pass them back into the create user function
	newStudentAccount($conn, $studentName, $studentId, $studentClassName, $studentClassUid, $studentAge, $studentGender, $studentHappyFaces, $studentTokens);
} else {
	header("location: ../../teacher.php");
	exit();
}