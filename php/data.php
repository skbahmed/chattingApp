<?php
while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} 
            OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($db, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        $result = $row2['msg'];

        //adding you: indicator before msg if current login id send msg
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }else{
        $result = "No message available !";
        $you = "";
    }

    //msg text trimming if words more than 28
    (strlen($result) > 20) ? $msg = substr($result, 0, 20).'...' : $msg = $result;

    //check if user online or not
    ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
    
    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'" title="Click to open chat">
                <div class="content">
                    <img src="images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span class="user-name name-details">'. $row['fname'] . " " . $row['lname'] .'</span>
                        <p>'. $you. $msg .'</p>
                    </div>
                </div>
                <div class="status-dot '. $offline .' ">
                    <i class="fas fa-circle"></i>
                </div>
            </a>';
}
?>