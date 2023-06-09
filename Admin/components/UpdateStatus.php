<?php 
    include('../../db/connection.php');

    $sts = $_POST['sts'];
    $type= $_POST['type'];
    $id = $_POST['id'];

    if($type=='c'){
        if($sts==0){
        $sql = "update company set status = 1 where Cid='$id'";
        $result = $conn->query($sql);
    }else{
        $sql = "update company set status = 0 where Cid='$id'";
        $result = $conn->query($sql);
    }
  }

?>