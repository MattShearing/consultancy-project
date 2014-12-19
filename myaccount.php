<html>

<?php
    include 'header.php';
?>

    <title>My Account</title>
</head>


   
    <body>
        <div class="container">
            <ul>
                <!-- Adminstrator users can access all -->
                <li><a href="#">Create Class</a></li>

                <!-- Teachers users can access the below -->
                <li><a href="#">Upload Video</a></li>
                <li><a href="#">Edit Video Parameters</a></li>
                <li><a href="#">Register Class Members</a></li>
                <li><a href="register.php">Register Users</a></li>
                <li><a href="#">Update Users</a></li>

                <!-- Users can access all -->
                <li><a href="#">Change Password</a></li>
            </ul>
        </div>
    </body>
</html>