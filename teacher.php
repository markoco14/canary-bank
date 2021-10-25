<?php
	include_once 'header.php';
?>
<!-- DOCTYPE -->
	<!-- body-->
	<!-- /head-->
	<!-- body-->
		<!--</nav>-->
		<section class='whole-content-box'>
			<!--Teacher info section begins here -->
			<section class='teacher-section'>
				<h2>Hello, Teacher
						<?php
							if (isset($_SESSION["useruid"])) {
								echo "<span id='name-span'>" . $_SESSION["useruid"] . "</span>";
							}
						?>
				</h2>
			</section>
			<!--Service info section begins here -->
			<p>Welcome to the Canary Bank -- the safest place for your students to save their Canary Tokens and build their futures. Help your students open an account and manage their savings all in one place.</p>
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
			<section class='class-section'>
				<h2>Your Classes</h2>
				<p>Welcome to the Classes section. Manage all your classes and students here. Click "New Class" at the bottom if you want to create a new class. Your classes will appear below so you can sign up your students.</p>
				<div>Placeholder section. The classes you make will appear here.</div><!--for class boxes-->
				<form id="classForm" action="includes/addNewClass.inc.php" method="post">
					<input id="addClassName" type="text" name="classname" placeholder="Class name...">
					<input id="addClassUid" type="text" name="classuid" placeholder="Unique class ID here...">
					<button id="updateClasses" class='add-class' type="submit" name="submit">Add class</button>
				</form>
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
				<div class='add-class-container'>
					<button id='add-class' class='add-class'>+ class</button>
				</div>
			</section>
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<!-- CREATE NEW STUDENT SECTION HERE -->
			<!-----------------  ------------------>
			<!-----------------  ------------------>
			<section class='teacher-info-section'>
				<h2>Student Profiles</h2>
				<p>...</p>
				<h2>Open New Student Account</h2>
				<form action='includes/newStudentSignup.inc.php' method='post'>
					<select id='choose-class' name='class'>
						<option>Choose class:</option>
					</select>
					<input id='classuid-value' type='hidden' name='classuid' placeholder='Class UID...'>
					<input type='text' name='name' placeholder='First name...'>
					<input type='text' name='id' placeholder='Student ID...'>
					<input type='text' name='age' placeholder='Age...'>
					<input type='text' name='gender' placeholder='boy or girl...'>
					<input type='text' name='happyfaces' placeholder='How many happy faces do you have?...'>
					<input type='text' name='tokens' placeholder='How many tokens do you have?...'>
					<button type='submit' name='submit' class='add-class'>Sign Up</button>
				</form>
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
			</section>
			<!--View student profiles section begins here -->
			<select id='class-options'>
				<option>Choose class:</option>
			</select>
			<button id='show-profiles' class='add-class'>Show Profiles</button>
			<button id='hide-profiles' class='add-class'>Hide Profiles</button>
			<section id='profile-container' class='profile-container'>
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
		</section><!--End of nav-body-box-->

<script src="js/showProfiles.js?<?php echo time(); ?>"></script>
<script src="js/plusMinusTokens.js?<?php echo time(); ?>"></script> 
<script src="js/fetchTeachersData.js?<?php echo time(); ?>"></script>
<!--<script src="js/fetchStudentsData.js?<?php echo time(); ?>"></script>
<script src="js/fetchClassesData.js?<?php echo time(); ?>"></script>-->
<script src="js/newStudentCuid.js?<?php echo time(); ?>"></script>
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