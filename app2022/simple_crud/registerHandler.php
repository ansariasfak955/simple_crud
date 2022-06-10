<?php

include __DIR__.'/db.php';
if(isset($_POST['done'])){
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];

$query = "INSERT INTO crud (name,email,contact,password) VALUES ('$name','$email','$contact','$password')";

if($run = mysqli_query($conn,$query)){
    //echo "user register successfull";
    header("location:login.php");
}else{
    echo "user can not register";
}
}
?>