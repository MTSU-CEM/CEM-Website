<?php

// start php session
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- nav bar -->
<?php 
  include "php/navbar.php";
?>
<!-- sub nav bar -->
<?php include "php/sub-navbar.php";?>
<!-- container -->
<div class="container">
  <div class="row content">

      <div class="container">
            <div><h2>Professional Development- About </h2> <br></div>
      </div>
        <div class="col-sm-5 sidebar" style="text-align: center; font-size: 15px; background-color:white;">

            <div class="well">
              <fieldset>
                <legend>Online - HD Videos</legend>
                <p>Online videos are available to view for PK-12 professional development. Click on tab for Online Professional Development.</p>
              </fieldset>
            </div>
            <div class="well">
              <fieldset>
              <legend>Onsite - PK-12 Collaborative </legend>    
                <p> The PK-12 Collaborative at MTSU is a professional development (PD) initiative at MTSU which includes: 1) the ELL Collaborative and 2) the School Counselors Collaborative.   The “collaborative model “ originated in CEM with the ELL Collaborative in 2017, serving educators who work with English Learners.  To date, more than 300 educators from 47 school districts in Tennessee have attended.  The School Counselors Collaborative is the newest Collaborative, developed in 2019-20, supporting school counselors and mental health professionals who work in K-12 schools. </p>
              </fieldset>
            </div>
            <div class="well">
              <fieldset>
              <legend>Contact us </legend>    
                <p style="font-size: 1.2em;">
               <!-- If you are having trouble registering or-->
                If you would like to be added to the email distribution list for the ELL Collaborative or for the School Counselors Collaborative, <br>
                please contact Jenny Marsh at <a href="mailto:Jenny.Marsh@mtsu.edu">Jenny.Marsh@mtsu.edu</a> 
            </p>
              </fieldset>
            </div>
        </div>
        
         <div class = "col-sm-7 text-left">
         
            <!-------------------------------------------------------- Slideshow container ---------------------------------------------------------------->
           
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- The dots/circles -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="4" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="5" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="6" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="7" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="8" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="9" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="10" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="11" class="active"></li>
            </ol>
                
                
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="assets/pdev/1.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/1.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/2.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/2.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/3.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/3.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/4.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/5.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/5.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/6.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/6.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/ell/7.JPG" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/7.png" style="width:100%;">
              </div>
              <div class="item">
                <img src="assets/pdev/8.png" style="width:100%;">
              </div>
            </div>
              
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            </div>
            </div>
         </div>

   <?php include "php/footer.php"; ?>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>