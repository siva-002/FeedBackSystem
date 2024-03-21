<style>
    .table th{
        text-align:center;
       ;
    }
    .table input[type=radio]{
        margin-left:50%;
    }
    .label{
        margin-left:10px;
        margin-top:10px;
        font-size:15px;
    }
    @media(max-width:768px){
      #fdtable{
        font-size:13px;
      }
      #main{
        width:100%;
        overflow:scroll;
      }
      #fdtable tr,#fdtable th,#fdtable td{
        
      }
      #label-info {
        margin-top:20px;
        display:flex;
        flex-wrap:wrap;
      }
    }

</style><?php 

extract($_POST);
$dp=strtolower($_SESSION['dept']);
$dbtable='feedback-'.$dp.'-'.$_SESSION['acyear'];
//echo $dbtable;
if(isset($sub))
{
    $sub='False';
$user=$_SESSION['user'];
$sql=mysqli_query($conn,"select * from `{$dbtable}` where regno='$user' and Coursecode='$course'");
$r=mysqli_num_rows($sql);

   /* if(($_SESSION['acyear'] == "2019-2023") && ($dp=='cse')){
       
        $sql1=mysqli_query($conn,"select * from `{$dbtable}` where regno='$user' and semester='viii'");
        if(mysqli_num_rows($sql1)>=3){
            $sub='True';
         echo "<script>alert('You have already given feedback for this sem');</script>";
         echo "<h3 style='color:red'><b>For this sem you can able to give feedback for 2 subjects only</b> <br>If You have wrongly given feedback to another subject<br>Please Contact Admin !</h3>";
         
        }
    }*/
    if($r==true)
    {
        $sub='True';
        echo "<h2 style='color:red'>You already given feedback to this subject</h2>";
    }
 if($sub=='False')

{

  $_SESSION['cs']=$course;
  $sql=mysqli_query($conn,"select * from staff where coursecode='$course' and acyear='$_SESSION[acyear]' and department='$_SESSION[dept]' ");
  $r=mysqli_fetch_array($sql);
// $_SESSION['link'] ="uploads/".$_SESSION['user']."/".md5($user."-".$course).".pdf";
// $link=$_SESSION['link']; 
 $tt=(($quest1+$quest2+$quest3+$quest4+$quest5+$quest6+$quest7+$quest8+$quest9+$quest10)/50)*100;
 $avg=(int)($tt);
  $query="insert into `{$dbtable}` values(NULL,'$r[staff_id]','$user','$_SESSION[pg]','$r[sem]','$r[staffname]','$r[subject]','$course','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$avg',now())";

if(mysqli_query($conn,$query))
{
//<h2 style='color:green'>Thank you Your Feedback was Submitted !&nbsp;&nbsp;<a href='index.php'style='text-decoration:none;'>Click here</a></h2>";



//header("Location: generate.php");
echo "<script>
window.open('https://feedback.autmdu.in/user/generate.php','_blank');

alert('Thanks for submitting feedback');
</script>";

}else{
  echo "<h2 style='color:red'>Try again later </h2>";
}
}
}

?>
<form method="post">
<fieldset>
<center><u>Student's FeedBack Form</u></center><br>
 
<fieldset>



<h3>Please give your answer about the following question by choosing any one grade on the scale (5 to 1):</h3>

<div id="label-info">
<span class="label label-success">Excellent 5</span>
<span class="label label-primary">Very Good 4</span>
<span class="label label-info">Good 3</span>
<span class="label label-warning">Satisfactory 2</span>
<span class="label label-danger">Poor 1</span>
</div>
<table class="table table-bordered" style="margin-top:50px">
<tr>

<th> Select Subject :</th>
<td>
<select name="course" class="form-control" required>
	<?php
$query2 = "SELECT  * from `{$dbtable}` where regno='$user'";
$result2 = mysqli_query($conn, $query2);
$feedback_subjects = array();
while ($row = mysqli_fetch_assoc($result2)) {
    $feedback_subjects[] = $row['Coursecode'];
}

$sql=mysqli_query($conn,"select * from staff where acyear='$_SESSION[acyear]' and sem=  '".$_SESSION['sm']."' and  department= '".$_SESSION['pg']."'  ");
    if(mysqli_num_rows($sql)<1){
        echo "<option>You Are Not Allowed to Give Feedback for this sem kindly change your sem to provide feedback</option>";
    }
	while($r=mysqli_fetch_array($sql))
	{
	    $cc=$r['coursecode'];
	    if (in_array($cc, $feedback_subjects)){
	      	echo "<option style='color:red;' disabled value='".$r['coursecode']."'>".$r['coursecode'].'-'.$r['staffname'].'&nbsp;'.'('.$r['subject'].") </option>";  
	    }else{
	echo "<option value='".$r['coursecode']."'>".$r['coursecode'].'-'.$r['staffname'].'&nbsp;'.'('.$r['subject'].")</option>";
	    }
	}
  	 ?>
</select>
</td>
</tr>
</table>

