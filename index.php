<?php
	include_once 'header.php';
?>
			
<!--</nav>-->
<section class='whole-content-box'>
	<h2>Welcome to the Canary Bank</h2>
	<div class='content-info-box'>
		<!-- <div class='login-option'>
			<h3>Students</h3>
			<p>Are you a student in Canary class or a parent?</p>
			<p>If it is your first visit, get started at the student <a href="students.php"> Sign in here.</a></p>
			<p>Have a profile? Log in to check your bank balance.</p>
		</div> -->
	</div><!--End of content-info-box-->
</section>	
</section>
			<div class='login-option'>
				<h3>Teachers</h3>
				<p>Are you a teacher?</p>
				<p>First time here? You need to make a teacher profile before you can let your students open their bank accounts. <a href="signup.php"> Sign up</a></p>
				<p>If you already have a teacher profile, click here: <a href="login.php"> Log in</a></p>
			</div>
<!-- TEACHER SIGN UP SECTION -->
<section class='whole-content-box'>
	<h2>New Teacher Sign Up</h2>
	<form action='includes/signup.inc.php' method='post'>
		<input type='text' name='name' placeholder='Full name...'>
		<input type='text' name='email' placeholder='Email...'>
		<input type='text' name='uid' placeholder='Username...'>
		<input type='password' name='pwd' placeholder='Password...'>
		<input type='password' name='pwdrepeat' placeholder='Repeat password...'>
		<button type='submit' name='submit'>Sign Up</button>
	</form>

	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>You forgot to fill in all the inputs.</p>";
			} 
			else if ($_GET["error"] == "invaliduid") {
				echo "<p>The user name you've chosen is invalid. Please choose another one.</p>";
			} 
			else if ($_GET["error"] == "invalidemail") {
				echo "<p>The email you've chosen is invalid or taken. Please choose another one.</p>";
			} 
			else if ($_GET["error"] == "passwordsdontmatch") {
				echo "<p>The passwords don't match. Try again.</p>";
			} 
			else if ($_GET["error"] == "stmtfailed") {
				echo "<p>Something went wrong, try again!</p>";
			}
			else if ($_GET["error"] == "usernametaken") {
				echo "<p>That user name is already taken!</p>";
			}

			else if ($_GET["error"] == "invalidclassuid") {
				echo "<p>Please enter a proper unqiue class id!</p>";
			}
			else if ($_GET["error"] == "classuidtaken") {
				echo "<p>That unique class id is already taken!</p>";
			}
			
			else if ($_GET["error"] == "none") {
				echo "<p>You have signed up!</p>";
			}
		}
	?>
</section>
<!-- TEACHER LOG IN SECTION -->
<section class='whole-content-box'>
	<h2>Teacher Login</h2>
	<form action='includes/login.inc.php' method='post'>
		<input type='text' name='uid' placeholder='Username/Email...'></input>
		<input type='password' name='pwd' placeholder='Password...'></input>
		<button type='submit' name='submit'>Log In</button>
		<p>Don't have a profile? <a href='signup.php'>Sign up</a></p>
	</form>

	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>You forgot to fill in all the inputs.</p>";
			} 
			else if ($_GET["error"] == "wronglogin") {
				echo "<p>Incorrect login information!.</p>";
			} 
		}
	?>
</section><!--End of nav-body-box-->

<?php include_once "footer.php" ?>