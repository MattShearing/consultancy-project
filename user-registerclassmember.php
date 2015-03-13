<?php
include 'dbconnect.php';

$course = $_POST['class'];
$new_student = $_POST['studentid'];

$sql = "SELECT * FROM class WHERE course = '".$course."';"; 

$result = mysqli_query($con, $sql); 

while ($row = mysqli_fetch_array($result)) {
    $student = $row['studentid'];
    if(isset($student) && $student <> '') {
    	$student = unserialize(base64_decode($student));
    }
    $student[] = $new_student;
	echo '<pre>'; print_r($student) ; echo'</pre>'; exit; 
    $student = base64_encode(serialize($student));
}

$sql = "UPDATE class SET studentid = '$student' WHERE course = '$course';";  
	if (mysqli_query($con, $sql)) {
		echo "New record created succesfully";
	} else {
		echo "Error: " . mysqli_error($con);
	}
	echo '<a href="myaccount.php">Back to Account</a>'
?>