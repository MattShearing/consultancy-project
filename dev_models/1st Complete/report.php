<html>
        <?php
            include 'header.php';
            $report_id = $_GET["id"];
            $result = mysqli_query($con, "SELECT * FROM clicklog WHERE id=$report_id");
            while ($row = mysqli_fetch_array($result)) {
                $decrypt = base64_decode($row['timestamps']);
                $data = unserialize($decrypt);
                $url =  $row['title'];
                $user = $row['username'];
            }
            $result = mysqli_query($con, "SELECT title FROM content WHERE id=$url");
            while ($row = mysqli_fetch_array($result)) {
                $video =  $row['title'];
            }
            $content = '';
            foreach ($data as $key => $var) {
                $content .= 'Click ' . $key . ': ' . $var . '<br>';
            }
        ?>
    </head>
    <body>
        <div class="container">
            <p><?php echo $user; ?> Results for <?php echo $video; ?></p>
            <p><?php echo $content ; ?></p>
        </div>
    </body>
</html>

<?php

// //$array1;
// $array2 = $data;

// foreach ($array1 as $key => $value1) {
//     foreach ($array2 as $key => $value2) {
//     //value2 = clicktime
//     // value1[0] = start
//     //value1[1] = end
//         if ($key = 'times') { 
//             if ($value2 > $value1[0] AND $value2 < $value1[1] AND !isset($correct)) {
//                 $correct = 'yes';
//             } else {
//                 $correct = 'false';
//             }
//         }
//     }
// }

?>