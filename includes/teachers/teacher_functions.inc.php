<?php 


function displayClassList() {
	global $userUid;
	global $conn;
	$class_list_query = "SELECT * FROM classes WHERE classesTeacheruid = '$userUid' ";
	// die($class_list_query);
	$class_list_result = mysqli_query($conn, $class_list_query);
	while($row = mysqli_fetch_assoc($class_list_result)){
		$yourClassName = $row['classesName'];
		echo "<div class='class-thumbnail'>";
			echo "<p class='class-thumbnail-text'>$yourClassName</p>";
			echo "<img class='class-thumbnail-image' src='./student-images/flatley-cropped.jpg'>";
		echo "</div>";
	}
}

function fillstudentRegistrationSelectorWithClasses() {
	global $conn;
	$teacherName = $_SESSION['useruid'];
	//  WHERE classesTeacheruid = $_SESSION['useruid']
	$query = "SELECT * FROM classes WHERE `classesTeacheruid` = '$teacherName'";
	$results = mysqli_query($conn, $query);

	while($row = mysqli_fetch_array($results)) {
		$classID = $row['classesUid'];
		$className = $row['classesName'];

		echo "<option value={$classID}>{$className}</option>";
	}
}

function checkStudentRegistrationForErrors() {
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinput") {
			echo "<p>You forgot to fill in all the inputs.</p>";
		} 
		else if ($_GET["error"] == "invalidstudentid") {
			echo "<p>Choose a proper student id.</p>";
		} 
		else if ($_GET["error"] == "invalidclass") {
			echo "<p>Choose a proper class name.</p>";
		} 
		else if ($_GET["error"] == "invalidgender") {
			echo "<p>Choose a proper gender.</p>";
		} 
		else if ($_GET["error"] == "agenotnumber") {
			echo "<p>The age is not a number.</p>";
		}
		else if ($_GET["error"] == "facesnotnumber") {
			echo "<p>The number of happy faces needs to be a number.</p>";
		} 
		else if ($_GET["error"] == "tokensnotnumber") {
			echo "<p>The number of tokens needs to be a number.</p>";
		} 
		else if ($_GET["error"] == "stmtfailed") {
			echo "<p>Something went wrong, try again!</p>";
		}
		else if ($_GET["error"] == "studentidtaken") {
			echo "<p>That student ID is already taken!</p>";
		}
		else if ($_GET["error"] == "none") {
			echo "<p>You have signed up!</p>";
		}
	}
}

function fillBankingSelectorWithStudents() {
	global $conn;
	$teacherName = $_SESSION['useruid'];
	//  WHERE classesTeacheruid = $_SESSION['useruid']
	$query = "SELECT * FROM classes WHERE `classesTeacheruid` = '$teacherName'";
	$results = mysqli_query($conn, $query);

	while($row = mysqli_fetch_array($results)) {
		$classID = $row['classesUid'];
		$className = $row['classesName'];

		echo "<option value={$classID}>{$className}</option>";
	}
}




