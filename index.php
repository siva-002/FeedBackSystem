<?php 
session_start();
extract($_POST);
include('dbconfig.php');
include('stlogin.php');

if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='$e' or regno='$reg'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'><h3 align='center' style='font-weight:bold';>Email or regno already exists</h3></font>";
}
else
{
//dob
$dob=$yy."-".$mm."-".$dd;

//hobbies
//$hob=implode(",",$hob);

//image
//$imageName=$_FILES['img']['name'];


//encrypt your password
$pass=md5($p);

// base64_encode($pas);




$query="insert into user values('','$acyear','$n','$reg','$regulation','$e','$pass','','$pro','$sem','$gen','','','$dob',now())";
mysqli_query($conn,$query);

//upload image

//mkdir("images/$reg");
//move_uploaded_file($_FILES['img']['tmp_name'],"images/$reg/".$_FILES['img']['name']);


$err="<font color='blue' ><h3 align='center' style='font-weight:bold';>Registration successful !!<h3></font>";

}
}

@$page=  $_GET['p'];
if($page!="")
{
if($page=="a")
	{
header('location:administrator/index.php');
			
	}
			
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="images/logo.png" rel="icon">  <title> HOME</title>
    <!--Bootstrap cs Online CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   
    <!--Custom CSS-->
    <link rel="stylesheet" href="index.css">
    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #ctext{
        background:none;
        color:white;
        border-radius:5px;
    }
   
    #register form{
        background-color:rgba(1,1,1,0.3);
        width:600px;
        padding-bottom: 0px;
    }
    #register h2{
        
        color:white;
    }

    
