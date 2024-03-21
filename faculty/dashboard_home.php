 
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
    #dashinfo{
        margin-top:7%;
     
       border-bottom:2px solid green;
    }
    #dashinfo a{
        color:green;
        font-weight:bold;
        text-decoration:none;
    }
    #info{
        display:flex;
        flex-wrap:wrap;
        margin-top:5%; 
        margin-left:10%; 
       
    }
    #myCarousel .carousel-control
 {
  background-image: none;
}
#info .item i{
    color:brown;
    font-size:90px;
    margin-left:25%;
   
}
#info .item h2{
    text-align:center;
    letter-spacing:1px;
    
   
   color:darkcyan;
}
#info .item h3{
    text-align:center;
    color:green;
}
#info .item {
    background: linear-gradient(132deg, rgb(253, 112, 136) 0.00%, rgb(255, 211, 165) 100.00%);
    padding:5%;
    margin:10px;
      width:250px;
    height:320px;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
   
      background:rgba(176,220,100,0.4);
}
.st-info{
  margin:2% 0 0% 25%;
  padding-bottom:20px;
  width:500px;
}
.st-info .table{
   box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    background:rgba(176,220,100,0.4);
  
}
.st-info .table tr th,.st-info .table tr td{
  text-align:center;
}
.st-info .table tr th{
  color:brown;
}
.st-info .table tr td{
  color:darkblue;
}
</style>


<h1  style="" id="dashinfo"><a href=""><?php echo strtoupper($_SESSION['department'])?> DASHBOARD</a></h1>


<?php 
//all complaints
$qq=mysqli_query($conn,"select distinct staff_id from staff where department='$_SESSION[department]'");
$rows=mysqli_num_rows($qq);			
//echo "<h2 style='color:orange'><i class='fa fa-user'></i>  Total Number of Faculty : $rows</h2>";	

//subjects
$q=mysqli_query($conn,"select distinct coursecode from staff where department='$_SESSION[department]'");
$r1=mysqli_num_rows($q);			
//echo "<h2 style='color:'><i class='fa fa-book'></i> &nbsp;Total Number of Subjects : $r1</h2>";	

//all emegency compalints
$q=mysqli_query($conn,"select distinct regno from user where programme='$_SESSION[department]'");
$r2=mysqli_num_rows($q);			
//echo "<h2 style='color:'> <i class='fa fa-user'></i>&nbsp; Total Number of Registered Student: $r1</h2>";	


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
$dp=$_SESSION['department'];
if($_SESSION['department'] != 'mba'){
$cse1=feed($conn,'feedback-'.$dp.'-2018-2022');	
$cse1t=total($conn,'feedback-'.$dp.'-2018-2022');
	
$cse2=feed($conn,'feedback-'.$dp.'-2019-2023');	
$cse2t=total($conn,'feedback-'.$dp.'-2019-2023');	

$cse3=feed($conn,'feedback-'.$dp.'-2020-2024');	
$cse3t=total($conn,'feedback-'.$dp.'-2020-2024');

$cse4=feed($conn,'feedback-'.$dp.'-2021-2025');	
$cse4t=total($conn,'feedback-'.$dp.'-2021-2025');	

$cse5=feed($conn,'feedback-'.$dp.'-2022-2026');	
$cse5t=total($conn,'feedback-'.$dp.'-2022-2026');	
$t1=($cse1+$cse2+$cse3+$cse4+$cse5);
$t2=($cse1t+$cse2t+$cse3t+$cse4t+$cse5t);
    
}else{
    
$mba=feed($conn,'feedback-'.$dp.'-2021-2023');	
$mbat=total($conn,'feedback-'.$dp.'-2021-2023');	
$t1=$mba;
$t2=$mbat;
}

//echo "<h2 style='color:black'><i class='fa fa-comment'></i>&nbsp; Total Number of feedbacks ". strtoupper($_SESSION['department']).": <b>( ".$t1." )</b> Students <b>( ".$t2." )</b></h2>";	


					
//distinct users
//  $q3=mysqli_query($conn,"select distinct regno from  where department='$_SESSION[department]'");
//  $r3=mysqli_num_rows($q3);			
// echo "<h2 style='color:orange'><i class='fa fa-comment'></i>&nbsp;Total Number of Individual feedback given by student : $r3</h2>";

//exitsurvey form submitted
$q4=mysqli_query($conn,"select regno from exitsurvey where department='$_SESSION[department]'");
$r4=mysqli_num_rows($q4);			
//echo "<h2 style='color:red'><i class='fa fa-external-link'></i>&nbsp; Total Number of Exit Survey feedbacks  : $r4</h2>";

