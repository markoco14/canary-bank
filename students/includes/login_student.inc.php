<?php

require_once '../../includes/dbh.inc.php';
require_once 'student_functions.inc.php';


if (isset($_POST['login_student'])) {
    global $conn;
    $studentId = $_POST['studentid'];
    $studentPwd = $_POST['password'];
    session_start();
    $_SESSION["studentuid"] = $studentUidExists['studentsId'];
    $_SESSION["studentname"] = $studentUidExists['studentsName'];


    header("location: ../student.php");
    exit();
}