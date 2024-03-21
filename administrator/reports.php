<?php
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}

?>
<style>
    #tb th,#tb td{
        text-align:center;
    }
    form{
        display:flex;
        width:500px;
    }
    form #cc{
        margin:20px;
        width:100px;
    }
    form .btn{
        margin:20px;
        height:30px;
        width:100px;
       
    }
    #main{
        overflow:scroll;
    }
</style>



<?php
extract($_POST);
$query=mysqli_query($conn,"select * from report");
if(mysqli_num_rows($query)<1){
    echo "<h3 style='color:red;'>No Reports Generated yet</h3>";
   
}else{
?>
<h2>Reports</h2>
<form method="POST">
   <h3>Enter Subject Code</h3> <input type="text" name="cc" id="cc" class="form-control" required><br>
    <input type="submit" value="search" name="search" id="search" class="btn btn-primary">
</form><br>
<div id="main">
<table class='table table-bordered table-hover' id="tb">
    <tr><th>Staff Id</th><th>Academic Year</th><th>Staff name</th><th>Subject Name</th><th>Subject Code</th><th>Department</th><th>Pdf</th><th>Generated On</th><th>Delete</th></tr>
    <?php
    if(isset($search)){
        $query=mysqli_query($conn,"select * from report where coursecode='$cc'");
    }
    while($res=mysqli_fetch_array($query)){
        $id=$res['coursecode'];
        echo "<tr><td>".$res['staffid']."</td>";    
        echo "<td>".$res['acyear']."</td>";    
        echo "<td>".$res['staffname']."</td>";    
        echo "<td>".$res['subject']."</td>";    
        echo "<td>".$res['coursecode']."</td>";    
        echo "<td>".$res['department']."</td>";    
        echo "<td><a target='_blank' href='reports/$res[pdf]' >View</a> | <a href='reports/$res[pdf]'  download>Download</a></td>";    
        echo "<td>".$res['date']."</td>";
        echo "<td><a href='delete.php?id=$res[coursecode]&ac=$res[acyear]'><span class='fa fa-trash' style=color:red;></span></a></td>";
    
        
    }
    
    
    ?>



</table>

</div>
<?php } ?>