<html>
        <?php
            include 'header.php';
        ?>
    </head>
    <body>
        <div class="container">
            <form action="insert_params.php" method="POST">
                <input type="text" id="video_id" name="video_id">
                <input type="text" id="params" name="params">
                <input type="submit">
            </form>
        </div>
    </body>
</html>