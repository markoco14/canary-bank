<?php

include_once "../student_header.php";
require_once '../../includes/dbh.inc.php';
require_once 'student_functions.inc.php';

if(isset($_POST['submit'])) {
    global $conn;
    $studentUid = $POST_['student_uid'];
    $studentEmail = $POST_['student_email'];
    $studentPassword = $POST_['student_password'];
    // var_dump($studentEmail, $studentPassword, $studentUid);
    editStudentSignUpInfo($conn, $studentUid, $studentEmail, $studentPassword);

} else {
    header("location: ../signup.php");

}