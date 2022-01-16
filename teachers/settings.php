<?php
	include_once 'teacher_header.php';
?>
<?php
	include_once 'teacher_dash_nav.php';
?>
<div class="dashboard-content">
	<h2>Setting</h2>
	<p>Edit your settings and manage your account from this page.</p>
	<div class="dashboard-flex">
        <?php 
            echo $userName;
            echo $userUid;
            echo $userEmail;
            echo $userClasses;
            echo $userStudents;
        ?>
	</div>

		
</div>
<?php include_once 'teacher_footer.php'; ?>