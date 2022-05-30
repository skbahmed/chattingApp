<?php
include_once("includes/session-redirect.php");
include_once("includes/head.php");
?>

<body>
    <div class="wrapper">
        <?php
        $user_id = mysqli_real_escape_string($db, $_GET['user_id']);
        $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = '$user_id'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
        //check if user online or not
        ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
        ?>
        <section class="chat-area">
            <header>
                <div class="header-left-area">
                    <a href="inbox" class="back-icon" title="Go back to your inbox">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a href="user-profile.php?user_id=<?=$user_id?>" title="View <?=$row['fname'].' '.$row['lname']?>'s profile">
                        <img src="images/<?=$row['img']?>" alt="">
                        <div class="details">
                            <span class="user-name name-details"><?=$row['fname'] . " " . $row['lname']?></span>
                            <div class="status-dot <?=$offline?>">
                                <i class="fas fa-circle"></i>
                                <p class="status-text"><?=$row['status']?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="header-right-area">
                    <a href="call.php?audio_call_receiver_id=<?=$user_id?>" title="Make audio call">
                        <span><i class="fa-solid fa-phone"></i></span>
                    </a>
                    <a href="call.php?video_call_receiver_id=<?=$user_id?>" title="Make video call">
                        <span><i class="fa-solid fa-video"></i></span>
                    </a>
                    <a href="user-profile.php?user_id=<?=$user_id?>" title="View <?=$row['fname'].' '.$row['lname']?>'s profile">
                        <span><i class="fa-solid fa-circle-info"></i></span>
                    </a>
                </div>
            </header>
            <div class="chat-box">
                <!-- CHAT DYNAMICALLY INSERTED VIA CHAT.JS AND GET-CHAT.PHP FILE -->
            </div>
            <footer>
                <form action="#" class="typing-area" autocomplete="off">
                    <input type="text" name="outgoing_id" value="<?=$_SESSION['unique_id']?>" hidden> <!-- message sender id -->
                    <input type="text" name="incoming_id" value="<?=$user_id?>" hidden> <!-- message receiver id -->
                    <!-- <input type="text" name="message" class="input-field" id="chat-input" placeholder="Type a message here..." title="Type a message here..."> -->
                    <div class="chat-input-container">
                        <textarea name="message" class="input-field" id="chat-input" placeholder="Type a message here..." title="Type a message here..."></textarea>
                        <div class="emojicon">
                            <i class="fas fa-grin"></i>
                        </div>
                        <button title="Send Message"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>
                <div class="emoji-container">
                    <ul class="emoji-header">
                        <li class="emoji-header-item active">&#128578</li>
                        <li class="emoji-header-item">&#128157</li>
                        <li class="emoji-header-item">&#128056</li>
                        <li class="emoji-header-item">&#127829</li>
                        <li class="emoji-header-item">&#128105</li>
                        <li class="emoji-header-item">&#128664</li>
                        <li class="emoji-header-item">&#9917</li>
                        <li class="emoji-header-item">&#128161</li>
                        <li class="emoji-header-item">&#128681</li>
                    </ul>
                </div>
            </footer>
        </section>
    </div>
    

    <?php include_once("includes/foot.php")?>
    <script src="javascript/chat.js"></script>
</body>
</html>