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
    $firstnameERR="";
    
    if(isset($_POST['submit']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];        

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(empty($_POST["firstname"]))
            {
                $firstnameERR="Name is required";
            }
            else
            { 
                $firstname=test_input($_POST["firstname"]);

                if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
                {
                   $firstnameERR = "Please use only letters"; 
                }
                else
                {
//                   $password = md5($password);
                   $newuser = "INSERT INTO Users (firstname, lastname, email,"
                           . "username, password)"
                           . "VALUES('$firstname', '$lastname', '$email',"
                           . "'$username', '$password')";
                   
                    if ($connection->query($newuser) === TRUE) 
                    {
                        //echo "New record created successfully";
                        //echo "<br> thank you for registering $firstname";
                        $firstname = "";
                        header('Location: index.php');//http://www.google.com');
                    } 
                    else 
                    {
                        echo "Error: " . $newuser . "<br>" . $connection->error;
                    }
               }
            }             
        }
    }
    
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
    $connection->close();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Progress</title>
    </head>
    <body>
<h3>Enter all the required fields</h3>

<form method= "post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
	First Name:<br>
	<input type="text" name="firstname" value="<?php echo $firstname;?>">
        <span style="color:red"><?php echo $firstnameERR;?></span>
        <br>
        Last Name:
        <br>
        <input type="text" name="lastname">
        <br>
        E-mail:
        <br>
        <input type="email" name="email">
        <br>
        User Name: 
        <br>
	<input type="text" name="username">
	<br>
	Password:
	<br>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Register">
</form>

    </body>
</html>