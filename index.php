<!DOCTYPE html>

<?php
session_start();

    require_once 'login.php'; // standard
    $connection = new mysqli($hn, $un, $pw, $db); // standard
    if ($connection->connect_error) die($connection->connect_error); // standard
    
    $username="";
    $usernameERR="";
    $password="";
    $passwordERR="";
    $firstname="";
    $lastname="";
    
    
    $error="";
    
    if (isset($_POST['submit']))
    {       
        $username = ($_POST['username']);
        $password = ($_POST['password']);
        
        if (empty($_POST["username"]))
        {
            $usernameERR =  "Name is required";
        }
        
        if (empty($_POST["password"]))
        {
            $passwordERR = "Password is required";
        }
        else
        {   
            $logged = "SELECT * FROM Users where username = '$username'";
            $result = $connection->query($logged);

            if ($result->num_rows > 0)
            {
                if ($row = $result->fetch_assoc())
                {
                    if (($row["username"] == $username) && 
                        ($row["password"] == $password))
                    {
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];

                        $_SESSION["loggedIn"] = true;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['username'] = $username;
                        $_SESSION['userID'] = $row['userID'];
                        
                        if($row['isAdmin'] == 1)
                        {
                            $_SESSION['admin'] = true;
                        }
                        else
                            $_SESSION['admin'] = false;
                        
                        $username = "";
                        $password = "";
                        
                        if($row['isAdmin']!=1)
                        {
                        header('Location: LogedInBackUp.php');//http://www.google.com');
                        }
                        else
                        {
                            header('Location: TeachLogedIn.php');
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Wrong user name or password");'; 
                        $username = "";
                        $password = "";
                        echo '</script>' . $connection->error;
                    }
                }
            }
            else
            {               
                echo '<script type="text/javascript">'; 
                echo 'alert("Wrong user name or password");'; 
                $username = "";
                $password = "";
                echo '</script>';               
            }
        }
        
        if (isset($_GET['logout']))
        {
            session_unset();
            session_destroy();
            echo "you've logged out";
            header('Location: Logout.php?logout=yes');
        }
    }
    
    if(isset($_POST['cancel']))
    {
        header('Location: index.php');
        $username = ($_POST['username']);
        $password = ($_POST['password']);
        $username = "";
        $password = "";
    }
    
    $connection->close();    
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <!---Mobile Tag--->
       <meta name="viewport" content="width=device-width, initial-scale=1">
        
       <link rel="shortcut icon" href="images/neiulogo.png">
        <link rel="stylesheet" href="css/style1.css">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        
        
        <title>Login Page</title>
        <link rel="stylesheet" href="css/style1.css">
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
        
            <div class="row"><!---login row 2--->
                <div class="col-xs-5">                     
                    <div class="col-xs-2"></div>
                        <div id="error">
                            <?php
                                echo $error;
                            ?>
                        </div>
                    <br><br><br>
                    
                    <div id="loginBox">
                    
                        <form method= "post" action="<?php echo
                            htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                                <div id="sal">
                                    Secure Area Login                                    
                                </div>
                                    <br>
                              
                                    <span>
                                        <input type="text" name="username" required size="30" 
                                               value="<?php echo $username;?>"
                                               class="inputSize
                                               formControl" placeholder="User Name">
                                        <span style="color:red"><?php //echo $usernameERR;?></span>
                                    </span>
                                            <br><br>
                                    <span>
                                        <input type="password" name="password" required size="30"
                                               value="<?php echo $password;?>"
                                               class="inputSize
                                               formControl" placeholder="Password">
                                        <span style="color:red"><?php //echo "<br>".$passwordERR;?></span>
                                    </span>
                                            <br>

                                <div class="buttons">
                                    <br>
                                    <input type="submit" name="submit" 
                                        class="btn" value="Login">            

                                    <input type="submit" name="cancel" 
                                        class="btn" value="Cancel">    
                                    
                                </div><!---End of buttons div--->
               
                                <div class="row"><!---link box row 3--->
                                    <div class="link">            
                                        <ul class="a">                 
                                            <li><a href="NewUserBackUp.php">Create an account
                                                <br></a></li>                 
                                                <li><a href="LeadsCapture.php">Guest Login
                                                <br></a></li>
                                                <li><a href="ReadMeFile.pdf" target="blank">Read Me File
                                                <br></a></li>
                                                <li><a href="cs401Group5PowerPoint.pdf"
                                                       target="blank">Power Point</a></li>
                                        </ul>
                                    </div> <!---end of link div--->
                                </div>
                        </form>
            
                    </div><!---end of loginBox div--->
                </div>
                
                <div class="col-xs-6 text-primary">
                    <h2>Welcome to Hemisphere</h2>
                    <h5>A quick and secure access to the information 
                    and resources for all students and faculty</h5>                    
                    
                    <img src="images/NeiuScene.png" alt="school scene">                
                </div>             
                
            </div><!---end of login row 2--->
            
            <br><br><br><br>
               <div class="row"><!---footer row--->
            
                    <div class="col-xs-12">
                        <?php
                            include_once 'Footer.php';
                        ?>  
                    </div>                
                </div><!---end of footer row--->         
            
        </div><!---end of container div--->
 
    </body>
</html>