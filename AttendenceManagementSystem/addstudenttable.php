<?php
$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
$phno=$_POST['std_ph_no'];
$sql3="INSERT INTO student(std_id,std_first_name,std_last_name,std_gender,std_dob,std_course,std_sem,std_house_no,std_house_name,std_street,std_ph,std_parent,std_district) VALUES ('$_POST[std_id]','$_POST[std_first]','$_POST[std_last]','$_POST[std_gender]','$_POST[std_dob]','$_POST[std_course]','$_POST[std_semester]','$_POST[std_house_no]','$_POST[std_house_name]','$_POST[std_street]','$_POST[std_ph_no]','$_POST[parent_name]','$_POST[std_district]');";
//$sqldaily="INSERT INTO daily(id,std_name) VALUES('$_POST[std_id]','$_POST[std_first]');";
//$sql5=mysqli_query($con,$sqldaily);

if($sql4)
echo "success";
else
echo "failed";

?>