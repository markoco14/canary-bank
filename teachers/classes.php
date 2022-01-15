<?php
	include_once 'teacher_header.php';
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
<div class="dashboard-content">
	<!-- <section class="section"> -->
		<h2>Your Classes, <?php echo $userUid, $userName ?></h2>
		<p>Welcome to the Classes section. Manage all your classes and students here. Click "New Class" at the bottom if you want to create a new class. Your classes will appear below so you can sign up your students.</p>
		<div class="dashboard-flex">

			<form class="form-flex" id="classForm" action="includes/add_new_class.inc.php" method="post">
				<input id="addClassName" type="text" name="classname" placeholder="Class name...">
				<input id="addClassUid" type="text" name="classuid" placeholder="Unique class ID here...">
				<button id="updateClasses" class='add-class' type="submit" name="submit">Add class</button>
				<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyclassinput") {
							echo "<p>You forgot to fill in all the inputs.</p>";
						} 
					}
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "classuidexists") {
							echo "<p>That class Uid already exists.</p>";
						} 
					}
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "success") {
							echo "<p>Class created!</p>";
						} 
					}
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "stmtfailed") {
							echo "<p>Something went wrong. Please try again.</p>";
						} 
					}
				?>
			</form>
			<article>
				<h2>Your classes</h2>
				<div class="class-list-container">
				 <?php 
					 displayClassList();
				  ?>
				</div>
			</article>
		</div>
	<!-- </section> -->
</div>
<?php include_once 'teacher_footer.php'; ?>