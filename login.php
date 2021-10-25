<?php
	include_once 'header.php';
?>
		<!--</nav>-->
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
		<!-- a php script will go inside the section above to handle different login error messages -->
</body>