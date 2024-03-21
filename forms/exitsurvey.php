<?php
session_start();
extract($_POST);
$con=new mysqli('localhost','u554905395_feedback_user','FeedBack@2023','u554905395_feedback_base');
//$con=new mysqli('localhost','root','','u554905395_feedback_base');
if(isset($sub)){
  $query="select * from exitsurvey where Regno ='$rg'";
  $_SESSION['user']=$rg;
  $res=mysqli_query($con,$query);
  if(mysqli_num_rows($res)>0){
    echo "<script>alert('Feedback Already Submitted');

    
    </script>";
  }
  else{
      $avg=round((($quest1+$quest2+$quest3+$quest4+$quest5+$quest6+$quest7+$quest8+$quest9+$quest10+$quest11+$quest12+$quest13)/65)*100);
      $query="insert into exitsurvey values('','$acyear','$rg','$nm','$dept','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$quest11','$quest12','$quest13','$avg')";
      if(mysqli_query($con,$query)){
        echo "<script>alert('Feedback Submitted');
        window.location.href='generate/generate.php';
        </script>";
      }else{
        echo "<script>alert('Submission Failed');</script>";
      }
  }
}
?>

<html>
    <head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
    <style>
      #st-info{
        margin:20px;
        width:40%;
      
       
      }  
      #st-info tr,#st-info th,#st-info td{
        border:none !important;
      }
      
      
      body{
        overflow:scroll;
    }
    #st-info input,#st-info select{
      width:60%;
      
    }
    input[type=radio]{
      margin-left:50%;
    }
    @media(max-width:800px){
      #st-info{
        margin:20px;
        width:100%;
      
       
      } 
      #st-info input,#st-info select{
      width:80%;
      
    }
    }
    </style>
<body style="margin:3%;">
<div class="bor" style="border:solid 2px black">

<form method="post">

<fieldset style="margin:3%;">

<div align="center" style="display:flex; flex-direction: row; justify-content: center;">
    <div>
        <img src="logo.png" style="width: 100px; height:100px;">
    </div>
    <div style="margin:0% 0% 0% 2%">
        <h2><center>Anna University Regional Campus Madurai</center></h2>
       <!-- <h2><center>&nbsp;Department of Computer Science and Engineering</center></h2>-->
    </div>
</div>
<!--<center><b><h3>ACADEMIC YEAR: 2019 - 20 </h3></b></center>-->
<center><b><u><h3>Program Exit Survey Form</h3></u></b></center><br> 

<fieldset >


<p style="font-size: 20px;margin:0 5% 0 3%">
Exit survey was taken from the passed out students on the following parameters: <br>
1. Assessment of abilities, skills and attributes acquired at AURCM. <br>
2. Assessment of the Learning Environment at AURCM. <br>
3. Assessment of Support Services <br>
4. Assessment of curriculum offered, schedules and question paper standards <br>
5. General Assessment <br>
</p><br>
<table id="st-info" class="table table-hover">
  

  <tr ><th>Enter Regno :</th><td><input type="text" name="rg" id="rg" class="form-control" required></td></tr>
  <tr>
  <th>Enter Name :</th><td><input type="text" name="nm" id="nm" class="form-control" required></td>

  </tr>
  <tr>
    <th>Department :</th>
    <td><select name="dept" id="dept" class="form-control" required>
      <option value=""></option>
      <option value="CIVIL">CIVIL</option>
      <option value="CSE">CSE</option>
      <option value="MECH">MECH</option>
      <option value="ECE">ECE</option>
    </select></td>
  </tr>
  <tr><th>Period of Study :</th>
  <td><select name="acyear" id="acyear" class="form-control" required>
                                <option value="2018-2022">2018-2022</option>
                                <option value="2019-2023">2019-2023</option>
                                <option value="2020-2024">2020-2024</option>
                                <option value="2021-2025">2021-2025</option>
                                <option value="2022-2026">2022-2026</option>
  </select></td></tr>

</table>

<table style="border-collapse: collapse;" class="table table-bordered table-hover">

<tr>
    <th><b>S.No</b></th>
    <th><b>Description</b></th>
    <th><b>Excellent (5)</b></th>
    <th><b>Very Good (4)</b></th>
    <th><b>Good (3)</b></th>
    <th><b>Satisfactory (2)</b></th>
    <th><b>Poor (1)</b></th>
</tr>    
<tr><td><b>1:</b></td><td> Attainment of Program Outcomes</td>  
<td><input type="radio" name="quest1" value="5" required></td>
<td><input type="radio" name="quest1" value="4"></td>
<td><input type="radio" name="quest1" value="3"></td>
<td><input type="radio" name="quest1" value="2"></td>
<td><input type="radio" name="quest1" value="1"></td>
</tr>
  
