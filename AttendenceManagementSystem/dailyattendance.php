<?php
if (session_id() == '') {
   session_start();
  }
$dep=$_SESSION["dep"];
$day=$_SESSION["day"];
$sem=$_SESSION["sem"];
$day=date('Y-m-d');
include('connection.php');
$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
		if(mysqli_fetch_array($s2)==null)
		{
			//echo "failed";
		$next="INSERT INTO daily_student(id,std_first_name,std_last_name,std_sem,std_course) SELECT std_id,std_first_name,std_last_name,std_sem,std_course FROM student WHERE std_sem='$sem' AND std_course='$dep'";
		$exec=mysqli_query($con,$next);
		$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
		
	}
	else {
		$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
	}
     $d="INSERT INTO working_days(working_day) values('$day');";
     mysqli_query($con,$d);

?>
<!DOCTYPE html>
<html>
<head>

	<title>Daily attendance</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
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
				document.getElementById(v).style="background-color:#07F227";
			}
			
		}
		function update()
		{
				$( ".staff" ).load(window.location.href + " .staff" );
				//alert('check');
				
		}
	</script>
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
			border: 2px solid black;
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
		<h1>Daily Attendence Register</h1>
		<table border="3" cellpadding="10" cellspacing="3">
	    <tr>
	    	<th>Student Id</th>
	    	<th>first_name</th>
	    	<th>last_name</th>
	    	<th colspan="2">attendance</th>
	    </tr>
	    	<?php
	    	while ($rows=mysqli_fetch_array($s2))
	        {
	    	    echo "<tr>
	    	    	<form method='post'>
	    	    		<td id=box><input type=text value=".$rows['id']." readonly=readonly id=data name='std_id' ></td>
	    	    		<td id=box><input type=text value=".$rows['std_first_name']." readonly=readonly id=data></td>
	 
	    	    		<td id=box><input type=text value=".$rows['std_last_name']." readonly=readonly id=data></td>";
	    	    		if($rows['attendance']=='absent')
	    	    		{
	    	    			echo "<td id='button' >
	    	    			<input type=text value=".$rows['attendance']." readonly='' id=".$rows['id']." onclick=myfunction(id); class=att name=action style='background:#FE0418' ></td>";
	    	    		}
	    	    		else
	    	    		{
	    	    		echo"<td id=button><input type=text value=".$rows['attendance']." readonly=readonly  id=".$rows['id']." onclick=myfunction(id); class=att name=action style='background:#14FE04' ></td>";
	    	    	    }
	    	    		echo"<input type=hidden id=day name=day>
	    	    		<td id=box><input type=submit value=Update id=submit name='attendance' ></tr></form>";
	    	}
	    	if(isset($_POST['attendance']))
	    	{
	    		echo $_POST['action'];
	    		if($_POST['action']=='present')
	    		{
	    		$sq="UPDATE daily_student SET hour1='present',hour2='present',hour3='present',hour4='present',hour5='present',attendance='present',score='1' WHERE id='$_POST[std_id]' AND day='$day';";
	    		$sqe=mysqli_query($con,$sq);
	    		}
	    		if($_POST['action']=='absent')
	    		{
	    			$sq="UPDATE daily_student SET hour1='absent',hour2='absent',hour3='absent',hour4='absent',hour5='absent',attendance='absent',score='0' WHERE id='$_POST[std_id]' AND day='$day';";
	    		$sqe=mysqli_query($con,$sq);
	    		}
	    		echo "<script>update();</script>";
	    	}
	    	?>
	    </table>
	</div>
	</div>
</center>
</body>
</html>