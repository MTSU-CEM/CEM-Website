<?php


require "db_connect.php";
require "vars.php";

//include "forms/presenter_form.php";
if (isset($_POST['add-video'])) {
    $thumbnail = $_POST['thumbnail-url'];
    $vlink = $_POST['video-url'];
    $wmpp = $_POST['pd_topic'];
    $presenter = $_POST['txtPresenter'];
    $title = $_POST['Title'];
    $videoseries = $_POST['videoseries'];
    $productionid = $_POST['prodID'];
    if ($startdate = "mm/dd/yyyy") {
        $todays_date = date("Y-m-d");
        $current_time = date("h:i:s");
        $startdate = $todays_date;
        $starttime = $current_time;
    }
    else{
    $startdate = $_POST['start-date'];
    $starttime = $_POST['start-time'];
    }
    if (isset($_POST['showenddate'])){
        $enddate = $_POST['end-date'];
        $endtime = $_POST['end-time'];}
    else{
        $enddate = null;
        $endtime = null;
    }

    $desc = $_POST['Description-txt'];
    $textformat = $_POST['txt-format'];
    $progtype = $_POST['prog-type'];
    $inservice = $_POST['credtAmt'];
    $file = $_POST['fileSelect'];
    $websourcetitle = $_POST['lbltit-web'];
    $websourceURL = $_POST['lblurl-web'];
    $audience = $_POST['audience'].text;
    $grade = $_POST['grade'].text;
    $prog_sponser = $_POST['prog_sponser'].text;
    $pract_rub = $_POST['pract_rub'].text;
    $acedemic_standard = $_POST['tn_k12'].text;

    $query = $conn->prepare("INSERT INTO video_info (thumbnail, video_link,pd_topic ,presenter_name ,title ,video_series,prod_id,start_date,start_time,end_date,end_time,description_summ,text_format,program_type,inservice_credit,supp_material ,websource_title,websource_url, grade,prog_sponser,audience,acedemic_standard, pract_rubric ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $query->bindParam(1, $thumbnail, PDO::PARAM_STR, 60);
    $query->bindParam(2, $vlink, PDO::PARAM_STR, 60);
    $query->bindParam(3, $wmpp, PDO::PARAM_STR, 60);
    $query->bindParam(4, $presenter, PDO::PARAM_STR, 60);
    $query->bindParam(5, $title, PDO::PARAM_STR, 60);
    $query->bindParam(6, $videoseries, PDO::PARAM_STR, 60);
    $query->bindParam(7, $productionid, PDO::PARAM_STR, 60);
    $query->bindParam(8, $startdate, PDO::PARAM_STR, 60);
    $query->bindParam(9, $starttime, PDO::PARAM_STR, 60);
    $query->bindParam(10, $enddate, PDO::PARAM_STR, 60);
    $query->bindParam(11, $endtime, PDO::PARAM_STR, 60);
    $query->bindParam(12, $desc, PDO::PARAM_STR, 60);
    $query->bindParam(13, $textformat, PDO::PARAM_STR, 60);
    $query->bindParam(14, $progtype, PDO::PARAM_STR, 60);
    $query->bindParam(15, $inservice, PDO::PARAM_STR, 60);
    $query->bindParam(16, $file, PDO::PARAM_STR, 60);
    $query->bindParam(17, $websourcetitle, PDO::PARAM_STR, 60);
    $query->bindParam(18, $websourceURL, PDO::PARAM_STR, 60);
    $query->bindParam(19, $grade, PDO::PARAM_STR, 60);
    $query->bindParam(20, $prog_sponser, PDO::PARAM_STR, 60);
    $query->bindParam(21, $audience, PDO::PARAM_STR, 60);
    $query->bindParam(22, $acedemic_standard, PDO::PARAM_STR, 60);
    $query->bindParam(23, $pract_rub, PDO::PARAM_STR, 60);



    try {

        $query->execute();
        $success = TRUE;
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
    }



}