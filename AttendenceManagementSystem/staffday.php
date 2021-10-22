<?php 
session_start();
include('connection.php');
$id=$_POST['staff_id'];
$attendance=$_POST['attendance'];
echo $id;
echo $attendance;
echo $_POST['type'];
if($attendance=='present')
{
	$sq="UPDATE staff_attendance SET staff_attendance='$attendance',points='1' WHERE staff_id='$_POST[staff_id]' AND day='$_SESSION[day]' AND staff_id='$id' AND type='$_POST[type]';";
	$s=mysqli_query($con,$sq);
	echo "hello";
	header("Location:".$_SERVER['HTTP_REFERER']);
}
else if($attendance=='absent')
{
	$sq="UPDATE staff_attendance SET staff_attendance='$attendance',points='0' WHERE staff_id='$_POST[staff_id]'  AND day='$_SESSION[day]' AND staff_id='$id' AND type='$_POST[type]';";
	$s=mysqli_query($con,$sq);
	header("Location:".$_SERVER['HTTP_REFERER']);
		
}
?>