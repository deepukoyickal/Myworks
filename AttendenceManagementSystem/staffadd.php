<?php 
include('connection.php');
$s="SELECT * FROM staff ORDER BY staff_id DESC LIMIT 1";
$se=mysqli_query($con,$s);
$seq=mysqli_fetch_assoc($se);
$id=$seq['staff_id'];
$id=$id+1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add staff</title>
	<script type="text/javascript">
		function check()
		{
			//alert('success');
			var reg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/;
			var first_name=document.getElementById('staff_first').value;
			var last_name=document.getElementById('staff_last').value;
			var date_birth=document.getElementById('staff_dob').value;
			var gender=document.getElementById('staff_gender');
			var gender1=document.getElementById('staff_gender1');
			var house_num=document.getElementById('staff_house_no').value;
			var house_name=document.getElementById('staff_house_name').value;
			var street=document.getElementById('staff_street').value;
			var phone_num=document.getElementById('staff_ph_no').value;
			var OK = reg.exec(phone_num);
			var phlength=phone_num.length;
			
			if(gender.checked==false && gender1.checked==false)
			{
				alert('select a gender');
				return false;
			}
			if(!OK&&phlength<10)
				{
				alert("phone number not valid");
				return false;
			    }
			if(first_name == "" || last_name == "" || date_birth == "" || house_num == "" || house_name == "" || street == "")
				{
				alert("Some details are missing!");
				return false;
			    }
			if(gender1 == "" && gender2 == "")
			{
				alert("please select gender!");
				return false;
			}
			 else
			 {
			 	return true;
			 }
		}
	</script>
	<style type="text/css">
		body
		{
			background: #7E7B33;
		}
		.all
		{
			position: absolute;
			top: 10%;
			left: 10%;
			width: 60%;
			background-color: #100F67;
		}
		.container
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #1F688A;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.box
		{
			padding: 5px;
			width: 250px;
			height: 50px;
			align-content: center;
			background: none;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.button
		{
		width: 200px;
			height: 30px;
			align-content: center;
			background:none;
			margin: 10px;
			transition: .1s;
			text-align: center;	

		}
		#submit,#cancel,#update
		{
			width: 100%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;

		}
		#submit:hover,#cancel:hover,#update:hover
		{
			transform: scale(1.1);
			z-index: 2;
			font-weight: bolder;
		}
		#submit
		{
			background-color: #08F60F;
		}
		#cancel
		{
			background-color: #FD072C;
		}
		#update
		{
			background-color: #0769FD;
		}
		.block
		{
			
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #77AFAB;
			display: flex;
			flex-direction: row;
			justify-content: center; 
		}
		.inb
		{
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40%;
		}
	</style>
</head>
<body>
<!-- <div class='staffadd'> -->
	<!--<h3><center>Add New Staff</center></h3>
	<form method="post" action="stafftable.php">
		<table class='inputdata'>
			<tr>
				<td id='input'><label>Staff Id:</label></td><td><input type="text" name="staff_id"></td>
			</tr>
			<tr>
				<td id='input'><label>First Name:</label></td><td><input type="text" name="staff_first"></td>
			</tr>
			<tr>
				<td id='input'><label>Last Name:</label></td><td><input type="text" name="staff_last"></td>
			</tr>
			<tr>
				<td id='input'><label>Gender:</label></td><td style="color: white;font-size:15px;"><input type="radio" name="staff_gender" value="male" >Male<input type="radio" name="staff_gender" value="female">Female</td>
			</tr>
			<tr>
				<td id="input"><label>Date of Birth:</label></td><td><input type="date" name="staff_dob"></td>
			</tr>
			<tr>
				<td id='input'><label>Type:</label></td>
				<td><select name=staff_type>
				<option selected=none >Teaching</option>
				<option>Non-teaching</option>
			    </select></td>
			</tr>
			<tr>
				<td id='input'><label>House no:</label></td><td><input type="text" name="staff_house_no"></td>
			</tr>
			<tr>
				<td id='input'><label>House name:</label></td><td><input type="text" name="staff_house_name"></td>
			</tr>
			<tr>
				<td id='input'><label>Street:</label></td><td><input type="text" name="staff_street"></td>
			</tr>
			<tr>
				<td id='input'><label>District:</label></td><td><select name='staff_district' id="box">
					<option>Trivandrum</option>
					<option>Kollam</option>
					<option>Pathanamthita</option>
					<option>Alapuzha</option>
					<option>Kottayam</option>
					<option>Idukki</option>
					<option>Eranakulam</option>
					<option>Trissur</option>
					<option>Palakad</option>
					<option>Malapuram</option>
					<option>Vayanadu</option>
					<option>Kozhikod</option>
					<option>kannur</option>
					<option>Kasargod</option>
					</select></td>
				</select></td>
			</tr>
			<tr>
		    <td id='input'><label>Ph.no</label></td><td><input type="text" name="staff_ph_no"></td>
		    </tr>
			<tr>
				<td></td><td><input type="reset" name="" value="Cancel"><input type="submit" name="" value="Submit"></td>
			</tr>
	</form>
</div>-->
<form method="post" action="#" onsubmit="return check();">
	<div class="all">
		<center><h2 style="color: white;">Add new staff</h2></center>
<div class="container">
	<div class="box"><label>Staff Id</label><br/><input type="text" class="inb" name="staff_id" value="<?php echo $id ?>" readonly="" /></div>
	<div class="box"><label>First Name</label><br/><input type="text" class="inb" name="staff_first" id="staff_first" /></div>
	<div class="box"><td><label>Last Name</label><br/><input type="text" class="inb" name="staff_last" id="staff_last" /></td></div>
	<div class="box"><label>Gender</label><br/><input type="radio" name="staff_gender" id="staff_gender" />Male
		<input type="radio" name="staff_gender" id="staff_gender1" >Female</div>
	
</div>
<div class="container">
	<div class="box"><label>Date of birth</label><br/><input type="date" class="inb" name="staff_dob" id="staff_dob" /></div>
	<div class="box"><label>Type</label><br/><select class="inb" name="staff_type" id="staff_type" >
					<option>Teaching</option>
					<option>Non-Teaching</option>
					</select>
				    </div>

	<div class="box"><label>House No</label><br/><input type="text" class="inb" name="staff_house_no" id="staff_house_no" /></div>
	<div class="box"><td><label>House Name</label><br/><input type="text" class="inb" name="staff_house_name" id="staff_house_name" /></td></div>
</div>
<div class="container">
	<div class="box"><label>Street</label><br/><input type="text" class="inb" name="staff_street" id="staff_street" /></div>
	<div class="box"><label>District</label><br/>
		<select name="district" />
		            <option>Trivandrum</option>
					<option>Kollam</option>
					<option>Pathanamthita</option>
					<option>Alapuzha</option>
					<option>Kottayam</option>
					<option>Idukki</option>
					<option>Eranakulam</option>
					<option>Trissur</option>
					<option>Palakad</option>
					<option>Malapuram</option>
					<option>Vayanadu</option>
					<option>Kozhikod</option>
					<option>kannur</option>
					<option>Kasargod</option>
	</select>
	</div>
	<div class="box"><label>Phone</label><input type="text" class="inb" name="staff_ph_no" id="staff_ph_no" value="+91" /></div>
</div>
<div class="block">
	<div class="button"><input type="submit" value="submit" id="submit" name="addstaff" /></div>
 		<div class="button"><input type="reset" value="cancel" id="cancel"/></div>
</div>
</div>
</form>
</body>
<?php
$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
if(isset($_POST['addstaff']))
{
$sql6="INSERT INTO staff(staff_id,staff_first_name,staff_last_name,staff_gender,staff_dob,staff_type,staff_house_no,staff_house_name,staff_street,staff_district,staff_ph_no) VALUES ('$_POST[staff_id]','$_POST[staff_first]','$_POST[staff_last]','$_POST[staff_gender]','$_POST[staff_dob]','$_POST[staff_type]','$_POST[staff_house_no]','$_POST[staff_house_name]','$_POST[staff_street]','$_POST[district]','$_POST[staff_ph_no]');";
$sql7=mysqli_query($con,$sql6);
if($sql7)
	echo"<script>alert('new staff added successfully')</script>";
else
	echo"<script>alert('cannot add staff!!!!')</script>";

}
?>
</html>