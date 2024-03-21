
<?php
extract($_POST);
session_start();
if(!isset($genrep)){
    echo "<script>window.location.href='../index.php';</script>";
}else{
include('../dbconfig.php');
$query=mysqli_query($conn,"select * from report where coursecode='$_SESSION[Coursecode]' and acyear='$_SESSION[acyear]' ");
if(mysqli_num_rows($query)>0){
    echo "<script>alert('Report already generated for this subject');
    window.location.href='dashboard.php?page=reports';
    </script>";
}else{

$sql="select * from staff where coursecode='$_SESSION[Coursecode]' and acyear='$_SESSION[acyear]' ";
$q=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($q);
$path=md5($_SESSION['Coursecode'].$_SESSION['acyear']).'.pdf' ;
$query=mysqli_query($conn,"insert into report values('','$res[staff_id]','$res[acyear]',
'$res[staffname]','$res[department]',
'$res[sem]','$_SESSION[Coursecode]',
'$res[subject]','$_SESSION[q1]',
'$_SESSION[q2]','$_SESSION[q3]',
'$_SESSION[q4]','$_SESSION[q5]',
'$_SESSION[q6]','$_SESSION[q7]',
'$_SESSION[q8]','$_SESSION[q9]',
'$_SESSION[q10]','$_SESSION[avg]'
,'$path',now() ) ");

$tb="feedback-".$_SESSION['chdept']."-"."$_SESSION[acyear]";
$total=mysqli_query($conn,"select * from `$tb` where Coursecode='$_SESSION[Coursecode]'");
$totalst=mysqli_num_rows($total);

if($query){
    
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
  $pdf->SetXY(5, 50); $pdf->Write(1, 'Staff Id');
    $pdf->SetXY(5, 60);$pdf->Write(1, 'Staff Name');
    $pdf->SetXY(5, 70);$pdf->Write(1, 'Department');
    $pdf->SetXY(5, 80);$pdf->Write(1, 'Semester');
    $pdf->SetXY(5, 90);$pdf->Write(1, 'Subject Name');
    $pdf->SetXY(5, 100);$pdf->Write(1, 'Subject Code');
    $pdf->SetXY(5, 110);$pdf->Write(1, 'Academic Year');

//FeedBack User info
    $pdf->SetFont('Arial','B','12');
     $pdf->SetXY(40, 50);$pdf->Write(1, ':   '.$res['staff_id']);//regno
     $pdf->SetXY(40, 60);$pdf->Write(1, ':   '.$res['staffname']);//name
     $pdf->SetXY(40, 70);$pdf->Write(1, ':   '.$res['department']);//dept
     $pdf->SetXY(40, 80);$pdf->Write(1, ':   '.$res['sem']);//year
     $pdf->SetXY(40, 90);$pdf->Write(1, ':   '.$res['subject']);//sub name
     $pdf->SetXY(40, 100);$pdf->Write(1, ':   '.$_SESSION['Coursecode']);//sub code
     $pdf->SetXY(40, 110);$pdf->Write(1, ':   '.$res['acyear']);//staff name

  //Feedback heading
    $pdf->SetFont('Arial','BU','14');  
    $pdf->SetXY(80, 130);$pdf->Write(1, 'Average Details ');

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
    $pdf->SetXY(150, 150);$pdf->Write(1, ':    '.round($_SESSION['q1']));
    $pdf->SetXY(150, 160);$pdf->Write(1, ':    '.round($_SESSION['q2']));
    $pdf->SetXY(150, 185);$pdf->Write(1, ':    '.round($_SESSION['q3']));
    $pdf->SetXY(150, 210);$pdf->Write(1, ':    '.round($_SESSION['q4']));
    $pdf->SetXY(150, 220);$pdf->Write(1, ':    '.round($_SESSION['q5']));
    $pdf->SetXY(150, 240);$pdf->Write(1, ':    '.round($_SESSION['q6']));
    $pdf->SetXY(150, 260);$pdf->Write(1, ':    '.round($_SESSION['q7']));
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
    $pdf->SetXY(150, 10);$pdf->Write(1, ':    '.round($_SESSION['q8']));
    $pdf->SetXY(150, 20);$pdf->Write(1, ':    '.round($_SESSION['q9']));
    $pdf->SetXY(150, 30);$pdf->Write(1, ':    '.round($_SESSION['q10']));
    //$pdf->SetXY(150,30);$pdf->Write(1, ':    '.$quest11);
    //$pdf->SetXY(150,50);$pdf->Write(1, ':    '.$quest12);


     //footer
    $pdf->SetFont('Arial','B','14'); 
        $pdf->SetXY(50, 60);$pdf->Write(1, " Total No of Students Given Feedback ");
         $pdf->SetXY(150,60);$pdf->Write(1, ':    '.$totalst);
        
    $pdf->SetXY(120, 80);$pdf->Write(1, " Average ");
    $pdf->SetXY(150,80);$pdf->Write(1, ':    '.$_SESSION['avg'].'%');

   // $pdf->SETXY(15,260);$pdf->Write(0,"Head of the Institution");
    //$pdf->SETXY(130,260);$pdf->Write(0,"Head of the Department");
    $filename="/home/u554905395/domains/autmdu.in/public_html/feedback/administrator/reports/".$path;
  // $filename="C:/xampp/htdocs/feednew/administrator/reports/".$path;
    //$filename="/home/u554905395/domains/autmdu.in/public_html/feedback/".$filelink;
   
$pdf->Output($filename,'F');
$file=$_SESSION['Coursecode'].'.pdf';
$pdf->Output('D',$file);
//$pdf->Output();
    


ob_end_flush();

   
   
   
   
   
}else{
    echo "<script>alert('Failed to generate pdf')</script>";
}

}

}
?>