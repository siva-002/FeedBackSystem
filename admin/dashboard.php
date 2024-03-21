<?php
session_start();
if(!isset($_SESSION['admin']))
{
header('location:../index.php');
}
include('../dbconfig.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>
    <link href="../images/logo.png" rel="icon">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    body{
        background-color:white;
         margin-top:50px;
         height:100vh;
        
       /* background-image:url(../images/admin-bg.jpg);*/
    }
    #page-wrapper .row .col-lg-12{
        /* background-image:url(../images/admin-bg.jpg);
        background-image:linear-gradient(to left, rgba(	255, 0, 255,0.3),white);*/
       
    }
    #wrapper .navbar,#side-menu{
         background:pink;
         color:#fff;
       
         
    }
    #side-menu{
          position:fixed;
          width:250px;
          height:100vh;
    }
    #side-menu li{
       
        
        
    }
    #side-menu li a{
         color:red;
         padding:20px;
    }
    
    @keyframes anim{
        100%{left:0};
    }
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Faculty Feedback System</a>
            </div>
           
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="nav nav-sidebar  navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i>&nbsp Dashboard</a>
                        </li>
                        
						<li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>&nbspFaculty<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dashboard.php?info=add_faculty"><i class="fa fa-plus fa-fw"></i>&nbsp Add Faculty</a>
                                </li>
								 <li>
                                    <a href="dashboard.php?info=show_faculty"><i class="fa fa-eye"></i>&nbsp Manage faculty</a>
                                </li>                           
							</ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
						
						<li>
                            <a href="#"><i class="fa fa-graduation-cap"></i>&nbspStudent<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
								 <li>
                                    <a href="dashboard.php?info=display_student"><i class="fa fa-eye"></i>&nbsp Manage Student</a>
                                </li> 
                                
								 <li>
                                    <a href="dashboard.php?info=student_feedback"><i class="fa fa-eye"></i>&nbsp Student Feedbacks</a>
                                </li> 
							             
							</ul>
                        </li>
						
						
		
		<!-- feedback-->
		<li>
         <a href="#"><i class="fa fa-user fa-book"></i>&nbspFeedback<span class="fa arrow"></span></a>
           <ul class="nav nav-second-level">
                             
            <li><a href="dashboard.php?info=feedback"><i class="fa fa-eye"></i>&nbsp feedbacks</a></li>
<li><a href="dashboard.php?info=feedback_average"><i class="fa fa-eye"></i>&nbsp feedback Average</a></li>
	 
							             
							</ul>
                        </li>
		<!--feedback end-->


        <!-- FORMS -->
        <li>
         <a href="#"><i class="fa fa-map"></i>&nbsp Forms<span class="fa arrow"></span></a>
           <ul class="nav nav-second-level">
                             
            <li><a href="dashboard.php?info=exitsurvey"><i class="fa fa-external-link"></i>&nbsp Exit Survey</a></li>
            <li><a href="dashboard.php?info=exit_average"><i class="fa fa-bar-chart"></i>&nbsp Exit Survey Average</a></li>
            <li><a href="dashboard.php?info=industry_form"><i class="fa fa-industry"></i>&nbsp Industry Form</a></li>       
            <li><a href="dashboard.php?info=parent_survey"><i class="fa fa-users"></i>&nbsp Parent Survey Form</a></li>
            <li><a href="dashboard.php?info=inplant_form"><i class="fa fa-fire"></i>&nbsp Inplant Form</a></li>       


							             
			</ul>
        </li>			
					
			
        <!-- FORMS END -->	
        
        <!--settings-->					
        <li>
         <a href="#"><i class="fa fa-gear fa-fw"></i>&nbspSettings<span class="fa arrow"></span></a>
           <ul class="nav nav-second-level">		
			<!-- password -->		 
            <li><a href="dashboard.php?info=update_password">
                <i class="fa fa-gear fa-fw"></i>&nbspChange Password</a>
            </li>
            <!--contact -->		
		<li>
			<a href="dashboard.php?info=contact"><i class="fa fa-eye"></i>&nbsp Contact us</a>
		</li>
			   
            </ul>
                        </li>
            <!--settings end-->
				
                <!-- logout -->
                <li>
            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp Logout</a>
        </li>
			   
				   
				        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style=' height:100vh;'>
                   
                	<?php 
								@$id=$_GET['id'];
								@$info=$_GET['info'];
								if($info!="")
								{
									if($info=="add_faculty")
										{
											include('add_faculty.php');
										}
									
									elseif($info=="show_faculty")
										{   
                                    
											include('show_faculty.php');
                                     		
										}
										
                                    
									elseif($info=="edit_faculty")
										{
											include('edit_faculty.php');
										}	
										
									elseif($info=="display_student")
										{
											include('display_student.php');
										}
									elseif($info=="student_feedback")
										{
											include('student_feedback.php');
										}
									
										
										
									elseif($info=="contact")
										{
											include('contact.php');
										}	
									elseif($info=="feedback")
										{
											include('feedback.php');
										}
										elseif($info=="feedback_average")
										{
											include('feedback_average.php');
										}		
										elseif($info=="delete_faculty"){
                                            include('delete_faculty.php');
                                        }		
								        elseif($info=="update_password")
										{
										    include('update_password.php');
										}
                                        elseif($info=="exitsurvey")
										{
										    include('exitsurvey.php');
										}
                                        elseif($info=="exit_average")
										{
										    include('exitsurvey_average.php');
										}
										elseif($info=="industry_form")
										{
										    include('industry_form.php');
										}
											elseif($info=="parent_survey")
										{
										    include('parent_survey.php');
										}elseif($info=="inplant_form")
										{
										    include('inplant_form.php');
										}
                                }
								
                                        else
                                        {
                                        include('dashboard_home.php');
                                        }
							
                                    
							?>
				
				</div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../css/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../css/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../css/metisMenu.min.js"></script>

  
    <!-- Custom Theme JavaScript -->
    <script src="../css/sb-admin-2.js"></script>

</body>

</html>
