<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'index');
$sql="SELECT dep_name from department"; 
$dep=mysqli_query($con,$sql);
$s="SELECT std_id FROM student ORDER BY std_id DESC LIMIT 1";
$se=mysqli_query($con,$s);
$seq=mysqli_fetch_assoc($se);
$id=$seq['std_id'];
$id=$id+1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add student</title>
	<script type="text/javascript">
		function check()
		{
			var reg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/;
			var first_name=document.getElementById('std_first').value;
			var last_name=document.getElementById('std_last').value;
			var date_birth=document.getElementById('std_dob').value;
			var gender=document.getElementById('std_gender');
			var gender1=document.getElementById('std_gender1');
			var house_num=document.getElementById('std_house_no').value;
			var house_name=document.getElementById('std_house_name').value;
			var street=document.getElementById('std_street').value;
			var district=document.getElementById('std_district').value;
			var parent_name=document.getElementById('parent_name').value;
			var phone_num=document.getElementById('std_ph_no').value;
			var OK = reg.exec(phone_num);
			var phlength=phone_num.length;
			if(gender.checked==false && gender1.checked==false)
			{
				alert('select a gender');
				return false;
			}
			//alert(document.getElementById('std_gender').value);
			if(!OK&&phlength<10)
				{
				alert("phone number not valid");
				return false;
			    }
			if(first_name == "" || last_name == "" || date_birth == "" || house_num == "" || house_name == "" || street == "" || district == "" || parent_name == "")
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
		function refresh()
		{
			$( ".all" ).load(window.location.href + " .all" );
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
			top: 5%;
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
			border:1px solid #1803FA;

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
		#select
		{
			text-align: center;
			align-content: center;
			justify-content: center;
		}
		#hd
		{
			color: #DAEBEA;
			font-family: Times-new-roman;
			font-size: 25px;
			font-weight: bold;
		}
	</style>
</head>
<body>
<form method="post" action="#" onsubmit="return check();">
	<div class="all">
		<center><h2 id='hd'>Add new student</h2></center>
<div class="container">
	<div class="box"><label>Admission Number</label><br/><input type="text" class="inb" name="std_id" value="<?php echo $id ?>" /></div>
	<div class="box"><label>First Name</label><br/><input type="text" class="inb" id="std_first" name="std_first" autocomplete="off" /></div>
	<div class="box"><td><label>Last Name</label><br/><input type="text" class="inb" id="std_last" name="std_last" autocomplete="off" /></td></div>
	<div class="box"><label>Date of birth</label><br/><input type="date" class="inb" id="std_dob" name="std_dob"/></div>
	
</div>
<div class="container">
	<div class="box"><label>Gender</label><br/><input type="radio" id="std_gender" name="std_gender" value="male" />Male
		<input type="radio" name="std_gender" id="std_gender1"  value="female" >Female</div>
	<div class="box"><label>Semester</label><br/>
		<select name='std_semester' class="inb" id="select">
					<option selected="selected" id="select">1</option>
					<option id="select">2</option>
					<option id="select">3</option>
					<option id="select">4</option>
					<option id="select">5</option>
					<option id="select">6</option>
				</select></div>
				<div class="box"><label>Course</label><br/>
		<select name='std_course' id="std_course" class="inb">
					<?php
				while ($rows=mysqli_fetch_array($dep))
				 {
				echo"<option>".$rows['dep_name']."</option>";	
				 }
				?>
			</select>
		</div>
	
</div>
<div class="container">
	<div class="box"><label>House No</label><br/><input type="text" class="inb" id="std_house_no" name="std_house_no" autocomplete="off" /></div>
	<div class="box"><td><label>House Name</label><br/><input type="text" class="inb" id="std_house_name" name="std_house_name" autocomplete="off" /></td></div>
	<div class="box"><label>Street</label><br/><input type="text" class="inb" id="std_street" name="std_street" autocomplete="off"/></div>
</div>
<div class="container">
	<div class="box"><label>District</label><select id="std_district" name='std_district' class="inb" autocomplete="off">
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
	<div class="box"><label>Parent's name</label><input type="text" class="inb" id="parent_name" name="parent_name" autocomplete="off" /></div>
	<div class="box"><label>Phone</label><input type="text" class="inb" id="std_ph_no" name="std_ph_no" value="+91" autocomplete="off" /></div>
</div>
<div class="block">
	<div class="button"><input type="submit" value="submit" id="submit" name="addstudent" /></div>
 		<div class="button"><input type="reset" value="cancel" id="cancel"/></div>
</div>
</div>
</form>
</body>
<?php

$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
if(isset($_POST['addstudent']))
{
	
$sql3="INSERT INTO student(std_id,std_first_name,std_last_name,std_gender,std_dob,std_course,std_sem,std_house_no,std_house_name,std_street,std_ph,std_parent,std_district) VALUES ('$_POST[std_id]','$_POST[std_first]','$_POST[std_last]','$_POST[std_gender]','$_POST[std_dob]','$_POST[std_course]','$_POST[std_semester]','$_POST[std_house_no]','$_POST[std_house_name]','$_POST[std_street]','$_POST[std_ph_no]','$_POST[parent_name]','$_POST[std_district]');";
$sql4=mysqli_query($con,$sql3);
if($sql4)
{
	echo"<script>alert('new student added successfully');
	refresh();</script>";

}
else
	echo"<script>alert('cannot add student!!!!')</script>";

}
?>
</html>