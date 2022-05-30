<?php
session_start();
if(isset($_SESSION['unique_id'])){ //if user logged in already
    header("location: inbox");
}
?>
<?php include_once("includes/head.php"); ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <?php include_once("includes/header.php")?>
            <form action="#">
                <?php include_once("includes/error-message.php")?>
                <div class="login-details">
                    <div class="field input">
                        <label for="email">email address</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email Address" required>
                    </div>
                    <div class="field input">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                        <?php include_once("includes/show-hide-toggle-eye.php"); ?>
                    </div>
                </div>
                <?php include_once("includes/continue-chat-btn.php")?>
            </form>
            <div class="link">don't yet signed up? <a href="signup">sign up now</a></div>
            <?php include_once("includes/signup-login-gif.php")?>
        </section>
    </div>

    
    <?php include_once("includes/foot.php")?>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>