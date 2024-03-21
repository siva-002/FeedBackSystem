<?php 
extract($_POST);
$con=new mysqli('localhost','u554905395_feedback_user','FeedBack@2023','u554905395_feedback_base');
if(isset($sub)){
    $query="select * from studentfeedback where Regno ='$rg'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){
      echo "<script>alert('Feedback Already Submitted');</script>";
    }else{
    $query="insert into studentfeedback values('','$nm','$rg','$year','$sem','$subcode','$sub','$acyear','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10')";
      if(mysqli_query($con,$query)){
        echo "<script>alert('Feedback Submitted');</script>";
      }else{
        echo "<script>alert('Submission Failed');</script>";
      }
    }
}
?>

<html>
<head>
    <style>
    form{
      padding: 0 3% 0 3%;
    }
    table td input[type=radio]{
     margin-left:50%;
    }
    #st-info th{
      text-align:flex-start;
      padding:2% 0 0 2%;
    }
    
    #st-info td,#st-info th{
        border:none;
    }
    form table tr td .form-control{
        width:200px;
    }
    body{
        
        overflow:scroll;
        padding:2% 5% 0% 5% ;
    }
  .content{
    border:solid 2px black;
    
  }

    @media(max-width:768px){
   div h2{
    font-size:20px;
    
   }
    }
  </style>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="content">

<div align="center" style="display:flex; flex-direction: row; justify-content: center;">
    <div>
        <img src="logo.png" style="margin:17% 0% 0% 0%; width: 100px; height:100px;">
    </div>
    <div style="margin:1% 0% 0% 2%">
        <h2><center>Anna University Regional Campus Madurai</center></h2>
        <h2><center>&nbsp;Department of Computer Science and Engineering</center></h2>
    </div>
</div>
<center><b><u><h3>Student Feedback Form</h3></u></b></center><br> 
<form method="post">


<table class="table table-bordered" id="st-info">
    
<tr><td><b>Name of the Student   :</b></td><td><input class="form-control" required type="text" name="nm"></td>
<td><b>Register Number       :</b></td><td><input class="form-control" required type="number" name="rg"></td></tr>
<tr><td><b>Year                  :</b></td><td><select class="form-control" required name="year">
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select></td>
                        
                            
<td><b>Semester             :</b></td><td><select class="form-control" required name="sem">
                                <option value="i">i</option>
                                <option value="ii">ii</option>
                                <option value="iii">iii</option>
                                <option value="iv">iv</option>
                                <option value="v">v</option>
                                <option value="vi">vi</option>
                                <option value="vii">vii</option>
                                <option value="viii">viii</option>
                            </select></td></tr>
<tr><td><b>Subject Code          :</b></td><td><input class="form-control" required type="text" name="subcode"> </td>
<td><b>Name of the Subject   :</b></td><td><input class="form-control" required type="text" name="sub"></td></tr>
<tr>
<td><b>Academic Year         :</b></td><td><select class="form-control" required name="acyear">
                                <option value="2018-2022">2018-2022</option>
                                <option value="2019-2023">2019-2023</option>
                                <option value="2020-2024">2020-2024</option>
                                <option value="2021-2025">2021-2025</option>
                                <option value="2022-2026">2022-2026</option>
                            </select></td></tr>
                        
</table>

<table style="border-collapse: collapse;" class="table table-bordered">
<tr>
    <th><b>S.No</b></th>
    <th><b>Description</b></th>
    <th><b>Excellent(5)</b></th>
    <th><b>Very Good(4)</b></th>
    <th><b>Good(3)</b></th>
    <th><b>Poor(2)</b></th>
    <th><b>Very Poor(1)</b></th>
</tr>    
<tr><td><b>1:</b></td><td>Covering entire Syllabus as prescribed by University / College / Board </td>  
<td><input type="radio" name="quest1" value="5" required></td>
<td><input type="radio" name="quest1" value="4"></td>
<td><input type="radio" name="quest1" value="3"></td>
<td><input type="radio" name="quest1" value="2"></td>
<td><input type="radio" name="quest1" value="1"></td>
</tr>
  
