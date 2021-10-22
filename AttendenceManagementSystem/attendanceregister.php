<?php
if (session_id() == '') {
   session_start();
  }
$dep=$_SESSION["dep"];
$day=$_SESSION["day"];
$sem=$_SESSION["sem"];
// $dep='BCA';
// $sem=5;
$day=date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
	<title>fetch data from database</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
		
		function test(v,w,z)
		{

		if(w=='hour1')
			{
				var d=document.getElementById(v).value;
				if(d=='none')
				{
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:green';
				}
				else if(d=='present')
				{
				document.getElementById(v).value='absent';
			    document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='absent')
				
				{
			 
			    document.getElementById(v).value='present';
				document.getElementById(v).style='background-color:#14FE04';
				}
		    }
		    
			else if(w=='hour2')
			{
		
				var d=document.getElementById(v).value;
				if(d=='none')
				{
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:green';
				}
				else if(d=='present')
				{
					document.getElementById(v).value='absent';
					document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='absent')
				{
			    	document.getElementById(v).value='present'
					document.getElementById(v).style='background-color:#14FE04';
			    }
			}
			else if(w=='hour3')
			{
				var d=document.getElementById(v).value;
				if(d=='none')
				{
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:green';
				}
				else if(d=='present')
				{
					document.getElementById(v).value='absent';
					document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='absent')
				{
			
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:#14FE04';
				}
		    }
		    else if(w=='hour4')
			{
				var d=document.getElementById(v).value;
				if(d=='none')
				{
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:green';
				}
				else if(d=='present')
				{
					document.getElementById(v).value='absent';
					document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='absent')
				{
			
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:#14FE04';
				}
		    }
		    else if(w=='hour5')
			{
				var d=document.getElementById(v).value;
				if(d=='none')
				{
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='present')
				{
					document.getElementById(v).value='absent';
					document.getElementById(v).style='background-color:#FE0418';
				}
				else if(d=='absent')
				{
			
					document.getElementById(v).value='present';
					document.getElementById(v).style='background-color:#14FE04';
				}
		    }
		   

		}
		
		 function myfunction()
	   {
	   	var today=new Date();
	   	var year=today.getFullYear();
	   	var month=(today.getMonth()+1);
	   	var day=today.getDate();
	   	var date=day+'-'+month+'-'+year;
	   	document.getElementById('today').value=date;
	   		   	//
	   		   	var d=document.querySelector("[name=hour1]").value;
	   		 
	   		   		if(d=='present')
	   		   		{
	   		   			document.querySelector("[name=hour1]").style="background-color:#14FE04";
	   		   		}
	   		   		else
	   		   		{
	   		   			document.querySelector("[name=hour1]").style="background-color:#FE0418";
	   		   		}
				
	   }
	function update()
		{
				$( ".table" ).load(window.location.href + " .table" );
				//alert('check');
				
		}
	</script>
	<style type="text/css">
		.alla
		{
			position: absolute;
			top: 5%;
			left: 10px;
			width: 50%;
			background-color: #734875;
		}
		#go
		{
			position: relative;
			top: 15px;
			width: 150px;
			height: 30px;
			background: #0B3FFB;
			outline: none;
			border-radius: 10px;
			border-width: 0;
			font-family: times-new-roman;
		}
		#go1
		{
			position: relative;
			top: 15px;
			width: 150px;
			height: 30px;
			background: #18FB03;
			outline: none;
			border-radius: 10px;
			border-width: 0;
			font-family: times-new-roman;
		}
		.containeraa
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #372C0C;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.boxa
		{
			width: 200px;
			height: 50px;
			align-content: center;
			background:#B2A272;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.table
		{
			width: 300px;
		}
		td{
			text-align: center;
			border-width: 0px;
			font-family: times-new-roman;

		}
		input{
			text-align: center;
			font-family: times-new-roman;
		}
		#roll{
			color:black;
			font-weight: bolder;
			background-color: grey;
			border-width: 0px;
			font-family: times-new-roman;
			font-size: 15px;
		}
		
		#columname
		{
			font-size: 18px;
			color:black;
			font-weight: bolder;
			width: 190px;
			height: 20px;
			background-color: grey;
			border-width: 0px;
			font-family: times-new-roman;
		}
		th{
			color: #0A1EFA;
			/*background-image: linear-gradient(-90deg,#10100F,#08440F );*/
			border-width: 0px;
			width: auto;
			font-family: times-new-roman;
			font-size: 35px;
		}
		#hdd
		{
			color:#0B0C0C;
			/*background-image: linear-gradient(-90deg,#10100F,#08440F );*/
			background: #13D5F3;
			border-width: 0px;
			width: auto;
			font-family: times-new-roman;
			font-size: 16px;
		}
		#submit
		{
			
			font-weight: bolder;
			border-radius: 10px;
			border: 2px solid black;
			padding: 5px;
			width: 100px;
			font-family: times-new-roman;
			/*background-image: linear-gradient(-90deg,#08FA24,#74C87E );*/
			background: #0BF4F7;

		}
		#submit:hover
		{
			background-image: linear-gradient(-180deg,#08FA24,#080CFD );
			transform: scale(1.1);
		}
		body
		{
			background-image: url('login2.jpg');
			background-size:cover;
		
		}
		.box
		{
			position: absolute;
			top:8%;
			left: 90%;
			transform: translate(-50%,-50%);

			width: 180px;
			height: 60px;
			background-color: white;
			box-sizing: border-box;
			border-radius: 10px;
			padding: 10px;
		}
		.box .date
		{
			color:red;
			font-weight: bolder;
			border-width: 0px;
			padding: 3px;
		}
		.box .semanddep
		{
			color:red;
			font-weight: bolder;
			border-width: 0px;
			padding: 3px;
		}
		.custom
		{
			line-height: 50px;
			width: 400px;

		}
		#today
		{
			width: 200px;
			height: 30px;
			border-width: 0px;
			background-color: #BC8989;
			text-align: center;
		}
		#today
		{
			font-weight: bolder;
			font-size:20px;
			font-family: timesnewroman;
		}
		#head
		{
			padding-top: 3px;
			padding-bottom: 1px;
			font-size: 20px;
			line-height: 4px;
			text-align: center;
		}
		#department,#semester
		{
			height: 20px;
			font-family: times-new-roman;
			border: 2px solid black;
			font-weight: bolder;
			
		}
		#semester
		{
			width:  100px;
		
		}
		.h
		{
			height: 20px;
			width: 120px;
			border:none;
			font-size: 15px;
			font-family: times-new-roman;
			font-weight: bold;
		}
		#sdate
		{
			font-size: 18px;
			font-family: times-new-roman;
			border:2px solid black;
			font-weight: bolder;
		}

	</style>
</head>
<body>
	<?php 
	// $con=mysqli_connect('localhost','root','','index');
	// $db=mysqli_select_db($con,'index');
	//$sql="SELECT * FROM daily_student WHERE day='$day' AND std_course='$dep' AND std_sem='$sem';";
	//if(!mysqli_query($con,$sql))
	//{
	include('connection.php');
		$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
		if(mysqli_fetch_array($s2)==null)
		{
			//echo "failed";
		$next="INSERT INTO daily_student(id,std_first_name,std_last_name,std_sem,std_course) SELECT std_id,std_first_name,std_last_name,std_sem,std_course FROM student WHERE std_sem='$sem' AND std_course='$dep'";
		$exec=mysqli_query($con,$next);
		$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
		
	}
	else {
		$sql="SELECT * FROM daily_student WHERE std_course='$dep' AND std_sem='$sem' AND day='$day';";
		$s2=mysqli_query($con,$sql);
	}
     $d="INSERT INTO working_days(working_day) values('$day');";
     mysqli_query($con,$d);
	?>
	<form method='post' action='#' >
<!-- <div class='alla'>
		<h1><center>Attendance register</center></h1>
<div class='containeraa'>
		<div class='boxa'><input type='submit' id='go' value='Daily Register' name="daily"></div>
		<div class='boxa'><input type='submit' id='go1' value='Hourly Register' name='hourly'></div>
</div>
</form> -->
	<div class='table'>
<table align='center' border='.5px'  class='custom' cellspacing='4' cellpadding='1'>
	<tr >
		<th colspan='6' rowspan='3'><h2>Students Attendance Register</h2></th>
		<td colspan='3' ><input type='text' name='date' readonly='' value="<?php echo $day;?>" id="sdate"></td></tr>
		<tr><td id='head' colspan="2">Department</td><td id='head'>Semester</td>
		<tr><td colspan="2"><input type='text' name='dep'  id='department' readonly='' value="<?php echo $dep;?>" ></td>
			<td><input type='text' name='sem'  id='semester' readonly='' value="<?php echo $sem;?>" ></td></tr></tr>
	</tr>
	<tr>
		<th id="hdd">Id</th>
		<th id="hdd">Fname</th>
		<th id="hdd">Lname</th>
		<th id="hdd">Hour 1</th>
		<th id="hdd">Hour 2</th>
		<th id="hdd">Hour 3</th>
		<th id="hdd">Hour 4</th>
		<th id="hdd">Hour 5</th>
		<th id="hdd">Action</th>
    </tr> 
    <?php 
	while($row=mysqli_fetch_array($s2))     
    {
    	echo"<tr>";
    	echo"<form action='action.php' method='post' >";
  
    	echo"<td style='background-color:#E0A6E6'><input type='text' name='id' value='".$row['id']."' size=5 id='roll' readonly style='background-color:#E0A6E6'></td>";
    	echo"<td style='background-color:#6DF5F7'><input type='text' name='std_name' value=".$row['std_first_name']." id='columname' readonly style='background-color:#6DF5F7'></td>";
    	echo"<td style='background-color:#6DF5F7'><input type='text' value=".$row['std_last_name']." id='columname' readonly style='background-color:#6DF5F7'></td>";
    		//
    	if($row['hour1']=='present')
    	{
    	echo"<td><input type=text value=".$row['hour1']." id=".$row['id']."hour1 onclick=test(id,'hour1'); name='hour1' readonly class=h style='background:#14FE04'></td>";
		}
		else
		{
			echo "<td><input type='text' value=".$row['hour1']." id=".$row['id']."hour1 onclick=test(id,'hour1'); name='hour1' readonly='' class='h' style='background:#FE0418'></td>";
		}
		if($row['hour2']=='present')
		{
			echo"<td><input type=text value=".$row['hour2']." id=".$row['id']."hour2 onclick=test(id,'hour2'); name='hour2' readonly='' style='background:#14FE04' class='h' ></td>";
		}
		else
		{
			echo"<td><input type=text value=".$row['hour2']." id=".$row['id']."hour2 onclick=test(id,'hour2'); name='hour2' readonly='' style='background:#FE0418' class='h' ></td>";
		}
		if($row['hour3']=='present')
		{
			echo"<td><input type='text' value=".$row['hour3']." id='".$row['id']."hour3' onclick=test(id,'hour3'); name='hour3' readonly='' style='background:#14FE04' class='h'></td>";
	    }
		else
		{
			echo"<td><input type='text' value=".$row['hour3']." id='".$row['id']."hour3' onclick=test(id,'hour3'); name='hour3' readonly='' style='background:#FE0418' class='h'></td>";
		}
		if($row['hour4']=='present')
		{
			echo"<td><input type='text' value=".$row['hour4']." id='".$row['id']."hour4' onclick=test(id,'hour4'); name='hour4' readonly='' style='background:#14FE04' class='h'></td>";
		}
		else
		{
			echo"<td><input type='text' value=".$row['hour4']." id='".$row['id']."hour4' onclick=test(id,'hour4'); name='hour4' readonly=''  style='background:#FE0418' class='h'></td>";
		}
		if($row['hour5']=='present')
		{
			echo"<td><input type='text' value=".$row['hour5']." id='".$row['id']."hour5' onclick=test(id,'hour5'); name='hour5' readonly='' style='background:#14FE04' class='h'></td>";	
		}
		else
		{
			echo"<td><input type='text' value=".$row['hour5']." id='".$row['id']."hour5' onclick=test(id,'hour5'); name='hour5' readonly=''  style='background:#FE0418' class='h'></td>";
		}
		
			//echo"<input type='hidden' name='hour5'  id='".$row['id']."hour5' value='present'>";
		echo "<input type='hidden' name='day' value=".$day.">";
		echo"<td style='background-color:green,border-radius=10px';><input type='submit' value='submit' id='submit' name='submit'></td>";
		echo"</tr> </form>";
		
    }
    if(isset($_POST['submit']))
    {
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
	echo "<script type=text/javascript>
			update();
			</script>";
    }
    session_write_close();
    ?>
</table>
</div>
</body>
</html>
