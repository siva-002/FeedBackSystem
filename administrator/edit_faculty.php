<?php
	extract($_POST);
	if(isset($save))
	{	
	
	if(mysqli_query($conn,"update staff set staff_id='$stid' ,staffname='$name',subject='$sub',coursecode='$ccode',department='$dept',sem='$sem' where coursecode='".$_GET['cc']."' and acyear='".$_GET['ac']."'   "))
			$err="<font color='green'>Faculty Details updated </font>";
			else
			$err="<font color='red'>Faculty Details updated Failed</font>";


	}

$con=mysqli_query($conn,"select * from staff where coursecode='".$_GET['cc']."' and acyear='".$_GET['ac']."'  and department='".$_GET['dept']."'    ");

$res=mysqli_fetch_assoc($con);	

?>


<h1 class="page-header">Update  Faculty</h1>
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
            	<input type="text" value="<?php echo @$res['staff_id'];?>" name="stid" class="form-control" required>
        </div>
   	</div>
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Staff Name:</label>
            	<input type="text" value="<?php echo @$res['staffname'];?>" name="name" class="form-control" required>
        </div>
   	</div>


	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Subject:</label>
            	<input type="text" value="<?php echo @$res['subject'];?>" name="sub" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Course Code :</label>
            	<input type="text" value="<?php echo @$res['coursecode'];?>"  name="ccode" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Dept :</label>
			<!--<input  type="text" name="dept" class="form-control" required value="<?php @$res['department']?>"/>-->
          <select  name="dept" class="form-control" required>
		  			<option <?php if($res['department'] =='civil') {echo "selected";}?>>civil </option>
					<option <?php if($res['department'] =='mech') {echo "selected";}?>>mech</option>
					<option <?php if($res['department'] =='ece')  {echo "selected";}?>>ece</option>
					<option <?php if($res['department'] =='cse')  {echo "selected";}?>>cse</option>
					<!--<option <?php if($res['department'] =='eee')  {echo "selected";}?>>EEE</option>
					<option <?php if($res['department'] =='mba')  {echo "selected";}?>>MBA</option>-->



</select>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Sem:</label>
  <select name="sem" class="form-control" required>
  					<option <?php if($res['sem'] =='i') {echo "selected";}?>>i</option>
					<option <?php if($res['sem'] =='ii') {echo "selected";}?>>ii</option>
					<option <?php if($res['sem'] =='iii')  {echo "selected";}?>>iii</option>
					<option <?php if($res['sem'] =='iv')  {echo "selected";}?>>iv</option>
					<option <?php if($res['sem'] =='v')  {echo "selected";}?>>v</option>
					<option <?php if($res['sem'] =='vi')  {echo "selected";}?>>vi</option>
					<option <?php if($res['sem'] =='vii')  {echo "selected";}?>>vii</option>
					<option <?php if($res['sem'] =='viii')  {echo "selected";}?>>viii</option>
	</select>
        </div>
    </div>
	
	<!--<div class="control-group form-group">
    	<div class="controls">
        	<label>Year</label>
  <select type="text"  name="year"class="form-control" required>
  					<option <?php if($res['year'] =='1st year')  {echo "selected";}?>>1st year</option>
					<option <?php if($res['year'] =='2nd year')  {echo "selected";}?>>2nd year</option>
					<option <?php if($res['year'] =='3rd year')  {echo "selected";}?>>3rd year</option>
					<option <?php if($res['year'] =='4th year')  {echo "selected";}?>>4th year</option>

</select>
        </div>
    </div>-->
                  
<!--	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$res['mobile'];?>" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>
-->
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Update  Faculty">
            	<input type="submit" class="btn btn-warning" name="save" value="Reset  Faculty">
        </div>
  	</div>
	</form>


</div>