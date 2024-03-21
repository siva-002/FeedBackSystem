<?php extract($_POST); //session_start();

$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}

?>
<form method="post">
<table class="table ">
<tr>


</tr>
<tr>
    <th>Select Department</th>
    <td>
        <input type="radio" name="chdept" value="civil"  <?php if(isset($chdept) && $chdept=='civil') echo 'checked'?>> <i>Civil</i>
        <input type="radio" name="chdept" value="cse"  <?php if(isset($chdept) && $chdept=='cse') echo 'checked'?>> <i>Cse</i>
        <input type="radio" name="chdept" value="mech"  <?php if(isset($chdept) && $chdept=='mech') echo 'checked'?>> <i>Mech</i>
        <input type="radio" name="chdept" value="ece"  <?php if(isset($chdept) && $chdept=='ece') echo 'checked'?>> <i>Ece</i>
            </td>
</tr>

<tr>
<th> Select Faculty</th>
<td>
<select name="faculty" class="form-control" id="sl">
    
	<?php
    if(isset($chdept)){
    $_SESSION['chdept']=$chdept;
	$sql=mysqli_query($conn,"select distinct staff_id,staffname from staff where department='$_SESSION[chdept]' order by staff_id");
	while($r=mysqli_fetch_array($sql))
	{
	echo "<option value='".$r['staff_id']."'>".$r['staff_id']."-".$r['staffname']."</option>";
	}

    if(mysqli_num_rows($sql)<1 )
    echo "<option value=''>No Faculty Added</option>";
	 
    echo "</select></td>";
   echo ' <th>Select Academic Year</th>
   <td> <select name="chac" id="chac" class="form-control" required>
    <option value=""></option>
    <option value="2018-2022">2018-2022</option>
    <option value="2019-2023">2019-2023</option>
    <option value="2020-2024">2020-2024</option>
    <option value="2021-2025">2021-2025</option>
    <option value="2022-2026">2022-2026</option>    </select></td></tr>';


    if(mysqli_num_rows($sql)>0) echo '<tr><td><input name="select" type="submit" value="Select" class="btn btn-success" id="slbtn"/></td></tr>'	;
}
    ?>
     
</select>
</td>

</tr>
</table>
</form>
<hr style="border:1px solid red"/>



<?php


