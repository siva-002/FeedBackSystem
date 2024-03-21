<?php
extract($_POST);
$con=new mysqli('localhost','u554905395_feedback_user','FeedBack@2023','u554905395_feedback_base');
//$con=new mysqli('localhost','root','','u554905395_feedback_base');
if(isset($sub)){
  $query="select * from parentsurvey where Regno ='$rg'";
  $res=mysqli_query($con,$query);
  if(mysqli_num_rows($res)>0){
    echo "<script>alert('Feedback Already Submitted');</script>";
  }
  else{
      $query="insert into parentsurvey values('','$rg','$dp','$nm','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$quest11','$quest12','$quest13','$quest14','$quest15')";
      if(mysqli_query($con,$query)){
        echo "<script>alert('Feedback Submitted');</script>";
      }else{
        echo "<script>alert('Submission Failed');</script>";
      }
  }
}
?>

<style>
    body {
        overflow:scroll;
    }
    .table-hover tr,.table-hover td,.table-hover th{
      border:none !important;
    }
</style>
<html>

<body style="margin: 3%;">
<div class="bor" style="border:solid 2px black">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form method="post">

<div align="center" style="margin:2% 0% 0% 0%;display:flex; flex-direction: row; justify-content: center;">
    <div>
        <img src="logo.png" style="width: 100px; height:100px;">
    </div>
    <div style="margin:0% 0% 0% 2%;">
        <h2><center>Anna University Regional Campus Madurai</center></h2>
        <h2><center>&nbsp;Department of Computer Science and Engineering</center></h2>
    </div>
</div>
<center><b><h3 >ACADEMIC YEAR: 2019 - 20 </h3></b></center>
<center><b><u><h3>Parent Feedback Analysis Report (Exit survey)</h3></u></b></center><br> 



<fieldset style="margin:0 3% 0 3%;">
<table class='table table-hover'>
<tr ><th>Enter Regno :</th><td><input type="text" name="rg" id="rg" class="form-control" required></td>
  <th>Select Department</th><td><select name="dp" class="form-control" required>
      <option></option>
      <option value="CIVIL">CIVIL</option>
      <option value="CSE">CSE</option>
      <option value="MECH">MECH</option>
      <option value="ECE">ECE</option>
  </select></td>
  <th>Enter Name :</th><td><input type="text" name="nm" id="nm" class="form-control" required></td>

  </tr>
</table>
<table style="border-collapse: collapse;"  class="table table-bordered">

<tr>
    <th><b>S.No</b></th>
    <th><b>Description</b></th>
    <th><b>Excellent(5)</b></th>
    <th><b>Very Good(4)</b></th>
    <th><b>Good(3)</b></th>
    <th><b>Satisfactory(2)</b></th>
    <th><b>Poor(1)</b></th>
</tr>    
<tr><td><b>1:</b></td><td> Cleanliness and ambience in campus</td>  
<td><input type="radio" name="quest1" value="5" required></td>
<td><input type="radio" name="quest1" value="4"></td>
<td><input type="radio" name="quest1" value="3"></td>
<td><input type="radio" name="quest1" value="2"></td>
<td><input type="radio" name="quest1" value="1"></td>
</tr>
  
<tr>
<td><b>2:</b></td><td>Quality of teaching</td> 
<td><input type="radio" name="quest2" value="5" required></td>
<td><input type="radio" name="quest2" value="4"></td>
<td><input type="radio" name="quest2" value="3"></td>
<td><input type="radio" name="quest2" value="2"></td>
<td><input type="radio" name="quest2" value="1"></td>
</tr>

<tr>
<td><b>3:</b></td><td>Examination & evaluation system</td> 
<td><input type="radio" name="quest3" value="5" required></td>
<td><input type="radio" name="quest3" value="4"></td>
<td><input type="radio" name="quest3" value="3"></td>
<td><input type="radio" name="quest3" value="2"></td>
<td><input type="radio" name="quest3" value="1"></td>
</tr>

<td><b>4:</b></td><td> Laboratory facilities</td>
<td> <input type="radio" name="quest4" value="5" required></td>
<td><input type="radio" name="quest4" value="4"></td>
<td><input type="radio" name="quest4" value="3"></td>
<td><input type="radio" name="quest4" value="2"></td>
<td><input type="radio" name="quest4" value="1"></td>
</td>

