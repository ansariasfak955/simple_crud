<?php

include __DIR__.'/db.php';

$name = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM crud WHERE email = '$name'  AND password = '$password'";
//echo $query; die();

$run = mysqli_query($conn,$query);
//print_r($run); die();
//echo $numr = mysqli_num_rows($run); die();

$result = mysqli_fetch_assoc($run);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
if($result){
     echo "login successfull";
      session_start();
      $_SESSION['validUser'] = $result['name'];
     header("location:dashboard.php");
 }else{
     echo "<script>alert('Useremail or Password incorrect!!')</script>";
     //echo "can not login!!";
     }

?>