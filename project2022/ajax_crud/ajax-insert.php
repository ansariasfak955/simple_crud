<?php

include __DIR__.'/db.php';

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$contact = $_POST["contact"];
$email = $_POST["email"];

$sql = "INSERT INTO `test`(`first_name`, `last_name`, `contact`, `email`) VALUES ('{$first_name}','{$last_name}','{$contact}','{$email}')";

//$result = mysqli_query($conn,$sql) or die("sql query failed.");

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}

?>