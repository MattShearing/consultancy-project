<?php 

//create array based on the data posted from previous page (clicks submitted) 
$data = array();

	foreach ($_POST as $posted)  {
		$data[] = number_format($posted,2);
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