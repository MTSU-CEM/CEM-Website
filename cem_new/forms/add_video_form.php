<?php

require "../vendor/autoload.php";

$label = $_POST["label"];
$detail = $_POST["detail"];

// Connect to mongoDB
$client = new MongoDB\Client;
// connect to database
$cemdb = $client->cemdb;
//connect to collection
$collection = $cemdb->video_info;



//$insertOneResult = $collection->insertOne(['_id'=> '3' , 'title'=>'Stages of Language Acquisition: A Jigsaw', 'Video series' => 'Problem-based Instruction Strategies','Program sponsors'=> 'College of Education']);
//printf("Inserted %d cocuments",$insertOneResult->getInsertedCount());
//var_dump($insertOneResult->getInsertedId())
//?>