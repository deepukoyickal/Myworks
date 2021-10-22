<?php 
session_start();
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
$id='';
include_once('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>student report</title>
	<script type="text/javascript">
		function check()
		{
			var x=document.getElementById('start').value;
			var y=document.getElementById('end').value;
			if(x == "" || y=="")
			{
				alert("date cannot be empty");
				return false;
			}
			else
				return true;
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/studentstyle.css">
	
	</style>

</head>
<body>
	<form method="post" action="#" onsubmit="return check();">
<div class="all">
		<center><h2 id="h2" style="color: white;">Student attendance report</h2></center>
<div class="container">
	<div class="box"><label>Enter the student Id</label><br/><input type="text" class="inb" name="id" /></div>
	<div class="box"><label>Select a student</label><br/><?php
                      $sq="SELECT std_id,std_first_name,std_last_name FROM student WHERE std_course='$dep' AND std_sem='$sem'";
                      $ex=mysqli_query($con,$sq);
                      echo "<select name=student id=options>";
                      while ($rows=mysqli_fetch_array($ex)) 
                      {
                      	echo"<option>".$rows['std_id']." ".$rows['std_first_name']." ".$rows['std_last_name']."</option>";
                 
                      }
                      echo "</select>";
					 ?></div>
	<div class="box"><label>Starting Date</label><br/><input type="date" id='start'  class="inb" name="start" /></div>
	<div class="box"><label>Ending date</label><br/><input type="date" id='end' class="inb" name="end"  /></div>
	
</div>
<div class="container">
	<!-- <div class="button"><input type="Reset" class="inb" value="Reset details" id="reset" /></div> -->
	<div class="button"><input type="submit" value="Generate Report" class="inb" id="submit"  /></div>
</div>
</form>

	<?php 
	if(isset($_POST['student']))
	{
		echo"<div class='report'>";
	include('connection.php');
$name=$_POST['student'];
$id=$_POST['id'];
$start=$_POST['start'];
$end=$_POST['end'];
if($id==null)
{
	$id=strtok($name," ");
	$idbox="SELECT std_first_name,std_last_name FROM student WHERE std_id='$id';";
	$idexe=mysqli_query($con,$idbox);
	while ($temp=mysqli_fetch_array($idexe)) {
		$sfirst=$temp['std_first_name'];
		$slast=$temp['std_last_name'];
	}
	$sql="SELECT SUM(score) AS score FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$id';";
	$ex=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($ex);
		$score=$rows['score'];
		//echo $score;
	$sql2="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
	$ex2=mysqli_query($con,$sql2);
	$rows2=mysqli_fetch_assoc($ex2);
	$days=$rows2['days'];
	$sum=$score/$days*100;
	$sum=round($sum,2);
	echo"<div class='container'>
	<div class='box'><label>Starting Date</label><br/><input type='text' class='inb' name='start' readonly='' value=".$start."></div>
	<div class='box'><label>Ending date</label><br/><input type='text' class='inb' name='end' readonly='' value=".$end."></div>
	<div class='box'><label>Department</label><br/><input type='text' class='inb'  readonly='' value=".$dep."></div>
	<div class='box'><label>Semester</label><br/><input type='text' class='inb'  readonly='' value=".$sem."></div>
	<div class='box'><label>No.of working_days</label><br/><input type='text' class='inb'  readonly='' value=".$days."></div>
</div>";
	echo "<div class='container'>
	<div class='box'><label>Student Id</label><br/><input type='text' class='inb' readonly='' value=".$id."></div>
	<div class='box'><label>First Name</label><br/><input type='text' class='inb' readonly='' value=".$sfirst."></div>
	<div class='box'><label>Last Name</label><br/><input type='text' class='inb' value=".$slast."></div>
	<div class='box'><label>Attendence percentage</label><br/><input type='text' class='inb readonly=''' value=".$sum." ></div>
</div>";
}
	
else
{
$idbox="SELECT std_first_name,std_last_name FROM student WHERE std_id='$id';";
	$idexe=mysqli_query($con,$idbox);
	while ($temp=mysqli_fetch_array($idexe)) {
		$sfirst=$temp['std_first_name'];
		$slast=$temp['std_last_name'];
	}
	$sql="SELECT SUM(score) AS score FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$id';";
	$ex=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($ex);
		$score=$rows['score'];
		//echo $score;
	$sql2="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
	$ex2=mysqli_query($con,$sql2);
	$rows2=mysqli_fetch_assoc($ex2);
	$days=$rows2['days'];
	$sum=$score/$days*100;
	echo"<div class='container'>
	<div class='box'><label>Starting Date</label><br/><input type='text' class='inb' name='start' readonly='' value=".$start."></div>
	<div class='box'><label>Ending date</label><br/><input type='text' class='inb' name='end' readonly='' value=".$end."></div>
	<div class='box'><label>Department</label><br/><input type='text' class='inb'  readonly='' value=".$dep."></div>
	<div class='box'><label>Semester</label><br/><input type='text' class='inb'  readonly='' value=".$sem."></div>
</div>";
	echo "<div class='container'>
	<div class='box'><label>Student Id</label><br/><input type='text' class='inb' readonly='' value=".$id."></div>
	<div class='box'><label>First Name</label><br/><input type='text' class='inb' readonly='' value=".$sfirst."></div>
	<div class='box'><label>Last Name</label><br/><input type='text' class='inb' value=".$slast."></div>
	<div class='box'><label>Attendence percentage</label><br/><input type='text' class='inb readonly=''' value=".$sum."% ></div>
</div>";
}
	
		echo "</div>";
	}
	exit();
	?>
</div>
</body>
</html>