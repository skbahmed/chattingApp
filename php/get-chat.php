<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once("config.php");
    $outgoing_id = mysqli_real_escape_string($db, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($db, $_POST['incoming_id']);
    $output = "";

    $sql = "SELECT * FROM messages 
            LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) 
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($db, $sql);
    if(mysqli_num_rows($query) > 0){

        while($row = mysqli_fetch_assoc($query)){

            //msg sent time calculating
            $sent_time = $row['msg_time'];
            $sent_time_format = date("h:i A - d M", strtotime($sent_time));
            $msg_time = $sent_time_format;

            if($row['outgoing_msg_id'] === $outgoing_id){ //if equal then he is sender
                $output .= '<div class="chat outgoing">
                        <div class="details">
                            <pre><p>'. $row['msg'] .'</p></pre>
                            <span class="message-sending-time">'. $msg_time .'</span>
                        </div>
                    </div>';
            }else{ //if not equal he is receiver
                $output .= '<div class="chat incoming">
                        <a href="user-profile.php?user_id='. $incoming_id .'">
                            <img src="images/'. $row['img'] .'" alt="">
                        </a>
                        <div class="details">
                            <pre><p>'. $row['msg'] .'</p></pre>
                            <span class="message-sending-time">'. $msg_time .'</span>
                        </div>
                    </div>';
            }
        }
        echo $output;
    } else { //if no message available then blank chat gif will be shown
        $blankChatGif = '<div class="blank-chat">
                            <img src="images/emptyinboxgif.png">
                            <p class="blank-chat-alert">no available message ! </p>
                        </div>';
        echo $blankChatGif;
    }
}else{
    header("../login");
}
?>