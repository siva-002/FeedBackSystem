<?php
include('../dbconfig.php');
extract($_POST);
?>

<html>
    <head>    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
    <style>
 
        #main{
            margin-top:5%;
            overflow-x:scroll;
            
            
            
        }body{
    overflow-x:hidden;
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
      #details{
          margin-bottom:50px;
      }
    </style>

    
<div id="main">
    <h2>Exit Survey FeedBacks</h2>

    <form action="" method="post">
        <h3>Sort </h3>
        <table class="table" id="st-info">
            <tr><th>Period of Study</th> <td>
                <select name="chac" id="chac" class="form-control">
                                <option value="2018-2022">2018-2022</option>
                                <option value="2019-2023">2019-2023</option>
                                <option value="2020-2024">2020-2024</option>
                                <option value="2021-2025">2021-2025</option>
                                <option value="2022-2026">2022-2026</option>
                </select>

            </td> </tr>
       <tr><td><input type="submit" class="btn btn-success" value="Filter" name="filter"></tr>
        </table>
    </form>
<table class="table table-bordered table-hover" id="details">
    <tr><th>Period of Study </th>
        <th>Regno</th>
        <th>Name</th>
        <th>Department</th>
        <th>Average</th>
        <th>Attainment of Program Outcomes</th>
        <th>Usage of Innovative Teaching Methodologies</th>
        <th>Flexibility of Curriculum</th>
        <th>Encouragement of Self Study</th>
        <th>Provision of enough Skills on design and problem solving techniques</th>
        <th>Coverage of cutting edge technology topics in order to face the future</th>
        <th>Coverage of advanced topics to take up career in research</th>
        <th>Promoting Intellectual Growth</th>
        <th>Computer & Internet Facilities</th>
        <th>Library Facilities</th>
        <th>Canteen Facilities</th>
        <th>Sports Infrastructure</th>
        <th>Hostel Facilities</th>
    </tr>
    <tr>
        <?php 
        if(isset($_POST['filter'])){

                $sql=mysqli_query($conn,"select * from exitsurvey where academic='$chac' and department='$_SESSION[department]'  order by regno asc");
                $search="<h2>Search Results for Period of Study <b>".$chac."</b> </b> </h2>";
                }
        else{
            $sql=mysqli_query($conn,"select * from exitsurvey where department='$_SESSION[department]' order by regno asc");
        }
        if(isset($filter)){echo $search;}
        echo "<h3>Total feedbacks :<b> ".mysqli_num_rows($sql)."</b> </h3><br>";
        while($row=mysqli_fetch_array($sql)){
            echo "<td>".$row['academic']."</td>";
            echo "<td>".$row['Regno']."</td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['department']."</td>";
            echo "<td>".$row['Average']." %</td>";
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
            echo "<td>".$row['Quest13']."</td></tr>";

        }
        
        
        ?>
    </tr>
</table>
</div>

</html>