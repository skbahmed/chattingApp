<?php
    session_start();
    if(isset($_SESSION['unique_id'])){ //if user is logged in then come to this page
        include_once("config.php");
        $logout_id = mysqli_real_escape_string($db, $_GET['logout_id']);
        if(isset($logout_id)){ //if logout id is available
            $status = "offline now";
            $sql = mysqli_query($db, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login");
            }
        }else{
            header("location: ../inbox");
        }
    }else{ //otherwise go to login page
        header("location: ../login");
    }
?>