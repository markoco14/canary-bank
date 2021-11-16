<?php 
	session_start();
?>

<!DOCTYPE html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width initial-scale=1.0 shrink-to-fit=no'>
		<title>Canary Bank</title>
		<link href='css/bankStyle.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'>
		<link href='css/headerStyles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'>
		<!-- <link href='css/studentProfiles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'> -->
	</head>
	<body>
		<header>
		<h1 class='logo'>Canary Bank</h1>
		<input type='checkbox' id='nav-toggle' class='nav-toggle'>
		<nav class='nav'>
			<ul>
				<?php
//I probably need to add another conditional
//to handle the session with a studentid.
					if (isset($_SESSION["useruid"])) {
						echo "<li><a href='profile.php'>Students</a></li>";
						echo "<li><a href='graph.php'>Charts</a></li>";
						echo "<li><a href='profile.php'>Profile</a></li>";
						echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
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
		<section class='nav-body-box'>