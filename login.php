<?php
	echo "Sent information:";
	echo "<br>Name: ". $_POST['Name'];
	echo "<br>Password hash: ".password_hash($_POST['Password'], PASSWORD_DEFAULT);
	$logged_in = True;
	$user = $_POST['Name'];
?>