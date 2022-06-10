<?php

$data = array("name"=>"jafar", "age"=>2);
$string = http_build_query($data);
//echo $string;

$ch = curl_init("http://localhost/curl/data1.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);
curl_close($ch);

?>