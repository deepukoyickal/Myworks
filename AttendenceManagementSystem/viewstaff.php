<?php 
include('connection.php');
$sq="SELECT * FROM staff;";
$ex=mysqli_query($con,$sq);
?>
<!DOCTYPE html>
<html>
<head>
	<title>view staffs</title>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
</head>
<body>
<div class="all">
		<center><h2 style="color: white;">Staff details</h2></center>
<div class="container">
	<table border="1" style="width: 100%;" cellspacing="5" cellpadding="5">
		<tr>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Type</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($ex)) {
			echo "<form method=post action='#'><tr><td><input type=text value=".$rows['staff_id']." name=staff_id id='input'></td>";
			echo "<td><input type=text value=".$rows['staff_first_name']." id='input' readonly=''></td>";
			echo "<td><input type=text value=".$rows['staff_last_name']." id='input' readonly=''> </td>";
			echo "<td><input type=text value=".$rows['staff_type']." id='input' readonly=''> </td>";
			echo"</tr></form>";
		}
		?>
	</table>	
</div>
</body>
</html>