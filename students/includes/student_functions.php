<?php
function editStudentSignUpInfo($conn, $studentUid, $studentEmail, $studentPassword) {
    global $conn;
    $signup_student_query = "UPDATE `students` SET `studentsEmail`='".$studentEmail."',`studentsPassword`='".$studentPassword."' WHERE `studentsId`='".$studentUid."';";
    $signup_student_result = mysqli_query($conn, $signup_student_query);
    var_dump($signup_student_query);
    header("location: ../signup.php?error=success");
	exit();
}
