<?php 
session_start();
if( (time() - $_SESSION['time'] )>1200){
  echo "<script>alert('SESSION TIMED OUT');
  window.location.href='logout.php';
  </script>";
}
include('../dbconfig.php');
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
$sql=mysqli_query($conn,"select * from user where regno='$user' ");
$users=mysqli_fetch_assoc($sql);
if(mysqli_num_rows($sql)<1){
      echo "<script>alert('Register Again');
  window.location.href='logout.php';
  </script>";
}
$_SESSION['pg']=$users['programme'];
$_SESSION['sm']=$users['semester'];
//print_r($users);
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
    <link href="../images/logo.png" rel="icon">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
     <link href="../css/userdash.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<style>
	*{
		padding:0;
		margin:0;
	}
  table{
    font-size:18px;
  }
  li{
      list-style-type:none;
  }

  @media(max-width:800px){
  #dis-img{
    display:none;
  }
  #indexdetail { 

  }
  .navbar-brand{
	font-size:15px;

	
}
.navbar{
	
}
#mob-menu{
  color:black;
}
  }

      #indexdetail tr,#indexdetail  th,#indexdetail  td{
          
      }
      #indexdetail tr td input{
          background:none;
          border:none;
       
      }
 
</style>
<style>
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}
*{
  font-family: 'poppins';
  
}
#indexdetail tr th{
  text-align: center;

}
#indexdetail tr td{


}

/*
 * Global add-ons
 */
.nav-sidebar li a{
  font-size:18px;
  color:rgb(0, 0, 0);
  letter-spacing: px;

}
.nav-sidebar li {
  padding-top:5px;
}
li a img{
  
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.nav-sidebar li a:hover{
  background: linear-gradient(292deg, rgb(39, 43, 44) 0.00%, rgb(241, 60, 43) 100.00%);
}
.nav-sidebar li span{
  color:rgb(238, 255, 0);
}
.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top {
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */


@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background: linear-gradient(132deg, rgb(0, 255, 157) 0.00%, rgb(227, 43, 175) 100.00%);
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /*20px padding + 1px border*/
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #eef3f7;
}


/*
 * Main content
 */

.main {
  padding: 20px;
  
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}
#space{
    margin-left:23px;
}

/*
 * Placeholder dashboard ideas
 */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}
table{
  font-size:18px;
}


