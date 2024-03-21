
<script type="text/javascript">
function deletes(coursecode)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_faculty.php?id='+coursecode;
     }
}
</script>
<style>
#con{
    max-height:100vh;
	
	
}
.table{
	height:0vh;
	overflow:scroll;
}

</style>
<body>
<div id="con">

<?php
extract($_POST);
	if(isset($_POST['search'])){
		$key=$_POST['sekey'];
		if($key=="staff"){
		$que=mysqli_query($conn,"SELECT * FROM `staff` where department='$_SESSION[department]' and staff_id='$searchkey' ");
		}
		elseif($key=="ccode"){
		$que=mysqli_query($conn,"SELECT * FROM `staff` where department='$_SESSION[department]' and coursecode='$searchkey'");
		}else{
			$que=mysqli_query($conn,"SELECT * FROM `staff` where department='$_SESSION[department]' and acyear='$searchkey'");	
		}

	}
	else
	$que=mysqli_query($conn,"select * from staff where department='$_SESSION[department]' order by staff_id");

	$count=mysqli_num_rows($que);

	echo "<table class='table table-responsive table-bordered table-striped table-hover' id='tb' style=margin:15px;><tr><caption>";
	if(isset($_POST['search'])){
		
		$search=$_POST['searchkey'];
		
		echo "<h3>Search Results for <strong>$search <b>( $count )</b></strong></h3>";
	}else{

	echo "<h2>".strtoupper($_SESSION['department']) ." STAFF DETAILS <b>( $count )</b></h2>";
	}
	echo "<div id='main'>";
	echo "</caption></tr><tr>";
	echo "<th>Serial.NO</th>";
	echo "<th>Period of Study</th>";
	echo "<th>Staff.ID</th>";
	echo "<th>Staff NAME</th>";
	echo "<th>Subject</th>";
	echo "<th>Course Code</th>";
	echo "<th>Dept</th>";
	echo "<th>Sem</th>";
	//echo "<th>Year</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	//echo "<th>Status</th>";
	echo "</tr>";
	
	$i=1;

	if(mysqli_num_rows($que)<1){
		$err="No records found";
		echo "<script>
		document.getElementById('tb').style.display='none';
		</script>";
	}else{

		//echo "<h3  id='count'> <b> ( ".$count." )</b></h3>";
	while($row=mysqli_fetch_array($que))
	{ 	
		
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['acyear']."</td>";
		echo "<td>".$row['staff_id']."</td>";

		echo "<td>".$row['staffname']."</td>";
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['coursecode']."</td>";
		echo "<td>".$row['department']."</td>";
		echo "<td>".$row['sem']."</td>";
		//echo "<td>".$row['year']."</td>";
		$row[$i]=$i;
		//echo "<td>".$row['mobile']."</td>";
		//echo "<td>".$row['password']."</td>";
		echo "<td class='text-center'><a href='dashboard.php?cc=$row[coursecode]&ac=$row[acyear]&info=edit_faculty'><span class='fa fa-pencil'style=color:green;></span></a></td>";
		
		
		echo "<td class='text-center'><a href='dashboard.php?id=$row[coursecode]&info=delete_faculty'><span class='fa fa-trash' style=color:red;></span></a></td>";
		
		//echo "<td><a href='#' onclick='deletes($row[coursecode])'>Delete</a>'<span class='fa fa-trash' style=color:red;></span></a></td>";

		
		/*if($row['status'])
		{
		echo "<td><a href='update_status.php?user_id=".$row['coursecode']."&status=".$row['status']."'><span class='glyphicon glyphicon-user' style=color:red;></span></a></td>";
		}
		else
		{
		echo "<td><a href='update_status.php?user_id=".$row['coursecode']."&status=".$row['status']."'><span class='glyphicon glyphicon-user' style=color:green;></span></a></td>";
		}
		echo "</tr>";*/
		$i++;
	}
}
?>	
</div>

<div class="row">

	<div class="col-md-6">
		<h2>Search a Staff</h2>
		<form action="" method="Post" id="searchform">
		<input type="radio" value="ccode"  name="sekey" id="ske" required>   <label for="ske">Course Code</label>&nbsp;
<input type="radio" value="staff"  name="sekey" id="skey" required>		<label for="skey">Staff Id</label>&nbsp;
<input type="radio" value="acyear"  name="sekey" id="sk" required>		<label for="sk">Period of Study</label>
			<input type="text" class="form-control" placeholder="Enter here to search" required name="searchkey"><br>
			<button type="submit"  name="search"><i class='fa fa-search'></i></button>
			<h3><?php echo "<h2 style='color:red;'>".@$err."</h2>"?></h3>
		</form>
	</div>
</div>
</div>
</body>
<style>
	
	 th ,td{
		text-align:center;
	}
	#searchform{
		width:300px;
	}
	#searchform #skey{
		width:10px;
		color:red;
	}
	#searchform input{
		width:40%;
		margin-right:10px;
	}
	#searchform button{
		color:red;
				
	}
</style>