 
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1 align="center" style="text-decoration:underline"><a href="">Admin Dashboard</a></h1>
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
	
$cse1=feed($conn,'feedback-cse-2018-2022');	
$civil1=feed($conn,'feedback-civil-2018-2022');	

$cse1t=total($conn,'feedback-cse-2018-2022');
$civil1t=total($conn,'feedback-civil-2018-2022');
	
$cse2=feed($conn,'feedback-cse-2019-2023');	
$civil2=feed($conn,'feedback-civil-2019-2023');	

$cse2t=total($conn,'feedback-cse-2019-2023');	
$civil2t=total($conn,'feedback-civil-2019-2023');	

$cse3=feed($conn,'feedback-cse-2020-2024');	
$civil3=feed($conn,'feedback-civil-2020-2024');

$cse3t=total($conn,'feedback-cse-2020-2024');
$civil3t=total($conn,'feedback-civil-2020-2024');

$cse4=feed($conn,'feedback-cse-2021-2025');	
$civil4=feed($conn,'feedback-civil-2021-2025');	

$cse4t=total($conn,'feedback-cse-2021-2025');	
$civil4t=total($conn,'feedback-civil-2021-2025');	

$cse5=feed($conn,'feedback-cse-2022-2026');	
$civil5=feed($conn,'feedback-civil-2022-2026');	

$cse5t=total($conn,'feedback-cse-2022-2026');	
$civil5t=total($conn,'feedback-civil-2022-2026');	

echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks CSE: <b>( ".($cse1+$cse2+$cse3+$cse4+$cse5)." )</b> Students <b>( ".($cse1t+$cse2t+$cse3t+$cse4t+$cse5t)." )</b></h2>";	

echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks CIVIL: <b>( ".($civil1+$civil2+$civil3+$civil4+$civil5)." )</b> Students <b>( ".($civil1t+$civil2t+$civil3t+$civil4t+$civil5t)." )</b></h2>";	


					
//distinct users
// $q3=mysqli_query($conn,"select distinct regno from feedback");
// $r3=mysqli_num_rows($q3);			
// echo "<h2 style='color:orange'><i class='fa fa-comment'></i>&nbsp;Total Number of Individual feedback given by student : $r3</h2>";

//exitsurvey form submitted
$q4=mysqli_query($conn,"select regno from exitsurvey");
$r4=mysqli_num_rows($q4);			
echo "<h2 style='color:red'><i class='fa fa-external-link'></i>&nbsp; Total Number of Exit Survey feedbacks  : $r4</h2>";

//industry form submitted
$q5=mysqli_query($conn,"select Regno from industry");
$r5=mysqli_num_rows($q5);			
echo "<h2 style='color:#95c97f'><i class='fa fa-industry'></i>&nbsp; Total Number of Industry Form Submitted  : $r5</h2>";
//parent form
$q6=mysqli_query($conn,"select Regno from parentsurvey");
$r6=mysqli_num_rows($q6);			
echo "<h2 style='color:#95c97f'><i class='fa fa-users'></i>&nbsp; Total Number of Parent Form Submitted  : $r6</h2>";
//inplant form

$q7=mysqli_query($conn,"select Regno from inplant");
$r7=mysqli_num_rows($q7);			
echo "<h2 style='color:#95c97f'><i class='fa fa-fire'></i>&nbsp; Total Number of Inplant Form Submitted  : $r7</h2>";
?>
