<?php

include_once 'connection.php';

if (!$_POST['name'] || !$_POST['email'] || !$_POST['message']) {
	echo 'blank_field';
} else {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$sql = "INSERT INTO guestbook (name, email, message, posted) VALUES(?, ?, ?, NOW())";
	$query = $handler->prepare($sql);

	$result = $query->execute(array($name, $email, $message));

	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
}