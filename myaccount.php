<html>

<?php
    include 'header.php';
?>

    <title>My Account</title>
</head>


   
    <body>
        <div class="container">
            <?php
                $vid_id = $_GET["param"];
                if ($vid_id == "success") {
                    echo "<p>Parameters have been added successfully.</p>";
                }
            ?>
            <ul>

            <?php if ($_SESSION['level'] == '1') { ?>

                <!-- Adminstrator users can access all -->
                <li><a href="createclass.php">Create Class</a></li>
                <?php }

                if ($_SESSION['level'] == '1' OR $_SESSION['level'] == '2') { ?>


                <!-- Teachers users can access the below -->
                <li><a href="uploadvideo.php">Upload Video</a></li>
                <li><a href="parameters.php">Edit Video Parameters</a></li>
                <li><a href="register.php">Register Users</a></li>
                <li><a href="registerclassmember.php">Register Class Members</a></li>
                <li><a href="updateusers.php">Update Users</a></li>

                <?php } ?>

                <!-- Users can access all -->
                <li><a href="changepassword.php">Change Password</a></li>
            </ul>
        </div>
    </body>
</html>