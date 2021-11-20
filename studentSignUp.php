<?php
	include_once 'header.php';
?>

<section class="whole-content-box">
	<form action="includes/parents/parentSignUp.inc.php" method="post">
		<input type="text" name="studentid" placeholder="Student ID...">
		<br>
		<input type="text" name="email" placeholder="Email...">
		<br>
		<input type="text" name="password" placeholder="Password..">
		<br>
		<input type="text" name="pwdrepeat" placeholder="Confirm password...">
		<br>
		<button type="submit" name="submit">Submit</button>

	</form>
</section>