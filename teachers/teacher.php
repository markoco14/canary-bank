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
<div class="dashboard-content-container">
	<section class="section">
		<?php 
			welcomeTeacher();
		 ?>
		<p>Welcome to the Canary Bank -- the safest place for your students to save their Canary Tokens and build their futures. Help your students open an account and manage their savings all in one place.</p>
	</section>
	<section class='section teacher-info-container'>
		<div class='teacher-info-card'>
			<h2>Create <br class="large-screen-break"> classes</h2>
			<img src="../images/empty-classroom.jpg" alt="3 happy kids sitting together.">
			<!-- <p>Create online banks for every class you teach.</p> -->
		</div>
		<div class='teacher-info-card'>
			<h2>Register <br class="large-screen-break"> students</h2>
			<img src="../images/kids-sitting-together.jpg" alt="3 happy kids sitting together.">
			<!-- <p>Choose who is in your class by creating student profiles.</p> -->
		</div>
		<div class='teacher-info-card'>
			<h2>Add <br class="large-screen-break"> tokens</h2>
			<img src="../images/gold-coins.jpg" alt="3 happy kids sitting together.">
			<!-- <p>Let your students collect their rewards and see their progress.</p> -->
		</div>
	</section>
</div>
<?php include_once 'teacher_footer.php'; ?>