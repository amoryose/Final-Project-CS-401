<!DOCTYPE html>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title></title>        
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/styleStudLogedIn.css">
        <link rel="stylesheet" href="css/styleStudGrade.css">        
        
    </head>
    <body>
        <br>
            <div class="row"><!---row 2--->
                <div class="col-xs-4">
                    <div class="user"><!---styleStudGrades.css--->
                        <?php
                            if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)) 
                            {
                                echo "<b>Welcome ". $_SESSION['firstname']. " " .$_SESSION['lastname'];
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
                    <div class="col-xs-4"><!---tabs--->                
                        <div class="tabs"><!---styleStudGrades.css--->
                            <ul class="nav nav-pills tabs">                        
                                <li>
                                    <a href="http://library.neiu.edu/">
                                        <img src="images/library.png">
                                            <br>
                                                <div class="smallLable"><!---styleStudLogedIn--->
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
                                        <img src="images/logout.png" style="
                                       padding-right: 0px;
                                       padding-left: 0px;
                                       padding-top:   0px;
                                       padding-bottom:0px;">
                                            <br>
                                                <div class="smallLable">
                                                    Logout
                                                </div>
                                    </a>
                                </li>
                            </ul>                            
                        </div><!---end of class tabs--->
                    </div><!---end of tabs--->
                
                <div class="row"><!---row 2.1--->
                    <div class="col-xs-10"></div>
                    
                    <div class="col-xs-2">
               
                        <span id="date_txt" class="uportal-text-small">
                           <script language="JavaScript1.2">
                                var months=new Array(13);
                                  months[1]='January';
                                  months[2]='February';
                                  months[3]='March';
                                  months[4]='April';
                                  months[5]='May';
                                  months[6]='June';
                                  months[7]='July';
                                  months[8]='August';
                                  months[9]='September';
                                  months[10]='October';
                                  months[11]='November';
                                  months[12]='December';
                                var time=new Date();
                                var lmonth=months[time.getMonth() + 1];
                                var date=time.getDate();
                                var year=time.getFullYear();
                                document.write(lmonth + ' ');
                                document.write(date + ', ' + year);
                            </script>   
                        </span>
                    </div>
                </div><!---end of row 2.1--->
                
            </div><!---end of row 2--->            
            <br><br>
    </body>
</html>