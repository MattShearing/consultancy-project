<html>

<?php
    include 'header.php';
    $result = mysqli_query($con, "SELECT course FROM class");
    $result2 = mysqli_query($con, "SELECT * FROM users WHERE permission = 2");
    $result3 = mysqli_query($con, "SELECT * FROM users ");
?>

    <title>Register Class</title>
</head>

<body>
        <div class="container">
                    
	        <form name="user-register" id="user-register" action="user-registerclassmember.php" method="POST">

	            <div class="register-box">
	                
	                <div>
	                    <p><label for="class">Class:</label>
	                    <select name="class" id="class">
	                    	<?php while ($row = mysqli_fetch_array($result)) {
								// print_r($result); 
                        		echo '<option value="'.$row['course'].'">'.$row['course'].'</option>';
                    	    } ?>
	                    </select>
	                    </p>

	                    <p><label for="studentid">Student ID:</label>
	                    <select name="studentid" id="studentid">
							<?php while ($row = mysqli_fetch_array($result3)) {
								// print_r($result3); 
	                        	if (isset($row['studentid']) && $row['studentid'] <> '' ) { 
	                        		echo '<option value="'.$row['studentid'].'">'.$row['fname'].'&nbsp;'.$row['sname'].'&nbsp;'.'('.$row['studentid'].')</option>';
	                    		} 
	                    	}
							?>
						</select>
						</p>
	                </div>

	            <p><input type="submit" value="Submit"/></p>

	            </div>

	        </form>
            
        </div>
    </body>
</html>