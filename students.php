<?php
	include_once 'header.php';
?>
<!-- STUDENT SIGN UP SECTION -->
<section class="whole-content-box">
	<h2>Sign Up</h2>
	<form action="includes/students/student_make_login.inc.php" method="post">
		<div>
			<label for=""></label>
			<input type="text" name="studentid" placeholder="Student ID...">
		</div>
		<div>
			<label for=""></label>
			<input type="text" name="email" placeholder="Email...">
		</div>
		<div>
			<label for=""></label>
			<input type="text" name="password" placeholder="Password..">
		</div>
		<div>
			<label for=""></label>
			<input type="text" name="pwdrepeat" placeholder="Confirm password...">
		</div>
		<div>
			<button type="submit" name="submit">Submit</button>
			
		</div>
	</form>
	<?php 
		if(isset($_GET['error'])) {
			$error = $_GET['error'];
			if ($error == 'emptyinput') {
				echo "<p>You forgot to fill in one of the inputs. Please try again.</p>";
			}
			if ($error == 'invalidemail') {
				echo "<p>That's not a valid email. Please try again.</p>";
			}
			if ($error == 'none') {
				echo "<p>You have successfully signed up! You may log in if you're ready.</p>";
			}
		}
	 ?>
</section>

<!-- STUDENT LOG IN SECTION -->
<section>
	<h2>Log in</h2>
	<form action="includes/students/student_login.inc.php" method="post">
		<div>
			<label for="">Student ID: </label>
			<input type="text" name="student-user-id" placeholder="Student ID...">
		</div>
		<div>
			<label for="">Password: </label>
			<input type="" name="student-pwd" placeholder="Password...">
		</div>
		<div>
			<button type="submit" name="student-log-in">Log In</button>
		</div>
	</form>
</section>