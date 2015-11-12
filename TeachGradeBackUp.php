<!DOCTYPE html>

<?php

session_start();

    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
    {
        echo "<br>Welcome to the administrative area Prof. " . 
                $_SESSION['firstname'] . "!<br><br>";
    } 
    else 
    {
        //echo "<br>Please log in first to see this page.";
        header  ('Location: index.php');
    }
    
    require_once 'login.php';
    $connection = new mysqli($hn,$un,$pw,$db);
    if($connection->connect_error) die($connection->connect_error);
    
$username = "";
$courseId = "";
$grade = "";
$courseName = "";

        echo "This is the grades table <br><br>";
    
    
        $courseSct = "SELECT username, courseName, grade FROM Courses\n"
                        . "JOIN Grades\n"
                        . "ON courses.courseId = Grades.courseId";
        $result = $connection->query($courseSct);
        $rows = $result->num_rows;
        
        for($j = 0; $j < $rows; ++$j)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);

            echo 'User Name: ' . "\t\t" . $row[0];
            echo "\t" . 'Course Name:' . "\t\t" . $row[1] . "\t\t";       
            echo "\t" . 'Grade:' . "\t" . $row[2] . '<br>';  
        }
        
if(isset($_POST['submit']))
{
    // Grades will be updated here
    echo "This is the updated grades table <br><br>";
    
}
    
?>

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method= "post" action="<?php echo
        htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <br>
            
            <select name="grade" size="1">
                <option value="select">Select</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="f">F</option>
                <option value="i">I</option>
            </select>
            
            <br>
            <input type="submit" name="submit" value="Submit">
            <br>
           
        </form>

    </body>
    </html>

            