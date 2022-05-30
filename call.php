<?php
include_once("includes/session-redirect.php");
include_once("includes/head.php"); 
?>

<body>
    <div class="wrapper">
        <?php
        if(isset($_GET['audio_call_receiver_id'])){
            $call_receiver_id = $_GET['audio_call_receiver_id'];
            $call_type = "Audio Call";
            $call_icon = "fa-phone-volume";
        }elseif(isset($_GET['video_call_receiver_id'])){
            $call_receiver_id = $_GET['video_call_receiver_id'];
            $call_type = "Video Call";
            $call_icon = "fa-video";
        }
        $user_id = mysqli_real_escape_string($db, $call_receiver_id);
        $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = '$user_id'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <section class="call-area">
            <span class="call-icon"><i class="fa-solid <?=$call_icon?>"></i></span>
            <div class="call-info details">
                <?=$call_type?> is connecting with
                <a href="chat.php?user_id=<?=$user_id?>" title="Bact to chat">
                    <span class="call-receiver-info user-name name-details"><?=$row['fname'].' '.$row['lname']?></span>
                </a>
            </div>
            <div class="call-cut">
                <a href="chat.php?user_id=<?=$user_id?>" class="call-cut-icon" title="Cut <?=$call_type?> with <?=$row['fname'].' '.$row['lname']?>">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
        </section>
    </div>
    
    <?php include_once("includes/foot.php")?>
    <script src="javascript/chat.js"></script>
</body>
</html>