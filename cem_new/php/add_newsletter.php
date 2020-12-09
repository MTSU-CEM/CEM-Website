<?php

require "db_connect.php";
require "vars.php";

//include "forms/presenter_form.php";
if (isset($_POST['add-newsletter'])) {
    $panel_name = $_POST['panel_name'];
    $show_row = $_POST['show_row'];
    $links = $_POST['links'];
    $name_for_link = $_POST['name_for_link'];
    $panel_title = $_POST['panel_title'];


    $query = $conn->prepare("INSERT INTO homepage_edit (panel_name, show_row, links, presenter_name, title, name_for_link, panel_title) VALUES (?,?,?,?,?,?,?)");
    $query->bindParam(1, $panel_name, PDO::PARAM_STR, 60);
    $query->bindParam(2, $show_row, PDO::PARAM_STR, 60);
    $query->bindParam(3, $links, PDO::PARAM_STR, 60);
    $query->bindParam(4, $name_for_link, PDO::PARAM_STR, 60);
    $query->bindParam(5, $panel_title, PDO::PARAM_STR, 60);
    try {
        $query->execute();
        $success = TRUE;
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage() . " <br/>";
        $success = FALSE;
    }
}