<?php
	include 'dbconnect.php';

	//create array based on the data posted from previous page (clicks submitted) 
	$data = array();

	//run a loop to pull out the times 
	foreach ($_POST as $key => $posted)  {
		if ($key == 'current_password') {
			$old_password = md5($posted);
		} else {
			if ($key == 'new_password') {
				$new_password = md5($posted);
			}
		}
	}

	session_start();
	$user = $_SESSION['user'];
	$sql = "UPDATE users SET ";
	$sql .= "password='".$new_password."'";
	$sql .= " WHERE username='".$user."' AND password ='".$old_password."';";


	if (mysqli_query($con, $sql)) {
		echo "Password updated succesfully";
	} else {
		echo "Error: " . mysqli_error($con);
	}
	echo '</br><a href="myaccount.php">Back to Account</a>'
?>