<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from user where regno='$info'");
	header('location:dashboard.php?page=display_student');
?>