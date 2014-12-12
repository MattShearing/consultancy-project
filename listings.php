<html>

<?php
    include 'header.php';
    $result = mysqli_query($con, "SELECT * FROM content");
?>

    <title>Home</title>
</head>


   
    <body>
        <div class="container">
            <ul>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $url =  $row['id'];
                        echo '<a href="video.php?v='. $url . '"><li>'. $row['title'] . '</li></a>';
                    }
                ?>  
            </ul>
        </div>
    </body>
</html>

