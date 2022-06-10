<?php

include_once __DIR__.'/db.php';

$id = $_GET['id'];
$query = "DELETE FROM product WHERE id = $id";
$run = mysqli_query($conn,$query);
if($run){
    echo "<script>alert ('Record Delete Successfully.')</script>";
    echo "<script>location.href = 'productlist.php'</script>";
}

?>