//industry form submitted
$q5=mysqli_query($conn,"select Regno from industry where department='$_SESSION[department]'");
$r5=mysqli_num_rows($q5);			
//echo "<h2 style='color:#95c97f'><i class='fa fa-industry'></i>&nbsp; Total Number of Industry Form Submitted  : $r5</h2>";
//parent form
$q6=mysqli_query($conn,"select Regno from parentsurvey where department='$_SESSION[department]'");
$r6=mysqli_num_rows($q6);			
//echo "<h2 style='color:#95c97f'><i class='fa fa-users'></i>&nbsp; Total Number of Parent Form Submitted  : $r6</h2>";
//inplant form

$q7=mysqli_query($conn,"select Regno from inplant where department='$_SESSION[department]'");
$r7=mysqli_num_rows($q7);			
//echo "<h2 style='color:#95c97f'><i class='fa fa-fire'></i>&nbsp; Total Number of Inplant Form Submitted  : $r7</h2>";


//COUNT STUDENTS PER YEAR

function styear($conn,$tb,$acyear){
  if($tb != 'user'){
  $query="select distinct regno from `$tb` ";
  }else{
      $query="select distinct regno from `$tb` where programme='$_SESSION[department]' and acyear='$acyear' ";
  }
  $res=mysqli_query($conn,$query);
  return mysqli_num_rows($res);
}

//2018-2022
$year_one=styear($conn,'user','2018-2022');
$tb1='feedback-'.$_SESSION['department'].'-2018-2022';
$year_one_feed=styear($conn,$tb1,'');

//2019-2023
$year_two=styear($conn,'user','2019-2023');
$tb1='feedback-'.$_SESSION['department'].'-2019-2023';
$year_two_feed=styear($conn,$tb1,'');

//2020-2024
$year_three=styear($conn,'user','2020-2024');
$tb1='feedback-'.$_SESSION['department'].'-2020-2024';
$year_three_feed=styear($conn,$tb1,'');

//2021-2025
$year_four=styear($conn,'user','2021-2025');
$tb1='feedback-'.$_SESSION['department'].'-2021-2025';
$year_four_feed=styear($conn,$tb1,'');

//2022-2026
$year_five=styear($conn,'user','2022-2026');
$tb1='feedback-'.$_SESSION['department'].'-2022-2026';
$year_five_feed=styear($conn,$tb1,'');


?>



  <div id="info">
    <div class="item active">
      <i class="fa fa-user-o" ></i>
        <h2> Faculty</h2>
        <h3><?php echo " <b>( $rows ) </b>" ;?></h3>
    </div>

    <div class="item">
    <i class="fa fa-book" ></i>
        <h2>Subjects</h2>
        <h3><?php echo " <b>( $r1 ) </b>" ;?></h3>
    </div>

    <div class="item">
    <i class="fa fa-users" ></i>
    <h2>Registered Students</h2>
    <h3><?php echo " <b>( $r2 ) </b>" ;?></h3>
  </div>
    <div class="item">
    <i class="fa fa-comments" ></i>
    <h2>FeedBacks</h2>
    <h3><?php echo " <b>( $t1 ) </b>" ;?></h3>
  </div>
    <div class="item">
    <i class="fa fa-fire" ></i>
    <h2>Inplant Form FeedBacks</h2>
    <h3><?php echo " <b>( $r7 ) </b>" ;?></h3>
  </div>
    <div class="item">
    <i class="fa fa-industry" ></i>
    <h2>Industry Form FeedBacks</h2>
    <h3><?php echo " <b>( $r5 ) </b>" ;?></h3>
  </div>
    <div class="item">
    <i class="fa fa-user-secret" ></i>
    <h2>Parent  FeedBacks</h2>
    <h3><?php echo " <b>( $r6 ) </b>" ;?></h3>
  </div>
</div>
 <h1  style="" id="dashinfo"><a href="">FeedBacks Information</a></h1>

 <div class="st-info">
  <table class='table table-bordered'>
    <tr>
      <th>Period Of Study</th><th>Registered Students</th><th>Students FeedBack Given</th>
    </tr>
    <tr>
      <td>2018-2022</td><td><?php echo $year_one;?></td><td><?php echo $year_one_feed;?></td>
    </tr>
    <tr>
      <td>2019-2023</td><td><?php echo $year_two;?></td><td><?php echo $year_two_feed;?></td>
    </tr>
    <tr>
      <td>2020-2024</td><td><?php echo $year_three;?></td><td><?php echo $year_three_feed;?></td>
    </tr>
    <tr>
      <td>2021-2025</td><td><?php echo $year_four;?></td><td><?php echo $year_four_feed;?></td>
    </tr>
    <tr>
      <td>2022-2026</td><td><?php echo $year_five;?></td><td><?php echo $year_five_feed;?></td>
    </tr>
  </table>
 </div>
</div>
