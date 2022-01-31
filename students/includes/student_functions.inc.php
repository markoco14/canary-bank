<?php

function editStudentSignUpInfo($conn, $studentUid, $studentEmail, $studentPassword) {
    // die($studentUid . ' ' . $studentEmail . ' ' . $studentPassword);
    global $conn;
    $signup_student_query = "UPDATE `students` SET `studentsEmail`='$studentEmail',`studentsPassword`='$studentPassword' WHERE `studentsId`='$studentUid';";
    $signup_student_result = mysqli_query($conn, $signup_student_query);
    if(!$signup_student_result) {
        die("There is something wrong with your query.");
    }
    var_dump($signup_student_query);
    header("location: ../signup.php?error=success");
	exit();
}
