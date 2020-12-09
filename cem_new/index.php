<?php
session_start();
require "php/db_connect.php";
require "php/vars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Center for Educational Media | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div> <?php include "php/navbar.php"; ?> </div>
<div class="page-content">
    <div class="row content">
        <div class="container">
            <h2> Home </h2> <br>
            <div class="col-sm-4" id ="sideInfo">
                <div class="well" id="sidebars">
                    <fieldset>
                        <ul class="nav nav-sidebar">
                            <li><br></li>
                            <!-- adding Contacts from homepage_edit table-->
                            <?php
                            $query = $conn->prepare("select distinct(panel_title) from homepage_edit where panel_name='Contact'and show_row='Y'");
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
                            $num_open = $query->rowCount();
                            $contact_title = array();
                            if ($num_open > 0) {
                                while ($row = $query->fetch()) {
                                    $contact_title[] = $row['panel_title'];
                                }
                                $query=null;
                            }
                            for($i=0;$i<sizeof($contact_title);$i++){
                                $panel = $contact_title[$i];
                                $query = $conn->prepare("SELECT * FROM homepage_edit where panel_title like '%".$panel."%' and show_row='Y'");
                                $query->setFetchMode(PDO::FETCH_ASSOC);
                                $query->execute();
                                $num_open = $query->rowCount();

                                if ($num_open > 0) {
                                    while ($row = $query->fetch()) {
                                        $contact_name[] = $row['name_for_link'];
                                    }
                                }
                                ?>
                                <li><b><?php echo $contact_title[$i]; ?></b></li>
                                <li> <?php echo implode("<br>", $contact_name); unset($contact_name); ?>
                                    <br><br></li>
                            <?php } ?>
                            <li><a href="contact.php"><b>Click for more Contact Information</b></a></li>
                        </ul>
                    </fieldset>
                </div>
            </div>
            <!--           Middle bar col size 4 -->
            <!-- adding About from homepage_edit table-->
            <div class = "col-sm-4">
                <?php
                $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'About' and show_row = 'Y'");
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $query->execute();
                $num_open = $query->rowCount();
                if ($num_open > 0) {
                    while ($row = $query->fetch()) {
                        $about = $row['link_desc'];
                        echo $about;
                    }
                }?>
                <!-------------------------------------------------------- Slideshow container ---------------------------------------------------------------->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- The dots/circles -->
                        <ol class="carousel-indicators">
                        <!-- adding Slideshow from homepage_edit table-->
                        <?php
                        $panel = 'Slideshow';
                        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Slideshow' and show_row = 'Y'");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        $query->execute();
                        $count = -1;
                        $num_open = $query->rowCount();
                        if ($num_open > 0) {
                        while ($num_open > 0){
                            $count= $count + 1;

                            // Adding dot/circle
                            echo "<li data-target=\"#myCarousel\" data-slide-to=\"".$count."\" class=\"active\"></li>";
                            $num_open = $num_open - 1;
                        }
                        echo "</ol>";
                        echo"<div class=\"carousel-inner\">";
                        $count = 1;
                        while ($row = $query->fetch()) {
                        $slideshow_image_desc = $row['link_desc'];
                        $slideshow_image = $row['links'];?>
                        <!-- Wrapper for slides -->
                        <?php
                        if($count == 1)
                        {
                            echo " <div class='item active'>";
                            $count = 2;
                        }
                        else{
                            echo " <div class='item'>";
                        }
                        echo " <img src='assets/home/".$slideshow_image."' style='width:100%;'> 
                                <div class='text'>".$slideshow_image_desc."</div></div>"; ?>
                        <?php } } ?>
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
        <br>

    </div>
    <!-- Right side bar col size 3 -->
    <div class="col-sm-4 " id="sideInfo">
        <div class="well" id = "sidebars">
            <fieldset>
                <legend> Newsletter and Upcoming Events </legend>
                <ul class="nav nav-sidebar">
                    <!--   Retrieving Newsletter from homepage_edit table -->
                    <?php
                    $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Newsletter' and show_row = 'Y'");
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    $query->execute();
                    $num_open = $query->rowCount();
                    if ($num_open > 0) {
                        while ($row = $query->fetch()) {
                            $newsletter_links_path = $row['links'];
                            $newsletter_links = $row['name_for_link'];
                            $newsletter_link_desc = $row['link_desc'];
                            echo"<li><p>".$newsletter_link_desc." <a href='".$newsletter_links_path."'>$newsletter_links</a></p></li>";
                        }
                    }
                    ?>
                </ul>
            </fieldset>
        </div>
        <div class="well" id = "sidebars">
            <fieldset>
                <legend>Quick Link</legend>
                <ul class="nav nav-sidebar">
                    <!--   Retrieving Quicklinks from homepage_edit table -->
                    <?php
                    $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Quicklink' and show_row = 'Y'");
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    $query->execute();
                    $num_open = $query->rowCount();
                    if ($num_open > 0) {
                        while ($row = $query->fetch()) {
                            $quicklink_links_path = $row['links'];
                            $quicklink_links = $row['name_for_link'];
                            echo "<li><a href=\"".$quicklink_links_path."\"><b>". $quicklink_links."</b></a></li>";
                        }
                    } ?>
                </ul>
            </fieldset>
        </div>
    </div>
</div>
</div>
</div>
<?php include "php/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

