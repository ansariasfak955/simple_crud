<?php

include __DIR__.'/db.php';

$id = $_GET['id'];
$query = "DELETE FROM crud WHERE id = '$id'";
//echo $query; die();
$delete = mysqli_query($conn,$query);
if($delete){
    echo "<script>alert ('Record Delete Successfully.')</script>";
    echo "<script>location.href = 'dashboard.php'</script>";
}


?>