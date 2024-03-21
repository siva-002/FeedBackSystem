<?php
include('../dbconfig.php');
	
	$id=$_GET['id'];
	$ac=$_GET['ac'];
	
	mysqli_query($conn,"delete from report where coursecode='$id' and acyear='$ac'");
	echo "<script>alert('Report Deleted');
	window.location.href='dashboard.php?page=reports';
	</script>";
	//header('location:dashboard.php?page=reports');
?>