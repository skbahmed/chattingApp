<?php

session_start();

include_once "config.php";
$fname = mysqli_real_escape_string($db, $_POST['firstName']);
$lname = mysqli_real_escape_string($db, $_POST['lastName']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$repassword = mysqli_real_escape_string($db, $_POST['rePassword']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){ //if all field filled up

    // email validation
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if valid email

        //email existance
        $sql = mysqli_query($db, "SELECT email FROM users WHERE email = '{$email}' ");

        if(mysqli_num_rows($sql)<=0){ //if email not exist

            //checking password length
            if(strlen($password)>=8){

                // Validate password strength
                $uppercasePass = preg_match('@[A-Z]@', $password);
                $lowercasePass = preg_match('@[a-z]@', $password);
                $numberPass    = preg_match('@[0-9]@', $password);
                // $specialCharsPass = preg_match('@[^\w]@', $password);

                if(($uppercasePass || $lowercasePass) & $numberPass) { //if password contain alphabet and number

                    if($password === $repassword){ //if both passwords are same

                        //encrypt password
                        $encrPass = password_hash($password, PASSWORD_DEFAULT); //password encrypted

                        //image uploaded or not
                        if(isset($_FILES['userImage'])){ //if image is uploaded
                            $img_name = $_FILES['userImage']['name']; //getting uploaded image name
                            $img_type = $_FILES['userImage']['type']; //getting uploaded image type
                            $tmp_name = $_FILES['userImage']['tmp_name']; //getting temporary name for saving/moving file in our selected image folder
                            //explode image and get the extension like jpg,png,jpeg
                            $img_explode = explode('.', $img_name);
                            $img_ext = end($img_explode); //getting uploaded image extension
                            $extensions = ['png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG']; //supported extensions for profile picture
        
                            if(in_array($img_ext, $extensions) === true){ //if extension matched
                                $time = time(); //getting uploaded time. required for getting an unique image name
                                //moving the uploaded file to the selected imgae folder
                                $new_img_name = $time.$img_name;
        
                                if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){ //uploaded img move to images folder
                                    $status = "active now"; //once user signed up then status will be active now
                                    $random_id = rand(time(), 10000000); //creating random number for unique user id
        
                                    //insert all user data inside users table
                                    $dataSql = mysqli_query($db, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$encrPass}', '{$new_img_name}', '{$status}')");
        
                                    if($dataSql){ //if data inserted successfully
                                        $dataSql2 = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}' ");
                                        if(mysqli_num_rows($dataSql2)>0){
                                            $row = mysqli_fetch_assoc($dataSql2);
                                            $_SESSION['unique_id'] = $row['unique_id']; //this session unique id will be used in other php file
        
                                            echo "success";
                                        }
                                    }else{
                                        echo "Something went wrong ! Try again please...";
                                    }
                                }
        
                            }else{
                                echo "Please select an valid image file - (Ex : .png, .jpeg, .jpg)"; //if extension not matched
                            }
                        }else{
                            echo "Please upload an image for your profile !"; //if image is not uploaded
                        }
                    }else{
                        echo "Both passwords are not same !"; //if password and retype password not matched
                    }
                }else{
                    echo "Password not strong ! Use a strong password (alphabet and number)"; //if password don't contain alphabet and number
                }
            }else{
                echo "Password too short ! Use 8 characters or more"; //if password contain less than 8 character
            }
        }else{
            echo "$email - This email already exist with another user !"; //if email exist
        }
    }else{
        echo "$email - This is not a valid email !"; //if invalid email
    }
}else{
    echo "All input fields are required !"; //if blank input
}
?>