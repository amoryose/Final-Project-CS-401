<!DOCTYPE html>

<?php

session_start();
                    
    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
    {
        
        echo "<br>Welcome to the member's area, " . 
                $_SESSION['firstname'] . "!<br>";
    } 
    else 
    {
        //echo "<br>Please log in first to see this page.";
        header  ('Location: index.php');
    }
     
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logged In BackUp</title>
    </head>
    <body>
        <?php
                echo "what would you like to do?<br><br>"
        ?>
        
        <a href="GradesBackUp.php"> Click here for grades</a>
        
        <br><br>
        
        <a href="LeadsCaptureBackUp.php"> Click here for leads capture</a>
        
        <br><br>
        
        <a href="mailto:amoryosef613@gmail.com">Click here to email your Prof</a>
        
        <br><br>
        
        <a href='index.php?logout'><br>click here to log out<br></a>
    </body>
</html>


    
    <!--
                Enter the student username
            <br>
            <input type="text" name="username" value="<?php echo $username;?>">
            <br><br>
            Enter the course Id
            <br>
            <input type ="text" name="courseId" value="<?php echo $courseId;?>">
            <br><br>
            
            Grade
            <br>
            <input type="text" name="grade" value="<?php echo $grade;?>">
    
    -->
