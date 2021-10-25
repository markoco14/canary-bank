<?php

//check for empty inputs
function emptyInputSignup($sid, $email, $pwd, $pwdRepeat) {
	$result;
	if (empty($sid) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

//check for invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

