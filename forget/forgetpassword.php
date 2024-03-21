<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    *{
        padding:0;
        margin:0;
        font-family:'poppins';
        overflow:hidden;
    }
    .main{
        display:flex;
        justify-content:center;
        height:100vh;
        align-items:center;
     
        
      
    }
    .main .head{
 
    }
    .form{
      
        background-color:rgba(175,16,86,0.8);
        color:white;
        width:400px;
        height:500px;
        position:relative;
        display:flex;
        justify-content:center;
        align-items:center;
         
        
       
    }
    form{
        
    }
    .input-group{
        margin-top:20px;
        width:80%;
        
        height:60px;
    }
    input[type='date']{
        width:170px;
    }
    input[type='submit']{
        width:170px;
        height:30px;
        border-radius:5px;
        background-color:rgba(55,45,16,0.3)
        
    }
    input{
        border:none;
        background:none;
        
    }
    input[type='text']:focus{
        height:30px;
        outline:none;
        
    }
    input[type='text']{
        border-bottom:2px solid white;
    }
    .head{
        
        font-size:20px;
    }
    h3{
        background-color:rgba(0,0,0,0.3);
        text-align:center;
    }
    a{
        color:#fff;
        font-size:20px;
        
    }a:hover{
        text-decoration:none;
    }
</style>
<?php
if(isset($_POST['sub'])){
include('../dbconfig.php');
$rg=$_POST['reg'];
$e=$_POST['email'];
$db=$_POST['dob'];

$sql=mysqli_query($conn,"select * from user where regno='$rg' and email='$e' and dob='$db' ");
if($sql){
    $res=mysqli_fetch_assoc($sql);
if(mysqli_num_rows($sql)>0){

    require 'vendor/autoload.php';


$name=$res['name'];
$regno = $rg;
$email = $e;
$pass = $res['pass'];


$messagecontent ="<h4>Hello  <span style='color:green;'>". $name ."</span></h4>
                    <br>
                    <br>Use this key  <b style='color:green;'>'&nbsp;" . $pass."</b> &nbsp;' as your password <span style='color:red'>(student Login)</span>
                    <br>
                    <br>
                    <ul><li><b>Steps to reset Your Password</b></li>
                    <li> Login to your dashboard using above key</li>
                    <li> Go to update password page</li>
                    <li> kindly enter the above key as old password</li>
                    <li> Enter new password </li>
                    <li> Confirm new Password</li>
                    <li> <b>Now Your password has been Changed Successfully</b></li>
                    </ul>
                 <br><br><br><br><div style='text-align:center;'> <span style='color:red;'> *** kindly use the above key as old password for updating new password *** </span>
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
    $mail->addAddress($email,$name);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Feedback System Password Recovery';
    $mail->Body    = $messagecontent;
    

    if($mail->send())
    echo "<script>alert('Password has been sent to your email $e');
    alert('check spam folder if not in inbox');
    </script>";

} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}else{
    echo "<script>alert('Invalid Details');</script>";
}
}else{
    $err="Query Error";
}
}
?>
<body>  
  
    <div class="main">

        <div class="form">
            
            <form action="" method="POSt">
                <a href="../index.php"><i class="fa fa-home"></i> Home</a>
                <h2>Recover Password</h2>
                <div class="input-group">
                    <label for="">Enter Regno :</label>
                    <input type="text" class="" name="reg" required/>
                </div>
            
                <div class="input-group">
                    <label for="">Enter Email :</label>
                    <input type="text" name="email" required/>
                </div>

                <div class="input-group">
                    <label for="">Enter Date of Birth :</label>
                    <input type="date" class="form-control" name="dob" required/>
                </div><br>
                <input type="submit" value="Submit" name="sub">
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>