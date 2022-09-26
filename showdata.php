<?php

$db=mysqli_connect('localhost','root','','students');

 
$sql=mysqli_query($db,"select * from students LIMIT 3");
while($row=mysqli_fetch_assoc($sql)){
    $data[]=$row;
}
echo json_encode($data);