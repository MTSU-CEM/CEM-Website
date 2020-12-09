<?php
// start php session

session_start();

require "php/vars.php";


if ((isset($_SESSION["authenticated"])) && ($_SESSION["authenticated"])) 
    {
        /** @noinspection PhpUndefinedVariableInspection */
        header("Location: $site_root/user_panel.php");
    }

?>

<!DOCTYPE html>
<html lang="">
<head>
  <title>Center for Educational Media | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
include "php/navbar.php";
?>

<div class="container">

<div id="alerts_div">&nbsp;</div>

<!-- Tab links -->
<div class="btn-group">
    <button id="loginbtn" type="button" class="btn btn-secondary active" onclick="openTab(event, 'login')">I have an account</button>
    <button id="registerbtn" type="button" class="btn btn-secondary" onclick="openTab(event, 'register')">I want to make an account</button>
</div>

<!-- Tab content -->
<div id="login" class="tabcontent">
<h2>Login</h2>
  <div class="col-sm-6 text-left" style="text-align: left; font-size: 15px; background-color:white;">
    <div class="well">
        <?php
        include "forms/login_form.php"; 
        ?>
    </div>
  </div>
</div>

<div id="register" class="tabcontent">
<h2>Register</h2>
  <div class="col-sm-6 text-left" style="text-align: left; font-size: 15px; background-color:white;">
    <div class="well">
        <?php
        include "forms/user_create_form.php"; 
        ?>
    </div>
  </div>
</div>

<?php

if(isset($_SESSION['alerts']))
{
  $val = $_SESSION['alerts'];
   echo<<<SCRIPT
  <script type="text/javascript">
      document.getElementById("alerts_div").innerHTML =  "$val"
      setTimeout(function(){ document.getElementById("alerts_div").innerHTML = "&nbsp;"; }, 18000);
      
  </script>
SCRIPT;
}
?>

<script>
<?php 
if(isset($_SESSION['tab']) && $_SESSION['tab'] == 'register')
{
    echo 'document.getElementById("registerbtn").click();'; 
}
else
{
    echo 'document.getElementById("loginbtn").click();';   
}
?>
function openTab(evt, tabName) {
  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</div>
    <!--to push footer to the bottom of the page-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "php/footer.php"; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