</style>
<body>
    <div class="nav-container">
        <div class="navbar navbar-default ">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand"><img class="logo"src="images/logo.png" alt="LOGO"> <span class="title">anna university regional campus madurai</span></div>
            </div>
            <div class="collapse navbar-collapse" id="mynav">
            <ul class="nav nav-pills navbar-right ">
                <li class="active" ><a href="#home" data-toggle="pill"><i class="fa-solid fa-house"></i> HOME</a></li>
                <li class=""><a href="#register" data-toggle="pill"><i class="fa-solid fa-user-pen"></i> REGISTER</a></li>
                <li class=""><a href="#login" data-toggle="pill"><i class="fa-solid fa-right-to-bracket"></i> LOGIN</a></li>
                <li class="">    
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" type="button" data-toggle="dropdown">FORMS
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a style="font-size: 16px; color:red;" href="forms/exitsurvey.php"><p>Program Exit Survey Form</p></a></li>
                        <!--<li><a style="font-size: 16px; " href="forms/studentfeedback.php"><p>Student Feedback Form</p></a></li>-->
                        <li><a style="font-size: 16px ;" href="forms/parent.php"><p>Parent Survey Form</p></a></li>
                        <li><a style="font-size: 16px ;color:red;" href="forms/industry.php"><p>Industrial Visit Feedback Form</p></a></li>
                        <li><a style="font-size: 16px;" href="forms/inplant.php"><p>In Plant Training &<br>Internship Feedback Form</p></a></li>
                         </ul>
                    </div> 
                </li>              
                <li class="" style="margin-right:0px;"><a href="#contact" data-toggle="pill"><i class="fa-solid fa-phone"></i> CONTACT</a></li>
            </ul>
            
    </div>
         

    <div class="tab-content">
         <!--Home -->
        <div class="tab-pane fade in active" id="home">
            <div class="row ">
                <div class="col-md-2 col-xs-1 col-sm-2"></div>
                    <div class="col-md-8 col-xs-10 col-sm-8" >
                    <?php if ( (isset($_POST['save'])) OR isset($_POST['login'])  OR isset($_POST['csubbtn'])){
                    echo '<div class="alert alert-success alert-dissmissible">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <span></span>
                            <strong>'.$err.'</strong>
                        </div>';
                    }?>
                        <!--<?php if(isset($_POST['save'])) { echo $err;}?>-->
                        
                        <!--rohith's modification-->
                        <div class="text-box">
                            <div class="text-only">
             <h1>FEED<span style="color:#9fd3c7">BACK</span> SYSTEM</h1>
           <p>
                welcome to Student Feedback system for Anna University Regional Campus Madurai <br>
                Here we have developed the a faculty feedback system, which is generally used in 
                the college to rate the faculty based on the performance... <br>

            

            </p>
            </div>
             <a href="https://www.autmdu.in/#/" class="hero-btn" id="btns">visit us to know more</a>
        </div>
                    <!--rohith's modification ends-->

        <!--<h3>FEEDBACK SYSTEM </h3>
                        <p>Student Feedback system for Anna University Regional Campus Madurai  
                  Here we have developed the a faculty feedback system, which is generally used in the college to rate the faculty based on the performance...-->
                </div>
                <div class="col-md-2 col-xs-1 col-sm-2"></div>
            </div>
        </div>
         <!--Register -->
        <div class="tab-pane fade" id="register" >
            <div class="row">
            <div class="col-md-2 col-xs-0 col-sm-2" ></div>
                <div class="col-md-8 col-xs-12 col-sm-8 ">
                        <h2>Register</h2>
                        <div class="col-md-2 col-sm-0" ></div> 
                        <div class="col-md-8 col-sm-12" >
                            <form id="form" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" class="form">
                    <table class="table table-responsive"  style="margin-bottom:50px;" >
                            
                            
                            
                            <tr>
                                <td>Enter Your regno</td>
                                <Td><input  type="number" id="reg" name="reg" class="form-control" oninput="dept_display()" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Your name</td>
                                <Td><input  type="text" id="n" name="n" onkeypress="validateInput(event)" class="form-control" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Your Regulation</td>
                                <td>
                                    <select name="regulation" id="regulation" required class="form-control">
                                        <option value=""></option>
                                        <option value="R2017">R-2017</option>
                                        <option value="R2021">R-2021</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Select Your Department</td>
                                <Td><select name="pro" id="pro" class="form-control"  onchange="showAcademicYear()" required >
                                <option></option>
                                <option value="CSE">CSE</option>
                                <option value="MECH">MECH</option>
                                <option value="EEE">EEE</option>
                                <option value="ECE">ECE</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="MBA" id="MBA">MBA</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter Period of Study</td>
                                <td>
                                    <select name="acyear" id="acyear" required class="form-control">
                                        <option value=""></option>
                                        <option value="2018-2022">2018-2022</option>
                                        <option value="2019-2023">2019-2023</option>
                                        <option value="2020-2024">2020-2024</option>
                                        <option value="2021-2025">2021-2025</option>
                                        <option value="2022-2026">2022-2026</option>
                                 
                                        
                                        <option value="2021-2023">2021-2023</option>
                                       
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter Your email </td>
                                <Td><input type="email" id="e" name="e" class="form-control" required/></td>
                            </tr>
                            
                            <tr>
                                <td>Enter Your Password </td>
                                <Td><input type="password" id="p" name="p" class="form-control" required/></td>
                            </tr>
                            
                            <!--<tr>
                                <td>Enter Your Mobile </td>
                                <Td><input type="text" name="mob" class="form-control" required/></td>
                            </tr>-->
                            

                            
                            <tr>
                                <td>Select Your Semester</td>
                                <Td><select id="sem" name="sem" class="form-control" required>
                                <option ></option>
                                <option>i</option>
                                <option>ii</option>
                                <option>iii</option>
                                <option>iv</option>
                                <option>v</option>
                                <option>vi</option>
                                <option>vii</option>
                                <option>viii</option>
                                </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Select Your Gender</td>
                                <td>
                           <input type="radio" name="gen" value="m" id="gm"/>&nbsp;Male
                           <input type="radio" name="gen" value="f" id="gf"/>&nbsp;Female
                                </td>
                            </tr>
                            
                            <!--<tr>
                                <td>Choose Your hobbies</td>
                                <td>
                              <input value="reading" type="checkbox" name="hob[]"/>&nbsp;Reading
                                <input value="singin" type="checkbox" name="hob[]"/>&nbsp;Coding
                                <input value="playing" type="checkbox" name="hob[]"/>&nbsp;Playing
                                </td>
                            </tr>-->
                            
                            
                           <!-- <tr>
                                <td>Upload  Your Image </td>
                                <Td><input type="file" name="img" class="form-control" /></td>
