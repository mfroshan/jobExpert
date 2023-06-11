<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['susername'];
    $sql = "SELECT * FROM jobseeker WHERE NOT jusername = '{$outgoing_id}' and jobstatus=1 ORDER BY jsID DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>