<?php

$db=mysqli_connect('localhost','root','','students');

$id=$_POST['id'];
$sql=mysqli_query($db,"delete from students where id='$id'");

if($sql){
    echo "Data delete Successfully";
}else{
    echo "not delete";
}
 