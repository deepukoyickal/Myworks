<?php
include('connection.php');
$up="UPDATE staff SET staff_first_name='$_POST[first]',staff_last_name='$_POST[last]',staff_type='$_POST[type]' where staff_id='$_POST[staff_id]';";
$exec=mysqli_query($con,$up);
if($exec)
echo "updated";
else
echo "not updated";
header("Location:".$_SERVER['HTTP_REFERER']);
?>