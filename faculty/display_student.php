
<style>
	#tb th ,td{
		text-align:center;
	}
    #main{
       
       
    }
</style>
<script type="text/javascript">
	
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_student.php?id='+id;
     }
}
</script>

<?php
extract($_POST);

	if(isset($_POST['search'])){
		$skey=$_POST['search'];
		$que=mysqli_query($conn,"select * from user where programme='$_SESSION[department]' and regno like '$skey%' order by regno");
		if(mysqli_num_rows($que)<1){
			$err="No records found";
			echo "<script>
			document.getElementById('tb').style.display='none';
			</script>";
		}
	}
	else
		$que=mysqli_query($conn,"select * from user where programme='$_SESSION[department]' order by regno asc");
	if(isset($acform))
		$que=mysqli_query($conn,"select * from user where programme='$_SESSION[department]' and acyear='$chac' order by regno asc");


	$count=mysqli_num_rows($que);

?>

	<div id="main">
	<?php
	echo "<table id='tb' class='table table-responsive table-bordered table-striped table-hover' style='margin:15px;'><tr><caption>";
	
	if(isset($_POST['search'])){

		echo "<h2>Search Results for <strong>$skey </strong></h2>";
	}else{
	echo "<h2>".strtoupper($_SESSION['department'])."&nbsp;<b>". @$chac ."</b> STUDENT DETAILS <b>( $count )</b></h2>";
	}
	echo "</caption></tr><tr class='success'>";
	
	echo "<th>S.No</th>";
	echo "<th>Name</th>";
	echo "<th>Regno</th>";
	echo "<th>Email</th>";
	echo "<th>Mobile</th>";
	echo "<th>Programme</th>";
	echo "<th>Semester</th>";
	echo "<th>Registered On</th>";
	echo "<th>Delete</th>";
	echo "</tr>";

	$i=1;

	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['regno']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['mobile']."</td>";
		echo "<td>".$row['programme']."</td>";
		echo "<td>".$row['semester']."</td>";
		echo "<td>".$row['regid']."</td>";
		
		
		
		echo "<td class='text-center'><a href='#' onclick='deletes($row[regno])'><span class='fa fa-trash' style=color:red;></span></a></td>";
		
		
		echo "</tr>";
		$i++;
	}
	
?></div>
<div class="row">
	<div class="col-md-6 col-xs-12">
	<h3>Select Period of Study</h3>	
<form action="" method="post">
        <select name="chac" id="chac" required class="form-control" style="width:200px;">
        <option value=""></option> 
        <option value="2018-2022">2018-2022</option>
        <option value="2019-2023">2019-2023</option>
        <option value="2020-2024">2020-2024</option>
        <option value="2021-2025">2021-2025</option>
        <option value="2022-2026">2022-2026</option>

    </select><br>
	<input type="submit" value="Submit" class="btn btn-success" name="acform">

</form>
</div>
<div class="col-md-6 col-xs-8">
		<h2>Search a Student</h2>
		<form action="" method="Post" id="searchform">
			
			<input type="text" class="form-control" placeholder="Enter reg no to search" required name="search" value=""><br>
		<!--	<button type="submit"  name="search"><i class='fa fa-search'></i></button>-->
			<h3><?php echo "<h2 style='color:red;'>".@$err."</h2>"?></h3>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name=search]').change(function(){
            $('#searchform').submit();
        });
    });
</script>
