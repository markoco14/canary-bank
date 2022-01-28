
<?php 
	include "students_header.php";
?>
	<main>
		<h1>Welcome to the student page</h1>
		<?php 
			// echo "<p>{$_SESSION['id']}</p>";
			// echo "<p>{$_SESSION['studentuid']}</p>";
			// echo "<p>{$studentName}</p>";

		 ?>
		<p>Students and parents can manage their bank accounts together.</p>
		<form class="form-flex" action="includes/edit_student_credentials.inc.php" method="post">
			<div class="control-group">
				<label class="form-label" for="">Student ID</label>
				<input class="form-control" type="text" name="student_uid">
			</div>
			<div class="control-group">
				<label class="form-label" for="">Email</label>
				<input class="form-control" type="email" name="student_email">
			</div>
			<div class="control-group">
				<label class="form-label" for="">Password</label>
				<input class="form-control" type="password" name="student_password">
			</div>
			<button type="submit" name="submit">Sign Up</button>
		</form>
		<!-- <p>You should be able to see the following things:</p>
		<ul>
			<li>Profile section (picture, name, favorites) </li>
			<li>Happy Faces</li>
			<li>Tokens</li>
			<li>Message your teacher</li>
			<li>Message other students</li>
		</ul> -->
	</main>	
</body>
</html>
