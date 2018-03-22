<?php 
	
	$dbhost = 'ec2-50-19-88-36.compute-1.amazonaws.com';
	$dbuser = 'xpigpcxaxfdfwh';
	$dbpass = '41219beab15ee40a8862f19f1722c473128935f04b7c9daa41290440d6ca8b48';
	$dbname = 'dcu7j31bguguik';
	$dbport = 5432;

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass, $dbname,$dbport);

	if (mysqli_connect_errno()) {
		die('Database connection failed'.mysqli_connect_error());
	}
 ?>
