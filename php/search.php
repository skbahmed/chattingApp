<?php
session_start();
include_once "config.php";
$searchTerm = mysqli_real_escape_string($db, $_POST['searchTerm']);
$output = "";
$outgoing_id = $_SESSION['unique_id'];

$sql = mysqli_query($db, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ");
if(mysqli_num_rows($sql) > 0){
    include_once("data.php");
}else{
    $output .= "No user found related to your search term !";
}
echo $output;
?>