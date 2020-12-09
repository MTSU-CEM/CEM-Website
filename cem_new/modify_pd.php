<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cem-Mtsu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- nav bar -->
<?php include "php/navbar.php";
$url_mod = $site_root. "/modify_pd.php";
$url_view = $site_root. "/view_pd_topics.php";

?>

<?php
require "php/db_connect.php";
require "php/vars.php";
// fetching value from database for ID value received in url and display on the screen
// This executed as you come from the view page
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $statement = "SELECT pd_id, topic, pd_desc FROM pd_topics where pd_id =" . $id;
    $query = $conn->prepare($statement);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $num_open = $query->rowCount();
    if ($num_open > 0) {
        $row = $query->fetch();
        $id = $row['pd_id'];
        $name = $row['topic'];
        $desc = $row['pd_desc'];
        echo "<div class=\"container\">
                 <form action=\" ".$url_mod." \"   method=\"post\">
                    <div class=\"well\">
                        <div class = \"for-padding\">
                            <h2>Modify/Delete PD topics</h2>
                        </div>
                        <div class=\"panel\">
                            <div class=\"well\">
                                <div class=\"form-group row\">
                                    <label for=\"topics\" class=\"col-sm-2 col-form-label\">Topic <span class=\"c\">*</span></label>
                                    <div class=\"col-sm-5\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"pd-id\" id=\"pd-id\" value =\"". $id."\"  >
                                        <input type=\"text\" class=\"form-control\" name=\"topics\" id=\"topics\" value =\"". $name."\"  >
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"desc\" class=\"col-sm-2 col-form-label\">Description</label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"desc\" id=\"desc\" value =\"". $desc."\">
                                    </div>
                                </div>
                            
                                <br>
                                <div class=\"form-group row\">
                                    <div class=\"col-sm-2\">&nbsp;
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"update-pd\" id=\"update-pd\">Modify</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"del-pd\" id=\"del-pd\">Delete</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <a href=\"view_pd_topics.php\" class=\"btn btn-info btn-block\" id=\"view-pd\" name=\"view-pd\" style=\"text-decoration: none; color:white;\">Go to View </a>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         ";
    }
}
else if (isset($_POST['update-pd'])){
//     This executes when you are already on modify page and updating the data
    $id = $_POST['pd-id'];
    $name = $_POST['topics'];
    $desc = $_POST['desc'];
//    $statement = "UPDATE table tbl_k12_presenter SET presenter_name = ".$name.", presenter_description = ".$desc.", presenter_weight = ".$wgt."where presenter_Id =" . $id;
//    echo $statement;
//    $query = $conn->prepare($statement);
    $query = $conn->prepare("
        UPDATE pd_topics
		SET topic = '$name', 
		pd_desc = '$desc'
		WHERE pd_id = '$id'
		");
    try{
        $query->execute();
        $success = TRUE;
        //echo "updated admin settings<br>";
    }
    catch(PDOException $e){
        $success = FALSE;
    }
    echo "<div class=\"container\">
                 <form action=\" ".$url_mod." \"   method=\"post\">
                    <div class=\"well\">
                        <div class = \"for-padding\">
                            <h2>Modify/Delete PD topics</h2>
                        </div>
                        <div class=\"panel\">
                            <div class=\"well\">
                                <div class=\"form-group row\">
                                    <label for=\"topics\" class=\"col-sm-2 col-form-label\">Topic <span class=\"c\">*</span></label>
                                    <div class=\"col-sm-5\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"pd-id\" id=\"pd-id\" value =\"". $id."\" >
                                        <input type=\"text\" class=\"form-control\" name=\"topics\" id=\"topics\" value = \"".$name."\" >
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"desc\" class=\"col-sm-2 col-form-label\">Description</label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"desc\" id=\"desc\" value= \"".$desc."\">
                                    </div>
                                </div>
                              
                                <br>
                                <div class=\"form-group row\">
                                    <div class=\"col-sm-2\">&nbsp;
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"update-pd\" id=\"update-pd\">Modify</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"del-pd\" id=\"del-pd\">Delete</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <a href=\"view_pd_topics.php\" class=\"btn btn-info btn-block\" id=\"view-pd\" name=\"view-pd\" style=\"text-decoration: none; color:white;\">Go to View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         ";

}
else if (isset($_POST['del-pd']))
{
// This executes when you are already on modify page and deleting the data the data
    $id = $_POST['pd-id'];
    $name = $_POST['topics'];
    $desc = $_POST['desc'];
    $query = $conn->prepare("
        Delete from pd_topics
		WHERE pd_id = '$id'
		");
    try{
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> You have succesfully Deleted the PD topic. </label> <br><br>
        <a href = \"view_pd_topics.php\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    }
    catch(PDOException $e){
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Presenter Not Deleted. </label>
        <a href=\".$url_view .\" class = \"btn btn-info \">Go to View</a>
        </div>
        ";
    }

}
else
{}
?>
<?php include "php/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>


