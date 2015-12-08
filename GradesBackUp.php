<!DOCTYPE html>

<?php

session_start();

echo '<link rel="stylesheet" href="css/styleGrade.css">';

    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)
            && $_SESSION['admin'] == FALSE);
    else 
    {
        header  ('Location: index.php');
    }
    
    require_once 'login.php';
    $connection = new mysqli($hn,$un,$pw,$db);
    
    if($connection->connect_error) die($connection->connect_error);
    
        $userID = $_SESSION['userID'];

           $viewGrades =  "SELECT userID, courseName, grade FROM Grades\n"
                        . " INNER JOIN Courses\n"
                        . " ON Courses.courseId = Grades.courseID\n"
                        . " WHERE userID = '$userID'";
           
        $result = $connection->query($viewGrades);
        
        $rows = $result->num_rows;
        
    if (isset($_POST['mailto']))
    {
        $email = "SELECT email FROM Users"
                . "WHERE username = '$username'";
        $result = $connection->query($email);
        $rows = $result->num_rows;
        
        for($j = 0; $j < $rows; ++$j)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);

            echo $row[0];
        }
    }
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Grades</title>
        <link rel="stylesheet" href="css/styleStudGrade.css">
        <link rel="stylesheet" href="css/styleStudLogedIn.css">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </head>
    
    <body style="background-color: #ffdfca">
        
        <div class="row"><!---row 1--->
            <div class="col-xs-12">
                <?php
                    include_once 'Header.php';
                ?>  
            </div>
        </div><!---end of row 1--->

        <div class="container-fluid">            
            
            <br>
            <div class="row"><!---row 2--->
                <div class="col-xs-4">
                    <div class="user"><!---styleStudGrades.css--->
                        <?php
                            if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
                            {
                                echo "<b>". $_SESSION['firstname']. " " .$_SESSION['lastname'];
                            } 
                            else 
                            {
                                header  ('Location: index.php');
                            }
                        ?>
                            <p>You are currently logged in</p>
                    </div><!---end of user div--->
                </div>
                
                <div class="col-xs-3"></div>
                
                <!---<div class="row"><!---row 2.1*********************************--->
                    <div class="col-xs-5"><!---tabs--->                
                        <div class="tabs"><!---styleStudGrades.css--->
                            <ul class="nav nav-pills tabs">                        
                                <li>
                                    <a href="http://library.neiu.edu/">
                                        <img src="images/library.png">
                                            <br>
                                                <div class="smallLable"><!---styleStudLogedIn--->
                                                    Library
                                                </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="GradeAppealBackUp.php">
                                        <img src="images/scale.png">
                                            <br>
                                                <div class="smallLable">
                                                    Appeal
                                                </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:">
                                        <img src="images/email5.png">
                                            <br>
                                                <div class="smallLable">
                                                    Email
                                                </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="Logout.php?logout">
                                        <img src="images/logout.png" style="
                                                    padding-right: 0px;
                                                    padding-left:  0px;
                                                    padding-top:   0px;
                                                    padding-bottom:0px;">
                                            <br>
                                                <div class="smallLable">
                                                    Logout
                                                </div>
                                    </a>
                                </li>
                            </ul>  
                        </div><!---end of class tabs--->
                    </div><!---end of tabs--->
            </div><!---end of row 2--->
            
            <div class="row"><!---row 3--->
                <div class="col-xs-10"></div>
                <div class="col-xs-2">
            
                    <span id="date_txt" class="uportal-text-small">
                        <script language="JavaScript1.2">
                            var months=new Array(13);
                              months[1]='January';
                              months[2]='February';
                              months[3]='March';
                              months[4]='April';
                              months[5]='May';
                              months[6]='June';
                              months[7]='July';
                              months[8]='August';
                              months[9]='September';
                              months[10]='October';
                              months[11]='November';
                              months[12]='December';
                            var time=new Date();
                            var lmonth=months[time.getMonth() + 1];
                            var date=time.getDate();
                            var year=time.getFullYear();
                            document.write(lmonth + ' ');
                            document.write(date + ', ' + year);
                        </script>   
                    </span> 
                </div>
            </div><!---end of row 3--->
            
            <div class="row"><!---row 4--->
                
                <div class="col-xs-2">
                    <br><br><br>
                    <div class="sideNav">
                        <br><br>
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="LogedInBackUp.php">Home Page</a></li>
                            <li><a href="http://www.neiu.edu/">NEIU</a></li>                        
                            <li><a href="LeadsCapture.php">Leads Capture</a></li>
                            <li><a href="UnderConstruction">Attendance</a></li>
                            <li><a href="UnderConstruction.php">Financial Aid</a></li>
                            <li><a href="UnderConstruction.php">Registration</a></li>
                            <li><a href="UnderConstruction.php">Advising</a></li>
                        </ul>
                    </div><!---end of sideNav div--->
                </div>
                
                <div class="col-xs-6">
        
                    <table class="table table-hover">
            
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Grade</th>
                            </tr>            
                            </thead>            
                    <?php
                        for($j = 0; $j < $rows; ++$j)
                        {
                            $result->data_seek($j);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            echo "<tr>";
                            echo "<td>"   .$row[1] . "</td><td>" . $row[2] . "</td>";
                            echo "<br>";
                            echo "</tr>";
                        }
                    ?>           
            
                    </table> 
                </div>
            </div><!---end of row 4--->

            <div class="row"><!---footer row--->
            
                <div class="col-xs-12">
                    <?php
                        include_once 'Footer.php';
                    ?>  
                </div>                
            </div><!---end of footer row--->
        
        </div><!---end of container-fluid div--->
        
    </body>
</html>