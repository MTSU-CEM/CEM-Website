<!--This page is called when add, edit button is clicked for Newsletter Quicklink, Slideshow, About -->

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
$url_mod = $site_root. "/modify_homepage.php";
$url_view = $site_root. "/admin_panel.php";

?>

<?php
require "php/db_connect.php";
require "php/vars.php";
// fetching value from database for ID value received in url and display on the screen
// This executed as you come from the view page
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $statement = "SELECT * FROM homepage_edit where item_id =" . $id;
    $query = $conn->prepare($statement);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $num_open = $query->rowCount();
    if ($num_open > 0) {
        $row = $query->fetch();
        $id = $row['item_id'];
        $panel_name = $row['panel_name'];
        $panel_title = $row['panel_title'];
        $link = $row['links'];
        $show_row = $row['show_row'];
        $name_for_link = $row['name_for_link'];
        $desc = $row['link_desc'];
        if ($panel_name == 'Contact') {
            $lblname = 'Contact';
        }
        elseif($panel_name == 'Newsletter'){
            $lblname = 'Title for Newsletter link';
        }
        elseif($panel_name == 'Quicklink'){
            $lblname = 'Title for Quicklink link';
        }
        else{
            $lblname = 'Title';
        }
        echo "<div class=\"container\">

                 <form action=\" " . $url_mod . " \"   method=\"post\">
                    <div class=\"well\">
                        <div class = \"for-padding\">
                            <h2>Modify/Delete Homepage Information</h2>
                        </div>
                        <div class=\"panel\">
                            <div class=\"well\">
                                <div class=\"form-group row\">
                                 ";
                                if ($panel_name == 'About'){
                                    echo "
                                        <label for=\"2\" class=\"col-sm-2 col-form-label\" hidden>Department<br> (Contacts) </label>
                                    <div class=\"col-sm-5\" hidden>
                                        <input type=\"hidden\" class=\"form-control\" name=\"1\" id=\"1\" value =\" " . $id . "\"  >
                                        <input type=\"text\" class=\"form-control\" name=\"2\" id=\"2\" value =\" " . $panel_title . "\"  >
                                    </div>";
                                }
                                elseif ($panel_name == 'Contact'){
                                    echo "
                                        <label for=\"2\" class=\"col-sm-2 col-form-label\" >Department </label>
                                    <div class=\"col-sm-5\" >
                                        <input type=\"hidden\" class=\"form-control\" name=\"1\" id=\"1\" value =\" " . $id . "\"  >
                                        <input type=\"text\" class=\"form-control\" name=\"2\" id=\"2\" value =\" " . $panel_title . "\"  >
                                    </div>";
                                }
                                elseif ($panel_name == 'Slideshow'){
                                    echo "
                                        <label for=\"2\" class=\"col-sm-2 col-form-label\" hidden>Department<br> (Contacts) </label>
                                    <div class=\"col-sm-5\" hidden>
                                        <input type=\"hidden\" class=\"form-control\" name=\"1\" id=\"1\" value =\" " . $id . "\"  >
                                        <input type=\"text\" class=\"form-control\" name=\"2\" id=\"2\" value =\" " . $panel_title . "\"  >
                                    </div>";
                                }
                                    echo "
                                    
                                </div>
                                <div class=\"form-group row\">";
                                if ($panel_name == 'Slideshow' or $panel_name == 'About'){
                                    echo "
                                        <label for=\"3\" class=\"col-sm-2 col-form-label\"hidden> $lblname </label>
                                    <div class=\"col-sm-7\" hidden>
                                        <input type=\"text\" class=\"form-control\" name=\"3\" id=\"3\" value =\" " . $name_for_link . "\">
                                    </div>";
                                }else{
                                echo "
                                    <label for=\"3\" class=\"col-sm-2 col-form-label\"> $lblname </label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"3\" id=\"3\" value =\" " . $name_for_link . "\">
                                    </div>";
                                }
                                echo "
                                </div>
                              
                                <div class='form-group row'>
                                ";
                                if ($panel_name == 'About'){
                                    echo "
                                    <label for='5' class=\"col-sm-2 col-form-label\">About<br></label>
                                    <div class='col-sm-7'>
                                        <textarea type='text' class='form-control' name='5' id='5' style=' height: 130px;'> $desc </textarea>
                                    </div>";
                                }
                                elseif($panel_name == 'Newsletter'){
                                    echo "
                                    <label for='5' class=\"col-sm-2 col-form-label\">Description about Newsletter<br></label>
                                    <div class='col-sm-7'>
                                        <textarea type='text' class='form-control' name='5' id='5' style=' height: 130px;'> $desc </textarea>
                                    </div>";
                                }
                                elseif($panel_name == 'Quicklink'){
                                    echo "
                                    <label for='5' class=\"col-sm-2 col-form-label\">Description about Quicklink<br></label>
                                    <div class='col-sm-7'>
                                        <textarea type='text' class='form-control' name='5' id='5' style=' height: 130px;'> $desc </textarea>
                                    </div>";
                                }
                                elseif($panel_name == 'Slideshow'){
                                    echo "
                                    <label for='5' class=\"col-sm-2 col-form-label\">Description about Photo <br></label>
                                        <div class='col-sm-7'>
                                        <textarea type='text' class='form-control' name='5' id='5' style=' height: 130px;'> $desc </textarea>
                                    </div>";
                                }
                                elseif($panel_name == 'Contact'){
                                    echo "
                                    <label for='5' class=\"col-sm-2 col-form-label\" hidden>Description about Photo <br></label>
                                        <div class='col-sm-7' hidden>
                                        <textarea type='text' class='form-control' name='5' id='5' style=' height: 130px;' hidden> $desc </textarea>
                                    </div>";
                                }
                                echo "
                       
                                </div>
                                <div class=\"form-group row\" >
                                ";
                                if($panel_name == 'Newsletter'){
                                    echo "<label for='5' class=\"col-sm-2 col-form-label\">Newsletter link<br></label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"6\" id=\"6\" value =\" " . $link . "\">
                                    </div>";
                                }
                                elseif($panel_name == 'Quicklink'){
                                    echo "<label for='5' class=\"col-sm-2 col-form-label\">Quicklink link<br></label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"6\" id=\"6\" value =\" " . $link . "\">
                                    </div>";
                                }
                                elseif($panel_name == 'Slideshow'){
                                    echo "<label for='5' class=\"col-sm-2 col-form-label\">Photo Name<br></label>
                                    <div class=\"col-sm-7\">
                                        <input type=\"text\" class=\"form-control\" name=\"6\" id=\"6\" value =\" " . $link . "\">
                                    </div>";
                                }
                                elseif($panel_name == 'About'){
                                    echo "<label for='5' class=\"col-sm-2 col-form-label\" hidden>Photo Name<br></label>
                                    <div class=\"col-sm-7\" hidden>
                                        <input type=\"text\" class=\"form-control\" name=\"6\" id=\"6\" value =\" " . $link . "\">
                                    </div>";
                                }
                                elseif($panel_name == 'Contact'){
                                    echo "<label for='5' class=\"col-sm-2 col-form-label\" hidden>Photo Name<br></label>
                                    <div class=\"col-sm-7\" hidden>
                                        <input type=\"text\" class=\"form-control\" name=\"6\" id=\"6\" value =\" " . $link . "\" hidden>
                                    </div>";
                                }
                                echo "
                                </div>
                                <div class=\"form-group row\">
                                    <label for=\"4\" class=\"col-sm-2 col-form-label\">Show on Homepage</label>
                                    <div class=\"col-sm-7\">
                                        <select class=\"form-control\" name=\"4\" id=\"4\" selected =\" " . $show_row. "\">
                                        <option value = 'Y'>Y</option>
                                        <option value = 'N'>N</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class=\"form-group row\">
                                    <div class=\"col-sm-2\">&nbsp;
                                    </div>
                                    <div class=\"col-sm-2\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"update-pd\" id=\"update-pd\">Modify</button>
                                    </div>
                                    <div class='col-sm-2'>
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"del-pd\" id=\"del-pd\">Delete</button>
                                    </div>
                                    <div class='col-sm-2'>
                                        <a href='$url_view' class=\"btn btn-info btn-block\" id=\"view-pd\" name=\"view-pd\" style=\"text-decoration: none; color:white;\">Go to View </a>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         ";

//        }
    }
}

