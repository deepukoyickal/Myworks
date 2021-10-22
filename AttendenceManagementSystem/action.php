<?php 
session_start();
include('connection.php');
$id=$_POST['id'];
$day=$_POST['day'];
$hour1=$_POST['hour1'];
$hour2=$_POST['hour2'];
$hour3=$_POST['hour3'];
$hour4=$_POST['hour4'];
$hour5=$_POST['hour5'];
echo $hour1;
echo $hour2;
echo $hour3;
		$sq="UPDATE daily_student SET hour1='$hour1',hour2='$hour2',hour3='$hour3',hour4='$hour4',hour5='$hour5' WHERE id='$_POST[id]' AND day='$day';";

	if ($hour1=='present'&&$hour2=='present'&&$hour3=='present'&&$hour4=='present'&&$hour5=='present') 
	{
			$att2="UPDATE daily_student SET attendance='present',score='1' WHERE id='$id' AND day='$day'";
			mysqli_query($con,$att2);
	}
	else if($hour1=='absent'&&$hour2=='absent'&&$hour3=='absent'&&$hour4=='absent'&&$hour5=='absent')
	{
			$att2="UPDATE daily_student SET attendance='absent',score='0' WHERE id='$id' AND day='$day';";
			mysqli_query($con,$att2);
	}
	else if (($hour1=='absent'||$hour2=='absent'||$hour3=='absent')&&($hour4=='present'&&$hour5=='present'))
	{
			$att2="UPDATE daily_student SET attendance='half_day',score='.5' WHERE id='$id' AND day='$day'";
			mysqli_query($con,$att2);
	}
	else if (($hour1=='present'||$hour2=='present'||$hour3=='present')&&($hour4=='absent'||$hour5=='absent')) 
	{
			$att2="UPDATE daily_student SET attendance='half_day',score='.5' WHERE id='$id' AND day='$day'";
			mysqli_query($con,$att2);
		
	}
	$re=mysqli_query($con,$sq);
	if($re)
	{
	echo "<script type=text/javascript>
			alert('updated')
			</script>";
	}
	else
	echo "<script type=text/javascript>
			alert('not updated')
			</script>";
			//header("Location:".$_SERVER['HTTP_REFERER']);
?>