<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<script type="text/javascript">
		function update()
		{
			var v=confirm('do you want to change password');
			document.getElementById('confirm').value=v;
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/settingsstyle.css">
		
</head>
<body>
<div class="all">
	<h2><center>Change Password</center></h2>
	<form method="post">
		<div class="container">
		<div class="box"><input type="text" class="inb" name="username" placeholder="User Name" required="hello" /></div>
	</div>
	<div class="container">
		<div class="box"><input type="Password" class="inb" name="currentpassword" placeholder="Current Password" required="hello" /></div>
	</div>
	<div class="container">
		<div class="box"><input type="Password" class="inb" name="newpassword" placeholder="New Password" required="" /></div>
	</div>
	<div class="container">
		<div class="box"><input type="Password" class="inb" name="confirmpassword" placeholder="Re-enter New Password" required="" /></div>
	</div>
	<div class="container">
		<div class="box">
			<input type="hidden" name="confirm" id="confirm">
			<input type="submit" name="submit" class="button" value="Change" onclick="update();" ></div>
	</div>
</form>
</div>
<?php
include('connection.php');
if(isset($_POST['submit'])&&isset($_POST['confirm']))
{
	if(($_POST['newpassword']==$_POST['confirmpassword'])&&($_POST['confirm']=='true'))
	{
		$s="SELECT * FROM users where username='$_POST[username]' AND password='$_POST[currentpassword]';";
		$se=mysqli_query($con,$s);
		$row=mysqli_fetch_row($se);
		$user=$row[1];
		$pass=$row[2];
		if(($_POST['username']==$user)&&($_POST['currentpassword']==$pass))
		{
			$sq="UPDATE users SET password='$_POST[newpassword]' WHERE username='$_POST[username]';";
			$sqe=mysqli_query($con,$sq);
			if($sqe)
				echo "<script>alert('password changed successfully');</script>";
		}
		else
		{
			echo "<script>alert('Wrong username or password');</script>";
		}
	}
}
?>
</body>
</html>