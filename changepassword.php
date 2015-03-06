<html>

<?php
    include 'header.php';
?>

    <title>Home</title>
</head>

<body>
	<div class="container">
        <form name="user-password" id="user-password" action="user-password.php" method="POST">
            <div class="register-box">
                <div>
                	<p><label for="current_password">Current Password:</label>
                    <span class="error">Required field</span><br>
                    <input type="password" name="current_password" id="current_password" required placeholder="Current Password"></p>
                    <p><label for="new_password">New Password:</label>
                    <span class="error">Required field</span><br>
                    <input type="password" name="new_password" id="new_password" required placeholder="New Password"></p>
                    <p><label for="confirm_password">Confirm Password:</label>
                    <span class="error">Required field</span><br>
                    <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirm Password"></p>
                </div>
            <p><input type="submit" value="Submit"/></p>
            </div>
        </form>
    </div>
</body>

</html>