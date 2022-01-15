<?php 

// session_start();


///////////////////////////////////////////////////////////////
//UPDATE TEACHER CLASS LIST SECTION 
///////////////////////////////////////////////////////////////

function emptyClassName($classname) {
	$result;
	if (empty($classname)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function emptyClassUid($classuid) {
	$result;
	if (empty($classuid)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the class uid contains the proper characters
function invalidClassUid($classuid) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $classuid)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//now we check if the classuid exists
function classUidExists($conn, $classuid) {
	$sql = "SELECT * FROM classes WHERE classesUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//only 1 "s" because only 1 paramenter
	mysqli_stmt_bind_param($stmt, "s", $classuid);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

//change this into addNewClass function
function addNewClass($conn, $classname, $classuid, $teachername, $teacheruid) {

	// first update the teacher's number of classes in the users table
	$query = "SELECT `number_of_classes` FROM `users` WHERE `usersUid` = '".$teacheruid."';";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$number_of_classes = intval($row['number_of_classes']);
	$number_of_classes++;

	$update_query = "UPDATE `users` SET `number_of_classes`='".$number_of_classes."' WHERE `usersUid` = '".$teacheruid."';";
	$result = mysqli_query($conn, $update_query);

	// now make prepared statements to insert the new class into the classes table
	$sql = "INSERT INTO classes (classesName, classesUid, classesTeachername, classesTeacheruid) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../classes.php?error=stmtfailed");
		exit();
	}
	// "ssss" because 2 parameters
	mysqli_stmt_bind_param($stmt, "ssss", $classname, $classuid, $teachername, $teacheruid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../classes.php?error=success");
	exit();
}

function displayClassList() {
	global $userUid;
	global $conn;
	$class_list_query = "SELECT * FROM classes WHERE classesTeacheruid = '$userUid' ";
	// die($class_list_query);
	$class_list_result = mysqli_query($conn, $class_list_query);
	echo "<ul>";
	while($row = mysqli_fetch_assoc($class_list_result)){
		$yourClassName = $row['classesName'];
			echo "<li>$yourClassName</li>";
	}
	echo "</ul>";

}

///////////////////////////////////////////////////////////////
//MAKE NEW STUDENT ACCOUNTS SECTION
///////////////////////////////////////////////////////////////

function emptyStudentInfo($name, $id, $class, $age, $gender, $happyFaces, $tokens) {
	$result;
	if (empty($name) || empty($id) || empty($class) || empty($age)|| empty($gender) || empty($happyFaces) || empty($tokens)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidStudentId($id) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidClass($class) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $class)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidGender($gender) {
	$result;
	// if ($gender !== "boy" || $gender !== "girl" || $gender !== "other") {
	// 	$result = true;
	// } else {
	// 	$result = false;
	// }
	if (empty($gender)){
		$result = true;
	} else{
		$result = false;
	}
	return $result;
}

function ageNotNumber($age) {
	$result;
	if (!preg_match("/^[0-9]*$/", $age)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function facesNotNumber($happyFaces) {
	$result;
	if (!preg_match("/^[0-9]*$/", $happyFaces)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function tokensNotNumber($tokens) {
	$result;
	if (!preg_match("/^[0-9]*$/", $tokens)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function studentIdExists($conn, $id) {
	$sql = "SELECT * FROM students WHERE studentsId = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../students.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

//this is where I need to insert my teacher name/uid
//and class name/uid
//teacher should be easy
//just repeat from the class section.
function newStudentAccount($conn, $name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens, $teachername, $teacheruid) {

	$sql = "INSERT INTO students (studentsName, studentsId, studentsClass, studentsClassuid, studentsAge, studentsGender, studentsFaces, studentsTokens, studentsTeachername, studentsTeacheruid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../students.php?error=stmtfailed");
		exit();
	}

	// "ssssssss" because 8 parameters
	mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $id, $class, $classuid, $age, $gender, $happyFaces, $tokens, $teachername, $teacheruid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../students.php?error=none");
	exit();
}

 ?>

 <?php 

 function welcomeTeacher() {
	global $conn;

 	global $userUid;
 	global $userName;
 	echo "<h2>";
 	echo "Hello, Teacher ";
 	if (isset($userUid)) {
 		echo "<span id='name-span'>" . $userName . "</span>";
 	}
 	echo "</h2>";
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

?>

 <?php 
 	function showStudentProfiles(){
 		$classID = $_POST['class'];
 		global $conn;

 		$student_profiles_query = "SELECT * FROM `students` WHERE `studentsClassuid` = '$classID'";
 		$student_profiles_query_results = mysqli_query($conn, $student_profiles_query);
 		// print_r($student_profiles_query_results);

 		echo "<ul class=''>";
 		while($row = mysqli_fetch_assoc($student_profiles_query_results)) {
 			$student_name = $row['studentsName'];
 			$student_age = $row['studentsAge'];
 			$student_happy_face = $row['studentsFaces'];
 			$student_tokens = $row['studentsTokens'];
 ?>
 			<li class='student-profiles-row'>
 				<p>Name: <?php echo $student_name; ?></p>
 				<p>Age: <?php echo $student_age; ?></p>
 				<p>Happy Faces: <?php echo $student_happy_face; ?></p>
 				<p>Tokens: <?php echo $student_tokens; ?></p>
 				<button class='add-class'>Bank</button>
 			</li>

 			<!-- echo "<li class='student-profiles-row'>" . $student_name . ' Age: ' . $student_age .  ' Happy Faces: ' . $student_happy_face .  ' Tokens: ' . $student_tokens; 
 			echo "<button class='add-class'>Bank</button>";
 			echo "</li>"; -->
 		<?php  } ?>
 		</ul>

 	<?php } ?>	

<?php 
function showStudentDashboard(){
	$classID = $_POST['class'];
	global $conn;

	if ($classID !== "None") {
		$student_profiles_query = "SELECT * FROM `students` WHERE `studentsClassuid` = '$classID'";
		$student_profiles_query_results = mysqli_query($conn, $student_profiles_query);
		// print_r($student_profiles_query_results);
	?>

		<table>
			<thead>
				<tr>
					
					<th>Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Happy Faces</th>
					<th>Tokens</th>
				</tr>
			</thead>
			<tbody>

	<?php  				
			while($row = mysqli_fetch_assoc($student_profiles_query_results)) {
				$student_name = $row['studentsName'];
				$student_age = $row['studentsAge'];
				$student_happy_face = $row['studentsFaces'];
				$student_tokens = $row['studentsTokens'];
				$student_gender = $row['studentsGender'];
	?>
			
				<tr>
					<td><?php echo $student_name; ?></td>
					<td><?php echo $student_age; ?></td>
					<td><?php echo $student_gender ?></td>
					<td><?php echo $student_happy_face; ?></td>
					<td><?php echo $student_tokens; ?></td>
					<td>Delete</td>
				</tr>
		<?php  
		// end the while loop
		} ?>
			</tbody>

		</table>
			

	<?php 
	// end the if statement
	}

// end the function
} ?>





