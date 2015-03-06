<html>

<?php
    require_once('header.php');
    include 'dbconnect.php';

    $username = $_GET["user"];
    $result = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
   
?>

    <title>Home</title>
</head>

<body>
        <div class="container">
                    
	        <form name="user-update" id="user-update" action="user-update.php" method="POST">

	            <div class="update-box">
	            
	            <form>    
	                <table>
	                	<tr>
	                		<td></td>
	                		<td><h2>Current Details</h2></td>
	                		<td><h2>New Details</h2></td>
	                	</tr>
						
						<?php while ($row =mysqli_fetch_array($result)) {?>
	                	
	                	<tr>
	                		<td>Username</td>
	                		<td><?php echo $row ['username']; ?></td>
	                		<td><input type="text" name="username" id="username" value="<?php echo $row ['username']; ?>"></td>
	                	</tr>

	                	<tr>
	                		<td>Password</td>
	                		<td>**********</td>
	                		<input type="hidden" name="old_password" id="old_password" value="<?php echo $row ['password']; ?>">
	                		<td><input type="password" name="password" id="password" value=""></td>
	                	</tr>  

	       				<tr>
	                		<td>First Name</td>
	                		<td><?php echo $row ['fname']; ?></td>
	                		<td><input type="text" name="fname" id="fname" value="<?php echo $row ['fname']; ?>"></td>
	                	</tr>         	 

	                	<tr>
	                		<td>Surname</td>
	                		<td><?php echo $row ['sname']; ?></td>
	                		<td><input type="text" name="sname" id="sname" value="<?php echo $row ['sname']; ?>"></td>
	                	</tr> 

	                	<tr>
	                		<td>Student ID</td>
	                		<td><?php echo $row ['studentid']; ?></td>
	                		<td><input type="text" name="studentid" id="studentid" value="<?php echo $row ['studentid']; ?>"></td>
	                	</tr>

	                	
	                   	<tr>
	                		<td>Permission</td>
	                		<td><?php echo $row ['permission']; ?></td>
	                		<?php if ($_SESSION['level'] == '1') {?>
	                			<td><input type="text" name="permission" id="permission" value="<?php echo $row ['permission']; ?>"></td>
	                		<?php } else { ?>
	                			<td><input type="text" readonly name="permission" id="permission" value="<?php echo $row ['permission']; ?>"></td>
	                		<?php } ?>
	                	</tr>
	                	<input type="hidden" name="entry_id" id="entry_id" value="<?php echo $row ['entry_id']; ?>">

	                	<?php } ?>
	                </table>

	            <p><input type="submit" value="Submit"/></p>

	            </form>

	            </div>

	        </form>
            
        </div>
    </body>
</html>