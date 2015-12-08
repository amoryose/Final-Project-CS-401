<!DOCTYPE html>

<?php
session_start();

?>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Thank You</title>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <style>
            .jumbotron
            {
                background-color:#ffdfca;
            }
            p
            {
                font-size: 18px;
            }
            a{
                color: green;
            }
        </style>
    </head>
    <body style="background-color:#ffdfca">
        <div class="row"><!---HEADER ROW 1--->
                <div class="col-xs-12">
                  <?php
                  include_once 'Header.php';
                  ?>  
                </div>
        </div> 
        
        <div class="container-fluid">
            <div class="col-cs-3"></div>
                <div class="jumbotron">
                    <h2>Thank you 
                            <?php
                                echo " " .$_SESSION['firstname']. " " .$_SESSION['lastname'];
                            ?>
                        for submitting your appeal. We will get back to you shortly after careful review.
                    </h2>
                    <br>
                    <p>
                        <a href="LogedInBackUp.php">
                            Click here to go back to the home page
                        </a>
                    </P>
                </div>
        
                <div class="row"><!---footer row--->
                    <div class="col-xs-12">
                        <?php
                            include_once 'Footer.php';
                        ?>  
                    </div>                
                </div><!---end of footer row--->
                
        </div><!---end of container-fluid--->
    </body>
</html>
