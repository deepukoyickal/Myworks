<?php
include('connection.php');
$teach="SELECT * FROM staff WHERE staff_type='teaching';";
$nonteach="SELECT * FROM staff WHERE staff_type='non-teaching';";
$exec1=mysqli_query($con,$teach);
$exec2=mysqli_query($con,$nonteach);
?>
<!DOCTYPE html>
<html>
<head>
	<title>update staff</title>
	<script type="text/javascript">
	</script>
	<link rel="stylesheet" type="text/css" href="css/updatestaffstyle.css">
</head>
<body>
<div class="all">
		<center><h2 style="color: white;">Update teaching staff details</h2></center>
<div class="container">
	<table border="1" style="width: 100%;" cellspacing="5" cellpadding="5">
		<tr>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($exec1)) {
			echo "<form method=post action='#'><tr><td><input type=text value=".$rows['staff_id']." name=staff_id id='input' readonly=''></td>";
			echo "<td><input type=text value=".$rows['staff_first_name']." id='input' name=first ></td>";
			echo "<td><input type=text value=".$rows['staff_last_name']." id='input' name=last > </td>";
			echo "<td><input type=text value=".$rows['staff_type']." id='input' name=type > </td>";
			echo "<td><input type=submit value=update  name=update id='update' onClick='reload();'></td></tr></form>";
		}
		
		?>
	</table>
</div>
	<center><h2 style="color: white;">Update non-teaching staff details</h2></center>
<div class="container1">
	<table border="1" style="width: 100%;" cellspacing="5" cellpadding="5">
		<tr>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($exec2)) {
			echo "<form method=post action='#'><tr><td><input type=text value=".$rows['staff_id']." name=staff_id id='input' readonly='' ></td>";
			echo "<td><input type=text value=".$rows['staff_first_name']." id='input' name=first ></td>";
			echo "<td><input type=text value=".$rows['staff_last_name']." id='input' name=last > </td>";
			echo "<td><input type=text value=".$rows['staff_type']." id='input' name=type > </td>";
			echo "<td><input type=submit value=update  name=update id='update' onClick='window.location.reload();'></td></tr></form>";
		}
		?>
		</table>	
</div>
</div>
</body>
<?php
if(isset($_POST['update']))
{
$up="UPDATE staff SET staff_first_name='$_POST[first]',staff_last_name='$_POST[last]',staff_type='$_POST[type]' where staff_id='$_POST[staff_id]';";
$exec=mysqli_query($con,$up);
if($exec)
{
	echo "<script>window.location.reload();alert('updated');</script>";
}
else
{
	echo "<script>alert('not updated')</script>";
}
}
?>
</html>