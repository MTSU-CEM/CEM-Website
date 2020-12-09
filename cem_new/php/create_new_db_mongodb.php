<?php

   // connect to mongodb
     require "../vendor/autoload.php";
     $client = new MongoDB\Client;
     echo "Connection to database successfully";  
   // select a database
     $cemdb = $client->cemdb;	
     echo "Database mydb selected";
     
     // create collection
     $result1 = $cemdb->createCollection("video_info");
     echo "Collection created succsessfully";
     

    
    /* Some commands to rememeber
     Get all collections in the db
     foreach ($cemdb->listCollections() as $collection){
        var_dump($collection);
     } 
     Get list of Database
     foreach($client->listDatabases()  as $db){
        var_dump($db);
    }
     Drop Database
     result1 = $client->dropDatabase('mydb') 
    */
    
?>