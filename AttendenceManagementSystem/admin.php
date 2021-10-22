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
 		<div class="icon"><center><h2>Admin Panel</h2><img src="images/businessman.png" alt="adminicon" id="image"></image></center></div>
 		<div class="call"><br/>
 			<!-- <button id="buttons"><a href="admin.php?page=studentadd">Add Course</a></button> -->
 			<a href="admin.php?page=adddepartment" tabindex="1"><div  tabindex="1" id="click">Add Course</div></a><br>
			<a href="admin.php?page=studentadd"><div id="click">Add student</div></a><br>
			<a href="admin.php?page=staffadd"><div id="click">Add staff</div></a><br>
			<a href="admin.php?page=removestudent"><div id="click">Remove student</div></a><br>
			<a href="admin.php?page=removestaff"><div id="click">Remove staff</div></a><br>
	 		<a href="admin.php?page=settings"><div id="click">Settings</div></a><br>
			<a href="admin.php?page=logout"><div id="click">Logout</div></a><br>
	 	</div>
	 </div>
	<div class="menubar">
		    <a href="admin.php?page=staffattendance1"><div id="click1">Staff Attendance</div></a>
			<a href="admin.php?page=updatestudent"><div id="click1">Update student</div></a>
			<a href="admin.php?page=updatestaff"><div id="click1">Update staff</div></a>
			<a href="admin.php?page=staffreport"><div id="click1">Staff report</div></a>
			<a href="admin.php?page=studentreportadmin"><div id="click1">Student report</div></a>
			<a href="admin.php?page=viewstudent"><div id="click1">View Students</div></a>
			<a href="admin.php?page=viewstaff"><div id="click1">view Staffs</div></a>
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
	</di


	v>
</div>
</body>
</html>