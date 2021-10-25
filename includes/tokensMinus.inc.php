<?php

if (isset($_POST["tokens"])) {
	$tokens = $_POST["tokens"];
	$sid = $_POST["sid"];
	
//program will connect to the database
	require_once "dbh.inc.php";
	//program will fire off the functions now
	//and return the results
	require_once "functions.inc.php";
	$result = mysqli_query($conn, "UPDATE students SET studentsTokens='$tokens' WHERE studentsId='$sid'");
	if ($result) {
		header("location: ../teacher.php?error=tokensremoved");
	}
} else {
	header("location: ../teacher.php");
	exit();
}
