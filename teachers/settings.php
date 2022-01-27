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
        <div class="register-container">

            <form action="includes/edit_teacher_info.inc.php" method="post">
                <div class="control-group">
                    <label for="" class="form-label">
                        Name
                    </label>
                    <input 
                        type="text" 
                        class="form-control"
                        value="<?php echo $userName?>"
                        name="teacher_name"
                        >
                </div>
                <div class="control-group">
                    <label for="" class="form-label">
                        Email
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        value="<?php echo $userEmail?>"
                        name="teacher_email"
                        >
                </div>
                <div class="control-group">
                    <label 
                        for="" 
                        class="form-label"
                        >
                        Number Of Classes
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        value="<?php echo $userClasses?>"
                        name="number_of_classes"
                        disabled
                        >
                </div>
                <div class="control-group">
                    <label 
                        for="" 
                        class="form-label"
                        >
                        Number Of Students
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        value="<?php echo $userStudents?>"
                        name="number_of_students"
                        disabled
                        >
                </div>
                <div class="control-group">
                    <button 
                        type="submit"
                        class="form-control btn-primary"
                        name="edit"
                        >
                        Edit
                    </button>
                </div>
            </form>
        </div>
        <article>
            <div>
                <p>Number Of Classes</p>
                <a href="#">Manage Classes</a>
            </div>
            <div>
                <p>Number of Students</p>
                <a href="#">Manage Students</a>
            </div>
            <div>
                <p>Change Password</p>
            </div>
        </article>
	</div>

		
</div>
<?php include_once 'teacher_footer.php'; ?>