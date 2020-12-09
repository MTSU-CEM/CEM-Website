<?php
require "db_connect.php";
require "vars.php";

$query = $conn->prepare("SELECT * FROM pd_topics");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0){
    echo"<table class=\"table\"><thead><th>ID</th><th>Topic</th><th>Description</th></thead>";
    echo"<tbody>";
    while($row=$query->fetch())
    {
        $id = $row['pd_id'];
        $name = $row['topic'];
        $desc = $row['pd_desc'];
        echo"<tr><td>".$id."</td>";
        echo"<td>".$name."</td>";
        echo"<td>".$desc."</td>";
        echo"<td>";
        $url_edit = $site_root. "/modify_pd.php?ID=" . $id;
        echo"<a href='".$url_edit."'>Edit / Delete</a>";
        echo"</td></tr>";
    }
    echo"</tbody></table>";
    $query = null;
}
?>

