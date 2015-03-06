<?php
include 'dbconnect.php';

//create array based on the data posted from previous page (clicks submitted) 
$data = array();

//run a loop to pull out the times 
	foreach ($_POST as $key => $posted)  {
		if ($key == 'old_password') {
			$password = md5($posted);
		} else {
			if ($key == 'password' && isset($posted) && $posted <> '') {
				$password = md5($posted);
			} else {
				if ($key == 'entry_id') {
					$entry_id = $posted;
				} else {
					$data[$key] = $posted;
				}
			}
		}
	}

	$sql = "UPDATE users SET ";
		foreach ($data as $key => $var) {
		$sql .= $key."='".$var."', ";
	}
	$sql .= "password='".$password."' ";
	$sql .= "WHERE entry_id='".$entry_id."';";

	if (mysqli_query($con, $sql)) {
		echo "User succesfully updated";
	} else {
		echo "Error: " . mysqli_error($con);
	}
	echo '<br><a href="myaccount.php">Back to Account</a>'
?>