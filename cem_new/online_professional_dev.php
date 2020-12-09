<!--
Desc - In this page we are dynamically loading video information from a mysql table called video_info on page load
The search button is loading the page again with a different query.
-->

<?php
// start php session
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php
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
    <?php include "php/navbar.php";?>
<?php include "php/sub-navbar.php";?>
    <div class="container">
        <div id="pdevcontent">
        <!-- sub nav bar -->

            <div class="container">
                <h2> Online Professional Development </h2> <br>
            </div>
            <div id="pdevvideos" class="tabcontent">
                <div class="col-sm-4" align= "center"; id="sideInfo">
                    <div class="well" id ="sidebars">
                        <fieldset>
                            <div class="for-padding">
                                <?php include "forms/browse_video_form.php"; ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="well" style="overflow-y: auto">
                                <h3>Videos</h3>
                            <div>
                                <form method="post" action="online_professional_dev.php">
                                <div style="float:right;">
                                    <div class="col-sm-8">
                                        <input name = "inp-vsearch" id ="inp-vsearch" type="text"class=" form-control ">
                                    </div>
                                    <div class="col-sm-1">
<!--                                        <a href='online_professional_dev.php' class="btn btn-primary" id="btn-vsearch" name="btn-vsearch" style="text-decoration: none; color:white;">search </a>-->
                                        <button id ="btn-vsearch" name = "btn-vsearch" class = "btn btn-primary" type="submit">search</button>
                                        <hr>
                                    </div>
                                </div>
                                </form>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <?php
                                                require "php/db_connect.php";
                                                require "php/vars.php";
//                                                For Select
                                                if (isset($_POST["btn-vsearch"])) {
                                                    if (isset($_POST["inp-vsearch"])){
                                                        $vals = $_POST["inp-vsearch"];}
                                                    else {
                                                        $vals = "";
                                                    }
                                                    if ($vals == "") {
                                                        $query = $conn->prepare("SELECT video_id, thumbnail, title, video_series FROM video_info");
                                                    }
                                                    else{

                                                        $query = $conn->prepare("SELECT video_id, thumbnail, title, video_series FROM video_info where (thumbnail LIKE '%$vals%') OR (title LIKE '%$vals%')");
                                                    }
                                                }
//                                                For left browser
                                                else if(isset($_POST["browse-filter-apply"])){
                                                    $query1 = "SELECT video_id, thumbnail, title, video_series FROM video_info where status = 1 ";
                                                    if (isset($_POST["grade"])){
                                                        $grade = $_POST["grade"];
                                                        if ($grade != 'All'){
                                                        $query1 .= "AND grade LIKE '%".$grade."%'";}
                                                    }
                                                    else{ $grade = ""; }
                                                    if (isset($_POST["prog_sponser"])){
                                                        $prog_sponser = $_POST["prog_sponser"];
                                                        if ($prog_sponser != 'All'){
                                                        $query1 .=  "AND prog_sponser LIKE '%".$prog_sponser."%'";}
                                                    }
                                                    else{ $prog_sponser = ""; }

                                                    if (isset($_POST["presenter"])){
                                                        $presenter = $_POST["presenter"];
                                                        if ($presenter != 'All'){
                                                        $query1 .= "AND presenter_name LIKE '%".$presenter."%'";}
                                                    }
                                                    else{ $presenter = ""; }

                                                    if (isset($_POST["audience"])){
                                                        $audience = $_POST["audience"];
                                                        if ($audience != 'All'){
                                                        $query1 .= "AND audience LIKE '%".$audience."%'";}
                                                    }
                                                    else{ $audience = ""; }

                                                    if (isset($_POST["vseries"])){
                                                        $vseries = $_POST["vseries"];
                                                        if ($vseries != 'All'){
                                                        $query1 .= "AND video_series LIKE '%".$vseries."%'";}

                                                    }
                                                    else{ $vseries = ""; }

                                                    if (isset($_POST["tn_k12"])){
                                                        $tn_k12 = $_POST["tn_k12"];
                                                        if ($tn_k12 != 'All'){
                                                        $query1 .= "AND acedemic_standard LIKE '%".$tn_k12."%'";}
                                                    }
                                                    else{ $tn_k12 = ""; }

                                                    if (isset($_POST["pract_rub"])){
                                                        $pract_rub = $_POST["pract_rub"];
                                                        if ($pract_rub != 'All'){
                                                        $query1 .= "AND pract_rubric LIKE '%".$pract_rub."%'";}
                                                    }
                                                    else{ $pract_rub = ""; }

                                                    if (isset($_POST["pd_topics"])){
                                                        $pd_topics = $_POST["pd_topics"];
                                                        if ($pd_topics != 'All'){
                                                        $query1 .= "AND pd_topic LIKE '%".$pd_topics."%'";}
                                                    }
                                                    else{ $pd_topics = ""; }
                                                    if (isset($_POST["item-number"])){
                                                        $count = $_POST["item-number"];
                                                        if ($count != 'All'){
                                                            $query1 .= "LIMIT  ".$count;
                                                        }
                                                    }

                                                    $query = $conn->prepare($query1);
                                                }
//                                                Normal load
                                                else{

                                                    $query = $conn->prepare("SELECT video_id, thumbnail, title, video_series FROM video_info");
                                                }
                                                $query->setFetchMode(PDO::FETCH_ASSOC);
                                                $query->execute();
                                                $num_open = $query->rowCount();
                                                if ($num_open > 0) {
                                                    while ($row = $query->fetch()) {
                                                        $varid[] = $row['video_id'];
                                                        $varthumbnail[] = $row['thumbnail'];
                                                        $vartitle[] = $row['title'];
                                                        $varvideoseries[] = $row['video_series'];
                                                    }

                                                for ($i = 0; $i < count($varthumbnail); $i++)
                                                  {
//                                                  Number of video is one row, currenty 4
                                                    if ($i % 4 == 0)
                                                    {
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                    }
                                                        echo "<td>";
                                                        $url_view = "video_player.php?ID=" . $varid[$i];
                                                        echo "<table id =\"displaytable\" class = \"displaytable\">";
                                                        echo "<tr>";
                                                        // information of one video
                                                        echo "<td>";
                                                        echo "<div class=\"panel\" id =\"box-panel\">";
//                                                        echo "<a href='".$url_view."' >".$varvideoseries[$i]. "</a>";
//                                                        echo "<br>";
                                                        echo "<a href=\"video_player.php\"><iframe src=\"". $varthumbnail[$i]."\" style=\"width:103px;height:76px; border:1px solid Gray;\"></iframe></a>";
                                                        echo "<br>";
                                                        echo "<a href='".$url_view."'>". $vartitle[$i]. "</a>";
                                                        echo "</div>";
                                                        echo "</td>&nbsp;&nbsp;</td></tr>";
//                                                        echo "<tr><td><a href='".$url_view."'>". $vartitle[$i]. "</a></td>";
                                                        echo "</tr>";
                                                        echo "</table>";
                                                        echo "</td>";
                                                  }
                                                }
                                              ?>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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