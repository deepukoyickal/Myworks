<?php 
include('connection.php');
$sq="SELECT * FROM staff;";
$ex=mysqli_query($con,$sq);
?>
<!DOCTYPE html>
<html>
<head>
	<title>remove staff</title>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type='text/javascript'>
	setInterval(function(){
			$('.container').load(' .container');
			$('#boxa').load(' #boxa');
		},300);
	//alert('hello');
	</script>
</head>
<body>
<div class="all">
		<center><h2 style="color: white;">Remove a staff</h2></center>
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
		while ($rows=mysqli_fetch_array($ex)) {
			echo "<form method=post action='#'><tr><td><input type=text value=".$rows['staff_id']." name=staff_id id='input'></td>";
			echo "<td><input type=text value=".$rows['staff_first_name']." id='input' ></td>";
			echo "<td><input type=text value=".$rows['staff_last_name']." id='input' > </td>";
			echo "<td><input type=text value=".$rows['staff_type']." id='input' > </td>";
			echo "<td><input type=submit value=remove  name=remove id='remove'></td></tr></form>";
		}
		if(isset($_POST['remove']))
		{
			echo "<script>confirm('do you want to remove this staff?');</script>";
			$rem="DELETE FROM staff WHERE staff_id='$_POST[staff_id]';";
			$rem2="DELETE FROM staff_attendance WHERE staff_id='$_POST[staff_id]';";
			$ex=mysqli_query($con,$rem);
			$ex2=mysqli_query($con,$rem2);
			if($ex2!=null)
			{
				echo "<script>alert('staff removed successfully');<script>";
			}
			//$page=$_SERVER['REQUEST_URL'];
			//header("Refresh:0; URL=$page");

		}
		?>
	</table>	
</div>
</body>
</html>