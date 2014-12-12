<?php 
// connect to database
include_once('dbconnect.php');

$username=trim($_POST['username']);
$password=$_POST['password'];

$tbl_users = 'users';

?>

</head>

<?php

// create the sql query
$sql = "SELECT * FROM $tbl_users WHERE username='$username' AND password='$password'" ;



// create variable to store result from the loop

$result = mysqli_query($con, $sql); 
 
// do the loop
while ($row = mysqli_fetch_array($result)) {
	session_start();
	$_SESSION['user'] = $row['username'];
	//echo $_SESSION['user']; exit;
  } 

  //echo'hello';

header('Location: index.php'); 

?>