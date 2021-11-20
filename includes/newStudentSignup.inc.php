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
	if (emptyStudentInfo($studentName, $studentId, $studentClassUid, $studentAge, $studentGender, $studentHappyFaces, $studentTokens) !== false) {
		header("location: ../teacher.php?error=emptyinput");
		exit();
	}

	if (invalidStudentId($studentId) !== false) {
		header("location: ../teacher.php?error=invalidstudentid");
		exit();
	}

	if (invalidClass($studentClassName) !== false) {
		header("location: ../teacher.php?error=invalidclass");
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






	// after the student information passes inspection
	// we need to update the classes table
	// by increasing the class size number
	// step 1: query the classes table searching and get the classTotalstudents column, add 1 to that value, that's all that's necessary.
	// I will write an update all classes script later.
	// that will get each class's total student count caught up
	// step 2: +1 to that number
	// step 3: update it into the classes table
	$class_count_query = "SELECT * FROM classes WHERE `classesUid` = '$studentClassUid'";
	// die($class_count_query);
	$class_count_query_result = mysqli_query($conn, $class_count_query);
	// print_r($class_count_query_result);
	while($row = mysqli_fetch_array($class_count_query_result)) {
		// print_r($row);
		$classCount = $row['classesTotalstudents'];
	}
	// die($classCount);
	// die($classCount . " " . $classCount+1);
	$increasedClassCount = $classCount+1;
	// die($increasedClassCount);
	// die($classCount . ' ' . $increasedClassCount);
	// now we have the value, let's update the class count
	$update_class_count_query = "UPDATE classes SET classesTotalstudents = '$increasedClassCount' WHERE classesUid = '$studentClassUid'";
	// die($update_class_count_query);
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
	header("location: ../teacher.php");
	exit();
}