<?php

$db=mysqli_connect('localhost','root','','students');
 $name=mysqli_real_escape_string($db, $_REQUEST['name']);

$sql=mysqli_query($db,"select * from students where name like '%$name%'");
if(mysqli_num_rows($sql)>0){
    while($row=mysqli_fetch_assoc($sql)){
        $data[]=$row;
    }
  
        
        echo json_encode($data);
   
}else{
     
    echo json_encode( array( 'status' => 'failed',
    'message' => "Data not found"
), JSON_PRETTY_PRINT);

}