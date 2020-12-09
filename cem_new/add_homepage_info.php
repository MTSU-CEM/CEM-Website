<?php
require "php/db_connect.php";
require "php/vars.php";


$panel = 'Contact';
$query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = ".$panel );
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {
    while ($row = $query->fetch()) {
        $contact_name = $row['name_for_link'];
        $contact_title = $row['panel_title'];
    }
}

$panel = 'Newsletter';
$query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Newsletter' and show_row = 'Y'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {
    while ($row = $query->fetch()) {
        $newsletter_links_path = $row['links'];
        $newsletter_links = $row['name_for_link'];
        $newsletter_link_desc = $row['link_desc'];

    }
}

$panel = 'Quicklink';
$query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Quicklink' and show_row = 'Y'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {
    while ($row = $query->fetch()) {
        $quicklink_links_path = $row['links'];
        $quicklink_links = $row['name_for_link'];

    }
}

$panel = 'About';
$query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = ".$panel." and show_row = 'Y'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {
    while ($row = $query->fetch()) {
        $about = $row['link_desc'];

    }
}

$panel = 'Slideshow';
$query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = ".$panel." and show_row = 'Y'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {
    while ($row = $query->fetch()) {
        $slideshow_image_desc = $row['link_desc'];
        $slideshow_image = $row['link'];

    }
}