<?php
	include_once 'header.php';
?>
		<!--</nav>-->
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
		</section><!--End of nav-body-box-->


</body>