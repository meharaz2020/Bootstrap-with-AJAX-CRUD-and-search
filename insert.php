<?php

include "db.php";

$id=mysqli_real_escape_string($db, $_REQUEST['id']);

$name=mysqli_real_escape_string($db, $_REQUEST['name']);
$pass=mysqli_real_escape_string($db, $_REQUEST['password']);

if(empty($id)){
    $sql=mysqli_query($db,"insert into students(id,name,password) values('$id','$name','$pass')");

if($sql){
    echo "Data Insert Successfully";
}else{
    echo "No data insert";
}
}else{
    $sql1=mysqli_query($db,"update students set name='$name',password='$pass' where id='$id'");

if($sql1){
    echo "Data Update Successfully";
}else{
    echo "No data update";
}
}

 






