<?php

include __DIR__.'/db.php';

if(isset($_POST['product_save']))
{
    $image ='';

    $target_dir = "uploads/";
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
   
    if(empty($errors)==true){
        
       $test  = move_uploaded_file($file_tmp,"uploads/".$file_name);
      
    }else{
       print_r($errors);
    }
    
    if($test){
        $image  = $file_name ;
    }





$title = $_POST['title'];
$price = $_POST['price'];
$product_code = $_POST['product_code'];
$select_size  = $_POST['select_size'];
$total_product = $_POST['total_product'];
$description = $_POST['description'];

$sql = "INSERT INTO product (title,price,product_code,select_size,total_product,description,image)
VALUES ('$title','$price','$product_code','$select_size','$total_product','$description','$image')";
//echo $sql; die();

if($run = mysqli_query($conn,$sql)){
    //echo "product add successfull";
    header("location:product-list.php");

}else{
    echo "product add faild";
}
}




?>