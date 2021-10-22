<?php
include('connection.php');
$s="SELECT * FROM department ORDER BY dep_id DESC LIMIT 1";
$se=mysqli_query($con,$s);
$seq=mysqli_fetch_assoc($se);
$id=$seq['dep_id'];
$id=$id+1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>add department</title>
</head>
<style type="text/css">
	body
		{
			background: #7E7B33;
		}
		.all
		{
			position: absolute;
			top: 10%;
			left: 10%;
			width: 60%;
			background-color: #100F67;
		}
		.container
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #1F688A;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.box
		{
			width: 200px;
			height: 50px;
			align-content: center;
			background:none;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.button
		{
		width: 200px;
			height: 30px;
			align-content: center;
			background:none;
			margin: 10px;
			transition: .1s;
			text-align: center;	

		}
		#submit,#cancel,#update
		{
			width: 100%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;

		}
		#submit:hover,#cancel:hover,#update:hover
		{
			transform: scale(1.1);
			z-index: 2;
			font-weight: bolder;
		}
		#submit
		{
			background-color: #08F60F;
		}
		#cancel
		{
			background-color: #FD072C;
		}
		#update
		{
			background-color: #0769FD;
		}
		.block
		{
			
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #77AFAB;
			display: flex;
			flex-direction: row;
			justify-content: center; 
		}
		.inb
		{
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40%;
		}
</style>
<body>
	<div class="department">
<table class='department'>
	<form method="post" action="#">
	<div class="all">
		<center><h2 style="color: white;">Add a new course</h2></center>
<div class="container">
	<div class="box"><label>Dep_id</label><br/><input type="text" class="inb" name="dep_id" readonly="" value='<?php echo $id ?>' /></div>
	<div class="box"><label>Dep_name</label><br/><input type="text" class="inb" name="dep_name" autocomplete="off" /></div>	
</div>
<div class="block">
	<div class="button"><input type="submit" value="Add department" id="submit"/></div>
 		<div class="button"><input type="reset" value="cancel" id="cancel"/></div>
</div>
</div>
</form>
</div>
<?php
include('connection.php');
if(isset($_POST['dep_id'])&&isset($_POST['dep_name']))
{
$sql="INSERT INTO department (dep_id,dep_name) VALUES ('$_POST[dep_id]','$_POST[dep_name]');";
//$user="INSERT INTO users(userno,status,userid,password) VALUES('$_POST[dep_id]','$_POST[dep_name]');";
if(mysqli_query($con,$sql))
	echo "<script type=text/javascript>
        alert('new department added');
      </script>";
else
	echo "<script type=text/javascript>
        alert('not added');
      </script>";
      //header('Location:'.$_SERVER['HTTP_REFERER']);
  }
?>
</body>
</html>
