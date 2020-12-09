<?php

require "db_connect.php";
require "vars.php";
//
////include "forms/presenter_form.php";
//if (isset($_POST['add-video'])) {
//    $thumbnail = $_POST['pres-name'];
//    $vlink = $_POST['pres-desc'];
//    $wmpp = $_POST['pres-wgt'];
//    $presenter = $_POST['pres-wgt'];
//    $title = $_POST['pres-wgt'];
//    $videoseries = $_POST['pres-wgt'];
//    $productionid = $_POST['pres-wgt'];
//    $startdate = $_POST['pres-wgt'];
//    $starttime = $_POST['pres-wgt'];
//    $enddate = $_POST['pres-wgt'];
//    $endtime = $_POST['pres-wgt'];
//    $desc = $_POST['pres-wgt'];
//    $textformat = $_POST['pres-wgt'];
//    $progtype = $_POST['pres-wgt'];
//    $inservice = $_POST['pres-wgt'];
//    $file = $_POST['pres-wgt'];
//    $websourcetitle = $_POST['pres-wgt'];
//    $websourceURL = $_POST['pres-wgt'];
//
//    $query = $conn->prepare("INSERT INTO video_info (thumbnail, video_link,media_pub_point ,presenter_name ,video_series,prod_id,start_date,start_time,end_date,end_time,description_summ,text_format,program_type,inservice_credit,supp_material ,websource_title,websource_url) VALUES (?,?,?)");
//    $query->bindParam(1, $thumbnail, PDO::PARAM_STR, 60);
//    $query->bindParam(2, $vlink, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $wmpp, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $presenter, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $title, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $videoseries, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $productionid, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $startdate, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $starttime, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $enddate, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $endtime, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $desc, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $textformat, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $progtype, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $inservice, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $file, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $websourcetitle, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $websourceURL, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $textformat, PDO::PARAM_STR, 60);
//    $query->bindParam(3, $textformat, PDO::PARAM_STR, 60);
//
//
//
//    try {
//        $query->execute();
//        $success = TRUE;
//    } catch (PDOException $e) {
//        echo "Query Failed: " . $e->getMessage() . " <br/>";
//        $success = FALSE;
//    }

    // connect to the database
// Uploads files
    if (isset($_POST['add-video'])) { // if save button on the form is clicked
        // name of the uploaded file
        $filename = $_FILES['fileSelect']['name'];

        // destination of the file on the server
        $destination = 'uploads/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['fileSelect']['tmp_name'];
        $size = $_FILES['fileSelect']['size'];

        if ($_FILES['fileSelect']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
            echo "File too large!";
        }
        else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $video_ids = 1;
                $query = $conn->prepare("INSERT INTO files (file_name, file_size, video_id) VALUES (?,?,?)");
                $query->bindParam(1, $filename, PDO::PARAM_STR, 300);
                $query->bindParam(2, $size, PDO::PARAM_STR, 300);
                $query->bindParam(3, $video_ids, PDO::PARAM_STR, 300);

                try {
                    $query->execute();
                    $success = TRUE;
                } catch (PDOException $e) {
                    echo "Query Failed: " . $e->getMessage() . " <br/>";
                    $success = FALSE;
                }
            }
            else {
                echo "Failed to upload file.";
            }
        }
    }


