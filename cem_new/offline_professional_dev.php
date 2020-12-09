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
<?php include "php/navbar.php"; ?>
          <!-- sub nav bar -->
          <?php include "php/sub-navbar.php";?>
        <div class="container">
            <h2> Online Professional Development </h2> <br>
        <div class = "co1-sm-1"></div>
        <div class="col-sm-4" id = "sideInfo">
            <div class="well" id="sidebars">
              <fieldset>
                <legend>Online - HD Videos</legend>
                <p>Online videos are available to view for PK-12 professional development. Click on tab for Online Professional Development.</p>
              </fieldset>
            </div>
        </div>
        <div class="col-sm-6 text-" style="text-align: left; font-size: 15px; background-color:white;">
            <div class="well">
            <fieldset>
                <legend> Upcoming Events Registration </legend>
                <div class="well">
                    <?php include "forms/registration_form.php" ; ?>


                </div>
            </fieldset>
            </div>
        </div>
        </div>
<?php 
  include "php/footer.php"; 
?> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
</html>