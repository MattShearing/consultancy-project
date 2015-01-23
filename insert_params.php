<?php

	include 'dbconnect.php';

	$data = array();

	foreach ($_POST as $key => $val) {
		if ($key == 'video_id') {
			$video = $val;
		} else {
			$data[$key] = $val;
		}
	}

	$data = serialize($data);
	$data = base64_encode($data);

	echo 'video_id: '.$video .'<br>';
	echo 'data: '.$data;

	//insert sql
	if (mysqli_query($con, "INSERT INTO parameters (video_id, params) VALUES ('$video', '$data')")) {
		echo "New record created succesfully";
		$result = mysqli_query($con, "SELECT * FROM parameters WHERE video_id='$video' AND params='$data'");
		while ($row = mysqli_fetch_array($result)) {
			$report = 'my_account.php?param=success';
			header('Location: '.$report);
		}
	} else {
		echo "Error: " . mysqli_error($con);
	}

?>