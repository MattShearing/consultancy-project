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
            $result = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
            while ($row = mysqli_fetch_array($result)) {
                $username = ucWords($row['fname'] .' '. $row['sname']);
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
                $data[$key] = $var;
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
                $content .= '"><td>Click ' . ++$key . '</td><td>' . $var . '</td></tr>';
            }
            $percentage_count = count($percentage);
            $percent_amount = number_format($percentage_count / $key * 100, 2);
            foreach ($percentage as $percentkey => $percentvalue) {
                $newkey = filter_var($percentvalue, FILTER_SANITIZE_NUMBER_INT);
                $correct[$newkey] = $percentvalue;
            }
            $click_points = count($params)/2;
            $correct_points = count($correct);
            $percentage_points = number_format($correct_points / $click_points * 100, 2);
            $difference = number_format((end($data) - $data[1])/(count($data)-1), 2);
        ?>
    </head>
    <body>
        <div class="container">
            <p><?php echo $username; ?>'s Results for <?php echo $video; ?></p>
            <p>Total Clicks: <?php echo $key; ?></p>
            <p>Correct Clicks: <?php echo $percentage_count; ?></p>
            <p>Percentage of clicks correct: <?php echo $percent_amount; ?>%</p>
            <p>Click Points: <?php echo $click_points; ?></p>
            <p>Points Identified Correctly: <?php echo $correct_points;?></p>
            <p>Percentage Points: <?php echo $percentage_points;?>%</p>
            <p>Average time between clicks: <?php echo $difference; ?>s</p>
            <table>
                <?php echo $content;?>
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