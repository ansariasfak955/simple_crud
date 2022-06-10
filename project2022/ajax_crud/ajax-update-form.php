<?php

include __DIR__.'/db.php';

$student_id = $_POST["id"];
//echo $student_id;
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

$sql = "UPDATE `test` SET first_name = '{$firstName}',last_name = '{$lastName}' WHERE id = {$student_id}";

if(mysqli_query($conn,$sql)){
    echo 1;
 }else{
     echo 0;
}

?>