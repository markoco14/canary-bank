<?php
	include_once 'landing_header.php';
?>
	<!-- body outline:
		social proof
		features

	 -->
	<!-- main content begins here -->
	<section id="social-proof" class="section-half row">
		<div class="join-teachers col-sm-6">
				
			<p class="join-text white-text">Join over 1000 teachers</p>

		</div>
		<div class="col-sm-6">
			<p>who are teaching their students to</p>
			<p>value money</p>
			<p>create wealth</p>
			<p>earn financial freedom</p>
		</div>

	</section>
	<section class='section-half row'>
		<h2>Welcome to the Canary Bank</h2>
		<div class=''>
			<!-- <div class='login-option'>
				<h3>Students</h3>
				<p>Are you a student in Canary class or a parent?</p>
				<p>If it is your first visit, get started at the student <a href="students.php"> Sign in here.</a></p>
				<p>Have a profile? Log in to check your bank balance.</p>
			</div> -->
		</div><!--End of content-info-box-->
		<div>
			<h3>Teachers</h3>
			<p>Are you a teacher?</p>
			<p>First time here? You need to make a teacher profile before you can let your students open their bank accounts. <a href="signup.php"> Sign up</a></p>
			<p>If you already have a teacher profile, click here: <a href="login.php"> Log in</a></p>
		</div>
	</section>	
	<!-- TEACHER SIGN UP SECTION -->
	<section id="new-teacher-sign-up" class='section-full'>
		<h2>New Teacher Sign Up</h2>
		<form action='includes/signup.inc.php' method='post' class="form col-sm-8">
			<div class="form-group">
				<label for="">Name</label>
				<input class="form-control" type='text' name='name' placeholder='Full name...'>
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input class="form-control" type='text' name='email' placeholder='Email...'>
				
			</div>
			<div class="form-group">
				<label for="">Username</label>
				<input class="form-control" type='text' name='uid' placeholder='Username...'>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input class="form-control" type='password' name='pwd' placeholder='Password...'>
			</div>
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input class="form-control" type='password' name='pwdrepeat' placeholder='Repeat password...'>
				
			</div>
			<div class="form-group">
				
				<button type='submit' name='submit' class="form-control">Sign Up</button>
			</div>
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
	<section class='section-full'>
		<h2>Teacher Login</h2>
		<form action='includes/login.inc.php' method='post' class="form col-sm-8">
			<div class="form-group">
				<label for="">Username/Email</label>
				<input class="form-control" type='text' name='uid' placeholder='Username/Email...'></input>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input class="form-control" type='password' name='pwd' placeholder='Password...'></input>
				
			</div>
			<div class="form-group">
				
				<button class="form-control" type='submit' name='submit'>Log In</button>
			</div>
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
	</section>
</main><!--End of nav-body-box-->

<?php include_once "footer.php" ?>