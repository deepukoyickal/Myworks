<html>
<head>
	<title>view student details!</title>
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
</script>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
</head>
<body>
<form method="post" action="#">
<div class="all">
		<center><h2 style="color: white;">View student details</h2></center>
<div class="container">
	<div class="box"><input type="submit" class="inb" name="search" value="Search by Id" id="button" /></div>
	<div class="box"><input type="submit" class="inb" name="search" value="Search by course" id="button" /></div>
	<div class="box"><input type="submit" class="inb" name="search" value="Search by semester" id="button" /></td></div>	
</div>
</form>
<?php
include('connection.php');
$d="SELECT * FROM department;";
$dep=mysqli_query($con,$d);
if(isset($_POST['search']))
{
$action=$_POST['search'];
if($action=="Search by Id")
{
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
		<div class='box'>
	<input type='text' name='search1' class='typeahead tt-query' autocomplete='on' spellcheck='false' placeholder='Enter the id' id='my'></div>
	<div class='box'><input type='submit' class='searchbutton'  value='find student' id='button11' /></div>
</div></form>";
}
elseif ($action=="Search by course")
{
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
	<label id='caption'>select a course: </label><div class='box'><select name='course' class='inb'>";
	while ($rows=mysqli_fetch_array($dep))
				 {
				echo"<option id='caption'>".$rows['dep_name']."</option>";	
				 }
	echo"</select></div>";
	echo"<div class='box'><input type='submit' class='searchbutton'  value='submit' id='button1' /></div>
</div></form>";
}
else if ($action=="Search by semester")
{
	$i=1;
	echo "<form action='#' method='post'><div class='search'>
		<div class='container'>
	<label id='caption'>select a sem: </label><div class=box'><select name='sem' id='drop'>";
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
	echo "<div class='result2' >";
	$id=$_POST['search1'];
	$sq="SELECT * FROM student WHERE std_id='$id';";
	$ex=mysqli_query($con,$sq);
	$execute=mysqli_fetch_assoc($ex);
	$check=$execute['std_id'];
	if($check==null)
		echo"<script>alert('cannot find student')</script>";
	else{
		$sq="SELECT * FROM student WHERE std_id='$id';";
	$ex=mysqli_query($con,$sq);
	echo "<table border=1 id='table'>";
	echo"<tr style=background-color:#F23E3E; color:black; font-weight:bolder;><td colspan=5>Student Id:".$id."</td></tr>";
	echo "<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th></tr>";
	while ($rows=mysqli_fetch_array($ex))
	 {
		echo"<form method='post' action='#'>";
		echo"<tr><td><input type=text value=".$rows['std_id']." id='input' readonly='' name='uid' id='input'></td><td>";
		echo "<input type=text value=".$rows['std_first_name']." id='input' name=ufirst readonly='' id='input'></td><td>";
		echo "<input type=text value=".$rows['std_last_name']." id='input' name=ulast readonly='' id='input'></td><td>";
		//echo "<input type=text value=".$rows['std_dob']." ></td><td>";
		//echo "<input type=text value=".$rows['std_gender']." ></td><td>";
		echo "<input type=text value=".$rows['std_sem']." id='input' name=usem readonly='' id='input'></td><td>";
		echo "<input type=text value=".$rows['std_course']." id='input' name=ucourse readonly='' id='input'></td><td>";
		echo "</tr></form>";
		}
	echo"</table>";
	echo "</div>";
}
//else echo "<script type=text/javascript>
//            alert('cannot find student');
  //          </script>";
}
if(isset($_POST['course']))
{
echo "<div class=result1>";
$course=$_POST['course'];
$seme="SELECT DISTINCT std_sem FROM student where std_course='$course' order by std_sem";
$semex=mysqli_query($con,$seme);
echo "<table border=1 style=width:100% celpadding=5 cellspacing=5><form method='post' action='#'>";
	echo"<tr style=color:black;background-color:#4C72EF;font-size:16;font-weight:bolder><td colspan=5>".$course."</td></tr>
	<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th></tr>";
while($rows=mysqli_fetch_array($semex))
{
	$sem=$rows['std_sem'];
	$stu="SELECT * FROM student WHERE std_sem='$sem' AND std_course='$course'";
	$stud=mysqli_query($con,$stu);
	echo "<tr style=background-color:#F23E3E; color:black; font-weight:bolder;><td colspan=5>SEMESTER".$sem."</tr>";
	while($row2=mysqli_fetch_array($stud))
	{

		echo"<tr><td><input type=text value=".$row2['std_id']." name=uid readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_first_name']." name=ufirst readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_last_name']." name=ulast readonly='' id='input' ></td><td>";
		echo "<input type=text value=".$row2['std_sem']." name=usem readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_course']." name=ucourse readonly='' id='input'></td>";
		echo "</tr></form>";
	}
}
}
if (isset($_POST['sem'])) 
{
	echo "<div class=result1>";
	$sem=$_POST['sem'];
	$seme="SELECT DISTINCT std_course FROM student where std_sem='$sem'";
$semex=mysqli_query($con,$seme);
echo "<table border=1 celpadding=5 celspacing=5 style=width:100% ><form method='post' action='#'>";
	echo"<tr style=color:black;background-color:#4C72EF;font-size:16;font-weight:bolder><td colspan=5>Semester:".$sem."</td></tr>
	<tr><th>Id</th><th>first name</th><th>last name</th>
	<th>semester</th><th>course</th></tr>";
while($rows=mysqli_fetch_array($semex))
{
	$course=$rows['std_course'];
	$stu="SELECT * FROM student WHERE std_sem='$sem' AND std_course='$course'";
	$stud=mysqli_query($con,$stu);
	echo "<tr style=background-color:#F23E3E; color:black; font-weight:bolder;><td colspan=5>Department: ".$course."</tr>";
	while($row2=mysqli_fetch_array($stud))
	{

		echo"<tr><td><input type=text value=".$row2['std_id']." name=uid readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_first_name']." name=ufirst readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_last_name']." name=ulast readonly='' id='input' ></td><td>";
		echo "<input type=text value=".$row2['std_sem']." name=usem readonly='' id='input'></td><td>";
		echo "<input type=text value=".$row2['std_course']." name=ucourse readonly='' id='input'></td>";
		echo "</tr></form>";
	}
}
	echo"</table>";
	echo "</div>";	
/*}
else echo "<script type=text/javascript>
            alert('cannot find student');
            </script>";*/
}
echo"</div>";
?>
</body>
</html>