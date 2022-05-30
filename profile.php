<?php
include_once("includes/session-redirect.php");
include_once("includes/head.php"); 
?>

<body>
    <div class="wrapper">
        <?php
        $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
        //check if user online or not
        ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
        ?>
        <section class="profile">
            <header>
                <a href="inbox" class="back-icon" title="Go back to your inbox">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="content">
                    <img src="images/<?=$row['img']?>" alt="">
                    <div class="details">
                        <span class="user-name name-details"><?=$row['fname'] . " " . $row['lname']?></span>
                    </div>
                </div>
            </header>
            <script>
                var checkedValue = "checked";
            </script>
            <div class="settings">
                <div class="settings-devider profile-settings">
                    <div class="settings-item darkmodeToggle">
                        <div class="settings-item-label">dark mode</div>
                        <div class="settings-item-switch settings-item-switch-theme">
                            <i class="fa-solid fa-moon" id="dark-on"></i>
                            <i class="fa-solid fa-sun" id="dark-off"></i>
                        </div>
                    </div>
                    <div class="settings-item gradientToggle">
                        <div class="settings-item-label">gradient mode</div>
                        <!-- <div class="settings-item-switch">
                            <input type="radio" id="gradient-off" name="gradient" value="off" checked="checked"/>
                            <label for="gradient-off">Off</label>
                            <input type="radio" id="gradient-on" name="gradient" value="on" />
                            <label for="gradient-on">On</label>
                        </div> -->
                    </div>
                    <div class="settings-item activeStatusToggle">
                        <div class="settings-item-label">active status</div>
                        <!-- <div class="settings-item-switch">
                            <input type="radio" id="active-status-off" name="active-status" value="off"/>
                            <label for="active-status-off">Off</label>
                            <input type="radio" id="active-status-on" name="active-status" value="on" checked="checked"/>
                            <label for="active-status-on">On</label>
                        </div> -->
                    </div>
                    <div class="settings-item logoutToggle">
                        <div class="settings-item-label">log out</div>
                        <div class="settings-item-switch">
                            <a href="php/logout.php?logout_id=<?=$row['unique_id']?>" class="settings-item-logout" title="Log Out">
                                <i class="fa-solid fa-power-off"></i>
                            </a>
                        </div>
                    </div>


                </div>
                <div class="settings-devider account-settings">
                    <a href="#" class="settings-item change-name">change name</a>
                    <a href="#" class="settings-item change-image">change profile image</a>
                    <a href="#" class="settings-item change-email">change email</a>
                    <a href="#" class="settings-item change-password">change password</a>
                    <a href="#" class="settings-item delete-account">delete your account</a>
                </div>
            </div>
            
        </section>
    </div>

    <?php include_once("includes/foot.php")?>
    <script src="javascript/users.js"></script>
</body>
</html>