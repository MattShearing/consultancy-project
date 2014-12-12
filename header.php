<head>

<?php include 'dbconnect.php'; ?>

<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

<?php
if (isset($_GET['logout'])) {
	$log = logout();
}
function logout(){
session_start();
session_destroy();
header('Location: index.php');
}
?>




<div class="nav">
	<div class="welcome">
		<a href="index.php">UOC Video Project</a>
	</div>
	
	<div class="account">
			<?php 
			session_start();
			if (isset($_SESSION['user']) && $_SESSION['user'] <> '') {
				$user = $_SESSION['user'];
				echo '<a href="#">Logged in as '.$user.'</a>';
				echo '<a href="?logout=true">Logout</a>';
			}
			else {
				if ($_GET['log']=='false') {
					echo 'something';
				} else {
					header('Location: index.php?log=false');
				}
			}
			
			?>
	</div>

</div>