<tr>
<td>
<b>5:</b></td><td>Value added courses offered in the Department </td>
<td> <input type="radio" name="quest5" value="5" required></td>
<td><input type="radio" name="quest5" value="4"></td>
<td><input type="radio" name="quest5" value="3"></td>
<td><input type="radio" name="quest5" value="2"></td>
<td><input type="radio" name="quest5" value="1"></td>
</tr>
<tr>
<td><b>6:</b></td><td> Organizing Guest Lectures</td>
<td><input type="radio" name="quest6" value="5" required></td>
<td><input type="radio" name="quest6" value="4"></td>
<td><input type="radio" name="quest6" value="3"></td>
<td><input type="radio" name="quest6" value="2"></td>
<td><input type="radio" name="quest6" value="1"></td>
</tr>

<tr><td>
<b>7:</b></td><td> Field trip arrangements</td>
<td> <input type="radio" name="quest7" value="5" required></td>
<td><input type="radio" name="quest7" value="4"></td>
<td><input type="radio" name="quest7" value="3"></td>
<td><input type="radio" name="quest7" value="2"></td>
<td><input type="radio" name="quest7" value="1"></td>
<tr>
<td>
<b>8:</b></td><td>Industry Internship (Industry Training)</td>
<td><input type="radio" name="quest8" value="5" required></td>
<td><input type="radio" name="quest8" value="4"></td>
<td><input type="radio" name="quest8" value="3"></td>
<td><input type="radio" name="quest8" value="2"></td>
<td><input type="radio" name="quest8" value="1"></td>
</tr>
<tr>
<td>
<b>9:</b></td><td> Student amenities (Library, Wi-Fi/ Internet, etc)</td> 
<td><input type="radio" name="quest9" value="5" required></td>
<td><input type="radio" name="quest9" value="4"></td>
<td><input type="radio" name="quest9" value="3"></td>
<td><input type="radio" name="quest9" value="2"></td>
<td><input type="radio" name="quest9" value="1"></td>
</tr>
<tr>
<td>
<b>10:</b></td><td>Sports & Cultural activities</td>
<td><input type="radio" name="quest10" value="5" required></td>
<td><input type="radio" name="quest10" value="4"></td>
<td><input type="radio" name="quest10" value="3"></td>
<td><input type="radio" name="quest10" value="2"></td>
<td><input type="radio" name="quest10" value="1"></td>
</tr>
<tr>
<td><b>11:</b></td><td>Effectiveness of training for placement</td>
<td>
 <input type="radio" name="quest11" value="5" required></td>
 <td><input type="radio" name="quest11" value="4"></td>
 <td><input type="radio" name="quest11" value="3"></td>
 <td><input type="radio" name="quest11" value="2"></td>
 <td><input type="radio" name="quest11" value="1"></td>
</tr>
<tr>
<td><b>12:</b></td><td>Canteen facilities</td>
<Td>
 <input type="radio" name="quest12" value="5" required></td>
 <td><input type="radio" name="quest12" value="4"></td>
 <td><input type="radio" name="quest12" value="3"></td>
 <td><input type="radio" name="quest12" value="2"></td>
 <td><input type="radio" name="quest12" value="1"></td>
</tr>

<tr>
<td><b>13:</b></td><td>Transport facility</td>
<Td>
 <input type="radio" name="quest13" value="5" required></td>
 <td><input type="radio" name="quest13" value="4"></td>
 <td><input type="radio" name="quest13" value="3"></td>
 <td><input type="radio" name="quest13" value="2"></td>
 <td><input type="radio" name="quest13" value="1"></td>
</tr>


<tr>
<td><b>14:</b></td><td>Medical facility</td>
<Td>
 <input type="radio" name="quest14" value="5" required></td>
 <td><input type="radio" name="quest14" value="4"></td>
 <td><input type="radio" name="quest14" value="3"></td>
 <td><input type="radio" name="quest14" value="2"></td>
 <td><input type="radio" name="quest14" value="1"></td>
</tr>


<tr>
<td><b>15:</b></td><td>Attainment of program outcomes</td>
<Td>
 <input type="radio" name="quest15" value="5" required></td>
 <td><input type="radio" name="quest15" value="4"></td>
 <td><input type="radio" name="quest15" value="3"></td>
 <td><input type="radio" name="quest15" value="2"></td>
 <td><input type="radio" name="quest15" value="1"></td>
</tr>

</table>
<p align="center"><input type="submit" class="btn btn-success" name="sub">&nbsp;<input type="reset" class="btn btn-danger"></p>

</form>
</fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Next</button></p></a>
<a href="About.php"><p align="right"><button type="Button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a>-->

</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
    
    </div><!--close main-->
  </form>
<center></div>
</body>
</html>