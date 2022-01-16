<?php
	include_once 'teacher_header.php';
?>
<?php
	include_once 'teacher_dash_nav.php';
?>
<div class="dashboard-content">
	<h2>Open New Student Account <?php echo $userUid, $userName ?></h2>
	<p>Create new students, delete and edit their information, and view class lists.</p>
	<div class="dashboard-flex">
		<div class="register-container">
			<h2>Register Student</h2>
			<form class="form-flex" action='includes/add_new_student.inc.php' method='post'>
				<div class="control-group">
					<label for="" class="form-label">
						Class
					</label>
					<select name="class" id="choose-class" class="form-control">
						<option value="None">Choose class</option>
						<?php 
							fillstudentRegistrationSelectorWithClasses();
						?>
					</select>
					<?php 
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "invalidclass") {
								echo "<p>Choose a proper class name.</p>";
							} 
						}
					?>
					
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Name
					</label>
					<input 
					class="form-control"
					type='text' 
					name='name' 
					placeholder='First name...'>
					
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Student ID
					</label>		
					<input 
					class="form-control"
					type='text' 
					name='id' 
					placeholder='Student ID...'>
					<?php
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "invalidstudentid") {
								echo "<p class='alert'>Choose a proper student id.</p>";
							} 
							if ($_GET["error"] == "studentidtaken") {
								echo "<p class='alert'>That student ID is already taken!</p>";
							}
						}
					?>
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Age
					</label>
					
					<input 
					class="form-control"
					type='text' 
					name='age' 
					placeholder='Age...'>
					<?php 
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "agenotnumber") {
								echo "<p class='alert'>The age is not a number.</p>";
							}
						}
					?>
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Gender
					</label>
					
					<div class="form-control">
						<input 
						type="radio" 
						name="gender" 
						value="boy" 
						id="boy">
						<label 
						for="boy">Boy</label>
						<input 
						type="radio" 
						name="gender" 
						value="girl" 
						id="girl">
						<label 
						for="girl">Girl</label>
						<input 
						type="radio" 
						name="gender" 
						value="other" 
						id="other">
						<label 
						for="other">Other</label>
					</div>
					<?php 
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "invalidgender") {
								echo "<p class='alert'>Choose a proper gender.</p>";
							} 
						}
					?>
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Happy Faces
					</label>
					<input 
					class="form-control"
					type='text' 
					name='happyfaces' 
					placeholder='How many happy faces do you have?...'>
					<?php 
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "facesnotnumber") {
								echo "<p class='alert'>The number of happy faces needs to be a number.</p>";
							} 
						}
					?>
				</div>
				<div class="control-group">
					<label for="" class="form-label">
						Tokens
					</label>
					<input 
					class="form-control"
					type='text' 
					name='tokens' 
					placeholder='How many tokens do you have?...'>
					<?php 
						if (isset($_GET["error"])) { 
	
							if ($_GET["error"] == "tokensnotnumber") {
								echo "<p class='alert'>The number of tokens needs to be a number.</p>";
							} 
						}
					?>
					
				</div>
				<div class="control-group">				
					<button 
						type='submit' 
						name='submit' 
						class='add-class'>Sign Up</button>
				</div>
				<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p class='alert'>You forgot to fill in all the inputs.</p>";
						} 
						
						if ($_GET["error"] == "stmtfailed") {
							echo "<p class='alert'>Something went wrong, try again!</p>";
						}
						
						if ($_GET["error"] == "none") {
							echo "<p style='position:absolute; width:25%; margin:auto; background:green; color: white;'>You have signed up!</p>";
						}
					}
				?>
			</form>
		</div>
		<article class="side-list class-list">
			<h2>Your Students</h2>
			<div class="class-list-container">
				<?php 
					displayAllStudents();
				?>
			</div>
		</article>

	</div>
</div>
<?php include_once 'teacher_footer.php'; ?>