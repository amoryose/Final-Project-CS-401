<!DOCTYPE html>

<?php

session_start();

if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true) 
            && $_SESSION['admin'] == true);
    else 
    {
        header  ('Location: index.php');
    }
    
    require_once 'login.php';
    $connection = new mysqli($hn,$un,$pw,$db);    
    
    if(isset($_POST['submit']))
    {
        for($i = 0; $i < $_POST['totalGrades']; $i++){
            $parts = explode("|", $_POST['grade' .$i]);

            $newGrade = "UPDATE Grades SET grade = '" . $parts[1]
                    . "' WHERE gradeID = " .$parts[0];

        $result = $connection->query($newGrade);
        
        }
    }
    
    $username = "";
    $courseId = "";
    $grade = "";
    $courseName = "";
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
        
        <script src="validate_functions.js"></script>
        
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
            <?php
                include_once 'LoginTabs2.php';
            ?>
                                        
            <div class="row"><!---row 2--->
                    
                <div class="col-xs-2">
                    <br><br><br>
                    <div class="sideNav">
                        <br><br>
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="http://www.neiu.edu/">NEIU</a></li>
                            <li><a href="TeachLogedIn.php">Home Page</a></li>
                            <li><a href="TeachLCBackUp.php">Leads Capture</a></li>
                            <li><a href="UnderConstruction.php">Attendance</a></li>
                            <li><a href="UnderConstruction.php">Financial Aid</a></li>
                            <li><a href="UnderConstruction.php">Registration</a></li>
                            <li><a href="UnderConstruction.php">Advising</a></li>

                        </ul>
                    </div><!---end of sideNav--->
                </div><!---end of col xs-2--->
        
                <div class="col-xs-6">
                    
                    <form method= "post" action="<?php echo
                        htmlspecialchars($_SERVER["PHP_SELF"]);?>">                    
                    
                        <table class="table table-hover">
                            <br><br><br>
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Course</th>
                                    <th>Grade</th>
                                </tr>            
                            </thead>                            
            
                        <?php

                            $courseSct = "SELECT u.firstname, u.lastname, c.courseName, g.gradeID, g.grade "
                            . " FROM Grades g "
                            . " INNER JOIN Courses c ON c.courseID = g.courseID "
                            . " INNER JOIN Users u ON u.userID = g.userID "
                            . " WHERE c.professorID = " .$_SESSION['userID'];
                            $result = $connection->query($courseSct);
                            $rows = $result->num_rows;

                            for($j = 0; $j < $rows; ++$j)
                            {
                                $result->data_seek($j);
                                $row = $result->fetch_array(MYSQLI_NUM);

                                echo "<tr>" . 
                                        "<td>" . $row[0] . "</td>" .  //First Name
                                         "<td>" . $row[1] . "</td>" . //Last Name 
                                         "<td>" . $row[2] . "</td>" . //Course
                                         "<td>";            //Grade

                                        echo  '<select name="grade' . $j . '" size="1" id="' . $row[3] . '">';
                                        echo '<option value="select">Select</option>';
                                        $letterGrade = 'A';
                                        
                                        for($x = 0; $x < 6; $x++)
                                        {         
                                            echo '<option value="' . $row[3] . '|' . $letterGrade . '"';
                                            if($letterGrade == $row[4])
                                            {
                                                echo ' selected';
                                            }
                                            echo '>' . $letterGrade++ . '</option>';
                                        }
                                        
                                        echo '</select><br>'
                                             . "</td>" 
                                             . "</tr>"; 
                            }
                        ?>

                        </table> 
                
                        <input type="hidden" name="totalGrades" value="<?php echo $rows;?>">
                            <br>
                        <input type="submit" onclick="gradeConfirmation()" name="submit" value="Submit" class="btn">
                            <br>
                    </form>    
               
                </div><!---end of form col--->                    
            </div><!---end of row 2--->
                    
            <div class="row"><!---footer--->
                <div class="col-xs-12">
                    <?php
                        include_once 'Footer.php';
                    ?>  
                </div>
            </div><!---end of footer--->                    

        </div><!---end of container-fluid div--->
        
    </body>
    </html>