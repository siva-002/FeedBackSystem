<?php extract($_POST);?>

<style>
    #main{
       overflow-x:scroll;
   scrollbar-width:none;
     }

    #main::-webkit-scrollbar-track{
        background-color:;
    }
    #main::-webkit-scrollbar-thumb{
      background-color:pink;
      border-radius:5px;
    }
    #main{
        scrollbar-width:none;
    }
    #main::-webkit-scrollbar{
      width:01px;
      height:10px;
    }
    #main::-webkit-scrollbar{
        position:absolute;
        top:0;
        right:0;
    }
    table th,table td{
        text-align:center;
    }
    #sort{
          width:50%;
    }#sort th,#sort td{
        border:none !important;
    }
    .btn-warning{
        margin-left:10%;
    }
     .expandable-cell {
            overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}/*.expanded {
    overflow-y: scroll;
    white-space: normal;
}
.expandable-cell::-webkit-scrollbar-track{
        background-color:;
    }
    .expandable-cell::-webkit-scrollbar-thumb{
      background-color:pink;
      border-radius:5px;
    }
    .expandable-cell::-webkit-scrollbar{
      width:0px;
      height:0px;
    } */
        #scrollname{
        scrollbar-width:none;
    }
	#scrollname::-webkit-scrollbar-track{
        background-color:;
    }
    #scrollname::-webkit-scrollbar-thumb{
      background-color:pink;
      border-radius:5px;
    }
	#scrollname::-webkit-scrollbar{
      width:0px;
      height:0px;
    }
</style>
<div id="popup" style="display:none; border:1px solid black; padding:10px; background-color: #fff;">
  <h2 id="popupTitle"></h2>
  <p id="popupContent"></p>
</div>
<?php 


$q=mysqli_query($conn,"select  * from user where programme='$_SESSION[department]' order by regno asc");
$r1=mysqli_num_rows($q);			
echo "<h2 style='color:orange'>Total Number of Registered Student : <b>$r1</b></h2>";

//$q2=mysqli_query($conn,"select distinct regno from feedback");
/*$r2=mysqli_num_rows($q2);			
echo "<h2 style='color:black'>Total Number of students given Feedback: <b>$r2</b></h2>";	*/

	

/*$q3=mysqli_query($conn,"SELECT regno,name,programme,semester
FROM user
WHERE NOT EXISTS ( SELECT regno
                   FROM feedback
                   WHERE user.regno= feedback.regno
                 )");*/
 /* $r3=mysqli_num_rows($q3);              
 echo "<h2 style='color:black'>Total Number of students not  given feedback: <b>$r3</b></h2>";   */             
?>
<body>
 

<h3 style="text-decoration:underline;"></h3>
<form action="" method="POST">
    <table class="table" id="sort">
        <tr>
      <th>Select Period of Study</th>
        <td><select name="chac" id="chac" class="form-control">
            <option value=""></option>
            <option value="2018-2022">2018-2022</option>
            <option value="2019-2023">2019-2023</option>
            <option value="2020-2024">2020-2024</option>
            <option value="2021-2025">2021-2025</option>
            <option value="2022-2026">2022-2026</option>

        </select></td>
        <td><input type="submit" value="Filter" class="btn btn-warning" name="filter"></td></tr>
    </table>
