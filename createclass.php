<html>

<?php
    include 'header.php';
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
	                    <span class="error">Required field</span><br>
	                    <input type="text" name="tutor" id="tutor" required placeholder="Tutor"></p>

	                </div>

	            <p><input type="submit" value="Submit"/></p>

	            </div>

	        </form>
            
        </div>
    </body>
</html>