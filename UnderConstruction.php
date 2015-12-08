<!DOCTYPE html>

<?php

session_start();

if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true) 
            && $_SESSION['admin'] == false)
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title></title>
    </head>
    <body style="background-color:#ffdfca">  
        
        <div class="row"><!---row 1--->
            <div class="col-xs-12">
                <?php
                    include_once 'Header.php';
                ?>  
            </div>
        </div><!---end of row 1--->
        <br>
        <h1>Under Construction</h1>
        <br>
        
        <?php
        if ($_SESSION['admin'] == FALSE)
        {
             echo '<a href="LogedInBackUp.php">Click here to go to home page</a>';

        }
        else
        {
            echo '<a href="TeachLogedIn.php">Click here to go to home page</a>';
        }
        ?>
    </body>
</html>
