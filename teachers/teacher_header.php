<?php 
	session_start();
	include_once '../includes/dbh.inc.php';
	include_once 'includes/teacher_functions.inc.php';
	$userName = $_SESSION['username'];
	$userUid = $_SESSION['useruid'];
	$userEmail = $_SESSION['useremail'];
	$userClasses = $_SESSION['userclasses'];
	$userStudents = $_SESSION['userstudents'];
	// die($userStudents);
?>

<!DOCTYPE html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width initial-scale=1.0 shrink-to-fit=no'>
		<title>Canary Bank</title>
		<link href='../css/bankStyle.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'>
		<link href='../css/headerStyles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'>
		<link href='teacher_styles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'>

		<!-- <link href='css/studentProfiles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'> -->
	</head>
	<body>
		<header class="teacher-header">
		<h1 class='logo'>Canary Bank</h1>
		<input type='checkbox' id='nav-toggle' class='nav-toggle'>
		<nav class='nav'>
			<ul>
				<?php
//I probably need to add another conditional
//to handle the session with a studentid.
					if (isset($_SESSION["useruid"])) {
						// echo "<li><a href='teacher.php'>Home</a></li>";
						// echo "<li><a href='classes.php'>Classes</a></li>";
						// echo "<li><a href='students.php'>Students</a></li>";
						// echo "<li><a href='bank.php'>Bank</a></li>";
						// echo "<li><a href='#'>Admin</a></li>";
						echo "<li><a href='../includes/logout.inc.php'>Log out</a></li>";
					}
					else {
						echo "<li><a href='index.php'>Home</a></li>";
						echo "<li><a href='contact.php'>Contact</a></li>";
						echo "<li><a href='signup.php'>Signup</a></li>";
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
			</ul>
		</nav>
		<label for='nav-toggle' class='nav-toggle-label'>
			<span></span>
		</label>
		

		</header>
		<main class="dashboard">