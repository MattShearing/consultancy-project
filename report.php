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
            $point=array();
            for ($i=1; $i <= $click_points; $i++) {
                $i = $i.'';
                foreach ($percentage as $item) {
                    if (strpos($item, $i) !== false) {
                        $point[$i][] = $item;
                    }
                }
                if (isset($point[$i]) && $point[$i] <> '') {
                    $point[$i] = count($point[$i]);
                    if ($point[$i] >= 5) {
                        $point[$i] = 5;
                    }
                }
                $i = (int)$i;
            }
            $marks = array_sum($point);
            $available = $click_points * 5;
            $total_percent = number_format($marks / $available * 100, 2);
        ?>
    </head>
    <body>
        <div class="container">
            <p><?php echo $username; ?>'s Results for <?php echo $video; ?></p>
            <?php
                if ($_SESSION['level'] == '1' OR $_SESSION['level'] == '2') {
            ?>
                <p>Total Clicks: <?php echo $key; ?></p>
                <p>Correct Clicks: <?php echo $percentage_count; ?></p>
                <p>Percentage of clicks correct: <?php echo $percent_amount; ?>%</p>
                <p>Click Points: <?php echo $click_points; ?></p>
                <p>Points Identified Correctly: <?php echo $correct_points;?></p>
                <p>Percentage Points: <?php echo $percentage_points;?>%</p>
                <p>Average time between clicks: <?php echo $difference; ?>s</p>
            <?php
                }
            ?>
            <p>Marks: <?php echo $marks; ?> / <?php echo $available; ?></p>
            <p>Final Score <?php echo $total_percent; ?>%</p>
            <table>
                <?php echo $content;?>
            </table>
        </div>
    </body>
</html>