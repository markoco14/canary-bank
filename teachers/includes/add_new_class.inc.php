<?php
//I am just going to try and use the update method.. 
//I want to add a class to the class column.
//does the column data get replaced
//or is the data added to it?

/*
$sql = "UPDATE `users` SET `usersClassname`='".$classname."',`usersClassuid`='".$classuid."' WHERE `usersUid` = '".$_SESSION["useruid"]."';";
*/

//uses post not get
if (isset($_POST["submit"])) {
	$classname = $_POST["classname"];
	$classuid = $_POST["classuid"];
	//in the end I needed both dbh and functions files
	require_once '../../includes/dbh.inc.php';
	// require_once '../../includes/functions.inc.php';
	require_once 'teacher_functions.inc.php';

	//now we need to check for errors
	//just like the sign up page
	if (emptyClassInput($classname, $classuid) !== false) {
		header("location: ../../teacher.php?error=emptyclassinput");
		exit();
	}

	if (classUidExists($conn, $classuid) !== false) {
		header("location: ../../teacher.php?error=classuidexists");
		exit();
	}

	//now need to call functions to make it all work
	//update class column
	addNewClass($conn, $classname, $classuid);
}
else {
	header("location: ../../teacher.php");
		exit();
}