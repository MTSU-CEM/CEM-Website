<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Center for Educational Media | Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div id="div1"> <?php include "php/navbar.php"; ?> </div>
<br/>
<div class="container">
    <div class="well">
        <!-- <div id="player"></div>
        <br>
        <i>Video by <a target="_blank" href="https://vimeo.com/stefanforster">Stefan Forster</a></i>
         -->
        <div><?php include "php\display_video.php"?></div>
                <div hidden> <span id="player-currenttime" ></span><br> &nbsp;Last played duration: <span id="player-played"></span>";</div>
    </div>

</div>
<?php include "php/footer.php"; ?>

<script src="https://player.vimeo.com/api/player.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "running.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>