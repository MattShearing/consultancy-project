<?php

include 'dbconnect.php';

//create array based on the data posted from previous page (clicks submitted) 
$data = array();


// create function to format time
function formatSeconds( $seconds )
{
  $hours = 0;
  $milliseconds = str_replace( "0.", '', $seconds - floor( $seconds ) );

  if ( $seconds > 3600 )
  {
    $hours = floor( $seconds / 3600 );
  }
  $seconds = $seconds % 3600;


  return str_pad( $hours, 2, '0', STR_PAD_LEFT )
       . gmdate( ':i:s', $seconds )
       . ($milliseconds ? ".$milliseconds" : '')
  ;
}

//run a loop to pull out the times 
	foreach ($_POST as $key => $posted)  {
		if ($key == 'vid_id') {
			$vid_id = $posted;
		} else {
			$data[] = formatSeconds($posted);
		}
	}

//print array and display array in a formatted structure 	
	$string = serialize($data);
	$encoded = base64_encode($string);
	$decrypt = base64_decode($encoded);
	$decrypt = unserialize($decrypt);
	$username = 'Test';

	if (mysqli_query($con, "INSERT INTO clicklog (username, timestamps, title) VALUES ('$username', '$encoded', '$vid_id')")) {
		echo "New record created succesfully";
		$result = mysqli_query($con, "SELECT * FROM clicklog WHERE username='$username' AND title='$vid_id' AND timestamps='$encoded'");
		while ($row = mysqli_fetch_array($result)) {
			$report = 'report.php?id='.$row['id'];
			header('Location: '.$report);
		}
	} else {
		echo "Error: " . mysqli_error($con);
	}
?>