<tr>
<td><b>2:</b></td><td> Usage of Innovative Teaching Methodologies</td> 
<td><input type="radio" name="quest2" value="5" required></td>
<td><input type="radio" name="quest2" value="4"></td>
<td><input type="radio" name="quest2" value="3"></td>
<td><input type="radio" name="quest2" value="2"></td>
<td><input type="radio" name="quest2" value="1"></td>
</tr>

<tr>
<td><b>3:</b></td><td>Flexibility of Curriculum</td> 
<td><input type="radio" name="quest3" value="5" required></td>
<td><input type="radio" name="quest3" value="4"></td>
<td><input type="radio" name="quest3" value="3"></td>
<td><input type="radio" name="quest3" value="2"></td>
<td><input type="radio" name="quest3" value="1"></td>
</tr>

<td><b>4:</b></td><td> Encouragement of Self Study</td>
<td> <input type="radio" name="quest4" value="5" required></td>
<td><input type="radio" name="quest4" value="4"></td>
<td><input type="radio" name="quest4" value="3"></td>
<td><input type="radio" name="quest4" value="2"></td>
<td><input type="radio" name="quest4" value="1"></td>
</td>

<tr>
<td>
<b>5:</b></td><td> Provision of enough Skills on design and problem solving techniques</td>
<td> <input type="radio" name="quest5" value="5" required></td>
<td><input type="radio" name="quest5" value="4"></td>
<td><input type="radio" name="quest5" value="3"></td>
<td><input type="radio" name="quest5" value="2"></td>
<td><input type="radio" name="quest5" value="1"></td>
</tr>
<tr>
<td><b>6:</b></td><td> Coverage of cutting edge technology topics in order to face the future</td>
<td><input type="radio" name="quest6" value="5" required></td>
<td><input type="radio" name="quest6" value="4"></td>
<td><input type="radio" name="quest6" value="3"></td>
<td><input type="radio" name="quest6" value="2"></td>
<td><input type="radio" name="quest6" value="1"></td>
</tr>

<tr><td>
<b>7:</b></td><td> Coverage of advanced topics to take up career in research</td>
<td> <input type="radio" name="quest7" value="5" required></td>
<td><input type="radio" name="quest7" value="4"></td>
<td><input type="radio" name="quest7" value="3"></td>
<td><input type="radio" name="quest7" value="2"></td>
<td><input type="radio" name="quest7" value="1"></td>
<tr>
<td>
<b>8:</b></td><td>Promoting Intellectual Growth</td>
<td><input type="radio" name="quest8" value="5" required></td>
<td><input type="radio" name="quest8" value="4"></td>
<td><input type="radio" name="quest8" value="3"></td>
<td><input type="radio" name="quest8" value="2"></td>
<td><input type="radio" name="quest8" value="1"></td>
</tr>
<tr>
<td>
<b>9:</b></td><td> Computer & Internet Facilities</td> 
<td><input type="radio" name="quest9" value="5" required></td>
<td><input type="radio" name="quest9" value="4"></td>
<td><input type="radio" name="quest9" value="3"></td>
<td><input type="radio" name="quest9" value="2"></td>
<td><input type="radio" name="quest9" value="1"></td>
</tr>
<tr>
<td>
<b>10:</b></td><td>Library Facilities</td>
<td><input type="radio" name="quest10" value="5" required></td>
<td><input type="radio" name="quest10" value="4"></td>
<td><input type="radio" name="quest10" value="3"></td>
<td><input type="radio" name="quest10" value="2"></td>
<td><input type="radio" name="quest10" value="1"></td>
</tr>
<tr>
<td><b>11:</b></td><td>Canteen Facilities</td>
<td>
 <input type="radio" name="quest11" value="5" required></td>
 <td><input type="radio" name="quest11" value="4"></td>
 <td><input type="radio" name="quest11" value="3"></td>
 <td><input type="radio" name="quest11" value="2"></td>
 <td><input type="radio" name="quest11" value="1"></td>
</tr>
<tr>
<td><b>12:</b></td><td>Sports Infrastructure</td>
<Td>
 <input type="radio" name="quest12" value="5" required></td>
 <td><input type="radio" name="quest12" value="4"></td>
 <td><input type="radio" name="quest12" value="3"></td>
 <td><input type="radio" name="quest12" value="2"></td>
 <td><input type="radio" name="quest12" value="1"></td>
</tr>

<tr>
<td><b>13:</b></td><td>Hostel Facilities</td>
<Td>
 <input type="radio" name="quest13" value="5" required></td>
 <td><input type="radio" name="quest13" value="4"></td>
 <td><input type="radio" name="quest13" value="3"></td>
 <td><input type="radio" name="quest13" value="2"></td>
 <td><input type="radio" name="quest13" value="1"></td>
</tr>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="sub">Submit</button>
<button type="reset" class="btn btn-danger" name="sub">Reset</button></p>


</form>
</fieldset>



</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
    
    </div><!--close main-->
  </form>
<center>
</div>
</body>
</html>