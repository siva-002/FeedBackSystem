<?php
extract($_POST);
$con=new mysqli('localhost','u554905395_feedback_user','FeedBack@2023','u554905395_feedback_base');
if(isset($sub)){
  $query="select * from industry where Regno ='$regno'";
  $res=mysqli_query($con,$query);
  if(mysqli_num_rows($res)>0){
    echo "<script>alert('Feedback Already Submitted');</script>";
  }
  else{
    $query="insert into industry values('','$name','$regno','$dp',$year','$sem','$ind','$date','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8')";
    if(mysqli_query($con,$query)){
      echo "<script>alert('Feedback Submitted');</script>";
    }else{
      echo "<script>alert('Submission Failed');</script>";
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry</title>
  
    <style>
      body {
        overflow:scroll;
      }
      .bor{
        width:100%;

           
       }
        #head{
          display:flex;
          
        }
        #head h2{
          margin-top:20px;
          font-weight:bold;
          font-size:20px;
          text-align:center;
          left:35%;
          position:absolute;
        }
        #head img{
          margin:20px;
        }
        form{
          padding: 0 3% 0 3%;
        }
        #sub{
          margin-left:50%;
        }
        table td input[type=radio]{
         margin-left:50%;
        }
        
        #indexdetail td,#indexdetail th{
            border:none;
        }
        #indexdetail th{
      text-align:flex-start;
      padding:2% 0 0 2%;
    }
        form table tr td .form-control{
            width:180px;
        }
        body{
           
            padding:2% 5% 0% 5% ;
        }

    
        @media(max-width:800px){
       div h2{
        font-size:20px;
        
       }
       .bor{
           width:150%;
       }
       form{
           width:50%;
       }
       
        }
      </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    
<div class="content" style=" display: flex; justify-content: center;
 text-align: center; line-height: 100px;">
    <div>
       <img style="margin:7% 0% 0% 0%; width:125px; height: 125px;" src="./logo.png">
    </div>
    <div style="margin:2% 0% 0% 2%; line-height: 20px;" >
        <h2><b>Anna University Regional Campus Madurai<br>
            Department of Computer Science<br>
            Industrial Visit Feed Back Form<br>
            </b>
        </h2>
    </div>
</div>
<br>
<br>

<form method="post">
 <table style="border-collapse: none;" class="table table-bordered" id="indexdetail">
     
    <tr><th>Name of the Student  :</th> <td><input type="text" name="name" id="name" required class="form-control"></td>
    <th>Register Number  :</th> <td><input type="text" name="regno" id="regno" class="form-control"required></td></tr>
    <tr><th>Year  :</th> <td>
        <select name="year" id="year" required class="form-control">
                  <option></option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
        </select></td>

        
        
        
        
        <th >Name of the Industry :</th>
        <Td><input class="form-control" value="" name="ind"></tr>
        <tr>
        <th>Select Your Department</th>    <td><select name="dp" class="form-control" required>
      <option></option>
      <option value="CIVIL">CIVIL</option>
      <option value="CSE">CSE</option>
      <option value="MECH">MECH</option>
      <option value="ECE">ECE</option>
  </select></td>
        </tr>
    <tr><th>Sem :</th>
    <td>
       <select name="sem" id="sem" required class="form-control">
                 <option></option>
            <option value="i">i</option>
            <option value="ii">ii</option>
            <option value="iii">iii</option>
            <option value="iv">iv</option>
            <option value="v">v</option>
            <option value="vi">vi</option>
            <option value="vii">vii</option>
            <option value="viii">viii</option>
      </select> 
        </td>
   

    <th >Date :</th>
         <td><input class="form-control" type="date" value="" name="date">
     </tr>
    
 
     
        
  
 

