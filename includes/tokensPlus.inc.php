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
		header("location: ../teacher.php?error=tokensrecieved");
	}
} else {
	header("location: ../teacher.php");
	exit();
}




/* here I want to call a function which will update the database..? but I use post to get my variables available in PHP
*/

//the update code will go into the function on the functions page.. or make it all self contained right here? anyways.. it looks like I'm good to go. I don't even really need to do any checks. just make the request. 
