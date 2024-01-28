<?php
	$con = mysqli_connect("localhost","root","","spk");

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
?>