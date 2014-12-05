<?php 

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
       . gmdate( ':i:s', $seconds, )
       . ($milliseconds ? ".$milliseconds" : '')
  ;
}

	foreach ($_POST as $posted)  {
		$data[] = formatSeconds( $posted);

	}

//print array and display array in a formatted structure 	
	echo '<pre>';
	print_r($data);
	echo '</pre>';

	$string = serialize($data);
	echo "Serialized: " . $string . "<br>";
	$string = base64_encode($string);
	echo "Encoded: " . $string . "<br>";
	$decrypt = base64_decode($string);
	echo "Decoded: " . $decrypt . "<br>";
	$decrypt = unserialize($decrypt);
	echo "Unserialized: ";
	echo '<pre>';
	print_r($decrypt);
	echo '</pre>';

	//need connection to database
	
	//$host = "localhost";
	//$db = "uocvideo";
	//$user = "uocvideo";
	//$pass = "video99";

	//$con = mysql_pconnect($host, $user, $pass) or die(mysql_error());


	//need sql to insert data to table
	//$sql = insert into $tbl 
?>