@media(max-width:768px){
  .sidebar ul{

    margin: auto;
  }
  .sidebar ul #mob-img{
    
  }
  #mob-menu{
   color:black;
   font-size: 20px;
   font-weight: bold;
   background-color: #fafafa;
   width: 100vw;
   text-align: right;
   margin-top: -10px;
   margin-right: -10px;
   padding-top: 30px;
   padding-right: 30px;
  }
  #indexdetail{
    margin: 20px 0px 0px 0px;
    text-align: left;
    font-size:15px;

  }
  .mobile-image{
    display: none;;
  }
  .nav-sidebar li {
    padding-top:0px;
  }
  .navbar-header{
    height:60px;
  }
  .navbar-brand{
    width:80%;
  }
  .page-header{
    font-size: 20px;
  }
}
</style>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background: linear-gradient(132deg, rgb(0, 255, 157) 0.00%, rgb(227, 43, 175) 100.00%);">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidenav" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <a class="navbar-brand" style="color:white;" href="#"> Anna University Regional Campus Madurai   </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
	  <li><h4 style="color:white;font-size:20px;margin-right:20px;"> FeedBack System</h4></li>

          </ul>
          
        </div>
      </div>
    

    <div class="container-fluid">
      <!-- <div class="row">        <button type="button" id="mob-menu" class="navbar-toggle collapsed btn btn-danger" data-toggle="collapse" data-target="#sidenav" aria-expanded="false" aria-controls="navbar">
        Menu <span class="caret"></span> </button> -->
        <div class="col-sm-3 col-md-2 sidebar col-xs-12">

          <div class="collapse navbar-collapse" id="sidenav" style=''>
          <ul class="nav nav-sidebar" >
            <li class="" ><a href="index.php" style='color:black;'> <span class="fa fa-home"> </span> Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
			<?php 
			$q=mysqli_query($conn,"select image,name,gender from user where regno='".$_SESSION['user']."'");
			$row=mysqli_fetch_assoc($q);
			if(($row['image']=="") && ($row['gender'] == "m"))
			{ 
			?>
            <li class="mobile-image"><a href="#" class=""><img style="border-radius:50px;margin-left:20px;" src="../images/male-user.jpg" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			elseif(($row['image']=="") && ($row['gender'] == "f"))
			{ 
			?>
            <li class="mobile-image"><a href="#" class="mobile-image"><img style="border-radius:50px;margin-left:20px;" src="../images/female-user.jpg" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			else
			{
			?>
			<li id="mob-img" class="mobile-image"><a href="#"><img style="border-radius:50px;margin-left:20px;" src="<?php echo $row['image'];?>" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			?>
			
			
			
			<li><a href="index.php?page=update_password"><span class="fa fa-key" ></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile" ><span class="fa fa-user"></span> Update Profile</a></li>
			 <li><a href="index.php?page=feedback"><span class="fa fa-comments"></span> Give Feedback</a></li>
			 <li><a href="index.php?page=sub_feedback"><span class="fa fa-check"></span> Submitted <div id="space">Feedbacks</div></a></li>
			  <li><a href="index.php?page=notgiven_feedback"><span class="fa fa-times"></span> Feedbacks Not &nbsp;&nbsp;&nbsp;&nbsp;Submitted</a></li>
			 <li><a href="logout.php"  style="color:"><span class="fa fa-sign-out"></span> Logout</a></li>
			 </li>
            
          </ul>
          </div>
         
        </div>
		</nav>
        <div class="col-xs-12 col-xs-offset-0 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="update_password")
			{
				include('update_password.php');
			
			}
			
				if($page=="update_profile")
			{
				include('update_profile.php');
			
			}
			if($page=="feedback")
			{
				include('give_feedback.php');
			
			}
			if($page=="sub_feedback"){
			    	include('submitted_feedback.php');
			}
			if($page=="notgiven_feedback"){
			    	include('feedback_notgiven.php');
			}
		  }
		  else
		  {
		  
		  ?>
		 
		  
		  
		  
		  <h1 class="page-header" style="color:brown;"> <span class="fa fa-user"></span> <?php echo $users['name']?></h1>
		  
		  
		  
		  
		  
		  

          <div class="row placeholders">
            <div class="col-xs-0 col-sm-6 col-md-3 placeholder" id="dis-img">
            <?php 
			$q=mysqli_query($conn,"select * from user where regno='".$_SESSION['user']."'");
			$row=mysqli_fetch_assoc($q);
			if(($row['image']=="")&&($row['gender'] == "m"))
			{
			?>
            <li><a href="#"><img style="border-radius:10px" src="../images/male-user.jpg" width="150" height="150" alt="not found"/></a></li>
			<?php 
			}
			elseif(($row['image']=="")&&($row['gender'] == "f"))
			{
			?>
            <li><a href="#"><img style="border-radius:10px" src="../images/female-user.jpg" width="150" height="150" alt="not found"/></a></li>
			<?php 
			}
			else
			{
			?>
			<li id="mob-img"><a href="#"><img style="border-radius:10px" src="<?php echo $row['image'];?>" width="200" height="200" alt="not found"/></a></li>
			<?php 
			}
			?>
            </div>
            <div class="col-xs-8  col-sm-12 col-md-8 placeholder" width="">
            <table class="table table-bordered" id="indexdetail" width="" style="background:rgba(90,90,170,0.1);box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
	        <tr ><th colspan="2" style="text-align:center;color:rgb(100,200,170)">STUDENT PROFILE </th></tr>    
			<tr>
					<th class="2">Regno </th>
					<Td><?php echo $row['regno'];?></td>
				</tr>
				
				<tr>
					<th >Name </th>
					<Td><?php echo $row['name'];?></td>
				</tr>
				<tr>
					<th >Regulation </th>
					<Td><?php echo $row['regulation'];?></td>
				</tr>
				<tr>
					<th>Email </th>
					<Td><?php echo $row['email'];?></td>
				</tr>
				<tr>
					<th>Department </th>
					<Td><?php echo $row['programme'];?></td>
				</tr>
				<tr>
				<tr>
                                <th>Semester </th>
                                <Td><?php echo $row['semester'];?>
                                
                               
                               
                                </td>
                            </tr>
				
				<tr>
					<th>Mobile </th>
					<Td><?php echo $row['mobile'];?></td>
				</tr>
				
				<tr>
					<th>Gender </th>
					<Td>
				<?php  if ($row['gender']=="m") echo "MALE"; else echo "FEMALE" ;?>
					</td>
				</tr>
				
			<!--	<tr>
					<td>Hobbies :</td>
					<Td>
					<?php 
					$arrr=explode(",",$row['hobbies']);
					?>
					
					
					Learning<input value="learning" <?php if(in_array("learning",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]" disabled/>
					Coding<input value="Coding" <?php if(in_array("Coding",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]" disabled/>
					Playing<input value="playing" <?php if(in_array("playing",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]" disabled/>
					</td>
				</tr>-->
				
				
				<tr>
					<th>DOB </th>
					<td> <?php echo $row['dob']?></td>
    </tr>
					
 					
				
					
					
				
			</table>
            </div>
          </div>
<?php } ?>
        
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../css/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
