<?php
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}

?>

<style>
#main{

   
}
#tb{
	width:50px;
	font-size:15px;
}
#tb tr th,#tb tr,#tb tr td{
	width:5px !important;
}
</style>

<?php
extract($_POST);

	if(isset($_POST['civil'])){
		$value= "CIVIL";
	}
	elseif(isset($_POST['cse'])){
		$value= "CSE";
	}elseif(isset($_POST['mech'])){
		$value="MECH";
	}elseif(isset($_POST['ece'])){
		$value="ECE";
	}else{
		$value="ALL";
	}

	if(isset($_POST['search'])){
		$key=$_POST['sekey'];
		$search=$_POST['searchkey'];
		$_SESSION['id']=$search;
		if($key=="staff"){
		    if($ac=="")
		    $que=mysqli_query($conn,"SELECT * FROM `staff` where staff_id='$search' order by acyear");
		    else
		    $que=mysqli_query($conn,"SELECT * FROM `staff` where staff_id='$search' and acyear='$ac' order by acyear");
		
		}
		else{
		   if($ac=="")
		    $que=mysqli_query($conn,"SELECT * FROM `staff` where coursecode='$search' order by acyear");
		    else
		    $que=mysqli_query($conn,"SELECT * FROM `staff` where coursecode='$search' and acyear='$ac' order by acyear");
		}
		if(mysqli_num_rows($que)<1){
			$err="No records found";
			echo "<script>
			document.getElementById('tb').style.display='none';
			</script>";
		}
	}
	elseif($value =="ALL")
		$que=mysqli_query($conn,"select * from staff order by staff_id");
	else{
	$que=mysqli_query($conn,"SELECT * FROM `staff` where department='$value' and acyear='$_POST[chac]' order by sem");
	}	
	
	echo "<table class='table table-responsive table-bordered table-striped table-hover' id='tb' style=margin:15px;><tr><caption>";
	if(isset($_POST['search'])){
		$search=$_POST['searchkey'];
		echo "<h3>Search Results for <strong>$search</strong></h3>";
	}else{

	echo "<h2><b>".$value."&nbsp;".@$chac ."</b> STAFF DETAILS</h2>";
	}
	echo '<div id="main">';
	echo "</caption></tr><tr>";
	echo "<th>Serial.NO</th>";
	echo "<th>Academic Year</th>";
	echo "<th>Staff.ID</th>";
	echo "<th>Staff NAME</th>";
	echo "<th>Subject</th>";
	echo "<th>Course Code</th>";
	echo "<th>Dept</th>";
	echo "<th>Sem</th>";
	//echo "<th>Year</th>";
	echo "<th>Average</th>";
	echo "<th>Students Feedback Given</th>";
	echo "<th>Total Registered Students</th>";

	//echo "<th>Status</th>";
	echo "</tr>";
	
	$i=1;

	$count=mysqli_num_rows($que);
	
	 $total=0;
	 $c=0;
	 try{
	while($row=mysqli_fetch_array($que))
	{ 	
	   
		$_SESSION['staff']=$row['staffname'];
		echo "<tr >";
		echo "<td>".$i."</td>";
		echo "<td >".$row['acyear']."</td>";
		echo "<td>".$row['staff_id']."</td>";
		echo "<td>".$row['staffname']."</td>";
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['coursecode']."</td>";
		echo "<td>".$row['department']."</td>";
		echo "<td>".$row['sem']."</td>";
	//	echo "<td>".$row['year']."</td>";
		$tb="feedback-".$row['department']."-".$row['acyear'];
       	$sql=mysqli_query($conn,"select count(Average) as count , sum(Average) as sum from `{$tb}` where Coursecode='$row[coursecode]'");
		$sql1=mysqli_query($conn,"select count(regno) as stcount from user where acyear='$row[acyear]' and programme='$row[department]'");

    	$res=mysqli_fetch_array($sql);
    	$res1=mysqli_fetch_array($sql1);
        
         if($res['count']==0){
              echo "<td>0 </td></tr>"; 
         }
         else{
         $avg=round($res['sum']/$res['count']); 
         $total=$total+$avg;
         $c++;
	     echo "<td>".$avg."  </td>"; 
		 echo "<td>".$res['count']."  </td>";
		 echo "<td>".$res1['stcount']."  </td></tr>";
	 	$row[$i]=$i;
         }
	 	$i++;
	
	 }
	$totalavg=$total/$c;
	 if(isset($search) && $sekey=="staff"){
	 
	 echo "<h2>Total Average for <b>".$_SESSION['staff']."</b> is <b> ". round($totalavg). "% </b><button onclick='window.open(`https://feedback.autmdu.in/administrator/staff_report.php`,`_blank`)' class='btn btn-warning'>Generate Report</button></h2>";
	}
	 }catch(DivisionByZeroError $e){
		echo "";
	 }
?>	
</div>

<body>

<div class="row">
	<div class="col-md-6">
<h2>Select Period of Study</h2>	
<form action="" method="post">
    <select name="chac" class="form-control" style="width:200px;" required>
        <option value=""></option>
        <option value="2018-2022">2018-2022</option>
        <option value="2019-2023">2019-2023</option>
        <option value="2020-2024">2020-2024</option>
        <option value="2021-2025">2021-2025</option>
        <option value="2022-2026">2022-2026</option>

    </select><br>
	<button type="submit" class="btn" name="cse">CSE</button>
	<button type="submit" class="btn" name="mech">MECH</button>
	<button type="submit" class="btn" name="ece">ECE</button>
	<button type="submit" class="btn" name="civil">CIVIL</button>
</form>
</div>

	<div class="col-md-6">
		<h2>Search a Staff</h2>
		<form action="" method="Post" id="searchform">
		<label for="ske">Course Code</label>&nbsp;<input type="radio" value="ccode"  name="sekey" id="ske" required>&nbsp;
		<label for="skey">Staff Id</label>&nbsp;<input type="radio" value="staff"  name="sekey" id="skey" required>
		&nbsp;&nbsp;
	<select name="ac" class="form-control" style="width:150px;display:inline;">
        <option value="">Select Period of Study</option>
        <option value="2018-2022">2018-2022</option>
        <option value="2019-2023">2019-2023</option>
        <option value="2020-2024">2020-2024</option>
        <option value="2021-2025">2021-2025</option>
        <option value="2022-2026">2022-2026</option>

    </select>
		<br><br>
			<input type="text" class="form-control" placeholder="Enter here to search" required name="searchkey">

			
			
			<br>
			<button type="submit"  name="search"><i class='fa fa-search'></i></button>
			<h3><?php echo "<h2 style='color:red;'>".@$err."</h2>"?></h3>
		</form>
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