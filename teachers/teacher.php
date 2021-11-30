<?php
	include_once 'teacher_header.php';
	include_once '../includes/dbh.inc.php';
	include_once 'includes/teacher_functions.inc.php';
	$userUid = $_SESSION['useruid'];
	$userName = $_SESSION['username'];
?>
<nav class="dashboard-nav">
    <ul>
        <li><a href="teacher.php">Home</a></li>
        <li><a href="classes.php">Classes</a></li>
        <li><a href="students.php">Students</a></li>
        <li><a href="bank.php">Bank</a></li>
        <li><a href="#">Admin</a></li>
    </ul>
</nav>
<!--Teacher info section begins here -->
<div class="content-container">
	<section>
		<?php 
			welcomeTeacher();
		 ?>
		<p>Welcome to the Canary Bank -- the safest place for your students to save their Canary Tokens and build their futures. Help your students open an account and manage their savings all in one place.</p>
	</section>
	<section class='info-container'>
		<div class='info-item'>
			<h2>1</h2>
			<h3>Create classes</h3>
			<p>Create online banks for every class you teach.</p>
		</div>
		<div class='info-item'>
			<h2>2</h2>
			<h3>Register students</h3>
			<p>Choose who is in your class by creating student profiles.</p>
		</div>
		<div class='info-item'>
			<h2>3</h2>
			<h3>Add tokens</h3>
			<p>Let your students collect their rewards and see their progress.</p>
		</div>
	</section>
</div>
<?php include_once 'teacher_footer.php'; ?>