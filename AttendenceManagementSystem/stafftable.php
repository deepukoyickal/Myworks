<?php
$con=mysqli_connect('localhost','root','','index');
$db=mysqli_select_db($con,'index');
$sql6="INSERT INTO staff(staff_id,staff_first_name,staff_last_name,staff_gender,staff_dob,staff_type,staff_house_no,staff_house_name,staff_street,staff_district,staff_ph_no) VALUES ('$_POST[staff_id]','$_POST[staff_first]','$_POST[staff_last]','$_POST[staff_gender]','$_POST[staff_dob]','$_POST[staff_type]','$_POST[staff_house_no]','$_POST[staff_house_name]','$_POST[staff_street]','$_POST[district]','$_POST[staff_ph_no]');";
//$sqldaily="INSERT INTO daily(id,std_name) VALUES('$_POST[std_id]','$_POST[std_first]');";
//$sql5=mysqli_query($con,$sqldaily);
$sql7=mysqli_query($con,$sql6);
header('Location:'.$_SERVER['HTTP_REFERER']);

?>