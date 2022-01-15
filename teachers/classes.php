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
				<div class="control-group">
					<label 
						for="addClassName" 
						class="form-label"
						>
						Class Name
					</label>
					<input 
						id="addClassName"
						class="form-control" 
						type="text" 
						name="classname" 
						placeholder="Class name...">
					<?php 
						if (isset($_GET["error"])) {
							if ($_GET["error"] == "emptyclassname") {
								echo "<p style='color:red;'>You forgot to fill in the class name.</p>";
							} 
						}
					?>
				</div>
				<div class="control-group">
					<label 
						for="addClassUid" 
						class="form-label"
						>
						Class ID
					</label>
					<input 
						id="addClassUid" 
						class="form-control" 
						type="text" 
						name="classuid" 
						placeholder="Unique class ID here...">
					<?php 
						if (isset($_GET["error"])) {
							if ($_GET["error"] == "emptyclassid") {
								echo "<p style='color:red;'>You forgot to fill in the class id.</p>";
							} 
						}
					?>
					<?php 
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "classuidexists") {
							echo "<p style='color:red;'>That class Uid already exists.</p>";
						} 
					}
					?>
				</div>
				<div class="control-group">
					<button id="updateClasses" class='add-class' type="submit" name="submit">Add class</button>
				</div>
				<?php
					
					
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "success") {
							echo "<p style='color:green;'>Class created!</p>";
						} 
					}
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "stmtfailed") {
							echo "<p style='color:red;'>Something went wrong. Please try again.</p>";
						} 
					}
				?>
			</form>
			<article class="side-list class-list">
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