<?php
include('connection.php');
$sql="SELECT dep_name from department"; 
$dep=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>remove student</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/typeahead.min.js"></script>
	<script>
     $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'search1',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
     	function update()
    {
    	$( ".result1" ).load(window.location.href + " .result1" );
    	alert('success');
    }
</script>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
</head>
<body>
	<form method="post" action="#">
<div class="all">
		<center><h2 style="color: white;">Remove a student</h2></center>
<div class="container">
	<div class="box"><input type="submit" class="inb" name="search" value="Search by Id" id="button" /></div>
	<div class="box"><input type="submit" class="inb" name="search" value="Search by course" id="button" /></div>
	<div class="box"><input type="submit" class="inb" name="search" value="Search by semester" id="button" /></td></div>	
</div>
</form>
<?php 
if(isset($_POST['search']))
{
$action=$_POST['search'];
if($action=="Search by Id")
{
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
		<div class='box'>
		<input type='text' name='search1' class='typeahead tt-query' autocomplete='on' spellcheck='true' placeholder='Enter the id' id='my1'></div>
	<div class=box'><input type='submit' class='searchbutton'  value='find student' id='button11' /></div>
</div></form>";
}
elseif ($action=="Search by course")
{
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
	<label id='caption'>select a course: </label><div class=box'><select name='scourse' class='inb'>";
	while ($rows=mysqli_fetch_array($dep))
				 {
				echo"<option id='caption'>".$rows['dep_name']."</option>";	
				 }
	echo"</select></div>";
	echo"<div class=box'><input type='submit' class='searchbutton'  value='submit' id='button1' /></div>
</div></form>";
}
else if ($action=="Search by semester")
{
	$i=1;
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
	<label id='caption'>select a sem: </label><div class=box'><select name='ssem' id='drop'>";
	while ($i<=6)
				 {
				echo"<option id='caption'>".$i."</option>";
				$i++;	
				 }
	echo"</select></div>";
	echo"<div class=box'><input type='submit' class='searchbutton'  value='submit' id='button1' /></div>
</div></form>";	
}
}
if(isset($_POST['search1']))
{
	echo "<div class=result1>";
	$ide=$_POST['search1'];
	$sq1="SELECT std_id,std_first_name,std_last_name,std_sem,std_course FROM student WHERE std_id='$ide' ";
	$ex=mysqli_query($con,$sq1);
	$execute=mysqli_fetch_assoc($ex);
	$check=$execute['std_id'];
	if($check==null)
		echo"<script>alert('cannot find student')</script>";
	else{
	$sq1="SELECT std_id,std_first_name,std_last_name,std_sem,std_course FROM student WHERE std_id='$ide' ";
	$ex=mysqli_query($con,$sq1);
	$ex2=mysqli_query($con,$sq1);
	//if(mysqli_fetch_array($ex2)!=null){
	echo "<table border=1 style=width:100%>
	<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th><th>action</th></tr>";
	while ($row=mysqli_fetch_array($ex2)) {
		echo"<form method='post' action='#'><tr><td><input type=text value=".$row['std_id']." name=did id='input'></td><td>";
		echo "<input type=text value=".$row['std_first_name']." name=dfirst id='input'></td><td>";
		echo "<input type=text value=".$row['std_last_name']." name=dlast id='input'></td><td>";
		echo "<input type=text value=".$row['std_sem']." name=dsem id='input'></td><td>";
		echo "<input type=text value=".$row['std_course']." name=dcourse id='input'></td>";
		echo "<td><input type=submit value=remove student name=removestudent id='remove' onclick='update()'></td></tr></form>";
		}
	echo"</table>";
	echo "</div>";
}
//else echo "<script type=text/javascript>
  //          alert('cannot find student');
    //        </script>";
}
if(isset($_POST['scourse']))
{
echo "<div class=result1>";
	$course=$_POST['scourse'];
	// $sq="SELECT * FROM student WHERE std_course='$course';";
	// $ex=mysqli_query($con,$sq);
	// echo "<table border=1 style=width:100%><form method='post' action='#'>
	// <tr><th>Id</th><th>first name</th><th>last name</th>
	// <th>semester</th><th>course</th><th>action</th></tr>";
	// while ($rows=mysqli_fetch_array($ex)) {
	// 	echo"<tr><td><input type=text value=".$rows['std_id']." name=did id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_first_name']." name=dfirst id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_last_name']." name=dlast id='input' ></td><td>";
	// 	echo "<input type=text value=".$rows['std_sem']." name=dsem id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_course']." name=dcourse id='input'></td>";
	// 	echo "<td><input type=submit value=remove student name=removestudent id='remove' onclick='update();'></td></tr></form>";
	// 	}
	// echo"</table>";
	$course=$_POST['scourse'];
$seme="SELECT DISTINCT std_sem FROM student where std_course='$course' order by std_sem";
$semex=mysqli_query($con,$seme);
echo "<table border=1 style=width:100% celpadding=5 cellspacing=5><form method='post' action='#'>";
	echo"<tr style=color:black;background-color:#4C72EF;font-size:16;font-weight:bolder><td colspan=6>".$course."</td></tr>
	<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th><th>Action</th></tr>";
while($rows=mysqli_fetch_array($semex))
{

	$sem=$rows['std_sem'];
	$stu="SELECT * FROM student WHERE std_sem='$sem' AND std_course='$course'";
	$stud=mysqli_query($con,$stu);
	echo "<tr style=background-color:#F23E3E; color:black; font-weight:bolder;><td colspan=6>SEMESTER".$sem."</tr>";
	while($row2=mysqli_fetch_array($stud))
	{
		echo"<form method='post' action='#'>";
		echo"<tr><td><input type=text value=".$row2['std_id']." name=did readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_first_name']." name=dfirst readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_last_name']." name=dlast readonly='' id='input' ></td><td>";
		echo "<input type=text value=".$row2['std_sem']." name=dsem readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_course']." name=dcourse readonly='' id='input'></td>";
		echo "<td><input type=submit value=remove student name=removestudent id='remove' onclick='update();'></td>";
		echo "</tr></form>";
	}
}
	echo "</div>";
	if(isset($_POST['removestudent']))
{
	$de="DELETE FROM student WHERE std_id='$_POST[did]';";
	$de2="DELETE FROM daily_student WHERE std_id='$_POST[did]';";
	$dex=mysqli_query($con,$de);
	$de2x=mysqli_query($con,$de2);
}
}
if (isset($_POST['ssem'])) 
{
	echo "<div class=result1>";
	$sem=$_POST['ssem'];
	// $sq="SELECT * FROM student WHERE std_sem='$sem';";
	// $ex=mysqli_query($con,$sq);
	// //if(mysqli_fetch_array($ex)!=null){
	// echo "<table border=1 style=width:100%><form method='post' action='#'>
	// <tr><th>Id</th><th>first name</th><th>last name</th>
	// <th>semester</th><th>course</th><th>action</th></tr>";
	// while ($rows=mysqli_fetch_array($ex)) {
	// 	echo"<tr><td><input type=text value=".$rows['std_id']." name=did id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_first_name']." name=dfirst id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_last_name']." name=dlast id='input' ></td><td>";
	// 	echo "<input type=text value=".$rows['std_sem']." name=dsem id='input'></td><td>";
	// 	echo "<input type=text value=".$rows['std_course']." name=dcourse id='input'></td>";
	// 	echo "<td><input type=submit value=remove student name=removestudent id='remove' onclick='update();'></td></tr></form>";
	// 	}
	// echo"</table>";
	$seme="SELECT DISTINCT std_course FROM student where std_sem='$sem'";
$semex=mysqli_query($con,$seme);
echo "<table border=1 celpadding=5 celspacing=5 style=width:100% ><form method='post' action='#'>";
	echo"<tr style=color:black;background-color:#4C72EF;font-size:16;font-weight:bolder><td colspan=6>Semester:".$sem."</td></tr>
	<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th><th>Action</th></tr>";
while($rows=mysqli_fetch_array($semex))
{
	$course=$rows['std_course'];
	$stu="SELECT * FROM student WHERE std_sem='$sem' AND std_course='$course'";
	$stud=mysqli_query($con,$stu);
	echo "<tr style=background-color:#F23E3E; color:black; font-weight:bolder;><td colspan=6>Department: ".$course."</tr>";
	while($row2=mysqli_fetch_array($stud))
	{
		echo"<form method='post' action='#'>";
		echo"<tr><td><input type=text value=".$row2['std_id']." name=did readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_first_name']." name=dfirst readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_last_name']." name=dlast readonly='' id='input' ></td><td>";
		echo "<input type=text value=".$row2['std_sem']." name=dsem readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_course']." name=dcourse readonly='' id='input'></td>";
		echo "<td><input type=submit value=remove student name=removestudent id='remove' onclick='update();'></td>";
		echo "</tr></form>";
	}
}
	echo"</table>";
	echo "</div>";	
	if(isset($_POST['removestudent']))
{
	$de="DELETE FROM student WHERE std_id='$_POST[did]';";
	$de2="DELETE FROM daily_student WHERE std_id='$_POST[did]';";
	$dex=mysqli_query($con,$de);
	$de2x=mysqli_query($con,$de2);
}
}
if(isset($_POST['removestudent']))
{
	$de="DELETE FROM student WHERE std_id='$_POST[did]';";
	$de2="DELETE FROM daily_student WHERE std_id='$_POST[did]';";
	$dex=mysqli_query($con,$de);
	$de2x=mysqli_query($con,$de2);
}
echo"</div>";
?>
</body>
</html>