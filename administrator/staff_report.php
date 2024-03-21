<?php
session_start();
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
include('../dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
    body{
        margin-left:20%;
        border:2px solid black;
        width:900px;
        height:max-content;
       position:relative;
    }
    img{
        width:100px;
        height:100px;
        
    }.img{
       
        padding:10px;
    }
    .head{
        display:flex;
        color:white;
        justify-content:center;
        background-color:rgba(0,0,0,0.5);
        border:2px solid black;
    }
    .heading{
        font-size:20px;
        
    }
    #fs{
        text-align:center;
    }
    #staff{
     font-size:20px;
     margin:2% 0% 0% 2%;
      
    }#staff .table tr td{
       
    }
    #staff,#staff tr,#staff th,#staff td{
        border: none !important;
        width:500px !important; 
     
    }
    #print{
       margin-left:90%;
       margin-top:-15%;
    }
    @media print{
        body{
            margin-left:0%;
        }
        #print{
            display:none;
        }
    }
</style>
<body>
    <div class="head">
        <div class="img"><img src="../images/logo.png" alt="logo"></div>
        <div class="heading"><h3>ANNA UNIVERSITY REGIONAL CAMPUS MADURAI</h3>
        <h3 id="fs">FACULTY FEEDBACK SYSTEM</h3>
        </div>
    </div>

    <div class="staff">
        <table class='table table-bordered' id="staff">
            <tr><th>Staff ID</th> <td><?php echo ":&nbsp;<b>" . $_SESSION['id']?></b></td></tr> 
            <tr><th>Staff Name</th><td><?php echo ":&nbsp;<b>" . $_SESSION['staff']?></b></td></tr>
          
        </table>
    </div>
    <button onclick='window.print()' id='print' class='btn btn-warning'>Print</button>

   
    <table class="table table-bordered" style="width:100% !important;   text-align:center;">
       
        <th>Academic Year</th>
        <th>Department</th>
        <th>Semester</th>
        <th>Subject</th>
        <th>Course Code</th>
        <th>Average</th>
        <th>Students Given</th>
        <th>Total Students</th></tr>

    <?php
    $sql=mysqli_query($conn,"select * from staff where staff_id='$_SESSION[id]'");
    $total=$c=0;
    try{
    while($row=mysqli_fetch_array($sql)){

        echo "<tr><td>".$row['acyear']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "<td>".$row['sem']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['coursecode']."</td>";
       $tb="feedback-".$row['department']."-".$row['acyear'];
        $sql1=mysqli_query($conn,"select count(Average) as count , sum(Average) as sum from `{$tb}` where Coursecode='$row[coursecode]'");
        $sql2=mysqli_query($conn,"select count(regno) as stcount from user where acyear='$row[acyear]'");

         $res=mysqli_fetch_array($sql1);

        $res2=mysqli_fetch_array($sql2);
    
     if($res['count']==0){
          echo "<td>0 </td></tr>"; 
     }
     else{
     $avg=round($res['sum']/$res['count']); 
     $total=$total+$avg;
     $c++;
     echo "<td>".$avg."  </td>"; 
     echo "<td>".$res['count']."  </td>";
     echo "<td>".$res2['stcount']."  </td></tr>";
    
     }

   
      
    }
    $totalavg=$total/$c;
}   catch(DivisionByZeroError $e){
		echo "";
	 }
    echo "<h2 style='text-align:center;'>Total Average for <b>".$_SESSION['staff']."</b> is <b style='color:green;'> ". round($totalavg). "% </b><br><br><br>";
?>



    </table>
</body>
</html>