<?php
include('../dbconfig.php');
extract($_POST);
?>

<html>
    <head>    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
    <style>
        #main{
            overflow-x:scroll;
            height:100vh;
            
            
        }body{
    overflow-x:hidden;
        }
        #st-info tr,#st-info th,#st-info td{
        border:none !important;
      }
      #st-info{
        margin:20px;
        width:90%;
      
       
      }  
     #st-info select{
        width:150px;
      }
      form{
        width:400px;
        background:rgba(0,0,0,0.03);
      }
      #details{
          margin-bottom:50px;
      }
    </style>
<body>
    
<div id="main">
    <h2>Parent Survey FeedBacks</h2><br>

    <form action="" method="post">
         <h3>Sort </h3>
        <table class="table" id="st-info">
            <!--<tr><th>Academic Year</th> <td>
                <select name="chac" id="chac" class="form-control">
                    <option value=""></option>
                    <option value="2016-2020">2016-2020</option>
                    <option value="2017-2021">2017-2021</option>
                    <option value="2018-2022">2018-2022</option>
                    <option value="2019-2023">2019-2023</option>
                </select>

            </td> </tr>
            <tr><th>Department</th>
            <td><select name="chdept" id="chdept" class="form-control">
                <option value=""></option>
                <option value="civil">CIVIL</option>
                <option value="cse">CSE</option>
                <option value="mech">MECH</option>
                <option value="ece">ECE</option>
            </select></td>
        </tr>-->
        <tr>
  <th>Enter Register No :</th>
  <td><input type="text" name="rg" id="rg" class="form-control" placeholder="--register number--" required></td><br>

  </tr>
        <tr><td><input type="submit" class="btn btn-success" value="Filter" name="filter"></tr>
        </table>
    </form> 
<table class="table table-bordered table-hover" id="details">
    <tr>
    
        <th>Reg no</th>
        <th>Name</th>
        <th>Cleanliness and ambience in campus</th>
        <th>Quality of teaching</th>
        <th>Examination & evaluation system</th>
        <th>Laboratory facilities</th>
        <th>Value added courses offered in the Department</th>
        <th>Organizing Guest Lectures</th>
        <th>Field trip arrangements</th>
        <th>Industry Intership (Industry training) </th>
        <th>Student amenities(Library,Wi-Fi/Internet,etc)</th>
        <th>Sports & Cultural activities</th>
        <th>Effectiveness of training for placement</th>
        <th>Canteen facilities</th>
        <th>Transport facility</th>
        <th>Medical facility</th>
        <th>Attainment of program outcomes</th>
    </tr>
    <tr>
        <?php 
        if(isset($_POST['filter'])){
            if(($rg == "" )){
                $search="<h4 style='color:red;'>Please Enter Register No to filter </h4>";
                $sql=mysqli_query($conn,"select * from parentsurvey");
            }
           /* elseif(($chac !== "" )&&($chdept =="")){
                $sql=mysqli_query($conn,"select * from exitsurvey where academic='$chac'");
                $search="<h2>Search Results for Academic Year <b>".$chac."</b> </h2>";
                 }
            elseif(($chac == "" )&&($chdept !="")){
                 $sql=mysqli_query($conn,"select * from exitsurvey where department='$chdept'");
                 $search="<h2>Search Results for Department <b>".$chdept."</b> </h2>";
                 }*/
            else {
                $sql=mysqli_query($conn,"select * from parentsurvey where Regno='$rg'");
                $search="<h2>Search Results for Regno <b>".$rg."</b></h2>";
                }
        }else{
            $sql=mysqli_query($conn,"select * from parentsurvey");
        }
        if(isset($filter)){echo $search;}
        echo "<h3>Total feedbacks :<b> ".mysqli_num_rows($sql)."</b> </h3><br>";
        while($row=mysqli_fetch_array($sql)){
            
            echo "<td>".$row['Regno']."</td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Quest1']."</td>";
            echo "<td>".$row['Quest2']."</td>";
            echo "<td>".$row['Quest3']."</td>";
            echo "<td>".$row['Quest4']."</td>";
            echo "<td>".$row['Quest5']."</td>";
            echo "<td>".$row['Quest6']."</td>";
            echo "<td>".$row['Quest7']."</td>";
            echo "<td>".$row['Quest8']."</td>";
            echo "<td>".$row['Quest9']."</td>";
            echo "<td>".$row['Quest10']."</td>";
            echo "<td>".$row['Quest11']."</td>";
            echo "<td>".$row['Quest12']."</td>";
            echo "<td>".$row['Quest13']."</td>";
            echo "<td>".$row['Quest14']."</td>";
            echo "<td>".$row['Quest15']."</td></tr>";

        }
        
        
        ?>
    </tr>
</table>
</div>
</body>
</html>