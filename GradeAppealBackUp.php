<!DOCTYPE html>
<?php
/*    
if(isset($_POST['Email Appeal']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $appealDesc = $_POST['appealDesc'];
}
*/
if(isset($_POST['submit'])){
    $to = "moryosefavi@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.<br><br>";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 

        <form action="" method="post">
            Reason for appeal
            <br><br>
            First Name: 
            <br>
            <input type="text" name="first_name"><br>
            <br>
            Last Name: 
            <br>
            <input type="text" name="last_name"><br>
            <br>
            Email: 
            <br>
            <input type="text" name="email">
            <br>
            <br>
            Message:
            <br>
            <textarea rows="10" name="message" cols="60">
                Enter text here
            </textarea>
            <br>
            <input type="submit" name="submit" value="Submit">
        
        </form>
    </body>
</html>


<!--


<form method= "post" action="<?php echo
            htmlspecialchars($_SERVER["PHP_SELF"]);?>">


        First Name:<br>
	<input type="text" name="firstname" value="<?php echo $firstname;?>">
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
        <br>
	<textarea rows="6" cols="50" name="appealDesc"> 
            Insert Text Here
        </textarea>          
        <br>
        <input type="submit" name="submit" value="Email Appeal">


-->