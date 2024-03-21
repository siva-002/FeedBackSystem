<?php extract($_POST);include('../dbconfig.php');?>
<html lang="en">
<head>
<style>
    .btn{
        margin-left:10%;
        margin-top:10px;
    }
    form{
       
        width:600px;
        position:relative;
    }
    span{
		font-size:20px;
	
	}
	.bar{
        width:500px;
        height:300px;
  
        display:flex;
        margin-left:20%;
        margin-top:5%;
        position: relative;
        border-bottom:2px solid black;
        border-left:2px solid black;
    }
    .item-1{
        background-color:;
        height:;
        width:40px;
        bottom:0;
        left:15%;
        position: absolute;
    }
    .item-2{
        background-color:orange;
        height:;
        width:40px;
        bottom:0;
        left:35%;
        position:absolute;
    }
    .item-3{
        background-color:orange;
        height:;
        width:40px;
        bottom:0;
        left:60%;
        position:absolute;
    }
    .item-4{
        background-color:orange;
        height:;
        width:40px;
        bottom:0;
        left:80%;
        position:absolute;

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
        left:-40px;
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
	.label{
	    font-size:15px;
	}
</style>
</head>
<body>
    <h2>Exit Survey Average</h2>

    <form action="" method="POST">
        <table>
        <tr>
            <th><h4>Choose Period of Study : </h4></th><td>&nbsp;&nbsp;</td>
            <td>
            <select name="chac" id="chac" class="form-control" required>
                                <option value="2018-2022">2018-2022</option>
                                <option value="2019-2023">2019-2023</option>
                                <option value="2020-2024">2020-2024</option>
                                <option value="2021-2025">2021-2025</option>
                                <option value="2022-2026">2022-2026</option>
                </select>
            </td>
        
        <td><input type="submit" value="Get Average" class="btn btn-warning"></td></tr>         
        </table>
    </form>
        <?php 
        $flag=false;
        if(isset($chac)){
            
           $total=0;
            $sql=mysqli_query($conn,"select * from exitsurvey where academic='$chac'");
            $count=mysqli_num_rows($sql);
            if($count>0){
                $flag=true;
                while($res=mysqli_fetch_array($sql)){
                    $total = ($total + $res['Average']);
                }
                $avg=$total/$count;
                echo "<h3>Average for Academic Year <b>".$chac."</b> is <b>".round($avg)."%</b></h3>";
                
            }else{
                echo "<h4 style='color:red;'>No feedbacks found</h4>";
            }

            //CSE
            function deptavg($conn,$chac,$dept)
            {
              //  $conn=new mysqli('localhost','root','','u554905395_feedback_base');
                $total=0;
                $sql=mysqli_query($conn,"select * from exitsurvey where academic='$chac' and department='$dept'");
                $count=mysqli_num_rows($sql);
                if($count>0){
                    while($res=mysqli_fetch_array($sql)){
                        $total = ($total + $res['Average']);
                    }
                    $avg=$total/$count;
                   // echo "<h2>".$dept.":".$avg." %</h2>";
                    return $avg;
                    
                }else{
                    //echo "<h2>".$dept.": No feedbacks </h2>";
                    return '0';
                    
                }
            }
            $cse=deptavg($conn,$chac,"cse");
            $mech=deptavg($conn,$chac,"mech");
            $civil=deptavg($conn,$chac,"civil");
            $ece=deptavg($conn,$chac,"ece");

            $i=$cse;$j=$mech;$k=$civil;$l=$ece;
  /*  $cc= ($i>0  && $i<=50)? 'red': (($i>50  && $i<=70)?'blue':'green');
    $ct= ($j>0  && $j<=50)? 'red': (($j>50  && $j<=70)?'blue':'green');
    $cm= ($k>0  && $k<=50)? 'red': (($k>50  && $k<=70)?'blue':'green');*/

	if($i>0 && $i<20) $cc='red';
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
	
	if($l>0 && $l<20) $ec='red';
	elseif($l>20 && $l<=40) $ec='grey';
	elseif($l>40 && $l<=60) $ec ='lightblue';
	elseif($l>60 && $l<=80) $ec='darkblue';
	else $ec='green';
            
        } ?>
        
        <?php if($flag==true){ 
        echo '<span class="label label-success">Excellent Performance 100%</span>
                <span class="label label-primary">Good Performance 80%</span>
                <span class="label label-info">Average Performance 60%</span>
                <span class="label label-warning">Bad Performance 40%</span>
                <span class="label label-danger">Worst Performance 20%</span>';
        
        ?>
        <div class="bar" id="bar">
        <span id="high">100</span>
        <span id="low">0</span>
        <div class="item-1" style="height:<?php echo round($cse).'%'?>; background-color:<?php echo $cc?>"><i>CSE</i><span id="val"><?php  echo round($cse).'%'?></span></div>
        <div class="item-2" style="height:<?php echo round($mech).'%'?>;background-color:<?php echo $ct?>"><i>MECH</i><span id="val"><?php  echo round($mech).'%'?></span></div>
        <div class="item-3" style="height:<?php echo round($civil).'%'?>;background-color:<?php echo $cm?>"><i>CIVIL</i><span id="val"><?php  echo round($civil).'%'?></span></div>
        <div class="item-4" style="height:<?php echo round($ece).'%'?>;background-color:<?php echo $ec?>"><i>ECE</i><span id="val"><?php  echo round($ece).'%'?></span></div>
        <?php } ?>
    </div>

</body>
</html>