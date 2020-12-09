
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- nav bar -->
<?php
$urls = "add_presenter.php";
$view_urls = "view_presenter.php";
?>
<div class="container">
    <form action="" method="post">
            <div class="well">
                <div class = "for-padding">
                    <h2>New Presenter</h2>
                </div>
                <div class="panel">
                    <div class="well">
                        <div class="form-group row">
                            <label for="pres-name" class="col-sm-2 col-form-label">Presenter Name <span class="c">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="pres-name" name="pres-name" placeholder="Enter Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pres-desc" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="pres-desc" name="pres-desc" placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pres-wgt" class="col-sm-2 col-form-label">Weight</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="pres-wgt" name="pres-wgt" value="0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-2">&nbsp;
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block" id="add-pres" name="add-pres" >Save</button>
                            </div>
                            <div class="col-sm-2">
                                <a href="<?php echo $view_urls; ?>" class="btn btn-info btn-block" id="view-pres" name="view-pres" style="text-decoration: none; color:white;">Go to View </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require "php/db_connect.php";
require "php/vars.php";

//include "forms/presenter_form.php";
if (isset($_POST['add-pres']))
{
    $name = $_POST['pres-name'];
    $desc = $_POST['pres-desc'];
    $wgt = $_POST['pres-wgt'];
    savePresenter($conn, $name, $desc, $wgt);
}

function savePresenter($conn, $name, $desc, $wgt)
{

    $query = $conn->prepare("INSERT INTO tbl_k12_presenter (presenter_name, presenter_description,presenter_weight) VALUES (?,?,?)");
    $query->bindParam(1,$name,PDO::PARAM_STR,60);
    $query->bindParam(2,$desc,PDO::PARAM_STR,60);
    $query->bindParam(3,$wgt,PDO::PARAM_STR,60);
    try{
        $query->execute();
        $success = TRUE;
    }
    catch(PDOException $e){
        echo "Query Failed: " . $e->getMessage() ." <br/>";
        $success = FALSE;
    }

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
