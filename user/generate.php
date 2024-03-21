<?php
extract($_POST);
session_start();
//$filelink=$_SESSION['link'];
if(($_SESSION['user'] =="") and ($_SESSION['cs'] =="")){
    header('location:../index.php');
}else{
include('../dbconfig.php');
 /*   $folder= "../uploads/".$_SESSION['user'];
    if(is_dir($folder))
        echo "DIR";
    else{
        mkdir("$folder", 0777, true);
    }*/

if(isset($downpdf)){
    $cc=$_GET['coursecode'];
    $_SESSION['cs']=$cc;
}
$dp=strtolower($_SESSION['dept']);
$dbtable='feedback-'.$dp.'-'.$_SESSION['acyear'];

$sql=mysqli_query($conn,"select * from `{$dbtable}` where coursecode='$_SESSION[cs]' and regno='$_SESSION[user]' ");
$r = $sql->fetch_object();
$sname=$r->facultyname;
$sub=$r->subject;
$subcode=$r->Coursecode;
$quest1=$r->quest1;
$quest2=$r->quest2;
$quest3=$r->quest3;
$quest4=$r->quest4;
$quest5=$r->quest5;
$quest6=$r->quest6;
$quest7=$r->quest7;
$quest8=$r->quest8;
$quest9=$r->quest9;
$quest10=$r->quest10;


$avg= (int)(($quest1+$quest2+$quest3+$quest4+$quest5+$quest6+$quest7+$quest8+$quest9+$quest10)*2) ;
$sql1=mysqli_query($conn,"select * from user where regno='$_SESSION[user]'");
$u=$sql1->fetch_object();
$stname=$u->name;
$stdept=$u->programme;
$stsem=$u->semester;

ob_start();
require('../fpdf/fpdf.php');
//header('Content-disposition: attachment; filename=document.pdf');
//header('Content-type: application/pdf');

$pdf=new FPDF('P','mm','A4');
$width_cell=array(20,30,40,40,40,50);
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B','20');
$pdf->SetTextColor(255,255,255);

//Draw rectangle
  $pdf->SetFillColor(170, 100, 50);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Rect(2, 2, 205, 40, 'F');
$pdf->Rect(1, 1, 207, 290, 'D');
//header image and title
$pdf->Image('../images/logo.png',10,5,30,30);
$pdf->SetXY(50, 15);
$pdf->Write(0, 'Anna University Regional Campus Madurai');
$pdf->SetXY(70, 30);
$pdf->Write(0, 'Faculty Feedback System');
//FeedBack User Heading 
$pdf->SetFont('Arial','B','12');
$pdf->SetTextColor(0,0,0);
  $pdf->SetXY(5, 50); $pdf->Write(1, 'Regno');
    $pdf->SetXY(5, 60);$pdf->Write(1, 'Name');
    $pdf->SetXY(5, 70);$pdf->Write(1, 'Department');
    $pdf->SetXY(5, 80);$pdf->Write(1, 'Semester');
    $pdf->SetXY(5, 90);$pdf->Write(1, 'Subject Name');
    $pdf->SetXY(5, 100);$pdf->Write(1, 'Subject Code');
    $pdf->SetXY(5, 110);$pdf->Write(1, 'Staff Name');

//FeedBack User info
    $pdf->SetFont('Arial','B','12');
     $pdf->SetXY(40, 50);$pdf->Write(1, ':   '.$_SESSION['user']);//regno
     $pdf->SetXY(40, 60);$pdf->Write(1, ':   '.$stname);//name
     $pdf->SetXY(40, 70);$pdf->Write(1, ':   '.$stdept);//dept
     $pdf->SetXY(40, 80);$pdf->Write(1, ':   '.$stsem);//year
     $pdf->SetXY(40, 90);$pdf->Write(1, ':   '.$sub);//sub name
     $pdf->SetXY(40, 100);$pdf->Write(1, ':   '.$subcode);//sub code
     $pdf->SetXY(40, 110);$pdf->Write(1, ':   '.$sname);//staff name

  //Feedback heading
    $pdf->SetFont('Arial','BU','14');  
    $pdf->SetXY(80, 130);$pdf->Write(1, 'Feedback Details ');

    //$pdf->SetXY(5, 140);$pdf->Write(1, 'Course Material ');
    //$pdf->SetXY(5, 210);$pdf->Write(1, 'Class Teaching  ');

   

    //Feedback Question 
    $pdf->SetFont('Arial','','12'); 
    $pdf->SetXY(15, 150);$pdf->Write(1, '1. Covering entire Syllabus prescribed by University/College/Board');
    //$pdf->SetXY(19, 160);$pdf->Write(1, ' plan with list of  required text book  ');
    $pdf->SetXY(15, 160);$pdf->Write(1, '2. Covering the relevant topics beyond syllabus');
    //$pdf->SetXY(19, 180);$pdf->Write(1, ' are clear to me  ');
    $pdf->SetXY(15, 170);$pdf->Write(1, '3. Effectiveness of Teacher in terms of ');
    $pdf->SetXY(20, 180);$pdf->Write(1, 'i) Technical Content / Course Content');
    $pdf->SetXY(20, 190);$pdf->Write(1, 'ii) Communication Skills');
    $pdf->SetXY(20, 200);$pdf->Write(1, 'iii) Use of Teaching Aids');

    $pdf->SetXY(15, 210);$pdf->Write(1, '4. Phase on which contents were covered');
    $pdf->SetXY(15, 220);$pdf->Write(1, '5. Motivation and inspiration for students to learn');
    $pdf->SetXY(15, 230);$pdf->Write(1, '6. Support for the development of students skill');
    $pdf->SetXY(20, 240);$pdf->Write(1, "i) Practical Demonstration");
    $pdf->SetXY(20, 250);$pdf->Write(1, "ii) Hands On Training");
    $pdf->SetXY(15, 260);$pdf->Write(1, "7. Clarity of expectations fulfilled");

    //Feedback rating values 1st page
    $pdf->SetFont('Arial','B','12');
    $pdf->SetXY(150, 150);$pdf->Write(1, ':    '.$quest1);
    $pdf->SetXY(150, 160);$pdf->Write(1, ':    '.$quest2);
    $pdf->SetXY(150, 185);$pdf->Write(1, ':    '.$quest3);
    $pdf->SetXY(150, 210);$pdf->Write(1, ':    '.$quest4);
    $pdf->SetXY(150, 220);$pdf->Write(1, ':    '.$quest5);
    $pdf->SetXY(150, 240);$pdf->Write(1, ':    '.$quest6);
    $pdf->SetXY(150, 260);$pdf->Write(1, ':    '.$quest7);
    //$pdf->SetXY(150, 260);$pdf->Write(1, ':    '.$quest8);
    //$pdf->SetXY(150, 270);$pdf->Write(1, ':    '.$quest9);

    //2nd page
    $pdf->AddPage();
    $pdf->Rect(1, 1, 207, 290, 'D');
   //Feedback heading
    $pdf->SetFont('Arial','BU','14');  
    //$pdf->SetXY(5, 20);$pdf->Write(1, 'Class Assessment ');

     
   //Feedback Question 
    $pdf->SetFont('Arial','','12'); 
    $pdf->SetXY(15, 10);$pdf->Write(1, "8. Feedback provided on students' progress");
    $pdf->SetXY(15, 20);$pdf->Write(1, "9. Willingness to offer help and advice to students");
    $pdf->SetXY(15, 30);$pdf->Write(1, "10. Time Management");
    //$pdf->SetXY(19, 50);$pdf->Write(1, " learning objectives ");

   
    //feedback rating values 2nd page
    $pdf->SetFont('Arial','B','12');
    $pdf->SetXY(150, 10);$pdf->Write(1, ':    '.$quest8);
    $pdf->SetXY(150, 20);$pdf->Write(1, ':    '.$quest9);
    $pdf->SetXY(150, 30);$pdf->Write(1, ':    '.$quest10);
    //$pdf->SetXY(150,30);$pdf->Write(1, ':    '.$quest11);
    //$pdf->SetXY(150,50);$pdf->Write(1, ':    '.$quest12);


     //footer
    $pdf->SetFont('Arial','B','14'); 
    $pdf->SetXY(120, 80);$pdf->Write(1, " Average ");
    $pdf->SetXY(150,80);$pdf->Write(1, ':    '.$avg.'%');

    $pdf->SETXY(15,260);$pdf->Write(0,"Head of the Institution");
    $pdf->SETXY(130,260);$pdf->Write(0,"Head of the Department");
   // $filename="/home/u554905395/domains/autmdu.in/public_html/feedback/uploads/".$_SESSION['user'].'-'.$_SESSION['cs'].'.pdf';
    //$filename="/home/u554905395/domains/autmdu.in/public_html/feedback/".$filelink;
   
//$pdf->Output($filename,'F');
$file=$_SESSION['user'].'-'.$_SESSION['cs'].'.pdf';
$pdf->Output();




ob_end_flush();
header('index.php');

}
?>