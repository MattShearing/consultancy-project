<html>

<?php
    require_once('header.php');
    include 'dbconnect.php';

	$sql = "SELECT * FROM users"; 

	$result = mysqli_query($con, $sql);

?>

    <title>Home</title>
</head>

<body>
        <div class="container">
        	
        	<table>         
        		<tr>
        			<td><h2>Username</h2></td>
        			<td><h2>First Name</h2></td>
        			<td><h2>Surname</h2></td>
        			<td><h2>Student ID</h2></td>
        			<?php if ($_SESSION['level'] == '1') {?>
	                    	<td><h2>Permission<h2></td>
	                    <?php } else { ?>
	                    	<input type="hidden" name="permission" id="permission" value="3" />
	                    <?php } ?>
        		</tr>
	    		<?php 

	    			while ($row =mysqli_fetch_array($result)) { ?>
	    			<tr>
	    				<td><a href="updateusersdetails.php"><?php echo $row ['username']; ?></a></td>
	    				<td><?php echo $row ['fname']; ?></td>
	    				<td><?php echo $row ['sname']; ?></td>
	    				<td><?php if (isset($row ['studentid']) && $row ['studentid'] != '0') {
	    					echo $row ['studentid'];
	    					} ?></td>
	    				 <?php if ($_SESSION['level'] == '1') {?>
	                    	<td><?php echo $row ['permission']; ?></td>
	                    <?php } else { ?>
	                    	<input type="hidden" name="permission" id="permission" value="3" />
	                    <?php } ?>
	    				</tr> 



	    			<?php }	?>
			</table>
        </div>
    </body>
</html>