</form>
<div id="main">
<table class="table table-bordered table-hover" id="table" style=' table-layout:fixed; width:2000px;'>

    <input type="radio" onclick="sortTableByFeedbackNotGiven()" id="sortbynotgiven" name="sort"> <label for="sortbynotgiven" style="font-size:20px;"> &nbsp;Sort By Not Given</label>&nbsp;&nbsp;
    <input type="radio" onclick="sortTableByFeedbackGiven()" id="sortbygiven" name="sort"><label for="sortbygiven" style="font-size:20px;">&nbsp; Sort By Given</label>
    <tr>
    <th>Regno</th>
    <th>Name</th>
    <th>Department</th>
   <!-- <th>Semester</th>-->
  <!-- <th>Total Subjects</th>-->
  <th>Total Subjects</th>
   <th>Total FeedBack Given</th>

   <th>Total FeedBack Not Given </th>
   <th >Feedback Given  </th>
   <th>Feedback Not Given  </th>

    </tr>

    <?php
        if(isset($_POST['filter'])){

                $q=mysqli_query($conn,"select * from user where programme='$_SESSION[department]' and acyear='$chac' order by regno asc");
                $search="<h3>Search results for Academic Year <b>".$chac."<b></h3>";
            
        }
        echo "<h3 style='text-decoration:;'>TOTAL STUDENTS ( <b>".mysqli_num_rows($q)." </b> ) </h3>";
    if(isset($filter)){echo $search;}

    
    while($res=mysqli_fetch_array($q)){
    $dept=strtolower($res['programme']);
    $fbtable='feedback-'.$dept.'-'.$res['acyear'];
     $tsub = mysqli_query($conn,"select  * from staff where department='$res[programme]' and acyear='$res[acyear]'");
     $lt=substr($res['regno'],9,1);
     $tr=substr($res['regno'],9,1);
     if(($lt == "3") or ($tr == "7")){
         $subcount= mysqli_query($conn,"select  * from staff where (sem='i' or sem='ii') and department='$res[programme]' and acyear='$res[acyear]'");
         $ltres=mysqli_num_rows($subcount);
         $tsubcount=mysqli_num_rows($tsub) - $ltres;
     }else{
       /*  if(($res['acyear']=="2018-2022" && $res['programme']=='cse')    or($res['acyear']=="2019-2023" && $res['programme'=='cse']))
            $tsubcount=mysqli_num_rows($tsub) - 2;
        else*/
             $tsubcount=mysqli_num_rows($tsub);
     }
     $feed=mysqli_query($conn,"select * from `".$fbtable."` where regno ='$res[regno]'");
     $fcount=mysqli_num_rows($feed);
     //$fcount='60';
     

     
     
     $qry=mysqli_query($conn,"select * from staff where department='$res[programme]' and acyear='$res[acyear]'");
     $qry1=mysqli_query($conn,"select * from `{$fbtable}` where department='$res[programme]' and regno='$res[regno]' order by semester ASC");
     
     

        if(($lt=="3")or($tr=="7")){
                   $qry3=mysqli_query($conn,"select staff.coursecode , staff.sem from staff where department='$res[programme]' and staff.sem NOT IN ('i','ii') and staff.department='$res[programme]' and staff.acyear='$res[acyear]' and staff.coursecode not in 
      (SELECT `{$fbtable}`.Coursecode from `{$fbtable}` where regno='$res[regno]' ) order by staff.sem ASC");
            
        }else{
                 
      $qry3=mysqli_query($conn,"select staff.coursecode , staff.sem from staff where department='$res[programme]' and acyear='$res[acyear]' and staff.coursecode not in 
      (SELECT `{$fbtable}`.Coursecode from `{$fbtable}` where regno='$res[regno]' ) order by staff.sem ASC");
        }
    $notgiven=mysqli_num_rows($qry3);
    // $row=mysqli_fetch_array($qry);
    echo "<tbody>";

        echo "<tr><td>".$res['regno']."</td>";
        echo "<td style='overflow-x:scroll;white-space:nowrap; ' id='scrollname'>".strtoupper($res['name'])."</td>";
        echo "<td>".$res['programme']."</td>";
       // echo "<td>".$res['semester']."</td>";
        echo "<td>".$tsubcount."</td>";
        echo "<td style='color:green;'><b>".$fcount."</b></td>";
        echo "<td style='color:red;'><b>".$notgiven."</b></td><td class='expandable-cell' style='color:green;'> <i class='fa fa-copy' class='copy' onclick='copyToClipboard(this.parentNode)'></i><br>";
     /*   while($res2=mysqli_fetch_array($qry)){
            echo $res2['coursecode']."&nbsp;";
          
         }
        echo "</td><td>";*/
        $i=0;
        while($res3=mysqli_fetch_array($qry1)){
           
            echo $res3['Coursecode']."(".$res3['semester'].")&nbsp;";
            
         
         }

         echo"</td><td class='expandable-cell' style='color:red; ' > <i class='fa fa-copy' class='copy' onclick='copyToClipboard(this.parentNode)'></i><br>";
         while($res4=mysqli_fetch_array($qry3)){
            echo $res4['coursecode']."-(".$res4['sem'].")&nbsp;";
          
         }
     echo "</tbody>";

       
     
    }
    

    ?>
    </table>

   
<script>
    function sortTableByFeedbackNotGiven() {
  var table = document.getElementById("table"); // Replace "myTable" with the actual ID of your table
  var rows = table.rows;
  var switching = true;

  while (switching) {
    switching = false;
    for (var i = 1; i < rows.length - 1; i++) {
      var feedbackNotGiven1 = parseInt(rows[i].cells[5].innerText); // Assuming "Total Feedback Not Given" column is the seventh column (index 6)
      var feedbackNotGiven2 = parseInt(rows[i + 1].cells[5].innerText);
      if (feedbackNotGiven1 < feedbackNotGiven2) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }
}
    function sortTableByFeedbackGiven() {
  var table = document.getElementById("table"); // Replace "myTable" with the actual ID of your table
  var rows = table.rows;
  var switching = true;

  while (switching) {
    switching = false;
    for (var i = 1; i < rows.length - 1; i++) {
      var feedbackNotGiven1 = parseInt(rows[i].cells[4].innerText); // Assuming "Total Feedback Not Given" column is the seventh column (index 6)
      var feedbackNotGiven2 = parseInt(rows[i + 1].cells[4].innerText);
      if (feedbackNotGiven1 < feedbackNotGiven2) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }
}

// document.querySelectorAll('.expandable-cell').forEach(cell => {
//   cell.addEventListener('click', event => {
//     event.currentTarget.classList.toggle('expanded');
//   });
// });







function copyToClipboard(element) {
  const value = element.textContent.trim();
  const textarea = document.createElement('textarea');
  textarea.value = value;
  textarea.setAttribute('readonly', '');
  textarea.style.position = 'absolute';
  textarea.style.left = '-9999px';
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
  alert(value);
}





</script>
 
    
</div>
</body>
