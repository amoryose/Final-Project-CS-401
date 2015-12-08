<!DOCTYPE html>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="neiulogo.png">
        <title>Leads Capture</title>        
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato" />

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        
        <link rel="stylesheet" href="css/styleStudGrade.css">
        <link rel="stylesheet" href="css/styleStudLogedIn.css">
        <link rel="stylesheet" href="css/LeadsCapture.css">
        
    </head>
    <body style="background-color:#ffdfca">
        <div class="row"><!---row 1--->
            <div class="col-xs-12">
                <?php
                    include_once 'Header.php';
                ?>  
            </div>
        </div><!---end of row 1--->
        
        <div class="container-fluid">
            
            <div class="row"><!---row 2--->                
                <div class="col-xs-7">
                    <h3>Mission </h3>
                
                    <p>
                        Northeastern Illinois University, as a public comprehensive university with locations throughout Chicago,
                        provides an exceptional environment for learning, teaching, and scholarship. We prepare a diverse
                        community of students for leadership and service in our region and in a dynamic multicultural world. 
                    </p>
                    <p>
                        Northeastern Illinois University will be a leader among metropolitan universities, known for its dedication
                        to its urban mission, for the quality of its programs, for the success of its graduates, and for the diversity of
                        its learning environment. 
                    </p>                                      
                </div>
                
                <div class="col-xs-1"></div>
                        
                <div class="col-xs-4">
                    <ul class="nav nav-pills" style="padding-left: 83px;">
                        <li>
                            <a href="https://www.youtube.com/embed/F4cFB-aG8Rk" target="blank">
                                <img src="images/youtube.png">
                                <br>
                                <div class="smallLable">
                                    You Tube
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
                            <a href="index.php">
                                <img src="images/login.png">
                                <br>
                                <div class="smallLable">
                                    Login
                                </div>
                            </a>
                        </li>
                    </ul>
                            <div class="row"><!---row 2.1--->
                                <br><br>
                                <div class="col-xs-4"></div>
                                <div class="col-xs-8">
                                    <form method="get" action="http://www.google.com/search" target="blank"> 
                                        <input type="text" name="q" size="31" maxlength="180" value=""/> 
                                        <input type="submit" value="Google Search"/> 
                                    </form>
                                </div>
                            </div>
                        </div>
            </div><!---end of row 2--->
            
            <div class="row"><!---row 3--->
                <div class="col-xs-7">
                        
                    <h3>Programs</h3>
                        <p>Northeastern offers a variety of programs to choose from.
                           The following is a sample of programs offered at NEIU:
                        </p>
                            <ul class="programs">
                                <li><a href="http://www.neiu.edu/academics/college-of-business-and-management/departments/accounting-business-law-and-finance/programs/accounting-bs">Accounting</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/biology/programs/biology-bs">Biology</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/chemistry/programs/chemistry-bs">Chemistry</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/computer-science/programs/computer-science-bs">Computer science</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/economics/programs/economics-ba">Economics</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/history/programs/history-major-0">History</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-business-and-management/departments/management-and-marketing/programs/marketing-bs">Marketing</a></li>
                                <li><a href="http://www.neiu.edu/academics/college-of-arts-and-sciences/departments/music-and-dance/programs/music-ma">Music</a></li>
                            </ul>
                        <p>For a full list of programs that are available at NEIU please
                            <a href="http://www.neiu.edu/future-students/programs">click here.</a>
                        </p>
                        <p>
                            <a href="mailto:advisor@neiu.edu">To request more information click here</a>
                        </P>
                </div>
                
                <div class="col-xs-1"></div>
                
                <div class="col-xs-4" style="padding-left: 38px;">
                    <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4136.694512855317!2d-87.72019401381579!3d41.980582642964826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fce74bfff62c1%3A0x225a9970fc39ae2e!2s5500+N+St+Louis+Ave%2C+Chicago%2C+IL+60625!5e0!3m2!1sen!2sus!4v1448556027991" 
                            width="360" height="280" frameborder="0" 
                            style="border:0" allowfullscreen>
                    </iframe>
                </div>
            </div><!---end of row 3--->
            
            <div class="row"><!---footer--->
                <div class="col-xs-12">
                    <?php
                        include_once 'Footer.php';
                    ?>  
                </div>
            </div><!---end of row footer--->
        
        </div><!---end of container-fluid div--->
    </body>
</html>