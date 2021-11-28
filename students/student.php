<?php 
session_start();
$studentName = $_SESSION['studentname'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<main>
		<a href='../includes/logout.inc.php'>Log out</a>
		<h1>Welcome to the student page, <?php echo $studentName ?></h1>
		<?php 
			// echo "<p>{$_SESSION['id']}</p>";
			// echo "<p>{$_SESSION['studentuid']}</p>";
			// echo "<p>{$studentName}</p>";

		 ?>
		<p>Students and parents can manage their bank accounts together.</p>
		<p>You should be able to see the following things:</p>
		<ul>
			<li>Profile section (picture, name, favorites) </li>
			<li>Happy Faces</li>
			<li>Tokens</li>
			<li>Message your teacher</li>
			<li>Message other students</li>
		</ul>
	</main>	
</body>
</html>
