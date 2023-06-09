<?php 
session_start();
if($_SESSION["authenticated"]=='true'){
    header('Location: ../login/login.php');
}
?>