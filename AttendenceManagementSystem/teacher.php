<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
</head>
<body>
<div class="main">
 	<div class="sidebar">
 		<div class="header">
 		<center><h1 id="title">SMART REGISTER</h1>
 		</center></div>
 		<div class="icon"><center><h2>Teacher's page</h2><img src="images/teachericon.png" alt="adminicon" id="image2"></image></center></div>
 		<!-- <div class="si"> -->
 			<!-- <a href="teacher.php?page=attendanceregister"><div id="click">Student attendance</div></a><br>
			<a href="teacher.php?page=staffreport"><div id="click">Attendance report of staffs</div></a><br>
			<a href="teacher.php?page=studentreport"><div id="click">Attendance report of students</div></a><br>
			<a href="teacher.php?page=classreport"><div id="click">Report for a class</div></a><br>
			<a href="teacher.php?page=logout"><div id="click">Logout</div></a><br> -->
			<div class="call"><br/>
 			<a href="teacher.php?page=dailyattendance"><div id="click11">Student Daily Attendance</div></a><br>
 			<a href="teacher.php?page=attendanceregister"><div id="click11">Student Hourly Attendance</div></a><br>
			<a href="teacher.php?page=staffreport"><div id="click11">Attendance Report of Staffs</div></a><br>
			<a href="teacher.php?page=studentreport"><div id="click11">Attendance Report of students</div></a><br>
			<a href="teacher.php?page=classreport"><div id="click11">Class Report</div></a><br>
	 		<a href="teacher.php?page=settings"><div id="click11">Settings</div></a><br>
			<a href="teacher.php?page=logout"><div id="click11">Logout</div></a><br>
	 	</div>
	 </div>
		</div>
	 	</div>
	<div class="menubar">
			<!-- <div id="previous"><a href="#">Go back</a></div>
			<div id="logout"><a href="logout.php">Log out</a></div>  -->
			 <label id='titleone'>SMART REGISTER</label></marquee>
	</div>
	<div class="content">

		<?php 
		if(isset($_GET['page']))
		{
			echo "<div>";
		$p=$_GET['page'];
		$page=$p.".php";
		if(file_exists($page))
		include($page);
		echo"</div>";
		}
		else
		{
			echo "<div><p id='welcome'>WELCOME TO SMART REGISTER</p></div>";
		}
		
		?>
	</div>
</div>
</body>
</html>