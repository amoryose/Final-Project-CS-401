<!DOCTYPE html>
<!---STUDENT LOGGED IN--->
<?php

session_start();

if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true) 
            && $_SESSION['admin'] == true) 
        header  ('Location: index.php'); 
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Logged In</title>
        <link rel="stylesheet" href="css/styleStudLogedIn.css">        
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/styleStudGrade.css">        
        
    </head>
    <body style="background-color:#ffdfca">  
        
        <div class="row"><!---row 1--->
            <div class="col-xs-12">
                <?php
                    include_once 'Header.php';
                ?>  
            </div>
        </div><!---end of row 1--->
        
        <div class="container-fluid">            
            
            <?php
                include_once 'LoginTabs.php'; // row 2
            ?>

            <div class="row"><!---row 3--->
                <div class="col-xs-1">
                    
                    <div class="sideNav"><!---styleStudGrade.css--->
                        <br><br><br><br><br>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="UnderConstruction.php">Attendance</a></li>
                            <li><a href="UnderConstruction.php">Financial Aid</a></li>
                            <li><a href="UnderConstruction.php">Registration</a></li>
                            <li><a href="UnderConstruction.php">Advising</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-xs-3"></div>
            
                <div class="col-xs-3">
            
                <div id="selectionBox">     
                    <br>
                        <ul class="a">    
                            <li>
                                <a href="GradesBackUp.php">Grades
                                    <p>View your grades<br><br></p>
                                </a>
                            </li>
                            <li>
                                <a href="LeadsCapture.php">Leads Capture
                                    <p> View list of available programs
                                        <br><br>
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.neiu.edu/">NEIU
                                    <p>NEIU Home page
                                    </P>
                                </a>
                            </li>
                        </ul>

                </div><!---end selectionBox div--->
                </div><!---end col div--->
            </div><!---row 3--->
        
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