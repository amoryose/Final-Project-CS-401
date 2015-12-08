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
    if($connection->connect_error) die($connection->connect_error);
    
    $courseId="";
    $courseIdERR="";
    $courseName="";
    $courseNameERR="";
    $courseDesc="";
    
    if(isset($_POST['submit']))
    {
        $courseId = $_POST['courseId'];
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $newCourse = "INSERT INTO Courses (courseId, courseName, courseDesc)" .
                    "VALUES('$courseId', '$courseName', '$courseDesc')";
            if ($connection->query($newCourse) === TRUE)
            {                   
                echo '<script type="text/javascript">'; 
                echo 'alert("A new class has been added");';
                echo '</script>';
                        
                $courseId = "";
                $courseName = "";
                $courseDesc = "";
            }
            else 
            {
                echo "Error: " . $newCourse . "<br>" . $connection->error;
            }            
        }
    }
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Leads Capture</title>
        
        <link rel="stylesheet" href="css/styleNewUser.css">
        
        <link rel="stylesheet" href="css/styleStudGrade.css">
        
        <link rel="stylesheet" href="css/styleStudLogedIn.css">
                
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <script src="validate_functions.js"></script>
        <link rel="stylesheet" href="css/LeadsCapture.css">        
        
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
            
            <div class="row"><!---row 2--->
                <div class="col-xs-4">
                    <div class="user">
                        <?php
                            if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
                            {
                                echo "<br><b>". $_SESSION['firstname']. " " .$_SESSION['lastname'];
                            } 
                            else 
                            {
                                header  ('Location: index.php');
                            }
                        ?>
                        <p>You are currently logged in</p>
                    </div><!---end of user div--->
                </div>
                
                <div class="col-xs-4"></div>
                
                <div class="row"><!---row 2.1--->
                    <div class="col-xs-4"><!---tabs--->                
                    
                        <ul class="nav nav-pills">                        
                            <li>
                                <a href="http://library.neiu.edu/">
                                    <img src="images/library.png">
                                        <br>
                                            <div class="smallLable">
                                                Library
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
                                    <img src="images/logout.png">
                                        <br>
                                            <div class="smallLable">
                                                Logout
                                            </div>
                                </a>
                            </li>
                        </ul>                        
                    </div><!---end of tabs--->
                </div><!---end of row 2.1--->
            </div><!---end of row 2--->      
            
            <div class="row"><!---row 3--->
                <div class="col-xs-1">
                    <br><br>
                    <div class="sideNav"><!---styleStudGrade.css--->
                            <br><br>
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="LogedInBackUp.php">Home Page</a></li>
                            <li><a href="http://www.neiu.edu/">NEIU</a></li>                        
                            <li><a href="TeachGradeBackUp.php">Grades</a></li>
                            <li><a href="UnderConstruction">Attendance</a></li>
                            <li><a href="UnderConstruction.php">Financial Aid</a></li>
                            <li><a href="UnderConstruction.php">Registration</a></li>
                            <li><a href="UnderConstruction.php">Advising</a></li>

                        </ul>
                    </div>
                </div>
                
                <div class="col-xs-3"></div>
                
                <div class="col-xs-3">
                <br><br>
            
                    <form method= "post" action="<?php echo
                    htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                    onsubmit="newClassConfirmation()">

                        <div class="formheading">New Course</div>
                        <br>
                        <label>
                            <input type="text" name="courseId" placeholder ="Course ID" required
                                   value="<?php echo $courseId;?>">
                        </label>
                        <br><br>
                        <label>
                            <input type ="text" name="courseName" placeholder ="Course Name" required
                                   value="<?php echo $courseName;?>">
                        </label>
                        <br>
                        <label>
                        <br>
                            <textarea rows="6" cols="42" name="courseDesc" placeholder ="Course Description" required
                                      style="font-size:12px">
                            </textarea>          
                        </label>
                        <br>
                        <label>
                            <input type="submit" name="submit" value="Submit">
                        </label>
                    </form>
                
                </div><!---end of form col-xs-3--->
                
                <div class="col-xs-5">
                    <br>                        
                        <table><!---css/LeadsCapture.css--->
                            <caption>Demographics</caption>
                                <tr>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>18-29</th>
                                    <th>30-39</th>
                                    <th>40-49</th>
                                    <th>50-59</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE gender = 'm'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE gender = 'f'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE age>'17' AND age<'30'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE age>'29' AND age<'40'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE age>'39' AND age<'50'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $demog1829 = "SELECT COUNT(*) FROM Users WHERE age>'49' AND age<'60'";
                                            $bob=$connection->query($demog1829);
                                            $row = $bob->num_rows;

                                                for ($j=0; $j < $row; ++$j)
                                                {
                                                    $bob->data_seek($j);
                                                    $row = $bob->fetch_array(MYSQLI_NUM);
                                                    echo $row[0];
                                                }
                                        ?>
                                    </td>
                                </tr>
                        </table>                        
                </div>
            </div><!---end of row 3--->
        
            <div class="row"><!---footer--->
                <div class="col-xs-12">
                    <?php
                        include_once 'Footer.php';
                    ?>  
                </div>
            </div><!---end of row footer--->
            
        </div><!---end of container-fluid div--->
    </body>
</html>
