<?php
session_start();
include('../dbconfig.php');
	$tb=$_SESSION['tb'];
	$rg=$_GET['id'];
	$cc=$_GET['cc'];
	if(($rg!="") && ($cc!="")){
	mysqli_query($conn,"delete from `{$tb}` where regno='$rg' and Coursecode='$cc'");
	}else{
	 mysqli_query($conn,"delete from `{$tb}` where regno='$rg' ");   
	}

	header('location:dashboard.php?info=feedback');
?>