<?php
include 'dbconnect.php';

//create array based on the data posted from previous page (clicks submitted) 
$data = array();

//run a loop to pull out the times 
	foreach ($_POST as $key => $posted)  {
		if ($key == 'password') {
			$password = md5($posted);
		} else {
			if ($key != 'cfmpassword') {
				$data[] = $posted;
			}
		}
	}

	$sql = "INSERT INTO users (fname, sname, studentid, permission, username, password) VALUES (";
		foreach ($data as $var) {
		$sql .= "'".$var."', ";
	}
	$sql .= "'".$password."')";


	if (mysqli_query($con, $sql)) {
		echo "New record created succesfully";
	} else {
		echo "Error: " . mysqli_error($con);
	}
	echo '<a href="myaccount.php">Back to Account</a>'
?>