if (isset($select))  {
	$_SESSION['faculty']=$faculty;
    $_SESSION['acyear']=$chac;
	echo "<form method='POST'>";
	$sql=mysqli_query($conn,"select distinct staffname from staff where staff_id='$faculty' ");
	$r=mysqli_fetch_array($sql);
	echo "<h2>Subjects Handled By <b>".$r['staffname']."</b> for <b>".$_SESSION['chdept']."</b> Academic Year <b>".$chac."</b></h2>";

	$sql1=mysqli_query($conn,"select * from staff where staff_id='$faculty' and department='$_SESSION[chdept]' and acyear='$chac' order by sem");
	while($r1=mysqli_fetch_array($sql1))
	{
	echo "<input type='radio' id='cradio' name='cc' value='".$r1['coursecode']."'> <span style='font-size:20px;'>" .$r1['coursecode']."-".$r1['subject']." <span style='font-size:20px;color:chocolate'><b> &nbsp;[ ".$r1['sem']." ] </b></span></span><br>";
	}
	echo "<input type='submit' name='sub' value='Get Average' class='btn btn-success'>";
	echo "</div></form>";


}
if(isset($sub))
{
$tb="feedback-".$_SESSION['chdept']."-"."$_SESSION[acyear]";
$r=mysqli_query($conn,"select * from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$_SESSION['Coursecode']=$cc;
$q=mysqli_fetch_array($r);
$c=mysqli_num_rows($r);	

$st=mysqli_query($conn,"select * from `{$tb}` where Coursecode='$cc'");
$stt=mysqli_fetch_array($st);
if(mysqli_num_rows($st)>0){

$stcount=mysqli_query($conn,"select * from user where programme='$_SESSION[chdept]' and acyear='$_SESSION[acyear]'");
$sttcount=mysqli_num_rows($stcount);
if($c>0)
echo "<h3>Feedback Average for <strong>".$q['facultyname'] ."- ".$q['subject']. " ( ".$cc. " )</strong> </b></h3>
<h4>Total number of students given feedback <b>( $c ) </b> out of  <b>( $sttcount )</b></h4>"
;


}

error_reporting(1);
$q=mysqli_query($conn,"select * from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc' ");
while($res=mysqli_fetch_array($q))
{

	$count=$count+$res['quest1']*20+$res['quest2']*20+$res['quest3']*20+$res['quest4']*20+$res['quest5']*20+$res['quest6']*20+$res['quest7']*20+$res['quest8']*20+
	$res['quest9']*20+$res['quest10']*20;

	//$cm=$cm+$res['quest1']*20+$res['quest2']*20+$res['quest3']*20;

	//$ct=$ct+$res['quest4']*20+$res['quest5']*20+$res['quest6']*20+$res['quest7']*20+$res['quest8']*20+
	//$res['quest9']*20+$res['quest10']*20;

	//$cc=(int)$cc+ $res['quest11']*20+$res['quest12']*20;
}
if(mysqli_num_rows($q)>0){
	$avg=(int)($count /($c*10));
	$_SESSION['avg']=$avg;

	//$cmavg=(int)($cm /($c*3));

	//$ctavg=(int)($ct /($c*7));
	
	//$ccavg=(int)($cc /($c*2));
echo '<span class="label label-success">Excellent Performance ( 5 )</span>
<span class="label label-primary">Good Performance ( 4 )</span>
<span class="label label-info">Average Performance ( 3 )</span>
<span class="label label-warning">Bad Performance ( 2 )</span>
<span class="label label-danger">Worst Performance ( 1 )</span>';



//echo "<br><span id='avg'>Class Teaching :<span id='ctav'>".$ctavg."%</span></span>" ;
//echo "<br><span id='avg'>Course Material :<span id='cmav'>".$cmavg."%</span></span>" ;
//echo "<br><span id='avg'> Class Assesment:<span id='ccav'>".$ccavg."%</span></span>" ;
echo "<br><br><span id='avg'>Total Average :<span id='av'>".$avg."%</span></span>" ;


//$i=$ccavg;$j=$ctavg;$k=$cmavg;
  /*  $cc= ($i>0  && $i<=50)? 'red': (($i>50  && $i<=70)?'blue':'green');
    $ct= ($j>0  && $j<=50)? 'red': (($j>50  && $j<=70)?'blue':'green');
    $cm= ($k>0  && $k<=50)? 'red': (($k>50  && $k<=70)?'blue':'green');*/

	/*if($i>0 && $i<20) $cc='red';
	elseif($i>20 && $i<=40) $cc='grey';
	elseif($i>40 && $i<=60) $cc ='lightblue';
	elseif($i>60 && $i<=80) $cc='darkblue';
	else $cc='green';

	if($j>0 && $j<20) $ct='red';
	elseif($j>20 && $j<=40) $ct='grey';
	elseif($j>40 && $j<=60) $ct ='lightblue';
	elseif($j>60 && $j<=80) $ct='darkblue';
	else $ct='green';

	if($k>0 && $k<20) $cm='red';
	elseif($k>20 && $k<=40) $cm='grey';
	elseif($k>40 && $k<=60) $cm ='lightblue';
	elseif($k>60 && $k<=80) $cm='darkblue';
	else $cm='green';
*/
$qcountquery = mysqli_query($conn,"select COUNT(quest1) AS qcount from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'"); 
$qcountres = mysqli_fetch_array($qcountquery);
$qcount = $qcountres['qcount'];

$q1sumquery = mysqli_query($conn,"select SUM(quest1) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q1sumres = mysqli_fetch_array($q1sumquery);
$q1avg = ($q1sumres['qsum']*20)/$qcount;
$_SESSION['q1']=$q1avg;

if($q1avg>=20 && $q1avg<40) $q1='red';
elseif($q1avg>=40 && $q1avg<60) $q1='grey';
elseif($q1avg>=60 && $q1avg<80) $q1 ='lightblue';
elseif($q1avg>=80 && $q1avg<100) $q1='#d59bf6';
else $q1='green';

$q2sumquery = mysqli_query($conn,"select SUM(quest2) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q2sumres = mysqli_fetch_array($q2sumquery);
$q2avg = ($q2sumres['qsum']*20)/$qcount;
$_SESSION['q2']=$q2avg;

if($q2avg>=20 && $q2avg<40) $q2='red';
elseif($q2avg>=40 && $q2avg<60) $q2='grey';
elseif($q2avg>=60 && $q2avg<80) $q2 ='lightblue';
elseif($q2avg>=80 && $q2avg<100) $q2='darkblue';
else $q2='green';

$q3sumquery = mysqli_query($conn,"select SUM(quest3) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q3sumres = mysqli_fetch_array($q3sumquery);
$q3avg = ($q3sumres['qsum']*20)/$qcount;
$_SESSION['q3']=$q3avg;

if($q3avg>=20 && $q3avg<40) $q3='red';
elseif($q3avg>=40 && $q3avg<60) $q3='grey';
elseif($q3avg>=60 && $q3avg<80) $q3 ='lightblue';
elseif($q3avg>=80 && $q3avg<100) $q3='darkblue';
else $q3='green';

$q4sumquery = mysqli_query($conn,"select SUM(quest4) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q4sumres = mysqli_fetch_array($q4sumquery);
$q4avg = ($q4sumres['qsum']*20)/$qcount;
$_SESSION['q4']=$q4avg;

if($q4avg>=20 && $q4avg<40) $q4='red';
elseif($q4avg>=40 && $q4avg<60) $q4='grey';
elseif($q4avg>=60 && $q4avg<80) $q4 ='lightblue';
elseif($q4avg>=80 && $q4avg<100) $q4='darkblue';
else $q4='green';

$q5sumquery = mysqli_query($conn,"select SUM(quest5) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q5sumres = mysqli_fetch_array($q5sumquery);
$q5avg = ($q5sumres['qsum']*20)/$qcount;
$_SESSION['q5']=$q5avg;

if($q5avg>=20 && $q5avg<40) $q5='red';
elseif($q5avg>=40 && $q5avg<60) $q5='grey';
elseif($q5avg>=60 && $q5avg<80) $q5 ='lightblue';
elseif($q5avg>=80 && $q5avg<100) $q5='darkblue';
else $q5='green';

$q6sumquery = mysqli_query($conn,"select SUM(quest6) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q6sumres = mysqli_fetch_array($q6sumquery);
$q6avg = ($q6sumres['qsum']*20)/$qcount;
$_SESSION['q6']=$q6avg;

if($q6avg>=20 && $q6avg<40) $q6='red';
elseif($q6avg>=40 && $q6avg<60) $q6='grey';
elseif($q6avg>=60 && $q6avg<80) $q6 ='lightblue';
elseif($q6avg>=80 && $q6avg<100) $q6='darkblue';
else $q6='green';

$q7sumquery = mysqli_query($conn,"select SUM(quest7) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q7sumres = mysqli_fetch_array($q7sumquery);
$q7avg = ($q7sumres['qsum']*20)/$qcount;
$_SESSION['q7']=$q7avg;

if($q7avg>=20 && $q7avg<40) $q7='red';
elseif($q7avg>=40 && $q7avg<60) $q7='grey';
elseif($q7avg>=60 && $q7avg<80) $q7 ='lightblue';
elseif($q7avg>=80 && $q7avg<100) $q7='darkblue';
else $q7='green';

$q8sumquery = mysqli_query($conn,"select SUM(quest8) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q8sumres = mysqli_fetch_array($q8sumquery);
$q8avg = ($q8sumres['qsum']*20)/$qcount;
$_SESSION['q8']=$q8avg;

if($q8avg>=20 && $q8avg<40) $q8='red';
elseif($q8avg>=40 && $q8avg<60) $q8='grey';
elseif($q8avg>=60 && $q8avg<80) $q8 ='lightblue';
elseif($q8avg>=80 && $q8avg<100) $q8='darkblue';
else $q8='green';

$q9sumquery = mysqli_query($conn,"select SUM(quest9) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q9sumres = mysqli_fetch_array($q9sumquery);
$q9avg = ($q9sumres['qsum']*20)/$qcount;
$_SESSION['q9']=$q9avg;

if($q9avg>=20 && $q9avg<40) $q9='red';
elseif($q9avg>=40 && $q9avg<60) $q9='grey';
elseif($q9avg>=60 && $q9avg<80) $q9 ='lightblue';
elseif($q9avg>=80 && $q9avg<100) $q9='darkblue';
else $q9='green';

$q10sumquery = mysqli_query($conn,"select SUM(quest10) AS qsum from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc'");
$q10sumres = mysqli_fetch_array($q10sumquery);
$q10avg = ($q10sumres['qsum']*20)/$qcount;
$_SESSION['q10']=$q10avg;

if($q10avg>=20 && $q10avg<40) $q10='red';
elseif($q10avg>=40 && $q10avg<60) $q10='grey';
elseif($q10avg>=60 && $q10avg<80) $q10 ='lightblue';
elseif($q10avg>=80 && $q10avg<100) $q10='darkblue';
else $q10='green';


?>


<div class="bar">
        <span id="high">5</span>
        <span id="low">0</span>
        <!-- <div class="item-1" style="height:<?php //echo $a*20?>; background-color:<?php //echo $q1?>;"><i>Question 1</i><span id="val"><?php  //echo $a.'%'?></span></div> -->
        <div class="item-1" style="height:<?php echo $q1avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q1</i><span id="val"><?php  echo round(10*($q1avg/20))/10  ?></span></div>
        <div class="item-2" style="height:<?php echo $q2avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q2</i><span id="val"><?php  echo round(10*($q2avg/20))/10 ?></span></div>
        <div class="item-3" style="height:<?php echo $q3avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q3</i><span id="val"><?php  echo round(10*($q3avg/20))/10 ?></span></div>
        <div class="item-4" style="height:<?php echo $q4avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q4</i><span id="val"><?php  echo round(10*($q4avg/20))/10 ?></span></div>
        <div class="item-5" style="height:<?php echo $q5avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q5</i><span id="val"><?php  echo round(10*($q5avg/20))/10 ?></span></div>
        <div class="item-6" style="height:<?php echo $q6avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q6</i><span id="val"><?php  echo round(10*($q6avg/20))/10 ?></span></div>
        <div class="item-7" style="height:<?php echo $q7avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q7</i><span id="val"><?php  echo round(10*($q7avg/20))/10 ?></span></div>
        <div class="item-8" style="height:<?php echo $q8avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q8</i><span id="val"><?php  echo round(10*($q8avg/20))/10 ?></span></div>
        <div class="item-9" style="height:<?php echo $q9avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q9</i><span id="val"><?php  echo round(10*($q9avg/20))/10 ?></span></div>
        <div class="item-10" style="height:<?php echo $q10avg.'%'?>;background: linear-gradient(109.5deg, rgb(13, 11, 136) 9.4%, rgb(86, 255, 248) 78.4%);"><i>Q10</i><span id="val"><?php  echo round(10*($q10avg/20))/10 ?></span></div>
    </div>
 <br>
 <br>
 <br>
 <?php 


 
 function totalcount($conn,$tb,$cc,$col,$val){
    $q=mysqli_query($conn,"select * from `{$tb}` where staff_id='$_SESSION[faculty]' and Coursecode='$cc' and 
    $col='$val' ");
    $res =mysqli_num_rows($q);
    return $res;

 }
 $quest1_5=totalcount($conn,$tb,$cc,'quest1',5);
 $quest1_4=totalcount($conn,$tb,$cc,'quest1',4);
 $quest1_3=totalcount($conn,$tb,$cc,'quest1',3);
 $quest1_2=totalcount($conn,$tb,$cc,'quest1',2);
 $quest1_1=totalcount($conn,$tb,$cc,'quest1',1);
 
 $quest2_5=totalcount($conn,$tb,$cc,'quest2',5);
 $quest2_4=totalcount($conn,$tb,$cc,'quest2',4);
 $quest2_3=totalcount($conn,$tb,$cc,'quest2',3);
 $quest2_2=totalcount($conn,$tb,$cc,'quest2',2);
 $quest2_1=totalcount($conn,$tb,$cc,'quest2',1);
 
 $quest3_5=totalcount($conn,$tb,$cc,'quest3',5);
 $quest3_4=totalcount($conn,$tb,$cc,'quest3',4);
 $quest3_3=totalcount($conn,$tb,$cc,'quest3',3);
 $quest3_2=totalcount($conn,$tb,$cc,'quest3',2);
 $quest3_1=totalcount($conn,$tb,$cc,'quest3',1);
 
 $quest4_5=totalcount($conn,$tb,$cc,'quest4',5);
 $quest4_4=totalcount($conn,$tb,$cc,'quest4',4);
 $quest4_3=totalcount($conn,$tb,$cc,'quest4',3);
 $quest4_2=totalcount($conn,$tb,$cc,'quest4',2);
 $quest4_1=totalcount($conn,$tb,$cc,'quest4',1);
 
 $quest5_5=totalcount($conn,$tb,$cc,'quest5',5);
 $quest5_4=totalcount($conn,$tb,$cc,'quest5',4);
 $quest5_3=totalcount($conn,$tb,$cc,'quest5',3);
 $quest5_2=totalcount($conn,$tb,$cc,'quest5',2);
 $quest5_1=totalcount($conn,$tb,$cc,'quest5',1);
 
 $quest6_5=totalcount($conn,$tb,$cc,'quest6',5);
 $quest6_4=totalcount($conn,$tb,$cc,'quest6',4);
 $quest6_3=totalcount($conn,$tb,$cc,'quest6',3);
 $quest6_2=totalcount($conn,$tb,$cc,'quest6',2);
 $quest6_1=totalcount($conn,$tb,$cc,'quest6',1);
 
 $quest7_5=totalcount($conn,$tb,$cc,'quest7',5);
 $quest7_4=totalcount($conn,$tb,$cc,'quest7',4);
 $quest7_3=totalcount($conn,$tb,$cc,'quest7',3);
 $quest7_2=totalcount($conn,$tb,$cc,'quest7',2);
 $quest7_1=totalcount($conn,$tb,$cc,'quest7',1);
 
 $quest8_5=totalcount($conn,$tb,$cc,'quest8',5);
 $quest8_4=totalcount($conn,$tb,$cc,'quest8',4);
 $quest8_3=totalcount($conn,$tb,$cc,'quest8',3);
 $quest8_2=totalcount($conn,$tb,$cc,'quest8',2);
 $quest8_1=totalcount($conn,$tb,$cc,'quest8',1);
 
 $quest9_5=totalcount($conn,$tb,$cc,'quest9',5);
 $quest9_4=totalcount($conn,$tb,$cc,'quest9',4);
 $quest9_3=totalcount($conn,$tb,$cc,'quest9',3);
 $quest9_2=totalcount($conn,$tb,$cc,'quest9',2);
 $quest9_1=totalcount($conn,$tb,$cc,'quest9',1);
 
 $quest10_5=totalcount($conn,$tb,$cc,'quest10',5);
 $quest10_4=totalcount($conn,$tb,$cc,'quest10',4);
 $quest10_3=totalcount($conn,$tb,$cc,'quest10',3);
 $quest10_2=totalcount($conn,$tb,$cc,'quest10',2);
 $quest10_1=totalcount($conn,$tb,$cc,'quest10',1);
 
 
 ?>
   <table class="table table-bordered table-hover table-striped " id="tb_table" style="">
       <tr style="background-color:#dff0d8;color:brown;"><th>Question</th><th>5</th><th>4</th><th>3</th><th>2</th><th>1</th></tr>
       <tr><th id='q'>Quest 1</th><td><?php echo $quest1_5 ?></td> <td><?php echo $quest1_4 ?></td><td><?php echo $quest1_3 ?></td><td><?php echo $quest1_2 ?></td><td><?php echo $quest1_1 ?></td></tr>
       <tr><th id='q'>Quest 2</th><td><?php echo $quest2_5 ?></td> <td><?php echo $quest2_4 ?></td><td><?php echo $quest2_3 ?></td><td><?php echo $quest2_2 ?></td><td><?php echo $quest2_1 ?></td></tr>
       <tr><th id='q'>Quest 3</th><td><?php echo $quest3_5 ?></td> <td><?php echo $quest3_4 ?></td><td><?php echo $quest3_3 ?></td><td><?php echo $quest3_2 ?></td><td><?php echo $quest3_1 ?></td></tr>
       <tr><th id='q'>Quest 4</th><td><?php echo $quest4_5 ?></td> <td><?php echo $quest4_4 ?></td><td><?php echo $quest4_3 ?></td><td><?php echo $quest4_2 ?></td><td><?php echo $quest4_1 ?></td></tr>
       <tr><th id='q'>Quest 5</th><td><?php echo $quest5_5 ?></td> <td><?php echo $quest5_4 ?></td><td><?php echo $quest5_3 ?></td><td><?php echo $quest5_2 ?></td><td><?php echo $quest5_1 ?></td></tr>
       <tr><th id='q'>Quest 6</th><td><?php echo $quest6_5 ?></td> <td><?php echo $quest6_4 ?></td><td><?php echo $quest6_3 ?></td><td><?php echo $quest6_2 ?></td><td><?php echo $quest6_1 ?></td></tr>
       <tr><th id='q'>Quest 7</th><td><?php echo $quest7_5 ?></td> <td><?php echo $quest7_4 ?></td><td><?php echo $quest7_3 ?></td><td><?php echo $quest7_2 ?></td><td><?php echo $quest7_1 ?></td></tr>
       <tr><th id='q'>Quest 8</th><td><?php echo $quest8_5 ?></td> <td><?php echo $quest8_4 ?></td><td><?php echo $quest8_3 ?></td><td><?php echo $quest8_2 ?></td><td><?php echo $quest8_1 ?></td></tr>
       <tr><th id='q'>Quest 9</th><td><?php echo $quest9_5 ?></td> <td><?php echo $quest9_4 ?></td><td><?php echo $quest9_3 ?></td><td><?php echo $quest9_2 ?></td><td><?php echo $quest9_1 ?></td></tr>
       <tr><th id='q'>Quest 10</th><td><?php echo $quest10_5 ?></td> <td><?php echo $quest10_4 ?></td><td><?php echo $quest10_3 ?></td><td><?php echo $quest10_2 ?></td><td><?php echo $quest10_1 ?></td></tr>


   </table>
   
   
<?php



?>


<?php 

}
else
echo "No feedback";

}


?>
  <?php 

    ?>

<style>
#tb_table{
    top:320px;
 left:10%;
 position:absolute;
 width:30%;
 }#tb_table tr th{
    
}
#tb_table tr #q{
    color:#34568B;
}
	#av{
	    
		
		font-size:30px;
	}
	.label{
		font-size:15px;
	}
	#avg{
	
		font-size:30px;
		
	}
	#av{
		font-weight:bold;
	}
	span{
		font-size:15px;
	
	}
	.bar{
        width:400px;
        height:200px;
  
        display:flex;
        margin-left:60%;
        margin-top:5%;
        position: relative;
        border-bottom:2px solid black;
        border-left:2px solid black;
    }
    .item-1{
        background-color:;
        height:;
        width:30px;
        bottom:0;
        left:9%;
        position: absolute;
        /*border-radius:15px 50px 0 0;*/

    }
    .item-2{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:18%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/
    }
    .item-3{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:27%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/

    }
    .item-4{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:36%;
        position:absolute;
        /*border-radius:15px 50px 0 0;*/
    }

    .item-5{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:45%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/

    }

    .item-6{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:54%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/
    }

    .item-7{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:63%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/

    }

    .item-8{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:72%;
        position:absolute;
       /*border-radius:15px 50px 0 0;*/
    }

    .item-9{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left:81%;
        position:absolute;
       /*border-radius:15px 50px 0 0;*/
    }

    .item-10{
        background-color:orange;
        height:;
        width:30px;
        bottom:0;
        left: 90%;
        position:absolute;
         /*border-radius:15px 50px 0 0;*/
    }

    .bar i{
        color:brown;
        bottom:-50px;
        position:absolute;
        font-weight:bold;
    }
    .bar span{
        text-align:center;
        font-weight:bold;
        margin-left:5px;
    }
    .bar #high{
        left:-30px;
        position: absolute;
        color:brown;
    }
    .bar #low{
        color:brown;
        bottom:0px;
        left:-30px;
        position: absolute;
    }
	#val{
		top:-30px;
		position:absolute;
	}
   #sl{
        
        width:20vw;
        position:sticky;
    }
    #slbtn{

        width:100px;
    }
    table td i{
        font-size:20px;
        font-style:normal;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name=chdept]').change(function(){
            $('form').submit();
        });
    });
</script>