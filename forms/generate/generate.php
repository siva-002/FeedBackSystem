<?php
extract($_POST);
session_start();

if(($_SESSION['user'] =="")){
    header('location:../index.php');
}else{
include('../../dbconfig.php');
    
$sql=mysqli_query($conn,"select * from exitsurvey where Regno='$_SESSION[user]' ");
$r = $sql->fetch_object();
$name=$r->Name;
$academic=$r->academic;
$dept=$r->department;
$quest1=$r->Quest1;
$quest2=$r->Quest2;
$quest3=$r->Quest3;
$quest4=$r->Quest4;
$quest5=$r->Quest5;
$quest6=$r->Quest6;
$quest7=$r->Quest7;
$quest8=$r->Quest8;
$quest9=$r->Quest9;
$quest10=$r->Quest10;
$quest11=$r->Quest11;
$quest12=$r->Quest12;
$quest13=$r->Quest13;
$avg=$r->Average;



ob_start();
require('../../fpdf/fpdf.php');
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
$pdf->Image('../../images/logo.png',10,5,30,30);
$pdf->SetXY(50, 15);
$pdf->Write(0, 'Anna University Regional Campus Madurai');
$pdf->SetXY(70, 30);
$pdf->Write(0, 'Exit Survey Feedback');
//FeedBack User Heading 
$pdf->SetFont('Arial','B','12');
$pdf->SetTextColor(0,0,0);
  $pdf->SetXY(5, 50); $pdf->Write(1, 'Regno');
    $pdf->SetXY(5, 60);$pdf->Write(1, 'Name');
    $pdf->SetXY(5, 70);$pdf->Write(1, 'Department');
    $pdf->SetXY(5, 80);$pdf->Write(1, 'Academic');
   // $pdf->SetXY(5, 90);$pdf->Write(1, 'Subject Name');
    //$pdf->SetXY(5, 100);$pdf->Write(1, 'Subject Code');
    //$pdf->SetXY(5, 110);$pdf->Write(1, 'Staff Name');

//FeedBack User info
    $pdf->SetFont('Arial','B','12');
     $pdf->SetXY(40, 50);$pdf->Write(1, ':   '.$_SESSION['user']);//regno
     $pdf->SetXY(40, 60);$pdf->Write(1, ':   '.$name);//name
     $pdf->SetXY(40, 70);$pdf->Write(1, ':   '.$dept);//dept
     $pdf->SetXY(40, 80);$pdf->Write(1, ':   '.$academic);//year
    // $pdf->SetXY(40, 90);$pdf->Write(1, ':   '.$sub);//sub name
    // $pdf->SetXY(40, 100);$pdf->Write(1, ':   '.$subcode);//sub code
     //$pdf->SetXY(40, 110);$pdf->Write(1, ':   '.$sname);//staff name

  //Feedback heading
    $pdf->SetFont('Arial','BU','14');  
    $pdf->SetXY(80, 100);$pdf->Write(1, 'Feedback Details ');

    //$pdf->SetXY(5, 140);$pdf->Write(1, 'Course Material ');
    //$pdf->SetXY(5, 210);$pdf->Write(1, 'Class Teaching  ');

   

    //Feedback Question 
    //$pdf->SetFont('Arial','','12');
     $pdf->SetFont('Arial','B','12');
    $pdf->SetXY(15, 120);$pdf->Write(1, '1. Attainment of Program Outcomes');

    $pdf->SetXY(180, 120);$pdf->Write(1, ':    '.$quest1);
    //$pdf->SetXY(19, 160);$pdf->Write(1, ' plan with list of  required text book  ');
    
    $pdf->SetXY(15, 135);$pdf->Write(1, '2. Usage of Innovative Teaching Methodologies');
    //$pdf->SetXY(19, 180);$pdf->Write(1, ' are clear to me  ');
    $pdf->SetXY(180, 135);$pdf->Write(1, ':    '.$quest2);
    
    $pdf->SetXY(15, 150);$pdf->Write(1, '3. Flexibility of Curriculum');
    $pdf->SetXY(180, 150);$pdf->Write(1, ':    '.$quest3);
    
    $pdf->SetXY(15, 165);$pdf->Write(1, '4. Encouragement of Self Study');
    $pdf->SetXY(180, 165);$pdf->Write(1, ':    '.$quest4);
    
    $pdf->SetXY(15, 180);$pdf->Write(1, '5. Provision of enough Skills on design and problem solving techniques');
        $pdf->SetXY(180, 180);$pdf->Write(1, ':    '.$quest5);
    
    $pdf->SetXY(15, 195);$pdf->Write(1, '6. Coverage of cutting edge technology topics in order to face the future');
    $pdf->SetXY(180, 195);$pdf->Write(1, ':    '.$quest6);

    $pdf->SetXY(15, 210);$pdf->Write(1, '7. Coverage of advanced topics to take up career in research');
        $pdf->SetXY(180, 210);$pdf->Write(1, ':    '.$quest7);
    
    $pdf->SetXY(15, 230);$pdf->Write(1, '8. Promoting Intellectual Growth');
    $pdf->SetXY(180, 230);$pdf->Write(1, ':    '.$quest8);
    
    
    $pdf->SetXY(15, 245);$pdf->Write(1, '9. Computer & Internet Facilities');
    $pdf->SetXY(180, 245);$pdf->Write(1, ':    '.$quest9);
    
    $pdf->SetXY(15, 260);$pdf->Write(1, "10. Library Facilities");
    $pdf->SetXY(180, 260);$pdf->Write(1, ':    '.$quest10);
    
    $pdf->SetXY(15, 275);$pdf->Write(1, "11. Canteen Facilities");
    $pdf->SetXY(180, 275);$pdf->Write(1, ':    '.$quest11);
    
    $pdf->SetXY(15, 290);$pdf->Write(1, "12. Sports Infrastructure");
    $pdf->SetXY(180, 10);$pdf->Write(1, ':    '.$quest12);

   //Feedback Question 
   $pdf->Rect(1, 1, 207, 290, 'D');
    $pdf->SetXY(15, 25);$pdf->Write(1, "13. Hostel Facilities");
    $pdf->SetXY(180, 25);$pdf->Write(1, ':    '.$quest13);

    $pdf->SetXY(160, 50);$pdf->Write(1, " Average ");
    $pdf->SetXY(180,50);$pdf->Write(1, ':    '.$avg.'%');
    //feedback rating values 2nd page
    //footer
  //  $pdf->SetFont('Arial','B','14'); 
   // $pdf->SetXY(120, 80);$pdf->Write(1, " Average ");
  //  $pdf->SetXY(150,80);$pdf->Write(1, ':    '.$avg.'%');

    //$pdf->SETXY(15,260);$pdf->Write(0,"Head of the Institution");
   // $pdf->SETXY(130,260);$pdf->Write(0,"Head of the Department");

$file=$_SESSION['user'].'.pdf';
$pdf->Output();




ob_end_flush();
header('index.php');

}
?>