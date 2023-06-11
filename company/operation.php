<?php 
include('../db/connection.php');

$text = $_POST['text'];
$id = $_POST['id'];

$select = "update job_apply_c set selectStatus=1 where job_apply_cid=$id";
$reject = "update job_apply_c set selectStatus=2 where job_apply_cid=$id";
if($text == 1){
    $conn->query($select);
 }else{
    $conn->query($reject);
 }
 
?>