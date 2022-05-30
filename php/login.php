<?php

session_start();

include_once "config.php";
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

if(!empty($email) && !empty($password)){ //if field not blanked

    //verify email
    $sql = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}' ");

    if(mysqli_num_rows($sql) > 0){ //if email verified

        //database encrypted password verify
        $row = mysqli_fetch_assoc($sql);
        $verifyPassword = password_verify($password, $row['password']);

        if($verifyPassword == 1){ //if password verified
            
            // change status to active now when user logged in
            $status = "active now";
            $sql2 = mysqli_query($db, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}"); 
            
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id']; //this session unique id will be used in other php file
                echo "success";
            }
        }else{
            echo "Password is incorrect !"; //if password not matched
        }
    }else{
        echo "Email is incorrect !"; //if email not matched
    }
}else{
    echo "All input fields are required !"; //if field blanked
}


?>