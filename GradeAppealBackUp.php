<!DOCTYPE html>
<?php

session_start();

    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)
            && $_SESSION['admin'] == FALSE); 
    else 
    {
        header  ('Location: index.php');
    }

    require_once 'login.php'; // standard
    $connection = new mysqli($hn, $un, $pw, $db); // standard
    if ($connection->connect_error) die($connection->connect_error); // standard

    if(isset($_POST['submit']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $fromEmail = $_POST['fromEmail']; // this is the sender's Email address
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $_POST['message'];
        $message2 = "Here is a copy of your message " . $firstname . "\n\n" . $_POST['message'];

        $headers = "From:" . $fromEmail;
        $headers2 = "To:" . $to;
        mail($to,$subject,$message);
        mail($fromEmail,$subject2,$message2);
        
        $gradeAppeal = "INSERT INTO Appeals (firstname, lastname, fromEmail, message)"
                . "VALUES ('$firstname', '$lastname', '$fromEmail','$message')";

                    if ($connection->query($gradeAppeal) === TRUE) 
                    {
                        header('Location: AppealThankYou.php');
                    }
                    else 
                    {
                        echo "Error: " . $subject . "<br>" . $connection->error;
                    } 
        
}
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Appeal</title>
        <link rel="stylesheet" href="css/styleNewUser.css">
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
                <div class="col-xs-3">
                    <br><br>
                    <div class="sideNav">
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="http://www.neiu.edu/">NEIU</a></li>
                            <li><a href="LogedInBackUp.php">Home Page</a></li>
                            <li><a href="LeadsCapture.php">Leads Capture</a></li>
                            <li><a href="UnderConstruction">Attendance</a></li>
                            <li><a href="UnderConstruction.php">Grading</a></li>
                            <li><a href="UnderConstruction.php">Financial Aid</a></li>
                            <li><a href="UnderConstruction.php">Registration</a></li>
                            <li><a href="UnderConstruction.php">Advising</a></li>

                        </ul>
                    </div>
                </div>
            
                <div class="col-xs-1"></div>
                
                <div class="col-xs-4">
                <br><br>
                    <form action="" method="post">
                        <div class="formheading">Appeal Form</div>
                        <br>
                        <label>
                        First Name: 
                        <br>
                        <input type="text" name="firstname" required=""><br>
                        </label>
                        <br>
                        <label>
                        Last Name: 
                        <br>
                        <input type="text" name="lastname" required=""><br>
                        </label>
                        <br>
                        <label>
                        Email: 
                        <br>
                        <input type="email" name="fromEmail" required="">
                        </label>
                        <br>
                        <br>
                        <label>
                        Message:
                        <br>
                        <textarea rows="6" name="message" required="" cols="42" style="font-size:12px"></textarea>
                        </label>
                        <br>
                        <label>
                        <input type="submit" name="submit" value="Submit">
                        </label>
                    </form>
                </div><!---end of form col-xs-6--->
                <div class="col-xs-4"></div>
            </div><!---end of row 3--->
        
            <div class="row"><!---row 4--->
                <div class="col-xs-12">
                    <?php
                        include_once 'Footer.php';
                    ?>  
                </div>
            </div><!---end of row footer--->
    
        </div><!---end of container-fluid div--->
    </body>
</html>