<html>

<?php
    include 'header.php';
    $result = mysqli_query($con, "SELECT * FROM users WHERE permission = 2");
?>

    <title>Home</title>
</head>

<body>
        <div class="container">
                    
	        <form name="user-register" id="user-register" action="user-registerclass.php" method="POST">

	            <div class="register-box">
	                
	                <div>
	                    <p><label for="course">Course:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="course" id="course" required placeholder="Course"></p>

	                    <p><label for="tutor">Tutor:</label>
						<select name="tutor" id="tutor">
						<?php while ($row = mysqli_fetch_array($result)) {
                        	echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
                    	} ?>
						</select>

	                </div>

	            <p><input type="submit" value="Create"/></p>

	            </div>

	        </form>
            
        </div>
    </body>
</html>