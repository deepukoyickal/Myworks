<?php
session_start();
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
include('connection.php');
?>
<html>
<head>
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
	<link rel="stylesheet" type="text/css" href="css/classreportstyle.css">
		
	</style>
</head>
<body>
	<form method="post" action="#" onsubmit="return check();">
	<div class="all">
		<center><h2 style="color: white;">Class attendance report</h2></center>
<div class="container">
	<div class="box"><label>Starting Date</label><br/><input type="date" id="start" class="inb" name="start" /></div>
	<div class="box"><label>Ending date</label><br/><input type="date" id="end" class="inb" name="end" /></div>
	<!-- <div class="box"><br/><input type="reset" class="inb" id="reset" value="Reset Dates"></div> -->
	<div class="box"><br/><input type="submit" class="inb" id="submit" value="Generate Report"></div>
</div>
</form>
<?php
if(isset($_POST['start'])&&isset($_POST['end']))
{
	echo "<div class='box1'>
		<center>";
$start=$_POST['start'];
$end=$_POST['end'];
$sql2="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
	$ex2=mysqli_query($con,$sql2);
	$rows2=mysqli_fetch_assoc($ex2);
	$days=$rows2['days'];
$sql="SELECT std_id,std_first_name,std_last_name FROM student WHERE std_course='$dep' AND std_sem='$sem';";
$ex=mysqli_query($con,$sql);
echo "<table border=1 cellpadding=5 cellspacing=5 style=width:100%;>
 <tr><td colspan='3' id='numberhead'><label>Department:</label><input type='text' value=".$dep."></td>
             <td colspan='3' id='numberhead'><label>Semester: </label><input type='text' value=".$sem."></td></tr>
             <tr>
             <td colspan='2' id='numberhead'>
                <label>Starting date:</label><input type='text' value=".$start.">
             </td>
             <td colspan='2' id='numberhead'>
             <label>End date: </label><input type='text' value=".$end.">
             </td>
             <td colspan='2' id='numberhead'>
             <label>Number of working days: </label><input type='text' value=".$days.">
             </td>
             </tr>
             <tr>
             <th>student Id</th>
             <th>first name</th>
             <th>Last name</th>
             <th id=full>Number of presents</th>
             <th id=absent>number of absents</th>
             <th>Percentage</th></tr>";
while ($rows=mysqli_fetch_array($ex)) {
	echo "<tr><td>".$rows['std_id']."</td>";
	echo "<td>".$rows['std_first_name']."</td>";
	echo "<td>".$rows['std_last_name']."</td>";
    $n="SELECT sum(score) AS num FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$rows[std_id]';";
    $n2=mysqli_query($con,$n);
    while ($nc=mysqli_fetch_assoc($n2))
     {
    	$num=$nc['num'];
    	echo "<td id=full>".$num."</td>";
     }
     /*$h="SELECT COUNT(day) AS half FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$rows[std_id]' AND score='.5';";
      $h2=mysqli_query($con,$h);
       while ($nc=mysqli_fetch_assoc($h2))
     {
    	$half=$nc['half'];
    	echo "<td id=half>".$half."</td>";
     }*/
     $a="SELECT COUNT(day) AS absent FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$rows[std_id]' AND score='0';";
      $a2=mysqli_query($con,$a);
       while ($ac=mysqli_fetch_assoc($a2))
     {
    	$absent=$ac['absent'];
    	echo "<td id=absent>".$absent."</td>";
     }
     $p="SELECT SUM(score) AS score FROM daily_student WHERE day BETWEEN '$start' AND '$end' AND id='$rows[std_id]';";
	$p2=mysqli_query($con,$p);
	while($sc=mysqli_fetch_assoc($p2))
	{
		$sum=$sc['score']/$days*100;
        $sum=round($sum,2);
	  echo "<td>".$sum."%</td></tr>";
    }
}
echo "</table></center></div>";
}
?>
</div>
</body>
</html>