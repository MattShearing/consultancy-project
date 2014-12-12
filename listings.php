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
                    $url =  $row['id'];
                    echo '<a href="video.php?v='. $url . '"><li>'. $row['title'] . '</li></a>';
                }
            ?>
        </ul>
    </body>
</html>