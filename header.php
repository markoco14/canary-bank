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
		<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- <link href='css/studentProfiles.css?<?php echo time(); ?>' rel='stylesheet' type='text/css'> -->
	</head>
	<body>
		<header class="landing-header col-sm-12">
			<div class="header-navline">
				<p class='logo'>Canary Bank</p>
				<input type='checkbox' id='nav-toggle' class='nav-toggle'>
				<nav class='nav'>
					<ul>
						<?php
		//I probably need to add another conditional
		//to handle the session with a studentid.
						echo "<li><a href='index.php'>Home</a></li>";
								echo "<li><a href='contact.php'>Contact</a></li>";
								echo "<li><a href='signup.php'>Signup</a></li>";
								echo "<li><a href='login.php'>Login</a></li>";
							// if (isset($_SESSION["useruid"])) {
							// 	echo "<li><a href='profile.php'>Students</a></li>";
							// 	echo "<li><a href='graph.php'>Charts</a></li>";
							// 	echo "<li><a href='profile.php'>Profile</a></li>";
							// 	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
							// }
							// else {
							// 	echo "<li><a href='index.php'>Home</a></li>";
							// 	echo "<li><a href='contact.php'>Contact</a></li>";
							// 	echo "<li><a href='signup.php'>Signup</a></li>";
							// 	echo "<li><a href='login.php'>Login</a></li>";
							// }
						?>
					</ul>
				</nav>
				<label for='nav-toggle' class='nav-toggle-label'>
					<span></span>
				</label>
			</div>
			<div class="header-content">
				
				<h1>Healthy financial habits <br> Healthy financial futures</h1>
				<p>Set your students on the path to wealth</p>
				<a href="#new-teacher-sign-up"><button class="hero-button">GET STARTED</button></a>
			</div>
		</header>
		<!-- test the image file to get the sizing
			and mobile responsiveness right
		 -->
		<!-- <img class="header-image" src="images/canary-hero.jpg" alt="A canary sits on a branch amidst small pink leaves."> -->
		<main class=''>