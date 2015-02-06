<html>
        <?php
            include 'header.php';
            $vid_id = $_GET["v"];
            $result = mysqli_query($con, "SELECT * FROM content WHERE id=$vid_id");
        ?>
    </head>
    <body>
    <div class="container">
        <!-- <video width="320" height="240" controls>
            <source src="movie.mp4" type="video/mp4">
        </video> -->
        <?php while ($row = mysqli_fetch_array($result)) {
                if (strpos($row['videourl'], 'assets') !== false) {
                $url =  $row['videourl'];
            } else {
                $parts =  explode('=', $row['videourl']);
                $url = 'http://www.youtube.com/embed/' . $parts[1];
            }
        } ?>
        <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        <iframe class="under" id="player" height="45%" width="100%" src="<?php echo $url;?>?enablejsapi=1&rel=0&controls=0&origin=http://uocvideo.sytes.net"></iframe>
        <span id="over" class="over" onClick="setTime()">&nbsp;</span>
        <p>Clicks Recorded: <span id="recorded">0</span></p>
        <form method="POST" action="submit.php">
            <input type="text" id="vid_id" name="vid_id" class="hidden" value="<?php echo $vid_id; ?>">
            <p id="display_time"></p>
            <input class="hidden" type="submit" id="submit">
        </form> 
    </div> 
        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }
            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }
            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            function onPlayerStateChange(event) {
                if (player.getPlayerState() == 0) {
                    submit();
                } 
            }
            function stopVideo() {
                player.stopVideo();
            }
            function setTime() {
                count = document.getElementById("recorded").innerHTML;
                count = +count + 1;
                document.getElementById("recorded").innerHTML = count;
                document.getElementById("over").style.cursor="progress";
                setTimeout(function(){document.getElementById("over").style.cursor="default"},500);
                timestamp = player.getCurrentTime();
                //if (timestamp - old_timestamp < 1second) {
                    //return false
                //} else { create input
                document.getElementById("display_time").innerHTML += "<input type='text' id='" + timestamp + "' name='" + timestamp + "' style='display:none;' value='" + timestamp + "'>";
            }
            function submit() {
                document.getElementById("submit").click();
            }
        </script>

    </body>
</html>