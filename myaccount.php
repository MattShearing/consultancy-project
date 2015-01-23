<html>

<?php
    include 'header.php';
?>

    <title>My Account</title>
</head>


   
    <body>
        <div class="container">
            <ul>

            <?php if ($_SESSION['level'] == '1') { ?>

                <!-- Adminstrator users can access all -->
                <li><a href="#">Create Class</a></li>
                <?php }

                if ($_SESSION['level'] == '1' OR $_SESSION['level'] == '2') { ?>


                <!-- Teachers users can access the below -->
                <li><a href="#">Upload Video</a></li>
                <li><a href="parameters.php">Edit Video Parameters</a></li>
                <li><a href="register.php">Register Users</a></li>
                <li><a href="#">Register Class Members</a></li>
                <li><a href="#">Update Users</a></li>

                <?php } ?>

                <!-- Users can access all -->
                <li><a href="#">Change Password</a></li>
            </ul>
        </div>
    </body>
</html>