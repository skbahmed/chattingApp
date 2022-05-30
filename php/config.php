<?php
    $db = mysqli_connect("localhost", "root", "", "chattingapp");
    $db->set_charset("utf8mb4");

    // $db = new PDO("mysql:host=localhost;dbname=chattingapp;charset=utf8mb4;", "root", "");
    if(!$db){
        echo "Database Not Connected" . mysqli_connect_error();
    }
?>