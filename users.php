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
        <section class="users">
            <header>
                <a href="profile" title="View your profile">
                    <div class="content">
                        <img src="images/<?=$row['img']?>" alt="">
                        <div class="details">
                            <span class="user-name name-details"><?=$row['fname'] . " " . $row['lname']?></span>
                            <div class="status-dot <?=$offline?>">
                                <i class="fas fa-circle"></i>
                                <p class="status-text"><?=$row['status']?></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="php/logout.php?logout_id=<?=$row['unique_id']?>" class="logout" title="Log Out"><i class="fa-solid fa-power-off"></i></a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button title="Search User"><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- getting data from data.php via users.js and php/users.php file -->
            </div>
        </section>
    </div>

    <?php include_once("includes/foot.php")?>
    <script src="javascript/users.js"></script>
</body>
</html>