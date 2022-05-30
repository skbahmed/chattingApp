<?php
session_start();
if(isset($_SESSION['unique_id'])){ //if user logged in already
    header("location: inbox");
}
?>

<?php include_once("includes/head.php"); ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <?php include_once("includes/header.php")?>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <?php include_once("includes/error-message.php")?>
                <div class="name-details">
                    <div class="field input">
                        <label for="firstName">first name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="lastName">last name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="login-details">
                    <div class="field input">
                        <label for="email">email address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="field input">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <?php include("includes/show-hide-toggle-eye.php"); ?>
                    </div>
                    <div class="field input rePassword">
                        <label for="rePassword">Confirm Password</label>
                        <input type="password" id="rePassword" name="rePassword" placeholder="Retype Password" required>
                        <?php include("includes/show-hide-toggle-eye.php"); ?>
                    </div>
                    <div class="field image">
                        <label>Image</label>
                        <input type="file" name="userImage" required>
                    </div>
                </div>
                <?php include_once("includes/continue-chat-btn.php")?>
            </form>
            <div class="link">already signed up? <a href="login">login now</a></div>
            <?php include_once("includes/signup-login-gif.php")?>
        </section>
    </div>

    
    <?php include_once("includes/foot.php")?>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>