<?php
session_start();
$day=Date('Y-m-d');
$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>input form UI design</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url(images/cube.jpg);">
	<div class="box"><center>                           
<img src="images/login.png" style="height: 60px;width: 60px" id="image"></center><br/>
    <h2>Smart Register Login</h2>
		<form action="" method="post">
			<div class="inputBox">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="Password" name="password" required="">
				<label>Password</label>
			</div>
      <center>
      		<input type="hidden" name="day" id="day">
			<input type="submit" name="" value="Login" id="submit">
    </center>
		</form>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['username'])&&isset($_POST['password'])){
//session_start();
//$_SESSION['day']=$_POST['day'];
$username=$_POST['username'];
$password=$_POST['password'];
//$temp=0;
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
	}
	// if($temp==1)
	// {
	// 	header("Location:".$_SERVER['HTTP_REFERER']);
	// }
}	
?>

