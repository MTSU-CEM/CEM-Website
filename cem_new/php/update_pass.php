<?php
require "db_connect.php";
require "vars.php";
include "register_user.php";
$errors = NULL;
$query = $conn->prepare("SELECT * FROM users");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$num_open = $query->rowCount();
if ($num_open > 0) {

    if (check_post_vars($_POST, $errors)) {
        // confirm passwords match
        if ($_POST["npassw"] != $_POST["rnpassw"]) {
            $errors[] = "Passwords do not match, please try again";
        } else {
            $password = $_POST["npassw"];
            $passtools = new PasswordTools();
            // generate salt
            $salt = $passtools->salt();
            // hash password with salt
            $hashed_password = $passtools->hash($password, $salt);
            // pepper is site wide and stored on server in vars file...
            $encrypted_hash = $passtools->encrypt($hashed_password, $pepper);
            // store encrypted hash and its corresponidng salt together
            $query = $conn->prepare("UPDATE users
            SET Pass = '$encrypted_hash', 
            Salt = '$salt'
            WHERE presenter_Id = '$id'
            ");
            try {
                $query->execute();
                $success = True;
                $decrypted_hash = $passtools->decrypt($encrypted_hash, $pepper);
                $match = $passtools->check_hash($password, $decrypted_hash, $salt);
            } catch (PDOException $e) {
                $success = False;
                echo "error: " . $e;
            }
        }

    }
}
else{
    echo "user not found";
}

