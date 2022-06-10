<?php

if(isset($_POST['name'], $_POST['age'])){
    $db = new mysqli("localhost","root","","app2022");
    $name = $db->real_escape_string($_POST['name']);
    $age = (int)$_POST['age'];
    $query = "INSERT INTO curl_data SET mydata='$name, $age'";
    $db->query($query);
}

?>