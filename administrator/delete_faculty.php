<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
//		echo "<script>alert('$id')</script>";
	if(mysqli_query($conn,"delete from staff where coursecode='$info'")){
			echo "<script>alert('Deleted');</script>";
	     echo "<script>window.location.href='dashboard.php?page=display_faculty';</script>";
	}
	else{
		echo "<script>alert('Delete Failed');</script>";
		echo "<script>window.location.href='dashboard.php?page=display_faculty';</script>";
	}
	//else
//	 echo "delete failed";



?>