</td>
                            </tr>-->
                            
                            <tr>
                                <td>Enter Your DOB</td>
                                <Td>
                                <select style="width:100px;float:left" name="yy" id="yr" class="form-control" required>
                                <option value="">Year</option>
                                <?php 
                                for($i=1995;$i<=2024;$i++)
                                {
                                echo "<option>".$i."</option>";
                                }					
                                ?>
                                
                                </select>
                                
                                <select style="width:100px;float:left" name="mm" id="mn" class="form-control" required>
                                <option value="">Month</option>
                                <?php 
                                for($i=1;$i<=12;$i++)
                                {
                                echo "<option>".$i."</option>";
                                }					
                                ?>
                                
                                </select>
                                
                                
                                <select style="width:100px;float:left" name="dd" id="dy" class="form-control" required>
                                <option value="">Date</option>
                                <?php 
                                for($i=1;$i<=31;$i++)
                                {
                                echo "<option>".$i."</option>";
                                }					
                                ?>
                                
                                </select>
                                
                                </td>
                            </tr>
                                                <script>function validateInput(event) {
                      var key = event.keyCode || event.which;
                      var keyChar = String.fromCharCode(key);
                    
                      // Only allow alphabetic characters (A-Z and a-z) and spaces
                      if (!/^[A-Za-z\s]+$/.test(keyChar)) {
                        event.preventDefault();
                      }
                    }


