<?php
include('../dbconfig.php');
extract($_POST);
?>

<html>
    <head>    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
    <style>
        #main{
            overflow:scroll;
            height:100vh;
            
            
        }body{

        }
        #st-info tr,#st-info th,#st-info td{
        border:none !important;
      }
      #st-info{
        margin:20px;
        width:40%;
      
       
      }  
     #st-info select{
        width:150px;
      }
      form{
        width:600px;
        background:rgba(0,0,0,0.03);
      }
    </style>
<body>
    
<div id="main">
    <h2>Inplant  Training  / Internship Feed Back Form</h2>

    <form action="" method="post">
        <h3>Sort </h3>
        <table class="table" id="st-info">

           <tr><th>Year</th>
            <td><select name="chyear" id="chyear" class="form-control">
                <option value=""></option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select></td>
        <th>Semester</th>
            <td><select name="chsem" id="chsem" class="form-control">
            <option value=""></option>
            <option value="i">i</option>
            <option value="ii">ii</option>
            <option value="iii">iii</option>
            <option value="iv">iv</option>
            <option value="v">v</option>
            <option value="vi">vi</option>
            <option value="vii">vii</option>
            <option value="viii">viii</option>
            </select></td>
        </tr>
        <tr>
        <th >Date From</th>
         <td><input class="form-control" type="date" value="" name="date">
     
        <th >To</th>
         <td><input class="form-control" type="date" value="" name="tdate">
     </tr>
        
        <tr><td><input type="submit" class="btn btn-success" value="Filter" name="filter"></tr>
        </table>
    </form>
<table class="table table-bordered table-hover">
    <tr>
  
        <th>Name</th>
        <th>Regno</th>
        <th>Year</th>
        <th>Semester</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Name of the Industry</th>
        <th>Inplant  Training  / Internship</th>
        <th>Theoretical knowledge gained</th>
        <th>Practical knowledge accquired</th>
        <th>Rate the Skills gained</th>
        <th>How do you rate the Practical experience?</th>
        <th>Ability to think out of the box?</th>
        <th>Ability to work with team  <ul>
        <th>Facilties & Hospitality</th>
        <th>Overall Experience</th>

    <tr>
        <?php 
        if(isset($_POST['filter'])){
            if(($date == "" )&&($chsem =="")&&($chyear=="")&&($tdate == "")){
                $search="<h4 style='color:red;'>Please choose any one to filter </h4>";
                $sql=mysqli_query($conn,"select * from inplant where department ='$_SESSION[department]'");
            }
            elseif(($date != "" )&&($chsem =="")&&($chyear !=="")&&($tdate != "")){
                $sql=mysqli_query($conn,"select * from inplant where fromdate='$date'and department ='$_SESSION[department]'");
                $search="<h2>Search Results for Date from <b>".$date."</b> to <b>".$tdate."</b> and Year <b>".$chyear."</b> </h2>";
                 }
            elseif(($date == "" )&&($chsem !="")&&($chyear !="")&&($tdate == "")){
                 $sql=mysqli_query($conn,"select * from inplant where sem='$chsem'and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Semester <b>".$chsem."</b> and Year <b>".$chyear."</b> </h2>";
                 }
            elseif(($date != "" )&&($chsem !="")&&($chyear =="")&&($tdate != "")){
                $sql=mysqli_query($conn,"select * from inplant where sem='$chsem'and department ='$_SESSION[department]'");
                $search="<h2>Search Results for Date from <b>".$date."</b> to <b>".$tdate."</b> and Semester <b>".$chsem."</b> </h2>"; 
                }
            elseif(($date == "" )&&($chsem !="")&&($chyear =="")&&($tdate == "")){
                $sql=mysqli_query($conn,"select * from inplant where sem='$chsem'and department ='$_SESSION[department]'");
                $search="<h2>Search Results for Semester <b>".$chsem."</b> </h2>"; 
                }
            elseif(($date == "" )&&($chsem =="")&&($chyear !="")&&($tdate == "")){
                 $sql=mysqli_query($conn,"select * from inplant where year='$chyear'and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Year <b>".$chyear."</b> </h2>";
                 }
        
            else {
                $sql=mysqli_query($conn,"select * from inplant where fromdate='$date' and todate='$tdate'and department ='$_SESSION[department]'");
                $search="<h2>Search Results for Date from <b>".$date."</b> to <b>".$tdate."</b> </h2>";
                }
        }else{
            $sql=mysqli_query($conn,"select * from inplant where department ='$_SESSION[department]'");
        }
        if(isset($filter)){echo $search;}
        echo "<h3>Total feedbacks :<b> ".mysqli_num_rows($sql)."</b> </h3><br>";
        while($row=mysqli_fetch_array($sql)){
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['Regno']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td>".$row['sem']."</td>";
            echo "<td>".$row['fromdate']."</td>";
            echo "<td>".$row['todate']."</td>";
            echo "<td>".$row['Industry']."</td>";
            echo "<td>".$row['internship']."</td>";
            echo "<td>".$row['quest1']."</td>";
            echo "<td>".$row['quest2']."</td>";
            echo "<td>".$row['quest3']."</td>";
            echo "<td>".$row['quest4']."</td>";
            echo "<td>".$row['quest5']."</td>";
            echo "<td>".$row['quest6']."</td>";
            echo "<td>".$row['quest7']."</td>";
            echo "<td>".$row['quest8']."</td></tr>";

        }
        
        
        ?>
    </tr>
</table>
</div>
</body>
</html>