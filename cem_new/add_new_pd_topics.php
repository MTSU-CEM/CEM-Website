
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
$urls = "add_new_pd_topics.php";
$view_urls = "view_pd_topics.php";
?>
<div class="container">
    <form action=<?php echo $urls;?>  method="post">
        <div class="well">
            <div class = "for-padding">
                <h2>New PD Topic</h2>
            </div>
            <div class="panel">
                <div class="well">
                    <div class="form-group row">
                        <label for="pd-name" class="col-sm-2 col-form-label">New Topic <span class="c">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="pd-name" name="pd-name" placeholder="Enter Name" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pd-desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="pd-desc" name="pd-desc" placeholder="Enter Description">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block" id="add-pd" name="add-pd" >Save</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo $view_urls; ?>" class="btn btn-info btn-block" id="view-pd_topics" name="view-pd_topics" style="text-decoration: none; color:white;">Go to View </a>
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
if (isset($_POST['add-pd']))
{
    $name = $_POST['pd-name'];
    $desc = $_POST['pd-desc'];
    savePD($conn, $name, $desc);
}

function savePD($conn, $name, $desc)
{

    $query = $conn->prepare("INSERT INTO pd_topics (topic, pd_desc) VALUES (?,?)");
    $query->bindParam(1,$name,PDO::PARAM_STR,60);
    $query->bindParam(2,$desc,PDO::PARAM_STR,60);
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
