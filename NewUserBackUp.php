<!DOCTYPE html>
<?php
session_start();

    require_once 'login.php';
    $connection = new mysqli($hn,$un,$pw,$db);
    if($connection->connect_error) die($connection->connect_error);    
  
    $firstname = "";
    $lastname = "";
    $email = "";
    $username = "";
    $password = "";
    $age= "";
    $gender = "";
    $firstnameERR= "";
    $lastnameERR = "";
    $emailERR = "";
    $usernameERR = "";
    $passwordERR = "";
    $ageERR = "";
    $usernameLength = "";
    $passwordLength = "";
    $message="";    
    
    if(isset($_POST['submit']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $newuser = "INSERT INTO Users (firstname, lastname, email,"
            . "username, password, age, gender)"
            . "VALUES('$firstname', '$lastname', '$email',"
            . "'$username', '$password', '$age', '$gender')";
                   
            if ($connection->query($newuser) === TRUE) 
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Thank you for registering. \n'
                    . 'We will now re-route you to the log in page");'; 
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                } 
            else 
            {
                echo "Error: " . $newuser . "<br>" . $connection->error;
            }
               
        }             
    } 
    $connection->close();
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>New User</title>
        <link rel="stylesheet" href="css/styleNewUser.css">
        
        <!---Mobile Tag--->
        <meta name="viewport" content="width=device-width, initial-scale=1">       
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
        <script src="validate_functions.js"></script>
        
    </head>
    
    <body style="background-color: #ffdfca">
        <div class="row"><!---HEADER ROW 1--->
            <div class="col-xs-12">
                <?php
                    include_once 'Header.php';
                ?>  
            </div>
        </div><!---end of row 1--->
        
        <div class="container-fluid">
            
            <div class="row"><!---Form row--->
                
                <div class="col-xs-4">
                    <h3>When creating the account please remember that the
                        user name and password must be at least 8 characters long. 
                        User name cannot contain special characters such as !@#, 
                        and the password must be alpha numeric and contain 
                        at least one uppercase letter. 
                    </h3>
                    <P><b>Instructors: Please call 1-800-244-5178 to activate
                            administrative privileges</b></P>
                </div>
                
                <div class="col-xs-8">
                
                <div class="myForm">    
                    <form method= "post" action="<?php echo
                    htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                    onsubmit="return validate(this)">                     
                
                    <div class="formheading">Enter all the required fields</div>          
                        <label>
                            <br>
                            <input type="text" name="firstname" placeholder="First Name" required 
                                   value="<?php echo $firstname;?>">
                        </label>
                            <br>
                        <label>
                            <br>
                            <input type="text" name="lastname" placeholder="Last Name" required 
                                   value="<?php echo $lastname;?>">                            
                        </label>
                            <br>
                        <label>
                            <br>
                            <input type="email" name="email" placeholder="E-mail" required
                                   value="<?php echo $email;?>">                            
                        </label>
                            <br>
                        <label>
                            <br>
                            <input type="text" name="username" placeholder="User Name" required
                                   value="<?php echo $username;?>">
                        </label>
                            <br>
                        <label>
                            <br>
                            <input type="password" name="password" placeholder="Password" required
                                   value="<?php echo $password;?>">   
                        </label>
                            <br>
                        <label>
                            <br>
                            <input type="text" name="age" placeholder="Age" required
                                   value="<?php echo $age;?>">                           
                        </label>
                            <br>
                        <label>
                            <input type="radio" name="gender" value="M" required=""> Male
                            <input type="radio" name="gender" value="F" required=""> Female
                        </label>        
                        <br><br>

                        <div class="submit"> 
                            <label>
                                <input type="submit" name="submit" value="Register">
                            </label>
                        </div>
                    </form>                    
                </div><!---end of myForm--->
    
                </div><!---end of col div--->
        
            </div><!---end of form row--->
            
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