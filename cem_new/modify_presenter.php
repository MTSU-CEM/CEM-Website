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
$url_mod = $site_root. "/modify_presenter.php";
$url_view = $site_root. "/view_presenter.php";

?>

<?php
require "php/db_connect.php";
require "php/vars.php";
// fetching value from database for ID value received in url and display on the screen
// This executed as you come from the view page
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $statement = "SELECT * FROM tbl_k12_presenter where presenter_Id =" . $id;
    $query = $conn->prepare($statement);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $num_open = $query->rowCount();
    if ($num_open > 0) {
        $row = $query->fetch();
        $id = $row['presenter_Id'];
        $name = $row['presenter_name'];
        $desc = $row['presenter_description'];
        $wgt = $row['presenter_weight'];
        echo "<div class=\"container\">
                 <form action=\" ".$url_mod." \"   method=\"post\">
                    <div class=\"well\">
                        <div class = \"for-padding\">
                            <h2>Modify/Delete Presenter</h2>
                        </div>
                        <div class=\"panel\">
                            <div class=\"well\">
                                <div class=\"form-group row\">
                                    <label for=\"pres-name\" class=\"col-sm-2 col-form-label\">Presenter Name <span class=\"c\">*</span></label>
                                    <div class=\"col-sm-5\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"pres-id\" id=\"pres-id\" value =\" ". $id. " \" >
                                        <input type=\"text\" class=\"form-control\" name=\"pres-name\" id=\"pres-name\" value =\" ". $name."\" >
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"pres-desc\" class=\"col-sm-2 col-form-label\">Description</label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"pres-desc\" id=\"pres-desc\" value=\"". $desc."\">
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"pres-wgt\" class=\"col-sm-2 col-form-label\">Weight</label>
                                    <div class=\"col-sm-3\">
                                        <input type=\"number\" class=\"form-control\" name=\"pres-wgt\" id=\"pres-wgt\" value=". $wgt.">
                                    </div>
                                </div>
                                <br>
                                <div class=\"form-group row\">
                                    <div class=\"col-sm-2\">&nbsp;
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"update-pres\" id=\"update-pres\">Modify</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"del-pres\" id=\"del-pres\">Delete</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <a href=\"view_presenter.php\" class=\"btn btn-info btn-block\" id=\"view-pres\" name=\"view-pres\" style=\"text-decoration: none; color:white;\">Go to View </a>
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
else if (isset($_POST['update-pres'])){
//     This executes when you are already on modify page and updating the data
    $id = $_POST['pres-id'];
    $name = $_POST['pres-name'];
    $wgt = $_POST['pres-wgt'];
    $desc = $_POST['pres-desc'];
//    $statement = "UPDATE table tbl_k12_presenter SET presenter_name = ".$name.", presenter_description = ".$desc.", presenter_weight = ".$wgt."where presenter_Id =" . $id;
//    echo $statement;
//    $query = $conn->prepare($statement);
    $query = $conn->prepare("
        UPDATE tbl_k12_presenter
		SET presenter_name = '$name', 
		presenter_description = '$desc', 
        presenter_weight = '$wgt'
		WHERE presenter_Id = '$id'
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
                            <h2>Modify/Delete Presenter</h2>
                        </div>
                        <div class=\"panel\">
                            <div class=\"well\">
                                <div class=\"form-group row\">
                                    <label for=\"pres-name\" class=\"col-sm-2 col-form-label\">Presenter Name <span class=\"c\">*</span></label>
                                    <div class=\"col-sm-5\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"pres-id\" id=\"pres-id\" value =\"". $id."\" >
                                        <input type=\"text\" class=\"form-control\" name=\"pres-name\" id=\"pres-name\" value =\"".$name."\" >
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"pres-desc\" class=\"col-sm-2 col-form-label\">Description</label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"pres-desc\" id=\"pres-desc\" value=\"".$desc."\">
                                    </div>
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"pres-wgt\" class=\"col-sm-2 col-form-label\">Weight</label>
                                    <div class=\"col-sm-3\">
                                        <input type=\"number\" class=\"form-control\" name=\"pres-wgt\" id=\"pres-wgt\" value=\"". $wgt."\">
                                    </div>
                                </div>
                                <br>
                                <div class=\"form-group row\">
                                    <div class=\"col-sm-2\">&nbsp;
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"update-pres\" id=\"update-pres\">Modify</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"del-pres\" id=\"del-pres\">Delete</button>
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <a href=\"view_presenter.php\" class=\"btn btn-info btn-block\" id=\"view-pres\" name=\"view-pres\" style=\"text-decoration: none; color:white;\">Go to View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         ";

}
else if (isset($_POST['del-pres']))
{
// This executes when you are already on modify page and deleting the data the data
    $id = $_POST['pres-id'];
    $name = $_POST['pres-name'];
    $wgt = $_POST['pres-wgt'];
    $desc = $_POST['pres-desc'];
    $query = $conn->prepare("
        Delete from tbl_k12_presenter
		WHERE presenter_Id = '$id'
		");
    try{
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> You have succesfully Deleted the Presenter. </label> <br><br>
        <a href = \"view_presenter.php\" class = \" btn btn-info \">Go to View</a>
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