<div id="main">
<table class="table table-bordered table-hover" style="" id="fdtable">
    <tr><th>S.no</th> <th>Description </th><th>Excellent (5)</th><th>Very Good (4)</th> <th>Good (3)</th> <th>Satisfactory (2)</th><th>Poor (1)</th></tr>
<tr>
<td><b>1 : </b></td><td>Covering entire Syllabus as prescribed by University / College / Board</td>  
<td><input type="radio" name="quest1" value="5" required> </td> 
<td>  <input type="radio" name="quest1" value="4"> </td> 
 <td> <input type="radio" name="quest1" value="3"> </td> 
<td><input type="radio" name="quest1" value="2"> </td> 
<td><input type="radio" name="quest1" value="1"> </td>
</tr>
  
<tr>
<td><b>2 : </b></td><td>Covering the relevant topics beyond syllabus</td> 
<td><input type="radio" name="quest2" value="5" required></td> 
  <td><input type="radio" name="quest2" value="4"></td> 
  <td><input type="radio" name="quest2" value="3"></td> 
<td><input type="radio" name="quest2" value="2"></td> 
<td><input type="radio" name="quest2" value="1"></td>
</tr>

<tr>
<td>
<b>3 : </b></td><td>Effectiveness of Teacher in terms of
          <ul>
            <li>Technical Content / Course Content</li>
            <li>Communication Skills</li>
            <li>Use of Teaching aids</li>
          </ul>
</td> 
<td>
<input type="radio" name="quest3" value="5" required></td> 
<td>  <input type="radio" name="quest3" value="4"></td> 
 <td> <input type="radio" name="quest3" value="3"></td> 
<td><input type="radio" name="quest3" value="2"></td> 
<td><input type="radio" name="quest3" value="1"></td>
</tr>

<Td><b>4 : </b></td><td>Phase on which contents were covered</td>
<td> <input type="radio" name="quest4" value="5" required></td> 
 <td> <input type="radio" name="quest4" value="4"></td> 
  <td><input type="radio" name="quest4" value="3"></td> 
<td><input type="radio" name="quest4" value="2"></td> 
<td><input type="radio" name="quest4" value="1"></td> 
</td>

<tr>
<td>
<b>5 : </b></td><td>Motivation and inspiration for students to learn</td>
<td> 
<input type="radio" name="quest5" value="5" required></td> 
<td><input type="radio" name="quest5" value="4"></td> 
  <td><input type="radio" name="quest5" value="3"></td> 
<td><input type="radio" name="quest5" value="2"></td> 
<td><input type="radio" name="quest5" value="1"></td>
</tr>
<tr>
<td><b>6 : </b></td><td>Support for the development of students skill
      <ul>
          <li>Practical Demonstration</li>
          <li>Hands On Training</li>
      </ul>
</td>
<td>
 <input type="radio" name="quest6" value="5" required></td> 
 <td> <input type="radio" name="quest6" value="4"></td> 
  <td><input type="radio" name="quest6" value="3"></td> 
<td><input type="radio" name="quest6" value="2"></td> 
<td><input type="radio" name="quest6" value="1"></td></td> 
</tr>

<tr><td>
<b>7 : </b></td><td>Clarity of expectations fulfilled</td>
<td> <input type="radio" name="quest7" value="5" required></td> 
 <td> <input type="radio" name="quest7" value="4"></td> 
 <td> <input type="radio" name="quest7" value="3"></td> 
<td><input type="radio" name="quest7" value="2"></td> 
<td><input type="radio" name="quest7" value="1"></td>
<tr>
<td>
<b>8 : </b></td><td>Feedback provided on students' progress</td><td> 
<input type="radio" name="quest8" value="5" required></td> 
  <td><input type="radio" name="quest8" value="4"></td> 
  <td><input type="radio" name="quest8" value="3"></td> 
<td><input type="radio" name="quest8" value="2"></td> 
<td><input type="radio" name="quest8" value="1"></td>
</tr>
<tr>
<td>
<b>9 : </b></td><td>Willingness to offer help and advice to students</td> 
<td><input type="radio" name="quest9" value="5" required></td> 
  <td><input type="radio" name="quest9" value="4"></td> 
  <td><input type="radio" name="quest9" value="3"></td> 
<td><input type="radio" name="quest9" value="2"></td> 
<td><input type="radio" name="quest9" value="1"></td>
</tr>
<tr>
<td>
<b>10 : </b></td><td> Time Management </td>
<td>
 <input type="radio" name="quest10" value="5" required></td> 
  <td><input type="radio" name="quest10" value="4"></td> 
  <td><input type="radio" name="quest10" value="3"></td> 
<td><input type="radio" name="quest10" value="2"></td> 
<td><input type="radio" name="quest10" value="1"></td>
</tr>

</table>

<p align="center"><button type="submit" style="" class="btn btn-success" name="sub">Submit</button>
<button type="reset" class="btn btn-danger">Reset</button>
</p>
</div>

</form>
</fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Next</button></p></a>
<a href="About.php"><p align="right"><button type="Button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a>-->

</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
    
    </div><!--close main-->
  </form>
<center>