else if (isset($_POST['update-pd'])){
//     This executes when you are already on modify page and updating the data
    $one = $_POST['1']; //id
    $two = $_POST['2']; //panel_title
    $three = $_POST['3']; //name for link or contact name
    $four = $_POST['4']; // Show row
    $five = $_POST['5']; //link_desc
    $six = $_POST['6']; //link
    $query = $conn->prepare("
        UPDATE homepage_edit
		SET panel_title = '$two', 
		link_desc = '$five', links = '$six', name_for_link = '$three', show_row = '$four'
		WHERE item_id = '$one'
		");
    try{
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Updated Successful. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    }
    catch(PDOException $e){
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Column not updated. </label>
        <a href=\"$url_view\" class = \"btn btn-info \">Go to View</a>
        </div>
        ";
    }

}
else if (isset($_POST['del-pd']))
{
// This executes when you are already on modify page and deleting the data the data
    $one = $_POST['1']; //id
    $query = $conn->prepare("
        Delete from homepage_edit
		WHERE item_id = '$one'
		");
    try{
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> You have successfully Deleted the entry. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    }
    catch(PDOException $e){
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Entry Not Deleted. </label>
        <a href=\"$url_view\" class = \"btn btn-info \">Go to View</a>
        </div>
        ";
    }

}
elseif (isset($_GET['add-contact'])) {
    $panel_title = $_GET['panel_title'];
    $name_for_link = $_GET['name_for_link'];
    $show_row = $_GET['showrow'];
    $panel_name = 'Contact';
    $item_desc = '';
    $links = '';

    $query = $conn->prepare("INSERT INTO homepage_edit (panel_name, show_row, links, name_for_link, panel_title, link_desc) VALUES (?,?,?,?,?,?)");
    $query->bindParam(1, $panel_name, PDO::PARAM_STR, 60);
    $query->bindParam(2, $show_row, PDO::PARAM_STR, 60);
    $query->bindParam(3, $links, PDO::PARAM_STR, 60);
    $query->bindParam(4, $name_for_link, PDO::PARAM_STR, 60);
    $query->bindParam(5, $panel_title, PDO::PARAM_STR, 60);
    $query->bindParam(6, $item_desc, PDO::PARAM_STR, 60);

    try {
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Contact Added </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Failed to add contact. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";

    }
}
elseif (isset($_GET['add-newsletter'])) {
    $panel_title = '';
    $name_for_link = $_GET['name_for_link'];
    $show_row = $_GET['showrow'];
    $panel_name = 'Newsletter';
    $item_desc = $_GET['link_desc'];
    $links = $_GET['links'];;

    $query = $conn->prepare("INSERT INTO homepage_edit (panel_name, show_row, links, name_for_link, panel_title, link_desc) VALUES (?,?,?,?,?,?)");
    $query->bindParam(1, $panel_name, PDO::PARAM_STR, 60);
    $query->bindParam(2, $show_row, PDO::PARAM_STR, 60);
    $query->bindParam(3, $links, PDO::PARAM_STR, 60);
    $query->bindParam(4, $name_for_link, PDO::PARAM_STR, 60);
    $query->bindParam(5, $panel_title, PDO::PARAM_STR, 60);
    $query->bindParam(6, $item_desc, PDO::PARAM_STR, 60);

    try {
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Newsletter Added </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Failed to add Newsletter. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";

    }
}
elseif (isset($_GET['add-quicklink'])) {
    $panel_title = '';
    $name_for_link = $_GET['name_for_link'];
    $show_row = $_GET['showrow'];
    $panel_name = 'Quicklink';
    $item_desc = $_GET['link_desc'];
    $links = $_GET['links'];;

    $query = $conn->prepare("INSERT INTO homepage_edit (panel_name, show_row, links, name_for_link, panel_title, link_desc) VALUES (?,?,?,?,?,?)");
    $query->bindParam(1, $panel_name, PDO::PARAM_STR, 60);
    $query->bindParam(2, $show_row, PDO::PARAM_STR, 60);
    $query->bindParam(3, $links, PDO::PARAM_STR, 60);
    $query->bindParam(4, $name_for_link, PDO::PARAM_STR, 60);
    $query->bindParam(5, $panel_title, PDO::PARAM_STR, 60);
    $query->bindParam(6, $item_desc, PDO::PARAM_STR, 60);

    try {
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Quicklink Added </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Failed to add Quicklink. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";

    }
}
elseif (isset($_GET['add-slideshow'])) {
    $show_row = $_GET['showrow'];
    $panel_name = 'Slideshow';
    $item_desc = $_GET['link_desc'];
    $links = $_GET['links'];;

    $query = $conn->prepare("INSERT INTO homepage_edit (panel_name, show_row, links, link_desc) VALUES (?,?,?,?)");
    $query->bindParam(1, $panel_name, PDO::PARAM_STR, 60);
    $query->bindParam(2, $show_row, PDO::PARAM_STR, 60);
    $query->bindParam(3, $links, PDO::PARAM_STR, 60);
    $query->bindParam(4, $item_desc, PDO::PARAM_STR, 60);

    try {
        $query->execute();
        $success = TRUE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Photo added to the Slideshow </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
        </div>
        ";
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
        echo"
        <div align = \"center\">
        <label class = \"lblbluecolor\"> Failed to add photo to Slideshow. </label> <br><br>
        <a href = \"$url_view\" class = \" btn btn-info \">Go to View</a>
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