</table>
 <!-- <table class="table table-bordered" style="margin-top:50px">
    
     <tr>
     
     <th> Select Subject :</th>
     <td>
     </td>
 </tr>
 </table>
  -->
 
 <!-- <h3><b>Description</h3><br> -->
 <table style="border-collapse: collapse;"  class="table table-bordered">
 <tr>
     <th><b>S.No</b></th>
     <th><b>Description</b></th>
     <th><b>Excellent(5)</b></th>
     <th><b>Very Good(4)</b></th>
     <th><b>Good(3)</b></th>
     <th><b>Poor(2)</b></th>
     <th><b>Very Poor(1)</b></th></tr>
     <tr><td><b>1:</b></td><td>Theoretical knowledge gained </td>  
         <td><input type="radio" name="quest1" value="5" required></td>
         <td><input type="radio" name="quest1" value="4"></td>
         <td><input type="radio" name="quest1" value="3"></td>
         <td><input type="radio" name="quest1" value="2"></td>
         <td><input type="radio" name="quest1" value="1"></td>
         </tr>
           
         <tr>
         <td><b>2:</b></td><td> Practical knowledge accquired</td> 
         <td><input type="radio" name="quest2" value="5" required></td>
         <td><input type="radio" name="quest2" value="4"></td>
         <td><input type="radio" name="quest2" value="3"></td>
         <td><input type="radio" name="quest2" value="2"></td>
         <td><input type="radio" name="quest2" value="1"></td>
         </tr>
         
         <tr>
         <td><b>3:</b></td><td>Rate the Skills gained 
             
         </td> 
         <td><input type="radio" name="quest3" value="5" required></td>
         <td><input type="radio" name="quest3" value="4"></td>
         <td><input type="radio" name="quest3" value="3"></td>
         <td><input type="radio" name="quest3" value="2"></td>
         <td><input type="radio" name="quest3" value="1"></td>
         </tr>
         
         <td><b>4:</b></td><td>How do you rate the Practical experience?</td>
         <td> <input type="radio" name="quest4" value="5" required></td>
         <td><input type="radio" name="quest4" value="4"></td>
         <td><input type="radio" name="quest4" value="3"></td>
         <td><input type="radio" name="quest4" value="2"></td>
         <td><input type="radio" name="quest4" value="1"></td>
         </td>
         
         <tr>
         <td><b>5:</b></td><td>Ability to think out of the box?</td>
         <td> <input type="radio" name="quest5" value="5" required></td>
         <td><input type="radio" name="quest5" value="4"></td>
         <td><input type="radio" name="quest5" value="3"></td>
         <td><input type="radio" name="quest5" value="2"></td>
         <td><input type="radio" name="quest5" value="1"></td>
         </tr>
         <tr>
         <td><b>6:</b></td><td>Ability to work with team
         </td>
         <td><input type="radio" name="quest6" value="5" required></td>
         <td><input type="radio" name="quest6" value="4"></td>
         <td><input type="radio" name="quest6" value="3"></td>
         <td><input type="radio" name="quest6" value="2"></td>
         <td><input type="radio" name="quest6" value="1"></td>
         </tr>
         
         <tr><td>
         <b>7:</b></td><td>Facilties & Hospitality</td>
         <td> <input type="radio" name="quest7" value="5" required></td>
         <td><input type="radio" name="quest7" value="4"></td>
         <td><input type="radio" name="quest7" value="3"></td>
         <td><input type="radio" name="quest7" value="2"></td>
         <td><input type="radio" name="quest7" value="1"></td>
         <tr>
         <td>
         <b>8:</b></td><td>Overall Experience </td>
         <td><input type="radio" name="quest8" value="5" required></td>
         <td><input type="radio" name="quest8" value="4"></td>
         <td><input type="radio" name="quest8" value="3"></td>
         <td><input type="radio" name="quest8" value="2"></td>
         <td><input type="radio" name="quest8" value="1"></td>
         </tr>
         <tr>
            <tr><td colspan="7"><input type="submit" class="btn btn-success" id="sub" name="sub"> <input type="reset" class="btn btn-danger"></td></tr>
 
 </table>
</form>


</body>
</html>