</script>
<script>
function showAcademicYear() {
  var department = document.getElementById("pro").value;
  var acYearSelect = document.getElementById("acyear");
  var options = acYearSelect.getElementsByTagName("option");

  for (var i = 0; i < options.length; i++) {
    if (department === "MBA") {
      if (options[i].value === "" || options[i].value === "2021-2023") {
        options[i].style.display = "block"; // Show the option "" and "2021-2023" for MBA
      } else {
        options[i].style.display = "none"; 
      }
    } else if (department === "CSE" || department === "MECH" || department === "EEE" || department === "ECE" || department === "CIVIL") {
      if (options[i].value === "2021-2023") {
        options[i].style.display = "none"; 
        acYearSelect.value = "";  
      } else {
        options[i].style.display = "block"; 
      }
    } else {
      options[i].style.display = "block"; 
    }
  }
  
  acYearSelect.disabled = false;  
}
</script>









                             <script>
                                  const fields = [
                                             { id: "reg", next: "n" },
                                             { id: "n", next: "regulation" },
                                            { id: "regulation", next: "pro" },
                                            { id: "pro", next: "acyear" },
                                            { id: "acyear", next: "e" },
                                            { id: "e", next: "p" },
                                            { id: "p", next: "sem" },
                                            
                                            { id: "sem", next: "gm" },
                                              { id: "sem", next: "gf" },
                                              { id: "gm", next: "yr" },
                                             { id: "gf", next: "yr" },
                                            { id: "yr", next: "mn" },
                                             { id: "mn", next: "dy" },
                                             { id: "dy", next: "sub" },
                                             { id: "sub", next: "" },];

 fields.forEach((field, index) => {
   const currentField = document.getElementById(field.id);
   const nextField = document.getElementById(field.next);

  currentField.addEventListener("input", () => {
     if (currentField.value !== "") {
       nextField.removeAttribute("disabled");
       nextField.style.opacity = 1;
     } else {
      nextField.setAttribute("disabled", true);
       nextField.style.opacity = 0.5;
     }
   });

   if (index !== fields.length - 1) {
    nextField.setAttribute("disabled", true);
     nextField.style.opacity = 0.5;
   }
 });                             </script>
                            
                            <tr>
                                
                                
            <Td colspan="2" align="center">
            <input style="width:110px;" value="Register" type="submit" id="sub" class="btn btn-info" name="save"/>
            <input type="reset" value="Reset" class="btn btn-info"/>
                            
                                </td>
                            </tr>
                        </table>
                    </form>
                        </div>
                        <div class="col-md-2 col-sm-0"></div> 
                </div>
            <div class="col-md-0  col-sm-2" ></div>
                            </div>
        </div>

        <!--LOGIN -->

        <div class="tab-pane fade" id="login">
            <div class="col-md-2 col-xs-1 col-sm-0"></div>
              <div class="col-md-8 col-xs-10 col-sm-12">
                        
                            <h2>Login</h2>
                            <ul class=" breadcrumb">
                                <li class="active"><a href="#student" data-toggle="tab">Student</a> </li> 
                                <!--<li><a href="#staff" data-toggle="tab">Staff</a></li>-->
                                <li><a href="#admin" data-toggle="tab">Admin</a></li>
                            </ul>  
                    <div class="col-md-4 col-sm-8">
                   
                    </div>                 
                    
                    <div class="col-md-0 col-sm-offset-4 col-sm-8">                 
                        <div class="tab-content">
                                <div id="student" class="tab-pane fade in active">
                                    <form class="form " action="" method="POST">
                                        <label for="regno">Enter Regno :</label><input     class="form-control" type="text" id="regno" name="e"><br>
                                        <label for="passwd">Enter password :</label><input class="form-control" type="password" id="passwd" name="p"><br>
                                        <button id="stlogbtn" class="btn btn-success" name="login"><i class="fa fa-sign-in"></i> Login</button>
                                        <a href="forget/forgetpassword.php" id="forget">Forgot Password ?</a>
                                    </form>
                                </div>
                                <div id="staff" class="tab-pane fade ">
                                    <form class="form" method="POST">
                                        <label for="staffid">Enter Staff Id :</label><input     class="form-control" type="text" name="staffid"><br>
                                        <label for="staffpasswd">Enter password :</label><input class="form-control" type="password" name="staffpasswd"><br>
                                        <button id="stlogbtn" class="btn btn-success" id="stafflogbtn" name="stafflogbtn"><i class="fa fa-sign-in"></i> Login</button>
                                    </form>
                                </div>
                                <div id="admin" class="tab-pane fade ">
                                    <form class="form" method="POST">
                                        <label for="adminuname">Enter Username :</label><input     class="form-control" type="text" name="adminuname"><br>
                                        <label for="adminpasswd">Enter password :</label><input class="form-control" type="password" name="adminpasswd"><br>
                                        <button id="stlogbtn" class="btn btn-success" id="adminlogbtn" type="submit" value="log" name="adlog"><i class="fa fa-sign-in"></i> Login</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-0">
                      
                    </div>
                    </div>               

            <div class="col-md-2 col-xs-1 col-sm-2"></div>
        </div>

        <div class="tab-pane fade" id="Forms">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Forms</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="exitsurvey.php">Exit Survey Form</a>
                    <a href="studentfeedback.php">Student Feedback Form</a>
                    <a href="parent.php">Parent Survey Form</a>
                    <a href="industry.php">Industrial Visit Feedback Form</a>
                    <a href="inplant.php">In Plant Training & Internship Feedback Form</a>
                </div>
            </div>
        </div>

         <!--Contact -->
        <div class="tab-pane fade" id="contact">
        <div class="col-md-2 col-xs-1 col-sm-2"></div>
              <div class="col-md-8 col-xs-10 col-sm-8">
                    <h2>Contact</h2>
                    <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <table class="table table-responsive">
                                <form action="" class="form" method="POST">
                                    <label for="cname"   id="cn">Enter Your Regno :</label><input class="form-control"type="text" name="cname"  id="ctext">
                                    <label for="cemail">Enter Your Email :</label><input class="form-control" type="email" name="cemail" id="ctext">
                                    <label for="cemail">Enter Your Mobile :</label><input class="form-control" type="number" name="cmobile" id="ctext">
                                                                
                            
                                Select Your Department
                                <select name="pro" id="pro" class="form-control" style="background:none;color:white;" required>
                                <option></option>
                                <option value="CSE">CSE</option>
                                <option value="MECH">MECH</option>
                                <option value="EEE">EEE</option>
                                <option value="ECE">ECE</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="MBA">MBA</option>
                                </select>
                           
                                    <label for="cmsg">Enter Message :</label>
                                    <textarea class="form-control" name="cmsg"  cols="30" rows="10"  id="ctext"></textarea>
                                    <input type="submit" value="Submit" id="csubbtn" name="csubbtn" class="btn btn-success">
                                </form>
                            </table>
                        </div>
                    <div class="col-md-3 col-sm-3"></div>
            </div>
            <div class="col-md-2 col-xs-1 col-sm-2 "></div>
        </div>
    </div>
    </div>
        
