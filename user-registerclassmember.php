<?php
include 'dbconnect.php';

$course = $_POST['class'];
$new_student = $_POST['studentid'];

$sql = "SELECT * FROM class WHERE course = '".$course."';"; 

$result = mysqli_query($con, $sql); 

while ($row = mysqli_fetch_array($result)) {
    $student = $row['studentid'];
}

if(isset($student) && $student <> '') {
	$student = base64_decode($student);
	$student = unserialize($student);
}

if(isset($student) && $student <> '') {
	if(in_array($new_student, $student)) {
		echo 'The student is already a member of this class.<br>';
	} else {
		$student[] = $new_student;
	}
} else {
	$student[] = $new_student;
}

echo '<pre>';
print_r($student);
echo '</pre>';

$student = serialize($student);
$student = base64_encode($student);

$sql = "UPDATE class SET studentid = '$student' WHERE course = '$course';"; 
	if (mysqli_query($con, $sql)) {
		echo "New record created succesfully<br>";
	} else {
		echo "Error: " . mysqli_error($con).'<br>';
	}
	echo '<a href="myaccount.php">Back to Account</a>'
?>