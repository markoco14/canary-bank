<?php

//getting data from the server
$conn = mysqli_connect('localhost', "root", "", "canaryusers");

//getting data from student table
$result = mysqli_query($conn, "SELECT * FROM classes");

//store data in an array
$classes = array();
while ($row = mysqli_fetch_assoc($result)) {
	$classes[] = $row;
}

//returning response in JSON format
//teacher.php has the ajax request which catches
//this.reponse and turns it into a useable variable
//and console.logs it
echo json_encode($classes);