</div>
</body>
<script>
function validateInput(event) {
      function validateInput(event) {
      var key = event.keyCode || event.which;
      var keyChar = String.fromCharCode(key);

      // Only allow alphabetic characters (A-Z and a-z) and spaces
      if (!/^[A-Za-z\s]+$/.test(keyChar)) {
        event.preventDefault();
      }
    }

</script>
<script>



    function validateForm() {
  const regInput = document.getElementById("reg");
  const nInput = document.getElementById("n");
  const regulationInput = document.getElementById("regulation");
  const acyearInput=document.getElementById("acyear");
  const eInput = document.getElementById("e");
  const pInput = document.getElementById("p");
  const proInput = document.getElementById("pro");
  const semInput = document.getElementById("sem");
  const yrInput = document.getElementById("yr");
  const mnInput = document.getElementById("mn");
  const dyInput = document.getElementById("dy");

  // Validate Reg ID
  const regValue = regInput.value.trim();
  if (!regValue.match(/^9100\d{2}1\d{5}$/) || regValue.length !== 12) {
    alert("Reg ID should be in 9100xx10xxxx format and 12 digits long");
    regInput.focus();
    return false;
  }
  // Validate N ID
  const nValue = nInput.value.trim();
  if (nValue === "") {
    nInput.style.border = "2px solid red";
    nInput.focus();
    return false;
  } else {
    nInput.style.border = "none";
  }

  // Validate Regulation ID
  const regulationValue = regulationInput.value.trim();
  if (regulationValue === "") {
    regulationInput.style.border = "2px solid red";
    regulationInput.focus();
    return false;
  } else {
    regulationInput.style.border = "none";
  }
  
   // Validate Period of Study
  const acyearValue = acyearInput.value.trim();
  if (acyearValue === "") {
    acyearInput.style.border = "2px solid red";
    acyearInput.focus();
    return false;
  } else {
    acyearInput.style.border = "none";
  }

  // Validate E ID
  const eValue = eInput.value.trim();
  if (eValue === "") {
    eInput.style.border = "2px solid red";
    eInput.focus();
    return false;
  } else {
    eInput.style.border = "none";
  }

  // Validate P ID
  const pValue = pInput.value.trim();
  if (pValue === "") {
    pInput.style.border = "2px solid red";
    pInput.focus();
    return false;
  } else {
    pInput.style.border = "none";
  }

  // Validate Pro ID
  const proValue = proInput.value.trim();
  if (proValue === "") {
    proInput.style.border = "2px solid red";
    proInput.focus();
    return false;
  } else {
    proInput.style.border = "none";
  }

  // Validate Sem ID
  const semValue = semInput.value.trim();
  if (semValue === "") {
    semInput.style.border = "2px solid red";
    semInput.focus();
    return false;
  } else {
    semInput.style.border = "none";
  }

  // Validate Yr ID
  const yrValue = yrInput.value.trim();
  if (yrValue === "") {
    yrInput.style.border = "2px solid red";
    yrInput.focus();
    return false;
  } else {
    yrInput.style.border = "none";
  }

  // Validate Mn ID
  const mnValue = mnInput.value.trim();
  if (mnValue === "") {
    mnInput.style.border = "2px solid red";
    mnInput.focus();
    return false;
  } else {
    mnInput.style.border = "none";
  }

  // Validate Dy ID
  const dyValue = dyInput.value.trim();
  if (dyValue === "") {
    dyInput.style.border = "2px solid red";
    dyInput.focus();
    return false;
  } else {
    dyInput.style.border = "none";
  }

return true;
}
</script>



<!--Bootstrap js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>