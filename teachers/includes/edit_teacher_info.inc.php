<?php

include_once "../teacher_header.php";
require_once '../../includes/dbh.inc.php';
require_once 'teacher_functions.inc.php';

if(isset($_POST['edit'])) {
    global $conn;
    $teacherName = $_POST['teacher_name'];
    $teacherEmail = $_POST['teacher_email'];
    $teacherUid = $userUid;
    // var_dump($teacherUid);
    $old_teacher_name = $userName;
	$old_teacher_email = $userEmail;
    editTeacherAccountInfo($conn, $teacherName, $teacherEmail, $teacherUid, $old_teacher_name, $old_teacher_email);

} else {
    header("location: ../settings.php");

}