<?php 

// create parent login here

//my guess is that I won't need the functions
//but I will need to require_once dbh.inc.php
//and I won't need to use $POST
//but instead I'll need $GET or $RECEIVE or $PULL
//because I'm not pushing data into the database
//I'm just checking if the data exists and matches
//but the method in the index log in page says
//method='post'
//so I realy don't know

//in the end I needed both dbh and functions files
require_once '../dbh.inc.php';
require_once '../functions.inc.php';


//uses post not get
if (isset($_POST["student-log-in"])) {

    $username = $_POST["student-user-id"];
    $pwd = $_POST["student-pwd"];

    //now we need to check for errors
    //just like the sign up page

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    //call the log in user function
    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../index.php");
        exit();
}
