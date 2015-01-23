<html>

<?php
    include 'header.php';
    $result = mysqli_query($con, "SELECT * FROM content");
?>

    <title>Videos</title>
</head>


   
    <body>
        <div class="container">

            <?php
                $clicks = mysqli_query($con, "SELECT * FROM clicklog");
                while ($row = mysqli_fetch_array($clicks)) {
                    $video[$row['title']] = $row['id'];
                }
            ?>


            <ul>
                <?php
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $url =  $row['id'];
                        if (isset($video[$count])) {
                            echo '<a href="report.php?id='. $video[$count] . '"><li>'. $row['title'] . '</li></a>';
                        } else {
                            echo '<a href="video.php?v='. $url . '"><li>'. $row['title'] . '</li></a>';
                        }
                        $count++;
                    }
                ?>  
            </ul>
        </div>
    </body>
</html>

