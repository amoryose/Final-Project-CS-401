<!DOCTYPE html>

<?php

session_start();

    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
    {
        echo "<br>Welcome to the member's area, " . 
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
            if(empty($_POST["courseId"]))
            {
                $courseIdERR="Course Id is required";
            }
            if(empty($_POST["courseName"]))
            {
                $courseNameERR="Course name is required";
            }

            else
            {
                $newCourse = "INSERT INTO Courses (courseId, courseName, courseDesc)" .//, courseDesc)" .
                        "VALUES('$courseId', '$courseName', '$courseDesc')";//, '$courseDesc)";
                //$newCourse1 = "INSERT INTO Grades (courseId) VALUES('$courseId')";
                    //$connection->query($newCourse);
                if ($connection->query($newCourse) === TRUE)// &&
                        //$connection->query($newCourse1) === TRUE) 
                {
                    echo "New CLASS created successfully";
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
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method= "post" action="<?php echo
        htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Enter the course Id you wish to add
            <br>
            <input type="text" name="courseId" value="<?php echo $courseId;?>">
            <?php echo $courseIdERR;?>
            <br><br>
            Enter the course name you wish to add
            <br>
            <input type ="text" name="courseName" value="<?php echo $courseName;?>">
            <?php echo $courseNameERR;?>
            <br><br>
            Course Description
            <br>
            <textarea rows="10" cols="60" name="courseDesc"> 
                 Insert Text Here
            </textarea>          
            <br>
            <input type="submit" name="submit" value="Submit">
            <br>
            
        </form>
    </body>
</html>
