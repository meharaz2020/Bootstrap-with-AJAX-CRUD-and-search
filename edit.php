<?php

$db=mysqli_connect('localhost','root','','students');

$id=$_POST['id'];

$sql=mysqli_query($db,"select * from students where id='$id'");
$row=mysqli_fetch_assoc($sql);


echo json_encode($row);