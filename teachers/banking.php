<!--View student profiles section begins here -->
<!-- <select id='class-options'>
	<option>Choose class:</option>
</select> -->
<section id='profile-container' class='profile-container'>
	<h2>Banking</h2>
	<form action="" method="post">
		<!-- includes/showStudentProfiles.inc.php -->
		<select name="class" id="class-options">
			<option value="None">Choose class</option>
			 <?php 
			 	fillBankingSelectorWithStudents();
			  ?>
		</select>
		<button type="submit" class="add-class" id="profiles" name="profiles">Show Profiles</button>	
		<!-- <div class="toggle-profiles-button-wrapper">
			
			<button id='show-profiles' class='add-class toggle-profiles-button'>Show Profiles</button>
			<button id='hide-profiles' class='add-class toggle-profiles-button'>Hide Profiles</button>
		</div> -->
	</form>
	<?php 
		if (isset($_POST['profiles'])){
			$classID = $_POST['class'];

			$student_profiles_query = "SELECT * FROM `students` WHERE `studentsClassuid` = '$classID'";
			$student_profiles_query_results = mysqli_query($conn, $student_profiles_query);
			// print_r($student_profiles_query_results);

			echo "<ul class=''>";
			while($row = mysqli_fetch_assoc($student_profiles_query_results)) {
				$student_name = $row['studentsName'];
				$student_age = $row['studentsAge'];
				$student_happy_face = $row['studentsFaces'];
				$student_tokens = $row['studentsTokens'];
				echo "<li class='student-profiles-row'>" . $student_name . ' Age: ' . $student_age .  ' Happy Faces: ' . $student_happy_face .  ' Tokens: ' . $student_tokens; 
				echo "<button class='add-class'>Bank</button>";
				echo "</li>";
			}
			echo "</ul>";
		}

	 ?>
	 <!-- I'm keeping this until I decide how I want to show the student profiles -->
	 <!-- whether or not it is best to use jquery to manage student tokens -->
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