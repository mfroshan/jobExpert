<?php 
    include('../db/connection.php');
    $c = $_POST['c'];
    $n = $_POST['n'];
    $email = $_POST['email'];
    
    $sql = "SELECT password FROM login WHERE username='$email'";
    $ret = $conn->query($sql);
    $result = $ret->fetch_assoc();
    if($c === $result['password']){
        $conn->query("update login set password='$n' where username='$email'");
    }else{
        return 1;
    }
?>
