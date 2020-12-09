<?php
require "db_connect.php";
require "vars.php";
// fetching value from database for ID value received in url and display on the screen
// This executed as you come from the view page


global $vlink;

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $statement = "SELECT * FROM video_info where video_id =" . $id;
    $query = $conn->prepare($statement);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $num_open = $query->rowCount();
    if ($num_open > 0) {
        $row = $query->fetch();
        $id = $row['video_id'];
        $vlink = $row['video_link'];
        $pres_name = $row['presenter_name'];
        $title = $row['title'];
        $desc = $row['description_summ'];
        $supp_material = $row['supp_material'];
        $start_time = $row['start_time'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $end_time = $row['end_time'];
        $web_title = $row['websource_title'];
        $web_url = $row['websource_url'];

        #Trimming the web url and title
        $web_title = rtrim($web_title, ",");
        $web_url = rtrim($web_url, ",");

        echo "<div class=\"container\">";
            echo"<div class=\"col-sm-7\">";
                echo"<h3>$title</h3>";
                echo"<b>Start Date and Time: </b> $start_date $start_time <br> ";
                echo"<b>End Date and Time: </b> $end_date $end_time <br>";
                echo"<b>Presenters: </b>$pres_name";
                $vid = "<iframe id =\"player1\" src=\"$vlink\"width=\"560\" height=\"400\" padding = \"0\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
                echo"<iframe id =\"player1\" src=\"$vlink\"width=\"560\" height=\"400\" padding = \"0\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";

                echo"<p><b>Summary: </b>$desc</p><br>";
                // splitting web url and title
                if ($web_title != '') {
                    echo "<b>Web Resources</b> :";
                    $w_title = explode(",", $web_title);
                    $w_url = explode(",", $web_url);
                    for( $i = 0; $i<count($w_title); $i++ )
                    {echo "<b>$w_title[$i]:</b> <a href =$w_url[$i]> $w_url[$i] </a> <br>";}
                    }
            echo"</div>";
            echo"<div class=\"col-sm-4 \">";
                echo"<div class = \"panel panel-default\">";
                    echo"<div class=\"panel-heading\">Supplementry Material</div>";
        //            echo"<div class = \"lblbluecolor\" style = \"text-align: left\"><h4>Supplementry Material</h4></div>";
                    echo "<a href= '".$site_root."/pdf/". $supp_material ." ' class=\"panel-body\">".$supp_material."</a>";
                echo"</div>";
            echo"</div>";
        echo"</div>";
    }
}

?>


