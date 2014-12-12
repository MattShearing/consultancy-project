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
                    if (strpos($row['videourl'], 'assets') !== false) {
                        $url =  $row['videourl'];
                    } else {
                        $parts =  explode('=', $row['videourl']);
                        $url = 'http://www.youtube.com/embed/' . $parts[1];
                    }
            ?>
                    <a href="video.php?v=<?php echo $url; ?>"><li><?php echo $row['title']; ?></li></a>
            <?php
                }
            ?>
        </ul>
    </body>
</html>