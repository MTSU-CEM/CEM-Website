<?php
// start php session
if(!isset($_SESSION))
{
    session_start();
}
require "php/vars.php";
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
<?php 
include "php/navbar.php";
?>

<div class="page-content">

<?php 
if (isset($_SESSION['Event']))
{
$event_name = $_SESSION['Event'];
echo<<<HTML
<h1 style="text-align: center">Thank you for registering with CEM.</h1>
<h3 style="text-align: center">You are now registered for the $event_name event.</h3>
<p style="text-align: center">You should receive a confirmation email shortly.</p>
HTML;
unset($_SESSION['Event']);
}
else
{
	header("Location: $site_root");
}
?>
</div>

<?php include "php/footer.php"; 
?>
</body>
</html>
