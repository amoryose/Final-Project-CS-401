<!DOCTYPE html>

<?php

session_start();


    echo $_SESSION['firstname'] . "<br>";
    echo $_SESSION['username'] . "<br>";
    
    
    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
    {
        echo "<br>Welcome <b>" . $_SESSION['firstname'] . "</b> to the GRADES area, " . 
                $_SESSION['username'] . "!<br>";
    } 
    else 
    {
        //echo "<br>Please log in first to see this page.";
        header  ('Location: index.php');
    }
    
    require_once 'login.php';
    $connection = new mysqli($hn,$un,$pw,$db);
    if($connection->connect_error) die($connection->connect_error);
    
    $username = $_SESSION['username'];
    
    if(isset($_POST['submit']))
    {
        echo "This is the grades table <br><br>";
        
        $viewGrades = "SELECT username, courseName, grade FROM Courses\n"
                        . "JOIN Grades\n"
                        . "ON Courses.courseId = Grades.courseId\n"
                        . "WHERE username = '$username'";
        $result = $connection->query($viewGrades);
        $rows = $result->num_rows;
        
        for($j = 0; $j < $rows; ++$j)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);

            echo $_SESSION['firstname'] . "\t\t";
            echo "\t" . 'Course Name:' . "\t\t" . $row[1] . "\t\t";
            echo "\t\t" . 'Grade:' . "\t" . $row[2] . '<br>';
        }
    }
    
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
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<br>welcome to your grades <br><br>";
        
        ?>
        <form method="post">

            <input type="submit" name="submit" value="Click here to view your grades">
        </form>
        
        <a href='index.php?logout'><br>click here to log out<br></a>
        <br><br>
        
        <a href="mailto:Prof@university.edu">Click here to email your Prof</a>

        <br><br><br>
        
        
        <a href="GradeAppealBackUp.php">Click here to appeal your grades</a>
    </body>
</html>
