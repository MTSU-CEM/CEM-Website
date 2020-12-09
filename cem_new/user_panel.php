<?php
// start php session
session_start();
require "php/vars.php";

if (!((isset($_SESSION["authenticated"])) && ($_SESSION["authenticated"])))
{
    header("Location: $site_root/user_login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Center for Educational Media | User Panel</title>
<!-- data tables style stuff -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- custom style sheet -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- data tables js stuff, not sure if all of this is necessary -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    var table = $('#certTable').DataTable({
        "pageLength": -1,
        dom: 'Bfrti',
        buttons: [
            'copy','excel','csv','pdf','print'
        ]
    });
    table.buttons().container().appendTo($('#buttons'));
});


function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>

</head>

<body>
<!-- nav bar -->
<?php
  require "php/db_connect.php";
  require "php/vars.php";
  require "php/navbar.php";

?>
<!-- load all conference settings -->
<?php
  $settings_query = $conn->prepare('SELECT * FROM events');
  $settings_query->setFetchMode(PDO::FETCH_ASSOC);
  $settings_query->execute();
?>

<div class="container"> <!-- page content div start -->
    <div id="alerts_div">&nbsp;</div>

    <!-- Tab links -->
    <div class="btn-group">
        <button id="viewbtn" class="btn btn-secondary" onclick="openTab(event, 'view')">View</button>
        <button id="editbtn" class="btn btn-secondary" onclick="openTab(event, 'edit')">Edit</button>
        <button id="certbtn" class="btn btn-secondary" onclick="openTab(event, 'certs')">Webcast Certificates</button>
    </div>

    <!-- Tab content -->
    <div id="view" class="tabcontent">
    <h2 style="font-family: Georgia">View</h2>
    <div class="col-sm-6 text-left" style="text-align: left; font-size: 15px; background-color:white;">
        <div class="well">
            <fieldset>
             <legend style="font-family: Georgia">Information</legend>
             <ul>
                 <li><b>First Name:&nbsp;&nbsp;&nbsp;</b> <?php echo $_SESSION["Fname"];?></li>
                 <li><b>Last Name: &nbsp;&nbsp;&nbsp;</b><?php echo $_SESSION["Lname"];?></li>
                 <li><b>User Name: &nbsp;&nbsp;&nbsp;</b><?php echo $_SESSION["uname"];?></li>
             </ul>
             <br>
            </fieldset>
             <fieldset>
            <legend style="font-family: Georgia">History</legend>
            <ul>
                <li><b>Member since: </b><?php echo $_SESSION['signup_date'];?></li>
            </ul>
            </fieldset>
            </div>
        </div>
    </div>
    <div id="edit" class="tabcontent">
    <h2 style="font-family: Georgia">Edit</h2>
    <?php require "forms/user_edit_form.php"?>
    </div>

    <div id="certs" class="tabcontent">
    <h2 style="font-family: Georgia">Webcast Certificates</h2>
    <?php
    // get all certificates for current user
        $query = $conn->prepare("SELECT Certificate,Date_Earned from users JOIN certificates on users.User_Id LIKE ?");
        $user_name = $_SESSION["uname"];
        // bind parameters
        $query->bindParam(1,$user_name,PDO::PARAM_STR,255);
        try{
            $query->execute();
        }
        catch(PDOException $e){
            echo $e;
        }
        if ($query->rowCount() > 0)
        {
            $results = "
            <div id=\"buttons\"></div>
            <table id=\"certTable\" style=\"float: left;\">
            <thead>
                <tr>
                    <td>Certificate</td>
                    <td>Date Earned</td>
                </tr>
            </thead>
            <tbody>";
            $array = $query->fetchAll();
            foreach($array as $item) 
            {
                $cert_name = $item["Certificate"];
                $date_earned = $item["Date_Earned"];
                $results .= "
                <tr>
                    <td> $cert_name </td>
                    <td> $date_earned </td>
                </tr>";
            }
            $results .= "
            </tbody>     
            <tfoot>
            <tr>
                <td>Certificate</td>
                <td>Date Earned</td>
            </tr>
            </tfoot>
            </table>";
        }
        else
        {
           $results = "<p>You have not earned any certificates.</p>"; 
        }
        echo $results;
    ?>


    </div>

</div> <!-- end page content div -->

<br><br><br><br><br><br><br><br>
<?php
include "php/footer.php"; 
if(isset($_SESSION['alerts']))
{
    $val = $_SESSION['alerts'];
    unset($_SESSION['alerts']);  
    echo<<<SCRIPT
    <script type="text/javascript">
      document.getElementById("alerts_div").innerHTML =  "$val"
      setTimeout(function(){ document.getElementById("alerts_div").innerHTML = "&nbsp;"; }, 8000);
    </script>
SCRIPT;
}
?>
<script>
<?php echo 'document.getElementById("viewbtn").click();';?>
</script>


</body>
</html>
