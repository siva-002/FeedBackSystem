<?php 
extract($_POST);
// $q=mysqli_query($conn,"select * from `feedback-cse-2020-2024`");
// $r=mysqli_num_rows($q);
// if($r==false)
// {
// echo "<h3 style='color:Red'>No any records found ! </h3>";
// }
// else
// {
?>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_feedback.php?id='+id;
     }
}
</script>
<style>
	#main{
       width:70vw;
		overflow-x:scroll;
	}
	#main #tb{
       width:50vw;
		
	}
    #main{
        scrollbar-width:none;
    }
	#main::-webkit-scrollbar-track{
        background-color:;
    }
    #main::-webkit-scrollbar-thumb{
      background-color:pink;
      border-radius:5px;
    }
	#main::-webkit-scrollbar{
      width:0px;
      height:0px;
    }
</style>	
<?php
	if(isset($chacform)){
		
		$dp=strtolower($_SESSION['department']);
		$tb="feedback-".$dp."-".$chac;
	}
?>
<div id="main">
	<?php

	echo "<table id='tb' class='table table-responsive table-bordered table-striped table-hover' style='margin:15px;'><tr><caption>";
	

	
	$i=1;
	
	if(isset($chacform)){
	    	$_SESSION['tb']=$tb;
		/*$que=mysqli_query($conn,"select * from `{$tb}` where Coursecode='$searchkey'");
		//$que1=mysqli_query($conn,"select distinct regno from feedback where Coursecode='$searchkey'");
		if(mysqli_num_rows($que)<1){
			$err="No feedbacks found";
			echo "<script>
			document.getElementById('tb').style.display='none';
			</script>";
		}*/
		try{
	if($searchkey !=""){
		$que=mysqli_query($conn,"select * from `{$tb}` where Coursecode='$searchkey' order by regno ASC");
		//$que1=mysqli_query($conn,"select distinct regno from `feedback-cse-2020-2024`");

	}
	elseif($searchreg !=""){
	    $que=mysqli_query($conn,"select * from `{$tb}` where regno='$searchreg' order by semester ASC");
	    $que1=mysqli_query($conn,"select distinct regno from `{$tb}` where regno='$searchreg' order by semester ASC");
	}
	else{
		$que=mysqli_query($conn,"select * from `{$tb}` ");
		$que1=mysqli_query($conn,"select distinct regno from `{$tb}` ");
	}	
	
	$count=mysqli_num_rows($que);	
	if($searchkey!=""){
	$skey=$_POST['searchkey'];
	echo "<h2>Search Results for <strong>$skey</strong> <b>( ".$count." )</b> &nbsp;&nbsp;(".@$chac.")</h2>";
	}else{
	echo "<h2><strong>".strtoupper($_SESSION['department']) ."&nbsp;". @$chac."</strong>  FEEDBACKS  ( <b>".$count."</b> ) Students <b>( 
	    ".mysqli_num_rows($que1)." )</b> </h2>";
	}

	echo "</caption></tr><tr class='success'>";
	echo "<th>Serial No</th>";
	echo "<th>Staff Id</th>";
	echo "<th>Regno</th>";
	echo "<th>Department</th>";
	echo "<th>Semester</th>";
	echo "<th>Faculty Name</th>";
	echo "<th>Subject</th>";
	echo "<th>Course Code</th>";
	echo "<th>Delete</th>";
	echo "<th>Quest1</th>";
	echo "<th>Quest2</th>";
	echo "<th>Quest3</th>";
	echo "<th>Quest4</th>";
	echo "<th>Quest5</th>";
	echo "<th>Quest6</th>";
	echo "<th>Quest7</th>";
	echo "<th>Quest8</th>";
	echo "<th>Quest9</th>";
	echo "<th>Quest10</th>";
	echo "<th>Submitted on</th>";
//	echo "<th>Pdf </th>";
	
	echo "</tr>";



	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['staff_id']."</td>";
		echo "<td>".$row['regno']."</td>";
		echo "<td>".$row['department']."</td>";
		echo "<td>".$row['semester']."</td>";
		echo "<td>".$row['facultyname']."</td>";
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['Coursecode']."</td>";
        echo "<td><a href='deletefeedback.php?cc=$row[Coursecode]&id=$row[regno]'><span class='fa fa-trash' style=color:red;></span></a></td>";
		echo "<td>".$row['quest1']."</td>";
		echo "<td>".$row['quest2']."</td>";
		echo "<td>".$row['quest3']."</td>";
		echo "<td>".$row['quest4']."</td>";
		echo "<td>".$row['quest5']."</td>";
		echo "<td>".$row['quest6']."</td>";
		echo "<td>".$row['quest7']."</td>";
		echo "<td>".$row['quest8']."</td>";
		echo "<td>".$row['quest9']."</td>";
		echo "<td>".$row['quest10']."</td>";
		echo "<td>".$row['date']."</td>";
		
	//	echo "<td><a target='_blank' href=../".$row['Pdf']." > View</a> / <a download href=../".$row['Pdf'].">Download</a></td>";

		
		
		
		
		
		echo "</tr>";
		$i++;
	}
}catch(exception $e){
	 $errorinfo ="Table Not Created In Database ";
}
	}
?>
</div>
<div class="row">
	<div class="col-md-6 col-xs-12">
	<h1>Select Period of Study</h1>	
<form action="" method="post">
    <select name="chac" id="chac" required class="form-control" style="width:200px;">
        <option value=""></option> 
        <option value="2018-2022">2018-2022</option>
        <option value="2019-2023">2019-2023</option>
        <option value="2020-2024">2020-2024</option>
        <option value="2021-2025">2021-2025</option>
        <option value="2022-2026">2022-2026</option>

    </select><br>
	<input type="submit" class="btn btn-success" name="chacform" value="Submit">	
	<br>
	<br>
	<span style="font-size:20px;color:red;font-weight:bold;"><?php echo @$errorinfo ?></span>

</div>
<div class="col-md-6 col-xs-8">
		<h2>Subject Code</h2>
				
			<input type="text" class="form-control" placeholder="Enter subject code "  name="searchkey" style="width:200px">
		<h2>Regno</h2>		
			<input type="text" class="form-control" placeholder="Enter regno to search"  name="searchreg" style="width:200px;display:inline;">
			
			
			<br>
			
			<h3><?php echo "<h2 style='color:red;'>".@$err."</h2>"?></h3>
		</form>

	</div>
</div>




<?php 
//}
?>