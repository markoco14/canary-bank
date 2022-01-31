<?php session_start();?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="login.php">Logout</a>
    <?php
        if (isset($_SESSION["studentuid"])) {
            // echo "<li><a href='teacher.php'>Home</a></li>";
            // echo "<li><a href='classes.php'>Classes</a></li>";
            // echo "<li><a href='students.php'>Students</a></li>";
            // echo "<li><a href='bank.php'>Bank</a></li>";
            // echo "<li><a href='#'>Admin</a></li>";
            echo "<li><a href='../includes/logout.inc.php'>Log out</a></li>";
        }
    ?>
    <h1>Welcome to your bank profile, <?php $_SESSION["studentname"] ?></h1>
    <p>Now you can show mommy and daddy how any tokens you have.</p>
</body>
</html>