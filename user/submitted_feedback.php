<style>
    #main{
        overflow:scroll;
        margin-top:30px;
    }
    table th,table td{
        font-size:12px;
        text-align:center;
    }
    p span{
        text-decoration:underline;
        font-size:30px;
    }
    b{
        font-size:30px;
    }
</style>
<?php
$dp=strtolower($_SESSION['dept']);
$dbtable='feedback-'.$dp.'-'.$_SESSION['acyear'];
$sql=mysqli_query($conn,"select * from `{$dbtable}` where regno='$_SESSION[user]' order by semester");

if(mysqli_num_rows($sql)<1){
    echo "<tr><h3 style='color:red'>No Feedbacks Given</h3></tr>
    <script>document.getElementById('tb').style.display='none';</script>
    ";
  
}else{
$subcount=mysqli_query($conn,"select * from staff where acyear='$_SESSION[acyear]' "); 
?>
<p><span>Submitted Feedbacks </span><b style='color:green;text-decoration:none;'> &nbsp;( <?php echo mysqli_num_rows($sql);?> ) </b> <!--<span>out of</span> <b style='color:red'> &nbsp; ( <?php echo mysqli_num_rows($subcount);?> )</b>--></p>
<div id="main">
	<table class="table table-bordered table-hover" id="tb" >
    <tr>
    <th>S.No </th>
    <th>Staff Name</th>

    <th>Subject</th>
    <th>Subject Code</th>
    <th>Semester</th>
   <th>Submitted On</th>
  
   <th>Pdf</th>
    </tr>

<?php
$i=1;
    while($row=mysqli_fetch_array($sql)){
        		echo "<tr>";
		echo "<td>".$i."</td>";
		//echo "<td>".$row['staff_id']."</td>";
	//	echo "<td>".$row['regno']."</td>";
	//	echo "<td>".$row['department']."</td>";
		echo "<td>".$row['facultyname']."</td>";
		
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['Coursecode']."</td>";
        echo "<td>".$row['semester']."</td>";
	/*	echo "<td>".$row['quest1']."</td>";
		echo "<td>".$row['quest2']."</td>";
		echo "<td>".$row['quest3']."</td>";
		echo "<td>".$row['quest4']."</td>";
		echo "<td>".$row['quest5']."</td>";
		echo "<td>".$row['quest6']."</td>";
		echo "<td>".$row['quest7']."</td>";
		echo "<td>".$row['quest8']."</td>";
		echo "<td>".$row['quest9']."</td>";
		echo "<td>".$row['quest10']."</td>";
		echo "<td>".$row['quest11']."</td>";
		echo "<td>".$row['quest12']."</td>";
		echo "<td>".$row['quest13']."</td>";
		echo "<td>".$row['quest14']."</td>";*/
		echo "<td>".$row['date']."</td>";
	//	echo "<td><a target='_blank' href=../".$row['Pdf']." > View</a> / <a download href=../".$row['Pdf'].">Download</a></td>";
		
	    echo "<td><form method='POST'  action='generate.php?coursecode=$row[Coursecode]' target='_blank' >
	    
	    <input type='submit' class='btn btn-warning' value='Click' name='downpdf' id='downpdf'>
	    
	    </form></td>";
	    
		
		
		
		
		echo "</tr>";
		$i++;
    }
}
    ?>
    </table>
</div>