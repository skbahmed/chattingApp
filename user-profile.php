<?php
include_once("includes/session-redirect.php");
include_once("includes/head.php"); 
?>

<body>
    <div class="wrapper">
        <?php
        $user_id = $_GET['user_id'];
        $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
        //check if user online or not
        ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
        ?>
        <section class="profile">
            <header>
                <a href="chat.php?user_id=<?=$user_id?>" class="back-icon" title="Go back to chat with <?=$row['fname'].' '.$row['lname']?>">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="content">
                    <img src="images/<?=$row['img']?>" alt="">
                    <div class="details">
                        <span class="user-name name-details"><?=$row['fname'] . " " . $row['lname']?></span>
                    </div>
                </div>
            </header>
            
        </section>
    </div>

    <?php include_once("includes/foot.php")?>
    <script src="javascript/users.js"></script>
</body>
</html>