<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>staff attendance report</title>
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
	<link rel="stylesheet" type="text/css" href="css/staffreportstyle.css">
</head>
<body>
	<form method="post" action="#" onsubmit="return check();">
	<div class="all">
		<center><h2 style="color: white;">Staff attendance report</h3></center>
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
	echo "<div class='box1'>";
$start=$_POST['start'];
$end=$_POST['end'];
$sql2="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
	$ex2=mysqli_query($con,$sql2);
	$rows2=mysqli_fetch_assoc($ex2);
	$days=$rows2['days'];
// $sql="SELECT staff_id,staff_first_name,staff_last_name FROM staff WHERE staff_type='teaching' ;";
// $ex=mysqli_query($con,$sql);
// echo "<table border=1 cellpadding=5 cellspacing=5 style='width:100%;'>
// <tr><td colspan='2'>Total working days:<input type='text' value=".$days." class='inb'></td>
// <td colspan='2'>Starting day:<input type='date' value=".$start." class='inb'></td>
// <td colspan='2'>Ending day:<input type='date' value=".$end." class='inb' ></td></tr>
// <tr><th colspan=6>Teaching Staffs</th></tr>
//              <tr>
//              <th>staff Id</th>
//              <th>first name</th>
//              <th>Last name</th>
//              <th id=absent>number of Leaves</th>";
// while ($rows=mysqli_fetch_array($ex)) {
// 	echo "<tr><td>".$rows['staff_id']."</td>";
// 	echo "<td>".$rows['staff_first_name']."</td>";
// 	echo "<td>".$rows['staff_last_name']."</td>";
//     $n="SELECT SUM(points) AS num FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]'";
//     $n2=mysqli_query($con,$n);
//     while ($nc=mysqli_fetch_assoc($n2))
//      {
//     	$num=$nc['num'];
//     	//echo "<td id=full>".$num."</td>";
//      }
//      $a="SELECT COUNT(day) AS absent FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]' AND points='0';";
//       $a2=mysqli_query($con,$a);
//        while ($ac=mysqli_fetch_assoc($a2))
//      {
//     	$absent=$ac['absent'];
//     	echo "<td id=absent>".$absent."</td>";
//      }
//      $p="SELECT SUM(points) AS score FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]';";
// 	$p2=mysqli_query($con,$p);
// 	while($sc=mysqli_fetch_assoc($p2))
// 	{
// 		$sum=$sc['score']/$days*100;
//         $sum=round($sum,2);
// 	  //echo "<td>".$sum."%</td></tr>";
//     }
// }
// echo "</table>";
    $sql3="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
    $ex3=mysqli_query($con,$sql3);
    $rows2=mysqli_fetch_assoc($ex3);
    $days=$rows2['days'];
$sql="SELECT staff_id,staff_first_name,staff_last_name FROM staff WHERE staff_type='teaching' ;";
$ex=mysqli_query($con,$sql);
echo"<table style='width:100%;'>
        <tr><td colspan='2'>Total working days:<input type='text' value=".$days." class='inb'></td>
<td colspan='2'>Starting day:<input type='date' value=".$start." class='inb'></td>
<td colspan='2'>Ending day:<input type='date' value=".$end." class='inb' ></td></tr>
    </table>";
echo "<table border=1 cellpadding=5 cellspacing=5 style=width:100%;>
        <tr><th colspan=6>Non-Teaching Staffs</th></tr>
             <tr>
             <th>staff Id</th>
             <th>first name</th>
             <th>Last name</th>
             <th id=absent>number of leaves</th>";
while ($rows=mysqli_fetch_array($ex)) {
    echo "<tr><td>".$rows['staff_id']."</td>";
    echo "<td>".$rows['staff_first_name']."</td>";
    echo "<td>".$rows['staff_last_name']."</td>";
    $n="SELECT SUM(points) AS num FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]'";
    $n2=mysqli_query($con,$n);
    while ($nc=mysqli_fetch_assoc($n2))
     {
        $num=$nc['num'];
       // echo "<td id=full>".$num."</td>";
     }
     $a="SELECT COUNT(day) AS absent FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]' AND points='0';";
      $a2=mysqli_query($con,$a);
       while ($ac=mysqli_fetch_assoc($a2))
     {
        $absent=$ac['absent'];
        echo "<td id=absent>".$absent."</td>";
     }
     $p="SELECT SUM(points) AS score FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]';";
    $p2=mysqli_query($con,$p);
    while($sc=mysqli_fetch_assoc($p2))
    {
        $sum=$sc['score']/$days*100;
        $sum=round($sum,2);
      //echo "<td>".$sum."%</td></tr>";
    }
}
echo "</table>";
$sql3="SELECT COUNT(working_day) AS days FROM working_days WHERE working_day BETWEEN '$start' AND '$end';";
    $ex3=mysqli_query($con,$sql3);
    $rows2=mysqli_fetch_assoc($ex3);
    $days=$rows2['days'];
$sql="SELECT staff_id,staff_first_name,staff_last_name FROM staff WHERE staff_type='non-teaching' ;";
$ex=mysqli_query($con,$sql);
echo "<table border=1 cellpadding=5 cellspacing=5 style=width:100%;>
        <tr><th colspan=6>Non-Teaching Staffs</th></tr>
             <tr>
             <th>staff Id</th>
             <th>first name</th>
             <th>Last name</th>
             <th id=absent>number of leaves</th>";
while ($rows=mysqli_fetch_array($ex)) {
    echo "<tr><td>".$rows['staff_id']."</td>";
    echo "<td>".$rows['staff_first_name']."</td>";
    echo "<td>".$rows['staff_last_name']."</td>";
    $n="SELECT SUM(points) AS num FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]'";
    $n2=mysqli_query($con,$n);
    while ($nc=mysqli_fetch_assoc($n2))
     {
        $num=$nc['num'];
       // echo "<td id=full>".$num."</td>";
     }
     $a="SELECT COUNT(day) AS absent FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]' AND points='0';";
      $a2=mysqli_query($con,$a);
       while ($ac=mysqli_fetch_assoc($a2))
     {
        $absent=$ac['absent'];
        echo "<td id=absent>".$absent."</td>";
     }
     $p="SELECT SUM(points) AS score FROM staff_attendance WHERE day BETWEEN '$start' AND '$end' AND staff_id='$rows[staff_id]';";
    $p2=mysqli_query($con,$p);
    while($sc=mysqli_fetch_assoc($p2))
    {
        $sum=$sc['score']/$days*100;
        $sum=round($sum,2);
      //echo "<td>".$sum."%</td></tr>";
    }
}
echo "</table></div>";
}
//}
?>
</div>
</body>
</html>
</body>
</html>