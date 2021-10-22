<?php
session_start();
$_SESSION['day']=$_POST['day'];
$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
$username=$_POST['username'];
$password=$_POST['password'];
$temp=0;
$sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."' limit 1";
$re=mysqli_query($con,$sql);
	$row=mysqli_fetch_row($re);
	$user=$row[0];
	if($user=='Admin')
		include('admin.php');
	else if($user=='Staff')
	{
		include('intermediate.php');
		//echo"success";
	}
	else
	{
		echo "<html><head><script type=text/javascript>
			alert('user name or password are incorrect')
			</script></head></html>";
			$temp=1;
	}
	if($temp==1)
	{
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
	
?>
		