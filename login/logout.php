<?php
session_start();
session_unset();
$_SESSION["authenticated"] = 'false';
session_destroy();
header('location: ../  ');
?>
