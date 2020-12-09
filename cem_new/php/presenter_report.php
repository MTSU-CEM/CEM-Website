<?php
require "db_connect.php";
require "vars.php";

$query = $conn->prepare("SELECT * FROM tbl_k12_presenter");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0){
    echo"<table class=\"table\"><thead><th>ID</th><th>Name</th><th>Description</th><th>Weight</th></thead>";
    echo"<tbody>";
    while($row=$query->fetch())
    {
        $id = $row['presenter_Id'];
        $name = $row['presenter_name'];
        $desc = $row['presenter_description'];
        $wgt = $row['presenter_weight'];
        echo"<tr><td>".$id."</td>";
        echo"<td>".$name."</td>";
        echo"<td>".$desc."</td>";
        echo"<td>".$wgt."</td>";
        echo"<td>";
        $url_edit = $site_root. "/modify_presenter.php?ID=" . $id;
        echo"<a href='".$url_edit."'>Edit / Delete</a>";
        echo"</td></tr>";
    }
    echo"</tbody></table>";
    $query = null;
}
?>
