
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}
include('../../dbconfig.php');
extract($_POST);

 
if(isset($_POST['validate'])) {
    if($_SESSION['genotp'] == $otp){
        echo "<script>alert('Login Success');
        window.location.href='../dashboard.php';
        
        </script>";
    }else{
        session_destroy();
        $err="<h3 style='color:red;'>Invalid OTP</h3>";
         echo "<script>alert('Login Failed');window.location.href='../index.php';</script>";
    }
} 
else{
require 'vendor/autoload.php';


$e=$_SESSION['email2'];

$_SESSION['genotp']=rand(100000,999999);
$messagecontent ="<h4>OTP FOR ADMIN LOGIN </h4>
                <h2> $_SESSION[genotp] </h2>

            <span style='color:red;'> *** Kindly report not spam *** </span>
                   </div> ";


$mail = new PHPMailer(true);

try {


    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'autmdu.feedback.recovery@gmail.com';                    
    $mail->Password   = 'uyvgysjrafixqhkj';      
    $mail->Port       = 587;                          

    //Recipients
    $mail->setFrom('autmdu.feedback.recovery@gmail.com', 'Admin');
    $mail->addAddress($e);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Administrator Login Authentication';
    $mail->Body    = $messagecontent;
    

    if($mail->send())
    echo "<script>alert('Otp has sent to your email $e');
     
    </script>";

} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin !</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter Otp</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Otp" name="otp" type="text" required>
                                </div>
								<div class="form-group">
								    
                                    <input name="validate" type="submit" value="Validate" class="btn btn-lg btn-success btn-block">
                                </div>
								
								<div class="form-group">
                                    <label style='margin-left:30%;'>
                                        <?php echo @$err;?>
                                    </label>
                                </div>
								
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../demo/css/css/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../demo/css/css/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../..demo/css/css/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../demo/css/css/sb-admin-2.js"></script>

</body>

</html>