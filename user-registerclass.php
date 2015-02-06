<?php
include 'dbconnect.php';

//create array based on the data posted from previous page (clicks submitted) 

	$sql = "INSERT INTO class (course, tutor) VALUES (";
		foreach ($_POST as $var) {
		$sql .= "'".$var."', ";
	}
	$sql = substr($sql, 0, -2);
	$sql .= ")";

	if (mysqli_query($con, $sql)) {
		echo "New record created succesfully";
	} else {
		echo "Error: " . mysqli_error($con);
	}
	echo '<a href="myaccount.php">Back to Account</a>'
?>