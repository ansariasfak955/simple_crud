<?php

define('HOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DBNAME','app2022');

$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
if($conn){
  //  echo "connection successfull";
}else{
    echo "connection failed";
}



?>