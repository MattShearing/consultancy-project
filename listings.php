<?php
    include 'dbconnect.php';
    $result = mysqli_query($con, "SELECT * FROM content");
?>
<html>
    <head>
    </head>
    <body>
        <ul>
            <?php
                while ($row = mysqli_fetch_array($result)) {
                    $parts =  explode('=', $row['videourl']);
            ?>
                    <a href="video.php?v=<?php echo $parts[1]; ?>"><li><?php echo $row['title']; ?></li></a>
            <?php
                }
            ?>
        </ul>
    </body>
</html>