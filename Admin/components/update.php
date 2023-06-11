<?php 
    include('../../db/connection.php');

    $sts = $_GET['sts'];
    $id = $_GET['id'];
    $t=$_GET['type'];
    echo $sts;

    if($t=='c'){
    $data = $conn->query("select Cusername from company where Cid=$id");
    $cusername = $data->fetch_assoc();
    $username = $cusername['Cusername'];
    if($sts==1){
        $sql = "update company set status = 1 where Cid=$id";
        $conn->query($sql);
        $conn->query("update login set status=1 where username='$username'");
        
    }else{
        $sql = "update company set status = 0 where Cid=$id";
        $conn->query($sql);
        $conn->query("update login set status=0 where username='$username'");
     }
     header("Location: ./company.php");
}else{
    $data = $conn->query("select jusername from jobseeker where jsID=$id");
    $cusername = $data->fetch_assoc();
    $username = $cusername['jusername'];
    if($sts==1){
        $conn->query("update login set status=1 where username='$username'");
    }else{
        $conn->query("update login set status=0 where username='$username'");
     }
     header("Location: ./students.php");
}

    
?>