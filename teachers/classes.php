
<!-----------------  ------------------>
<!-----------------  ------------------>
<!--Create class section begins here -->
<!-----------------  ------------------>
<!-----------------  ------------------>
<section class='create-classes-section'>
	<h2>Your Classes</h2>
	<p>Welcome to the Classes section. Manage all your classes and students here. Click "New Class" at the bottom if you want to create a new class. Your classes will appear below so you can sign up your students.</p>
	<div>Placeholder section. The classes you make will appear here.</div><!--for class boxes-->
	<form id="classForm" action="includes/addNewClass.inc.php" method="post">
		<input id="addClassName" type="text" name="classname" placeholder="Class name...">
		<input id="addClassUid" type="text" name="classuid" placeholder="Unique class ID here...">
		<button id="updateClasses" class='add-class' type="submit" name="submit">Add class</button>
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
	</form>
	<article>
		<h2>Your classes</h2>
		<div class="class-thumbnail-container">
		 <?php 
		 	displayClassList();
		  ?>
		</div>
	</article>
</section>
