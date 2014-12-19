<html>

<?php
    require_once('header.php');
    //$user = '';
?>

    <title>Home</title>
</head>

<body>
        <div class="container">
                    
	        <form action="user-register.php" method="POST">

	            <div class="register-box">
	                
	                <div>
	                    <p><label for="username">Username:</label><input type="text" name="username" id="username" /></p>
	    
	                    <p><label for="password">Password:</label><input type="password" name="password" id="password" /></p>

	                    <p><label for="fname">First Name:</label><input type="text" name="fname" id="fname" /></p>

	                    <p><label for="sname">Last Name:</label><input type="text" name="sname" id="sname" /></p>

	                    <p><label for="studentid">Student ID:</label><input type="text" name="studentid" id="studentid" /></p>

	                    <!-- If is site admin permsission level visible, otherwise set default to 3(student) -->
	                    <?php //echo $_SESSION['level'];exit; ?>
	                    <?php if ($_SESSION['level'] == '1') {?>
	                    	<p><label for="permission">Permission:</label><input type="text" name="permission" id="permission" /></p>
	                    <?php } else { ?>
	                    	<input type="hidden" name="permission" id="permission" value="3" />
	                    <?php } ?>
	                </div>

	            <p><input type="submit" value="Submit"/></p>

	            </div>

	        </form>
            
        </div>
    </body>
</html>