<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>


<!-- DOCTYPE -->
	<!-- body-->
	<!-- /head-->
	<!-- body-->
		<!--</nav>-->
		<main class='container'>
			<!--Teacher info section begins here -->
			<section class='welcome-section'>
				<h2>Hello, Teacher
						<?php
							if (isset($_SESSION["useruid"])) {
								echo "<span id='name-span'>" . $_SESSION["useruid"] . "</span>";
							}
						?>
				</h2>
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
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<!--Create class section begins here -->
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<section class='create-classes-section'>
				<h2>Your Classes</h2>
				<p>Welcome to the Classes section. Manage all your classes and students here. Click "New Class" at the bottom if you want to create a new class. Your classes will appear below so you can sign up your students.</p>
				<div>Placeholder section. The classes you make will appear here.</div><!--for class boxes-->
				<form id="classForm" action="includes/addNewClass.inc.php" method="post">
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
					?>
				</form>
			</section>
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<!-- CREATE NEW STUDENT SECTION HERE -->
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<section class='register-students-section'>
				<h2>Student Profiles</h2>
				<p>...</p>
				<h2>Open New Student Account</h2>
				<form action='includes/newStudentSignup.inc.php' method='post'>
					<select name="class" id="choose-class">
						<option value="None">Choose class</option>
						<?php 
							$teacherName = $_SESSION['useruid'];
							//  WHERE classesTeacheruid = $_SESSION['useruid']
							$query = "SELECT * FROM classes WHERE `classesTeacheruid` = 'Markymark'";
							$results = mysqli_query($conn, $query);

							while($row = mysqli_fetch_array($results)) {
								$classID = $row['classesUid'];
								$className = $row['classesName'];

								echo "<option value={$classID}>{$className}</option>";
							}

						 ?>
					</select>
					<input type='text' name='name' placeholder='First name...'>
					<input type='text' name='id' placeholder='Student ID...'>
					<input type='text' name='age' placeholder='Age...'>
					<input type='text' name='gender' placeholder='boy or girl...'>
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
			<!--View student profiles section begins here -->
			<!-- <select id='class-options'>
				<option>Choose class:</option>
			</select> -->
			<section id='profile-container' class='profile-container'>
				<form action="">
					
					<select name="class" id="class-options">
						<option value="None">Choose class</option>
						<?php 
							$teacherName = $_SESSION['useruid'];
							//  WHERE classesTeacheruid = $_SESSION['useruid']
							$query = "SELECT * FROM classes WHERE `classesTeacheruid` = 'Markymark'";
							$results = mysqli_query($conn, $query);

							while($row = mysqli_fetch_array($results)) {
								$classID = $row['classesUid'];
								$className = $row['classesName'];

								echo "<option value={$classID}>{$className}</option>";
							}

						 ?>
					</select>
					<div class="toggle-profiles-button-wrapper">
						
						<button id='show-profiles' class='add-class toggle-profiles-button'>Show Profiles</button>
						<button id='hide-profiles' class='add-class toggle-profiles-button'>Hide Profiles</button>
					</div>
				</form>
				<!--<div class='profile'>
					<h3>Flatley</h3>
					<img 
						src='student-images/flatley-cropped.jpg' 
						alt='A picture of Flatley'
						class='profile-pic'
					>
					<p>How many tokens?</p>
					<input>
					<button>Deposit</button>
				</div>-->
			</section>
		</main><!--End of nav-body-box-->

<script src="js/showProfiles.js?<?php echo time(); ?>"></script>
<script src="js/plusMinusTokens.js?<?php echo time(); ?>"></script> 
<!-- <script src="js/fetchTeachersData.js?<?php echo time(); ?>"></script> -->
<!--<script src="js/fetchStudentsData.js?<?php echo time(); ?>"></script>
<script src="js/fetchClassesData.js?<?php echo time(); ?>"></script>-->
<!-- <script src="js/newStudentCuid.js?<?php echo time(); ?>"></script> -->
<script>
	
	/*const myForm = document.getElementById("classForm");

	myForm.addEventListener('submit', function(e) {
		//prevent the form submitting as default
		e.preventDefault();
		//create a new form data object
		const formData = new FormData(this);
		//create Fetch request
		fetch('includes/updateTeacherClasses.inc.php', {
			method: 'post',
			body: formData
		}).then(function(response) {
			return response.text();
		}).then(function(text) {
			console.log(text);
		}).catch(function(error) {
			console.log(error);
		})
	});*/

</script>



</body>