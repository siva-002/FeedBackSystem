
<?php 
extract($_POST);
if(isset($update))
{
//dob
$dob=$yy."-".$mm."-".$dd;
//hobbies
$hob=implode(",",$hob);

$reg=$_SESSION['user'];
$files = glob('images/'.$reg.'/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}

if(!is_dir("images/".$reg)){
   mkdir("images/".$reg); 
}

if(move_uploaded_file($_FILES['img']['tmp_name'],"images/$reg/".$_FILES['img']['name'] )){

$imagelink="images/$reg/".$_FILES['img']['name'] ;
   
}else
$imagelink='';

//$query="update user set name='$n',mobile='$mob',semester='$sem',gender='$gen',hobbies='$hob',dob='$dob' where regno='".$_SESSION['user']."'";
$query="update user set name='$n',email='$e',semester='$sem',gender='$gen',hobbies='$hob',mobile='$mob',image='$imagelink',dob='$dob' where regno='".$_SESSION['user']."'";

//$query="insert into user values('','$n','$e','$pass','$mob','$gen','$hob','$imageName','$dob',now())";
mysqli_query($conn,$query);



$err="<font color='blue'>Profile updated successfully !!</font>";


}


//select old data
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where regno='".$_SESSION['user']."'");
$res=mysqli_fetch_assoc($sql);

?>
<h2 align="center">Update Your Profile</h2>

		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Name</td>
					<Td><input class="form-control" value="<?php echo $res['name'];?>"  type="text" name="n"/></td>
				</tr>
				<tr>
					<td>Regno</td>
					<Td><input class="form-control" value="<?php echo $res['regno'];?>" id="regno"  type="text" name="" readonly/></td>
				</tr>
				<tr>
					<td>Email </td>
					<Td><input class="form-control" type="email"  value="<?php echo $res['email'];?>"  name="e"/></td>
				</tr>
				<tr>
					<td>Department</td>
					<Td><input class="form-control" value="<?php echo $res['programme'];?>"  type="text" name="" disabled/></td>
				</tr>
				<tr>
					<td>Period of Study</td>
					<Td><input class="form-control" value="<?php echo $res['acyear'];?>"  type="text" name="" disabled/></td>
				</tr>
				<tr>
				<tr>
                                <td>Select Your Semester</td>
                                <Td><select name="sem" class="form-control" id="selectsem" required value="<?php echo $res['semester'];?>">
                                
                                <option <?php if($res['semester']=="i"){echo "selected";} ?>>i</option>
                                <option <?php if($res['semester']=="ii"){echo "selected";} ?>>ii</option>
                                <option <?php if($res['semester']=="iii"){echo "selected";} ?>>iii</option>
                                <option <?php if($res['semester']=="iv"){echo "selected";} ?>>iv</option>
                                <option <?php if($res['semester']=="v"){echo "selected";} ?>>v</option>
                                 <option <?php if($res['semester']=="vi"){echo "selected";} ?>>vi</option>
                                <option <?php if($res['semester']=="vii"){echo "selected";} ?>>vii</option>
                                 <option <?php if($res['semester']=="viii"){echo "selected";} ?>>viii</option>
                                </select>
                                </td>
                            </tr>
				
				<tr>
					<td>Enter Your Mobile </td>
					<Td><input class="form-control" type="text"  value="<?php if($res['mobile']=="0")
					echo "";
					
					else
					echo $res['mobile'];
					?>" required name="mob"/></td>
				</tr>
				
				<tr>
					<td>Select Your Gender</td>
					<Td>
				Male<input type="radio" <?php if($res['gender']=="m"){echo "checked";} ?> name="gen" value="m"/>
				Female<input type="radio" <?php if($res['gender']=="f"){echo "checked";} ?> name="gen" value="f"/>	
					</td>
				</tr>
				
				<tr>
					<td>Choose Your hobbies</td>
					<Td>
					<?php 
					$arrr=explode(",",$res['hobbies']);
					?>
					
					
					Learning<input value="learning" <?php if(in_array("learning",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]" checked/>
					Coding<input value="Coding" <?php if(in_array("Coding",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]"/>
					Playing<input value="playing" <?php if(in_array("playing",$arrr)){echo "checked";} ?> type="checkbox" name="hob[]"/>
					</td>
				</tr>
				
				
				<tr>
					<td>Enter Your DOB</td>
					<?php 
					$arrr1=explode("-",$res['dob']);
					?>
					<Td>
					<select class="form-control" style="width:100px;float:left" name="yy">
					<option value="">Year</option>
					<?php 
					for($i=1950;$i<=2016;$i++)
					{
					?>
					<option <?php if($arrr1[0]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					
					</select>
					
					<select class="form-control" style="width:100px;float:left" name="mm">
					<option value="">Month</option>
					<?php 
					for($i=1;$i<=12;$i++)
					{
					?>
					<option <?php if($arrr1[1]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					}					
					?>
					
					</select>
					
 					
					<select class="form-control" style="width:100px;float:left" name="dd">
					<option value="">Date</option>
					<?php 
					for($i=1;$i<=31;$i++)
					{
					?>
					<option <?php if($arrr1[2]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					}					
					?>
					
					</select>
					
					</td>
				</tr>
				<tr>
                                <td>Upload  Your Image </td>
                                <Td><input type="file" name="img" class="form-control" id="img"/></td>
</td>
                            </tr>
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" class="btn btn-success" value="Update My Profile" name="update"/>
<input type="reset" class="btn btn-warning" value="Reset"/>
				
					</td>
				</tr>
			</table>
		</form>
	<script>
        const regnoInput = document.getElementById('regno');
    const semesterSelect = document.getElementById('selectsem');
      const regnoValue = regnoInput.value;
      const regnoArray = Array.from(regnoValue);
      if(regnoArray[9] === '3' || regnoArray[9] === '7'){
     selectsem.options[0].disabled = true;
             selectsem.options[0].style.color='red';
         selectsem.options[1].disabled = true;
             selectsem.options[1].style.color='red';
       }
  
</script>