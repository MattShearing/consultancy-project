<html>

<?php
    require_once('header.php');
?>

    <title>Home</title>
</head>

<body>
        <div class="container">
                    
	        <form name="user-register" id="user-register" action="user-register.php" method="POST">

	            <div class="register-box">
	                
	                <div>
	                    <p><label for="fname">First Name:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="fname" id="fname" required placeholder="First Name"></p>

	                    <p><label for="sname">Last Name:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="sname" id="sname" required placeholder="Surname"></p>

	                    <p><label for="studentid">Student ID:</label>
	                    <input type="text" name="studentid" id="studentid" placeholder="Student ID"></p>

	                    <!-- If is site admin permsission level visible, otherwise set default to 3(student) -->
	                    <?php //echo $_SESSION['level'];exit; ?>
	                    <?php if ($_SESSION['level'] == '1') {?>
	                    	<p><label for="permission">Permission:</label>
	                    	<span class="error">Required field</span><br>
	                    	<input type="text" name="permission" id="permission" required placeholder="Permission Level"></p>
	                    <?php } else { ?>
	                    	<input type="hidden" name="permission" id="permission" value="3" />
	                    <?php } ?>
	                	
	                	<p><label for="username">Username:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="username" id="username" required placeholder="Username"></p>
	    
	                    <p><label for="password">Password:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="password" name="password" id="password" required placeholder="Password"></p>

	                    <p><label for="password">Confirm Password:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="password" name="cfmpassword" id="cfmpassword" required placeholder="Password"></p>

	                </div>

	            <p><input type="submit" value="Submit"/></p>

	            </div>

	        </form>
            
        </div>
    </body>
</html>