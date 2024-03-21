<?php 
//$conn=new mysqli('localhost','root','','feedback_system');
 //$e=$_POST['e'];
// $p=$_POST['p'];
if(isset($login)){
if(strlen($p) =="32"){
    $sql="select * from user where regno='$e' and pass='$p'";
}else{
$pas=md5($p);

//echo "<script>alert({$pas});<script>";
$sql="select * from user where regno='$e' and pass='$pas'";
}
$query=mysqli_query($conn,$sql);

$res=mysqli_fetch_assoc($query);

if(mysqli_num_rows($query)>0)
{
$_SESSION['user']=$e;
$_SESSION['sem']=$res['semester'];
$_SESSION['dept']=$res['programme'];
$_SESSION['time']=time();
$_SESSION['acyear']=$res['acyear'];
header('location:user');
}

else
{
    $err="<font color='red'><h3 align='center' style='font-weight:bold';>Invalid Regno or Password</h3></font>";
    
 
    //header('location:index.php');

}
}
if(isset($_POST['adlog'])){
    //echo $adminuname;
    //echo $adminpasswd;
    $sql="select * from admin where user='$adminuname' and pass='$adminpasswd'";

        $query=mysqli_query($conn,$sql);

        $res=mysqli_fetch_assoc($query);

        if(mysqli_num_rows($query)>0)
        {
            $adminname=strtolower($adminuname);
            if($adminname=="admin"){
        $_SESSION['admin']=$adminuname;
        header('location:admin/dashboard.php');
            }else{
                $_SESSION['admin']=$adminuname;
                $_SESSION['department']=$res['department'];
                header('location:faculty/dashboard.php');   
            }
        }

        else
        {
            echo "<script>alert('Invalid Username/Password');</script>";
            //$err="<font color='red'><h3 align='center' style='font-weight:bold';>Invalid Username or Password</h3></font>";
            
        
            //header('location:index.php');

        }
    }


    if(isset($_POST['stafflogbtn'])){
        //echo $adminuname;
        //echo $adminpasswd;
        $sql="select * from staff where staff_id='$staffid' and staff_pass='$staffpasswd'";
    
            $query=mysqli_query($conn,$sql);
    
            $res=mysqli_fetch_assoc($query);
    
            if(mysqli_num_rows($query)>0)
            {
            $_SESSION['faculty_login']=$staffid;
            header('location:faculty');
            }
    
            else
            {
                    echo "<script>alert('Invalid Staff id/Password');</script>";
                //$err="<font color='red'><h3 align='center' style='font-weight:bold';>Invalid Username or Password</h3></font>";
                
            
                //header('location:index.php');
    
            }
        }

    if(isset($_POST['csubbtn'])){
        $query=mysqli_query($conn,"insert into contact values (NULL,'$pro','$cname','$cemail','$cmobile','$cmsg',now())");
        if($query){
            $err=$err="<font color='Green'><h3 align='center' style='font-weight:bold';>Contact Form Submitted Admin will contact you soon</h3></font>";
        }else{
            $err=$err="<font color='red'><h3 align='center' style='font-weight:bold';>error in submit Contact form Please Try again later!</h3></font>";
       
        }

    }
?>