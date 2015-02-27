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
                       <li><a href="reportlistings.php">Reports</a></li>
                       <li><a href="myaccount.php">My Account</a></li>
                       <li><a href="/documentation">Documentation</a></li>
                    </ul> <?php
                }   

                else { ?>
                    
                    <form name="user-login" id="user-login" action="user-login.php" method="POST">
   
                        <div class="login-box">
                            
                            <div>
                                <p><label for="username">Username:</label>
                                <span class="error">Required field</span><br>
                                <input type="text" name="username" id="username" required placeholder="Username"></p>
                                

                                <p<label for="password">Password:</label>
                                <span class="error">Required field</span><br>
                                <input type="password" name="password" id="password" required placeholder="Password"></p>
                
                            </div>
        
                        <p><input name="submit" type="submit" value="Submit"></p>
    
                        </div>

                    </form>

                <?php } ?>
            
        </div>
    </body>
</html>
