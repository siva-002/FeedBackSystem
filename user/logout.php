<?php 
session_start();
unset($_SESSION['user']);
unset($_SESSION['cs']);
session_destroy();
header('location:../index.php');
?>