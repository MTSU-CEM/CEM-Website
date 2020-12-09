<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Center for Educational Media | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/thumbnail.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Get Thumbnail of a Video</title>

</head>
<body>
<div> <?php include "php/navbar.php"; ?> </div>
<div class="container">
    <section id="main" class="main-wrapper" role="main">
    <h1>Get Thumbnail of a Video</h1>
    <p> To get the thumbnail of a video hosted on <strong>YouTube</strong> or <strong>Vimeo</strong> just copy the URL of the video from the Embedd link and paste it into <a id="focus-input" href="#video-url">this field</a> and get the Thumbnail:</p>
        <p id = "information"> <strong>Note: </strong> Please make sure your video is <strong>public</strong> when you generate the thumbnail, you can make your video private after getting the url for the thumbnail</p>
        <form class="main-form">
            <label class="label" for="video-url">Paste URL of video into this field:</label>
            <input class="input" id="video-url" type="url" placeholder="https://youtube.com/... or https://vimeo.com/..."/>
            <input class="btn btn-primary" id="submit" type="submit" value="Get Thumbnail">
        </form>
    <div id="result">
    </div>
</section>

<script src="js/thumbnail.js"></script>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "php/footer.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
