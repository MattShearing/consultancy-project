<html>
        <?php
            include 'header.php';
            $result = mysqli_query($con, "SELECT * FROM content");
        ?>
        <script language="javascript" type="text/javascript" src="assets/js/function.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="insert_params.php" method="POST">
                <p>
                    <label for="video_id">Video: </label>
                    <select id="video_id" name="video_id">
                    <?php while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    } ?>
                    </select>
                </p>
                <p onClick="addNew()">New Point</p>
                <div id="count" class="hidden">1</div>
                <div id="input_fields">
                    <p>
                        Point 1<br>
                        <label>Start: </label>
                        <input type="text" id="start1" name="start1">
                        <label>End: </label>
                        <input type="text" id="end1" name="end1">
                    </p>
                </div>
                <input type="submit">
            </form>
        </div>
    </body>
</html>