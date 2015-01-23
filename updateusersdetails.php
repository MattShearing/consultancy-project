<html>

<?php
    require_once('header.php');
    include 'dbconnect.php';

    $sql = "SELECT * FROM "; 

?>

    <title>Home</title>
</head>

<body>
        <div class="container">
                    
	        <form name="user-update" id="user-update" action="user-update.php" method="POST">

	            <div class="update-box">
	                
	                <div class="current-details">

	                	<h1>Current Details</h1>

	                    <p><label for="username">Username:</label>
	                    <input type="text" name="username" id="username" required placeholder="Username"></p>
	    
	                    <p><label for="password">Password:</label>
	                    <input type="password" name="password" id="password" required placeholder="Password"></p>

	                    <p><label for="fname">First Name:</label>
	                    <input type="text" name="fname" id="fname" required placeholder="First Name"></p>

	                    <p><label for="sname">Last Name:</label>
	                    <input type="text" name="sname" id="sname" required placeholder="Surname"></p>

	                    <p><label for="studentid">Student ID:</label>
	                    <input type="text" name="studentid" id="studentid" required placeholder="Student ID"></p>

	                    <!-- If is site admin permsission level visible, otherwise set default to 3(student) -->
	                    <?php //echo $_SESSION['level'];exit; ?>
	                    <?php if ($_SESSION['level'] == '1') {?>
	                    	<p><label for="permission">Permission:</label>
	                    	<input type="text" name="permission" id="permission" required placeholder="Permission Level"></p>
	                    <?php } else { ?>
	                    	<input type="hidden" name="permission" id="permission" value="3" />
	                    <?php } ?>
	                </div>

	                <div class="new-details">
	                    
	                <h1>New Details</h1>

	                    <p><label for="username">Username:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="username" id="username" required placeholder="Username"></p>
	    
	                    <p><label for="password">Password:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="password" name="password" id="password" required placeholder="Password"></p>

	                    <p><label for="fname">First Name:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="fname" id="fname" required placeholder="First Name"></p>

	                    <p><label for="sname">Last Name:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="sname" id="sname" required placeholder="Surname"></p>

	                    <p><label for="studentid">Student ID:</label>
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="studentid" id="studentid" required placeholder="Student ID"></p>

	                    <!-- If is site admin permsission level visible, otherwise set default to 3(student) -->
	                    <?php //echo $_SESSION['level'];exit; ?>
	                    <?php if ($_SESSION['level'] == '1') {?>
	                    	<p><label for="permission">Permission:</label>
	                    	<span class="error">Required field</span><br>
	                    	<input type="text" name="permission" id="permission" required placeholder="Permission Level"></p>
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