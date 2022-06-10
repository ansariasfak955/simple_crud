<?php

include __DIR__.'/db.php';
$name = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM register WHERE email = '$name' AND password = '$password'";

//echo $query; die();


$run = mysqli_query($conn,$query);
//echo $numr = mysqli_num_rows($run); die();
$result = mysqli_fetch_assoc($run);

if($result){
    //echo "successfull login";
    session_start();
    $_SESSION['validUser'] = $result['name'];
    header("location:welcome.php");
}else{
    echo "<script>alert('Useremail or Password incorrect!!')</script>";
    //echo "<script>location.href = 'login.php'</script>";
}

?>