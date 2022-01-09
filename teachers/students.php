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
<div class="dashboard-content-container">
	<section class="section">
		<h2>Open New Student Account <?php echo $userUid, $userName ?></h2>
		<form class="form" action='includes/add_new_student.inc.php' method='post'>
			<select name="class" id="choose-class">
				<option value="None">Choose class</option>
				<?php 
					fillstudentRegistrationSelectorWithClasses();
				 ?>
			</select>
			<input type='text' name='name' placeholder='First name...'>
			<input type='text' name='id' placeholder='Student ID...'>
			<input type='text' name='age' placeholder='Age...'>
			<div>
				<input type="radio" name="gender" value="boy" id="boy">
				<label for="boy">Boy</label>
				<input type="radio" name="gender" value="girl" id="girl">
				<label for="girl">Girl</label>
				<input type="radio" name="gender" value="other" id="other">
				<label for="other">Other</label>
			</div>
			<input type='text' name='happyfaces' placeholder='How many happy faces do you have?...'>
			<input type='text' name='tokens' placeholder='How many tokens do you have?...'>
			<button type='submit' name='submit' class='add-class'>Sign Up</button>
			<?php
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
			?>
		</form>
	</section>

	<section class="section">
		<h2>Class List</h2>
		<form class="form" action='' method='post'>
			<select name="class" id="choose-class">
				<option value="None">Choose class</option>
				<?php 
					fillstudentRegistrationSelectorWithClasses();
				 ?>
			</select>
			<button type="submit" class="add-class" id="profiles" name="profiles">Show Profiles</button>	
		</form>
		<?php 
			if (isset($_POST['profiles'])){
				showStudentDashboard();
			}

		?>		
	</section>
</div>
<?php include_once 'teacher_footer.php'; ?>