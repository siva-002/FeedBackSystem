<?php
error_reporting(1);
	include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{		
$q=mysqli_query($conn,"select * from staff where coursecode='$ccode' and acyear='$acyear'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='red'>staff already assigned to $ccode ($sub) for $acyear</font>";
	}
	else
	{	
		if(mysqli_query($conn,"insert into staff values('$stid','$acyear','$name','$sub','$ccode','$dept','$sem')"))
		$err="<font color='green'>New Faculty Successfully Added.</font>";
		else
		$err="<font color='red'>Faculty Add failed.</font>";
		
	/*$subject ="New User Account Creation";
	$from="info@phptpoint.com";
	$message ="User name: ".$user_name." Password ".$pass;
    $headers = "From:".$from;
    mail($email,$subject,$message,$headers);*/
		
	
	}
	}

?>


<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
		
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Staff Id:</label>
            	<input type="text" value="<?php echo @$stid;?>" name="stid" class="form-control" required>
        </div>
   	</div>
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Period of Study:</label>
			<select name="acyear" id="acyear" required class="form-control" value="<?php echo @$acyear;?>">
                                        <option value=""></option>
                                        <option value="2019-2023">2019-2023</option>
                                        <option value="2020-2024">2020-2024</option>
                                        <option value="2021-2025">2021-2025</option>
                                        <option value="2022-2026">2022-2026</option>
                                    </select>
        </div>
   	</div>
	
		<!--<div class="control-group form-group">
    	<div class="controls">
        	<label>Staff Password:</label>
            	<input type="text" value="<?php echo @$stpass;?>" name="stpass" class="form-control" required>
        </div>
   	</div>-->
	
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Staff Name:</label>
            	<input type="text" value="<?php echo @$name;?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Subject:</label>
            	<input type="text" value="<?php echo @$sub;?>" name="sub" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Course Code :</label>
            	<input type="text" value="<?php echo @$ccode;?>"  name="ccode" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Department :</label>
            	<select value="<?php echo @$dept;?>"  name="dept" class="form-control" required>
					<option value=""></option>
					<option value="civil">CIVIL</option>
					<option value="mech">MECH</option>
					<option value="ece">ECE</option>
					<option value="cse">CSE</option>
					<!--<option value="eee">EEE</option>
					<option value="mba">MBA</option>-->
				</select>
        </div>
    </div>
	
<!--	<div class="control-group form-group">
    	<div class="controls">
        	<label>Year:</label>
  <select type="text"  name="year" value="<?php echo @$year;?>" class="form-control" required>
  <option value=""></option>
  <option value="1st year">1st year</option>
  <option value="2nd year">2nd Year</option>
  <option value="3rd year">3rd Year</option>
  <option value="4th year">4th Year</option>
</select>
        </div>
    </div>-->
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Semester</label>
  <select name="sem" class="form-control" required>
					<option value=""></option>
					<option>i</option>
					<option>ii</option>
					<option>iii</option>
					<option>iv</option>
					<option>v</option>
					<option>vi</option>
					<option>vii</option>
					<option>viii</option>
					</select>
        </div>
    </div>
                  
	<!--<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$mob;?>" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>-->
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
				<input type="reset" class="btn btn-warning" name="" value="Reset">
        </div>
  	</div>

	</form>


</div>