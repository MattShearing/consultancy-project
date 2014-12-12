<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body>
        <?php $url = $_GET["v"]; ?>
        <!-- <video width="320" height="240" controls>
            <source src="movie.mp4" type="video/mp4">
        </video> -->
        <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        <iframe id="player" height="390" width="640" src="<?php echo $url;?>?enablejsapi=1&origin=http://uocvideo.sytes.net"></iframe>        
        <button onClick="setTime()">Click</button>
        <form method="POST" action="submit.php">
            <input type="text" id="url" name="url" style="display:none;" value="<?php echo $url; ?>">
            <p id="display_time"></p>
            <input type="submit" id="submit">
        </form>  
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