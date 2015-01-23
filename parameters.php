<html>
        <?php
            include 'header.php';
            $result = mysqli_query($con, "SELECT * FROM content");
        ?>
    </head>
    <body>
        <div class="container">
            <p><button onClick="addNew()">New Point</button></p>
            <form action="insert_params.php" method="POST">
                <p>
                    <label for="video_id">Video: </label>
                    <select id="video_id" name="video_id">
                    <?php while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    } ?>
                    </select>
                </p>
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