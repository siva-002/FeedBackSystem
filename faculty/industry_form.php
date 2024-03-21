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
        width:400px;
        background:rgba(0,0,0,0.03);
      }
    </style>
<body>
    
<div id="main">
    <h2>Industrial Visit Feed Back Form</h2>

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
        </tr>
        <tr><th>Semester</th>
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
        <th >Date</th>
         <td><input class="form-control" type="date" value="" name="date">
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
        <th>Name of the Industry</th>
        <th>Date</th>
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
            if(($date == "" )&&($chsem =="")&&($chyear=="")){
                $search="<h4 style='color:red;'>Please choose any one to filter </h4>";
                $sql=mysqli_query($conn,"select * from industry where department ='$_SESSION[department]'");
            }
            elseif(($date != "" )&&($chsem =="")&&($chyear !="")){
                $sql=mysqli_query($conn,"select * from industry where Year='$chyear'and  department ='$_SESSION[department]'");
                $search="<h2>Search Results for Date <b>".$date."</b> and Year <b>".$chyear."</b> </h2>";
                 }
            elseif(($date == "" )&&($chsem !="")&&($chyear !="")){
                 $sql=mysqli_query($conn,"select * from industry where Semester='$chsem'and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Semester <b>".$chsem."</b> and Year <b>".$chyear."</b> </h2>";
                 }
            elseif(($date == "" )&&($chsem !="")&&($chyear =="")){
                 $sql=mysqli_query($conn,"select * from industry where Semester='$chsem'and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Semester <b>".$chsem."</b> </h2>";
                 }
            elseif(($date == "" )&&($chsem =="")&&($chyear !="")){
                 $sql=mysqli_query($conn,"select * from industry where Year='$chyear'and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Year <b>".$chyear."</b> </h2>";
                 }
            elseif(($date != "" )&&($chsem =="")&&($chyear =="")){
                 $sql=mysqli_query($conn,"select * from industry where Date='$date' and department ='$_SESSION[department]'");
                 $search="<h2>Search Results for Date <b>".$date."</b> </h2>";
                 }

            else {
                $sql=mysqli_query($conn,"select * from industry where Date='$date' and Semester='$chsem' and department ='$_SESSION[department]'");
                $search="<h2>Search Results for Date <b>".$date."</b> and Semester <b>".$chsem."</b> and Year <b>".$chyear."</b> </h2>";
                }
        }else{
            $sql=mysqli_query($conn,"select * from industry where department ='$_SESSION[department]'");
        }
        if(isset($filter)){echo $search;}
        echo "<h3>Total feedbacks :<b> ".mysqli_num_rows($sql)."</b> </h3><br>";
        while($row=mysqli_fetch_array($sql)){
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Regno']."</td>";
            echo "<td>".$row['Year']."</td>";
            echo "<td>".$row['Semester']."</td>";
            echo "<td>".$row['Name of the Industry']."</td>";
            echo "<td>".$row['Date']."</td>";
            echo "<td>".$row['Quest1']."</td>";
            echo "<td>".$row['Quest2']."</td>";
            echo "<td>".$row['Quest3']."</td>";
            echo "<td>".$row['Quest4']."</td>";
            echo "<td>".$row['Quest5']."</td>";
            echo "<td>".$row['Quest6']."</td>";
            echo "<td>".$row['Quest7']."</td>";
            echo "<td>".$row['Quest8']."</td></tr>";

        }
        
        
        ?>
    </tr>
</table>
</div>
</body>
</html>