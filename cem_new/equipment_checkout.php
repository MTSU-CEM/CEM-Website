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
    <!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- nav bar -->
<?php 
  include "php/navbar.php";
?>

<div class="page-content">

<h1>Engineering Services and Equipment Check-Out</h1>
<h2>For information or to reserve equipment</h2>
Please contact Audio/Visual Services at <span class="bold">2711</span> or e-mail <a href="mailto:avs@mtsu.edu" class="boldlink colored">avs@mtsu.edu</a>

<hr>

<h2>Services</h2>
<p class="bold">Audio/Visual Services Equipment Section supports faculty use of audio-visual equipment through the following</p>
<ul class="colored">
<li>maintains an inventory of audio-visual equipment for faculty/staff check out.</li>
<li>repairs all campus audiovisual equipment.</li>
<li>provides dubbing services including videotape format change and limited multiple copying.</li>
<li>records off-air programming for classroom use.</li>
<li>consultation on audio visual and television/audio engineering matters.</li>
</ul>

<hr>

Equipment is available to all faculty and staff of MTSU for on campus use for 5 school days at a time.  If equipment is to leave the campus, a form must be filled out, signed by the department chair and the Vice President for Business.  

If you are considering ordering equipment for your department, we will provide you with specifications and recommended brands as well as a vender list. Audio/Visual Services has limited service manuals and test equipment, so if a non-recommended brand is purchased, your department may have to purchase service manuals.

<hr>

Audio/Visual Services carries a supply of electronic parts, projector lamps, video and audio tapes and batteries.  These items may be purchased by departments.  We can not accept cash, so all purchases must be by invoice only.

</div>


<?php 
  include "php/footer.php"; 
?>

</body>
</html>
