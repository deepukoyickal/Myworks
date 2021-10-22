<?php
//session_start();
$dayorginal=DATE('Y-m-d');
//echo $dayorginal;
include('connection.php');
$sql="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='teaching';";
$s2=mysqli_query($con,$sql);
if(mysqli_num_rows($s2)==0)

{
	$next="INSERT INTO staff_attendance(staff_id,staff_first_name,staff_last_name,type) SELECT staff_id,staff_first_name,staff_last_name,staff_type FROM staff";
		$exec=mysqli_query($con,$next);
		$sql="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='teaching';";
		$s2=mysqli_query($con,$sql);
		
}
else
{
	$sql="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='teaching';";
		$s2=mysqli_query($con,$sql);
}
$sql1="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='non-teaching';";
$non=mysqli_query($con,$sql1);
if(mysqli_num_rows($non)==0)
{
		$next1="INSERT INTO staff_attendance(staff_id,staff_first_name,staff_last_name,type) SELECT staff_id,staff_first_name,staff_last_name,staff_type FROM staff";
		$exec1=mysqli_query($con,$next1);
		$sql1="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='non-teaching';";
		$non=mysqli_query($con,$sql1);
		
}
else
{
	$sql1="SELECT * FROM staff_attendance WHERE day='$dayorginal' AND type='non-teaching';";
		$non=mysqli_query($con,$sql1);
}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Staff attendance</title>
	<script type="text/javascript">
		function myfunction(v)
		{
			var day=document.getElementById(v).value;
			if(day=='present')
			{ 
				document.getElementById(v).value="absent";
			   document.getElementById(v).style="background-color:#F62715";
			}
			else
			{
				document.getElementById(v).value="present";
				document.getElementById(v).style="background-color:green";
			}
			
		}
		function myfunction2()
		{
			var today=new Date();
			var year=today.getFullYear();
			var month=today.getMonth()+1;
			var day=today.getDate();
			if(day<10)
				day='0'+day;
			if(month<10)
				month='0'+month;
			var temp=year+"-"+month+"-"+day;
			document.getElementById('day')
		}
	</script>
	<style type="text/css">
		#data
		{
			border-width: 0;
			background: none;
			text-align: center;
			font-size: 18px;
			font-family: Times New Roman;
		}
		#box
		{
			background-color: #71EDEF;

		}
		#button
		{
			background-color: #466461;
			border-radius: 10px;
		}
		.att
		{
			width: 200px;
			height: 30px;
			font-weight: bold;
			border-width: 0;
			text-align: center;
			border-radius: 5px;
			background-color:  #B6F648;
		}
		th
		{
			text-align: center;
			background-color: #366DA8;
			font-weight: bolder; 
			height: 30px;
		}
		#submit
		{
			width: 150px;
			height: 30px;
			background: #04F6FE;
			border-radius: 5px;
			border:2px solid black;
			font-weight: bolder;
		}
		#submit:hover
		{
			transform: scale(1.2);
			z-index: 2;
		}
		.staff
		{
			
			position: absolute;
			top: 5%;
			left: 5%;
		}
		.staff1
		{
			position: relative;
		}
	</style>
</head>
<body onload="myfunction2();">
<center>
	<div class="staff">
		<h1>Teaching Staff Attendence Register</h1>
		<table border="3" cellpadding="10" cellspacing="3">
	    <tr>
	    	<th>Staff Id</th>
	    	<th>Staff_first_name</th>
	    	<th>Staff_last_name</th>
	    	<th colspan="2">attendance</th>
	    </tr>
	    	<?php
	    	while ($rows=mysqli_fetch_array($s2))
	        {
	    	    echo "<tr>
	    	    	<form method=post action=staffday.php>
	    	    		<td id=box><input type=text value=".$rows['staff_id']." readonly=readonly id=data name=staff_id></td>
	    	    		<td id=box><input type=text value=".$rows['staff_first_name']." readonly=readonly id=data></td>
	    	    		<input type='hidden' value=".$rows['type']." name='type'>
	    	    		<td id=box><input type=text value=".$rows['staff_last_name']." readonly=readonly id=data></td>";
	    	    		if($rows['staff_attendance']=='absent')
	    	    		{
	    	    			echo "<td id='button' >
	    	    			<input type=text value=".$rows['staff_attendance']." readonly='' id=".$rows['staff_id']." onclick=myfunction(id); class=att name=attendance style='background:#FE0418' ></td>";
	    	    		}
	    	    		else
	    	    		{
	    	    		    echo"<td id=button><input type=text value=".$rows['staff_attendance']." readonly=readonly  id=".$rows['staff_id']." onclick=myfunction(id); class=att name=attendance style='background:#14FE04' ></td>";
	    	    	    }
	    	    		 echo"<input type=hidden id=day name=day>
	    	    		<td id=box><input type=submit value=Update id=submit ></tr></form>";
	    	}
	    	?>
	</table>
		<div class="staff1">
		<h1>Non-Teaching Staff Attendence Register</h1>
		<table border="3" cellpadding="10" cellspacing="3">
	    <tr>
	    	<th>Staff Id</th>
	    	<th>Staff_first_name</th>
	    	<th>Staff_last_name</th>
	    	<th colspan="2">attendance</th>
	    </tr>
	    	<?php
	    	while ($rows1=mysqli_fetch_array($non))
	        {
	    	    echo "<tr>
	    	    	<form method=post action=staffday.php>
	    	    		<td id=box><input type=text value=".$rows1['staff_id']." readonly=readonly id=data name=staff_id></td>
	    	    		<td id=box><input type=text value=".$rows1['staff_first_name']." readonly=readonly id=data></td>
	    	    		<td id=box><input type=text value=".$rows1['staff_last_name']." readonly=readonly id=data></td>
	    	    		<input type='hidden' value=".$rows1['type']." name='type'>";
	    	    		//echo"<td id=button><input type=text value=".$rows1['staff_attendance']." readonly=readonly  id=".$rows1['staff_id']." onclick=myfunction(id); class=att name=attendance></td>";
	    	    		if($rows1['staff_attendance']=='absent')
	    	    		{
	    	    			echo "<td id='button' >
	    	    			<input type=text value=".$rows1['staff_attendance']." readonly='' id=".$rows1['staff_id']." onclick=myfunction(id); class=att name=attendance style='background:#FE0418' ></td>";
	    	    		}
	    	    		else
	    	    		{
	    	    		    echo"<td id=button><input type=text value=".$rows1['staff_attendance']." readonly=readonly  id=".$rows1['staff_id']." onclick=myfunction(id); class=att name=attendance style='background:#14FE04' ></td>";
	    	    	    }
	    	    		echo"<input type=hidden id=day name=day>
	    	    		<td id=box><input type=submit value=Update id=submit ></tr></form>";
	    	}
	    	?>
	   
	    </table>
	</div>
	</div>
</center>
</body>
</html>