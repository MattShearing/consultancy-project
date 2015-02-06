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
            $result = mysqli_query($con, "SELECT * FROM parameters WHERE video_id=$url");
            while ($row = mysqli_fetch_array($result)) {
                $params = $row['params'];
            }
            $params = unserialize(base64_decode($params));
            $content = '';
            foreach ($data as $key => $var) {
                $success = '';
                $var = explode(":",$var);
                $hours = $var[0] * 60 * 60;
                $minutes = $var[1] * 60;
                $seconds = $var[2];
                $var = $hours + $minutes + $seconds;
                foreach ($params as $point => $value) {
                    if (strpos($point, 'start') !== false){
                        if ($var > $value) {
                            $within = "true";
                        } else {
                            $within = "false";
                        }
                    }
                    if (strpos($point, 'end') !== false){
                        if ($within == "true") {
                            if ($var < $value) {
                                $success = "true";
                                $percentage[] = $point . " Correct";
                            }
                        }
                    }
                }
                $content .= '<tr class="';
                if (isset($success) && $success=="true"){
                    $content .= $success;
                } else {
                    $content .= 'false';
                }
                $content .= '"><td>Click ' . $key . '</td><td>' . $var . '</td></tr>';
            }
        ?>
    </head>
    <body>
        <div class="container">
            <p><?php echo $user; ?>'s Results for <?php echo $video; ?></p>
            <table>
                <?php echo $content; ?>
            </table>
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