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

<h1>Video Production Services</h1>
<div class="wrapper">
	<div class="left">
		<img src="assets/avservices/1.png">
	</div>
	<div class="right">
		<p class="colored">
		Partner with Audio/Visual Services Video Production division on your next motion imaging project with full studio, editing and on-location capabilities.  The Video Production division partners, not only with MTSU faculty and staff to create high quality productions to enhance their presentations, but also with other university entities to produce award winning commemorative videos, television commercials, ad campaign elements, documentaries, and video training resources.
		</p>
	</div>
</div>

<hr>

<h2>Professional Services</h2>
<ul class="colored">
<li>Studio Production-- a multiple studio, multiple camera high definition broadcast facility to capture lectures, classes, talk shows, performances, live satellite and webcast uplinks, etc.</li>
<li>Remote Production-- a single or multiple camera broadcast quality production service for on or off campus locations such as classrooms, offices, sporting events, or conferences.</li>
<li>Graphics and Animation-- a method of adding words, titles, credits, transitions and special effects to programs during editing.
<li>Post Production--editing footage into a cohesive presentation.</li>
​</ul>

<img src="assets/avservices/2.png">

<hr>

<p>
To explore the possibilities of DVD copies of programs please contact the Director of Television Production, Mitch Pryor at <a href="mailto:Mitch.Pryor@mtsu.edu" class="boldlink colored">Mitch.Pryor@mtsu.edu</a>
</p>

<?php 
  include "php/footer.php"; 
?>

</body>
</html>
