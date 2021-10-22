<?php
include('connection.php');
$sq="SELECT * FROM department";
$sqe=mysqli_query($con,$sq);
?>
<!DOCTYPE html>
<html>
<head>
	<title>choose your department</title>
	<link rel="stylesheet" type="text/css" href="css/intermediatestyle.css">
</head>
<body>
<div class="box1">
	<div class="input1">
	<table>
	<form method="post" action="inter.php">
		
		<tr>
		<td colspan="2"><label>Choose Department And Semester</label></td></tr>
		<tr><td colspan="2">
			<?php
				echo"<select name=department id=course1>";
				while ($rows=mysqli_fetch_array($sqe))
				 {
				echo"<option>".$rows['dep_name']."</option>";	
				 }
				?>
		</select>
		<select name="sem" id="sem1">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
		</select>
	</td></tr>
	<tr>
		<td colspan="2"><input type="button" name="" value="Back" id="back1">
		<input type="submit" name="" value="Enter" id="enter1"><td></tr>
	</form>
</table>
</div>
</div>
</body>
</html>