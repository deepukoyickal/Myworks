<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","index");
    $query=mysqli_query($con, "select * from student where std_id LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['std_id'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
