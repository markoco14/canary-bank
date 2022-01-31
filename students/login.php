<?php

include_once "students_header.php";

?>
<main>
    <nav>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </nav>
    <p>Hello World</p>
    <form action="includes/login_student.inc.php" method="post" class="form">
        <div class="control-group">
            <label class="form-label" for="studentid">
                Student ID
            </label>
            <input class="form-control" type="text" name="studentid" id="studentid">
        </div>
        <div class="control-group">
            <label class="form-label" for="password">
                Password
            </label>
            <input class="form-control" type="password" name="password" id="studentuid">
        </div>
        <div class="control-group">
            <button type="submit" name="login_student">
                LOG IN
            </button>
        </div>
    </form>
</main>