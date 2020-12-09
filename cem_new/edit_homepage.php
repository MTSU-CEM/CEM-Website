<!DOCTYPE html>
<html lang="en">
<head>
    <title>Center for Educational Media | Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/script.js"></script>
</head>
<body>

<div class="container">
    <div class="well">
        <form>
            <h2 style="color:black; font-size: 30px;"><b>Edit Homepage</b></h2>
            <div class="form-group">
                <select id="panel_name" name = "panel_name" onchange="this.form.submit()" class="form-control" width = 40%>
                    <option value="" disabled selected>Choose option</option>
                    <option value="ANewsletter">Add Newsletter</option>
                    <option value="AContact">Add Contact</option>
                    <option value="AQuicklink">Add QuickLink</option>
                    <option value="ASlideshow">Add Photos to Slideshow</option>
                    <option value="ESlideshow">Edit Slideshow Photo</option>
                    <option value="EAbout">Edit About</option>
                    <option value="EContact">Edit Contact</option>
                    <option value="EQuicklink">Edit QuickLink</option>
                    <option value="ENewsletter">Edit Newsletter</option>

                </select>
            </div>
        </form>
        <?php
        if (isset($_GET['panel_name'])) {
            if (!empty($_GET['panel_name']) and ($_GET['panel_name'] != "")) {
                $selected = $_GET['panel_name'];
                include "php/homepage_edit_detail.php";
            } else {
                echo 'Please select action.';
            }
        }
        ?>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

