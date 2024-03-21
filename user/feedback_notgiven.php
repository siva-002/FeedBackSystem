<style>
    #main{
      
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

$fbtable='feedback-'.$dp.'-'.$_SESSION['acyear'];
$lt=substr($_SESSION['user'],9,1);
$tr=substr($_SESSION['user'],9,1);
if(($lt=="3")or($tr=="7")){
    $qry3=mysqli_query($conn,"select * from staff where department='$_SESSION[dept]' and staff.sem NOT IN ('i','ii') and staff.department='$_SESSION[dept]' and staff.acyear='$_SESSION[acyear]' and staff.coursecode not in 
(SELECT `{$fbtable}`.Coursecode from `{$fbtable}` where regno='$_SESSION[user]' ) order by staff.sem ASC");

}else{
  
$qry3=mysqli_query($conn,"select * from staff where department='$_SESSION[dept]' and acyear='$_SESSION[acyear]' and staff.coursecode not in 
(SELECT `{$fbtable}`.Coursecode from `{$fbtable}` where regno='$_SESSION[user]' ) order by staff.sem ASC");

}
?>
<?php if(mysqli_num_rows($qry3)>0){?>
<p><span>Feedbacks Not Submitted</span><b style='color:red;text-decoration:none;'> &nbsp;( <?php echo mysqli_num_rows($qry3);?> ) </b> <!--<span>out of</span> <b style='color:red'> &nbsp; ( <?php echo mysqli_num_rows($qry3);?> )</b>--></p>
<div id="main">
	<table class="table table-bordered table-hover" id="tb" >
    <tr>
    <th>S.No</th>
    <th>Staff Name</th>

    <th>Subject</th>
    <th>Subject Code</th>
    <th>Semester</th>
    </tr>

<?php
$i=1;
    while($row=mysqli_fetch_array($qry3)){
        		echo "<tr>";
		echo "<td>".$i."</td>";

	//	echo "<td>".$row['regno']."</td>";
	//	echo "<td>".$row['department']."</td>";
		echo "<td>".$row['staffname']."</td>";
		
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['coursecode']."</td>";
        echo "<td>".$row['sem']."</td>";
	    echo " 
	    </form></td>";
	    
		
		
		
		
		echo "</tr>";
        $i++;
    }
}else{
    echo "<marquee><h2 style='color:green;'>Thanks for submitting feedbacks for all Subjects</h2></marquee>";
}
    ?>
    </table>
</div>