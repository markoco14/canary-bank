<?php
require_once "dbh.inc.php";
require_once "functions.inc.php";


if (isset($_POST['profiles'])){
	$classID = $_POST['class'];

	$student_profiles_query = "SELECT * FROM `students` WHERE `studentsClassuid` = '$classID'";
	$student_profiles_query_results = mysqli_query($conn, $student_profiles_query);
	// print_r($student_profiles_query_results);

	echo "<ul>";
	while($row = mysqli_fetch_assoc($student_profiles_query_results)) {
		$student_name = $row['studentsName'];
		$student_age = $row['studentsAge'];
		$student_happy_face = $row['studentsFaces'];
		$student_tokens = $row['studentsTokens'];
		echo "<li>" . $student_name . ' Age: ' . $student_age .  ' Happy Faces: ' . $student_happy_face .  ' Tokens: ' . $student_tokens; 
		echo "</li>";
	}
	echo "</ul>";
	header("location: ../teacher.php?error=none");
	exit();
}  else {
	header("location: ../teacher.php");
	exit();
}

?>