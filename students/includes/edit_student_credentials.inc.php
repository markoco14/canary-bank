<?php

// include_once "../student_header.php";
require_once '../../includes/dbh.inc.php';
require_once 'student_functions.inc.php';

if(isset($_POST['submit'])) {
    global $conn;
    $studentUid = $_POST['student_uid'];
    $studentEmail = $_POST['student_email'];
    $studentPassword = $_POST['student_password'];
    // var_dump($studentEmail, $studentPassword, $studentUid);
    editStudentSignUpInfo($conn, $studentUid, $studentEmail, $studentPassword);

} else {
    header("location: ../signup.php");

}