<tr>
<td><b>2:</b></td><td> Covering the relevant topics beyond syllabus</td> 
<td><input type="radio" name="quest2" value="5" required></td>
<td><input type="radio" name="quest2" value="4"></td>
<td><input type="radio" name="quest2" value="3"></td>
<td><input type="radio" name="quest2" value="2"></td>
<td><input type="radio" name="quest2" value="1"></td>
</tr>

<tr>
<td><b>3:</b></td><td>Effectiveness of Teacher in terms of 
    <ul>
        <li>Technical Content / Course Content</li>
        <li>Communication Skills</li>
        <li>Use of Teaching Aids</li>
    </ul>
</td> 
<td><input type="radio" name="quest3" value="5" required></td>
<td><input type="radio" name="quest3" value="4"></td>
<td><input type="radio" name="quest3" value="3"></td>
<td><input type="radio" name="quest3" value="2"></td>
<td><input type="radio" name="quest3" value="1"></td>
</tr>

<td><b>4:</b></td><td>Phase on which contents were covered</td>
<td> <input type="radio" name="quest4" value="5" required></td>
<td><input type="radio" name="quest4" value="4"></td>
<td><input type="radio" name="quest4" value="3"></td>
<td><input type="radio" name="quest4" value="2"></td>
<td><input type="radio" name="quest4" value="1"></td>
</td>

<tr>
<td><b>5:</b></td><td>Motivation and inspiration for students to learn</td>
<td> <input type="radio" name="quest5" value="5" required></td>
<td><input type="radio" name="quest5" value="4"></td>
<td><input type="radio" name="quest5" value="3"></td>
<td><input type="radio" name="quest5" value="2"></td>
<td><input type="radio" name="quest5" value="1"></td>
</tr>
<tr>
<td><b>6:</b></td><td>Support for the development of students skill
    <ul>
        <li>Practical Demonstration</li>
        <li>Hands on Training</li>
    </ul>
</td>
<td><input type="radio" name="quest6" value="5" required></td>
<td><input type="radio" name="quest6" value="4"></td>
<td><input type="radio" name="quest6" value="3"></td>
<td><input type="radio" name="quest6" value="2"></td>
<td><input type="radio" name="quest6" value="1"></td>
</tr>

<tr><td>
<b>7:</b></td><td>Clarity of expectations fulfilled</td>
<td> <input type="radio" name="quest7" value="5" required></td>
<td><input type="radio" name="quest7" value="4"></td>
<td><input type="radio" name="quest7" value="3"></td>
<td><input type="radio" name="quest7" value="2"></td>
<td><input type="radio" name="quest7" value="1"></td>
<tr>
<td>
<b>8:</b></td><td>Feedback provided on students' progress</td>
<td><input type="radio" name="quest8" value="5" required></td>
<td><input type="radio" name="quest8" value="4"></td>
<td><input type="radio" name="quest8" value="3"></td>
<td><input type="radio" name="quest8" value="2"></td>
<td><input type="radio" name="quest8" value="1"></td>
</tr>
<tr>
<td>
<b>9:</b></td><td>Willingness to offer help and advice to students</td> 
<td><input type="radio" name="quest9" value="5" required></td>
<td><input type="radio" name="quest9" value="4"></td>
<td><input type="radio" name="quest9" value="3"></td>
<td><input type="radio" name="quest9" value="2"></td>
<td><input type="radio" name="quest9" value="1"></td>
</tr>
<tr>
<td>
<b>10:</b></td><td>Time Management</td> 
<td><input type="radio" name="quest10" value="5" required></td>
<td><input type="radio" name="quest10" value="4"></td>
<td><input type="radio" name="quest10" value="3"></td>
<td><input type="radio" name="quest10" value="2"></td>
<td><input type="radio" name="quest10" value="1"></td>
</tr>

</table>
<p align="center"><button type="submit" style="font-size:7pt;color:white;background-color:brown;border:2px solid #336600;padding:7px" name="sub">Submitt</button></p>

</form>




<center>
</div>
</body>
</html>