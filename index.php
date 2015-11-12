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
            //$logged = "SELECT username, password FROM Users";
            $result = $connection->query($logged);
            
            //$logged1 = "Select firstname FROM Users";
        
            if ($result->num_rows > 0)
            {
                if ($row = $result->fetch_assoc())
                {
                    echo $password . '<br>';
                    echo $row['password'];
                    
                    if (($row["username"] == $username) && 
                        ($row["password"] == $password))
                    {
                        $firstname = $row['firstname'];
                    ////$firstname = row[0];
                        //$test1 = (($row["username"] == $username) && 
                        //($row["password"] == $password));
                        
                        //$logged =  "SELECT firstname FROM Users WHERE firstname = '$test1'";
                        //$result = $connection->query($logged);
                        //$expire = time()+60*60*24;
                        //setcookie("username", $row['username'], $expire);
                        //$row["firstname"] == $firstname;
                        $_SESSION["loggedIn"] = true;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['username'] = $username;
                        
                        $username = "";
                        $password = "";
                        header('Location: LogedInBackUp.php');//http://www.google.com');
                    }
                    else
                    {
                        echo "Error: " . "<br>" . $connection->error;
                    }
                }
            }
            else
            {
                echo "0 results";
            }
        }
        
        if (isset($_GET['logout']))
        {
            session_unset();
            session_destroy();
            echo "you've logged out";
            header('Location: index.php?logout=yes');
        }
    }
    
    $connection->close();    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php
            if (isset($_GET["logout"]))
            {
                echo '<h3>You have been logged out.</h3>';
            }
        ?>
        <section class="scroll contentLeft">

        <form method= "post" action="<?php echo
            htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Enter your user ID
            <br>
            <input type="text" name="username" value="<?php echo $username;?>">
        <span style="color:red"><?php echo $usernameERR;?></span>
            <br>
            Enter your password
            <br>
            <input type="password" name="password" value="<?php echo $password;?>">
        <span style="color:red"><?php echo $passwordERR;?></span>
            <br>
            <input type="submit" name="submit" value="Submit">
            <br><br>
            <a href="NewUserBackUp.php"> Click here if you are a new user</a>
        <br><br>
        <a href="LeadsCaptureBackUp.php"> Click here if you are a guest</a>
        <br><br>
        </form>
        </section>
       
        <br><br>

    </body>
</html>