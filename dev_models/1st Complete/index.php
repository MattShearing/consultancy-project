<html>

<?php
    require_once('header.php');
    //$user = '';
?>

    <title>Home</title>
</head>


   
    <body>
        <div class="container">
            <?php

               if (isset($user)) {?>
                    <ul>
                       <li><a href="listings.php">Videos</a></li>
                       <li><a href="#">Reports</a></li>
                       <li><a href="#">Upload</a></li>
                    </ul> <?php
                }   

                else { ?>
                    
                    <form action="user-login.php" method="POST">
   
                            <div class="login-box">
                                <div>
                                <p>Username:</p>
                                <p><input type="text" name="username" id="username" /></p>
                
                                <p>Password:</p>
                                <p><input type="password" name="password" id="password" /></p>
                
                            </div>
        
                        <p><input name="submit" type="submit" value="Submit"/></p>
    
                        </div>

                    </form>
                <?php } ?>
            
        </div>
    </body>
</html>