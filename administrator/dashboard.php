<?php 
session_start();
include('../dbconfig.php');
error_reporting(1);

$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Faculty feedback System</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#428bca">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFFFFF" href="#"><span style='color:#9fd3c7;font-weight:bold;font-size:30px;'>Administrator </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="logout.php"  style="color:#FFFFFF">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->

			
			
			
		
			 <li><a href="dashboard.php?page=feedback"><span class="fa fa-comments"></span> Feedback Average</a></li>
			 <li><a href="dashboard.php?page=reports"><span class="fa fa-comments"></span> Report</a></li>
			 <li><a href="dashboard.php?page=show_faculty"><span class="fa fa-user"></span> Faculty Average</a></li>
			 <li><a href="dashboard.php?page=display_faculty"><span class="fa fa-user"></span> Faculty </a></li>
			 <li><a href="dashboard.php?page=display_student"><span class="fa fa-user"></span> Students</a></li>
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="feedback")
			{
				include('feedback_average.php');
			
			}
			
				if($page=="reports")
			{
				include('reports.php');
			
			}
			    if($page=="show_faculty"){
			        include('show_faculty.php');
			    }
			    if($page=="display_student"){
			        include('display_student.php');
			    }
			    if($page=="display_faculty"){
			        include('display_faculty.php');
			    }
			    if($page=="edit_faculty"){
			        include('edit_faculty.php');
			    }
			    if($page=="delete_faculty"){
			        include('delete_faculty.php');
			    }

		  }
		  else
		  {
		  
		  ?>
		 
		  
		  
		  
		  <h1 class="page-header">Dashboard</h1>
		  
		  
	
		   
 


 
 
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
       <?php 
       //all complaints
       $qq=mysqli_query($conn,"select distinct staff_id from staff ");
       $rows=mysqli_num_rows($qq);			
       echo "<h2 style='color:orange'><i class='fa fa-user'></i>  Total Number of Faculty : $rows</h2>";	
       
       //subjects
       $q=mysqli_query($conn,"select distinct Coursecode from staff");
       $r1=mysqli_num_rows($q);			
       echo "<h2 style='color:'><i class='fa fa-book'></i> &nbsp;Total Number of Subjects : $r1</h2>";	
       
       //all emegency compalints
       $q=mysqli_query($conn,"select distinct regno from user");
       $r1=mysqli_num_rows($q);			
       echo "<h2 style='color:'> <i class='fa fa-user'></i>&nbsp; Total Number of Registered Student: $r1</h2>";	
       
       
       //all users
       //feed count
       function feed($conn,$tb){
           $query=mysqli_query($conn,"select  regno  from `$tb`");
           $r2=mysqli_num_rows($query);
           return $r2;
       }
       function total($conn,$tb){
           $query=mysqli_query($conn,"select distinct regno  from `$tb`");
           $r2=mysqli_num_rows($query);
           return $r2;
           
       }
         //cse
       $cse1=feed($conn,'feedback-cse-2018-2022');	
       $cse1t=total($conn,'feedback-cse-2018-2022');
         
       $cse2=feed($conn,'feedback-cse-2019-2023');	
       $cse2t=total($conn,'feedback-cse-2019-2023');	
       
       $cse3=feed($conn,'feedback-cse-2020-2024');	
       $cse3t=total($conn,'feedback-cse-2020-2024');
       
       $cse4=feed($conn,'feedback-cse-2021-2025');	
       $cse4t=total($conn,'feedback-cse-2021-2025');	
       
       $cse5=feed($conn,'feedback-cse-2022-2026');	
       $cse5t=total($conn,'feedback-cse-2022-2026');	

       //civil
       $civ1=feed($conn,'feedback-civil-2018-2022');	
       $civ1t=total($conn,'feedback-civil-2018-2022');
         
       $civ2=feed($conn,'feedback-civil-2019-2023');	
       $civ2t=total($conn,'feedback-civil-2019-2023');	
       
       $civ3=feed($conn,'feedback-civil-2020-2024');	
       $civ3t=total($conn,'feedback-civil-2020-2024');
       
       $civ4=feed($conn,'feedback-civil-2021-2025');	
       $civ4t=total($conn,'feedback-civil-2021-2025');	
       
       $civ5=feed($conn,'feedback-civil-2022-2026');	
       $civ5t=total($conn,'feedback-civil-2022-2026');	
       
       //ece
       $ece1=feed($conn,'feedback-ece-2018-2022');	
       $ece1t=total($conn,'feedback-ece-2018-2022');
         
       $ece2=feed($conn,'feedback-ece-2019-2023');	
       $ece2t=total($conn,'feedback-ece-2019-2023');	
       
       $ece3=feed($conn,'feedback-ece-2020-2024');	
       $ece3t=total($conn,'feedback-ece-2020-2024');
       
       $ece4=feed($conn,'feedback-ece-2021-2025');	
       $ece4t=total($conn,'feedback-ece-2021-2025');	
       
       $ece5=feed($conn,'feedback-ece-2022-2026');	
       $ece5t=total($conn,'feedback-ece-2022-2026');

       //mech
       $mech1=feed($conn,'feedback-mech-2018-2022');	
       $mech1t=total($conn,'feedback-mech-2018-2022');
         
       $mech2=feed($conn,'feedback-mech-2019-2023');	
       $mech2t=total($conn,'feedback-mech-2019-2023');	
       
       $mech3=feed($conn,'feedback-mech-2020-2024');	
       $mech3t=total($conn,'feedback-mech-2020-2024');
       
       $mech4=feed($conn,'feedback-mech-2021-2025');	
       $mech4t=total($conn,'feedback-mech-2021-2025');	
       
       $mech5=feed($conn,'feedback-mech-2022-2026');	
       $mech5t=total($conn,'feedback-mech-2022-2026');	

       echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks CSE: <b>( ".($cse1+$cse2+$cse3+$cse4+$cse5)." )</b> Students <b>( ".($cse1t+$cse2t+$cse3t+$cse4t+$cse5t)." )</b></h2>";	

       echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks Civil: <b>( ".($civ1+$civ2+$civ3+$civ4+$civ5)." )</b> Students <b>( ".($civ1t+$civ2t+$civ3t+$civ4t+$civ5t)." )</b></h2>";	
       
       echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks ECE: <b>( ".($ece1+$ece2+$ece3+$ece4+$ece5)." )</b> Students <b>( ".($ece1t+$ece2t+$ece3t+$ece4t+$ece5t)." )</b></h2>";	
 
       echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks Mech: <b>( ".($mech1+$mech2+$mech3+$mech4+$mech5)." )</b> Students <b>( ".($mech1t+$mech2t+$mech3t+$mech4t+$mech5t)." )</b></h2>";	
 
                 
       //distinct users
       // $q3=mysqli_query($conn,"select distinct regno from feedback");
       // $r3=mysqli_num_rows($q3);			
       // echo "<h2 style='color:orange'><i class='fa fa-comment'></i>&nbsp;Total Number of Individual feedback given by student : $r3</h2>";
       
       //exitsurvey form submitted
       $q4=mysqli_query($conn,"select regno from exitsurvey");
       $r4=mysqli_num_rows($q4);			
       echo "<h2 style='color:red'><i class='fa fa-external-link'></i>&nbsp; Total Number of Exit Survey feedbacks  : $r4</h2>";
      }
       ?>
       
        
      
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
