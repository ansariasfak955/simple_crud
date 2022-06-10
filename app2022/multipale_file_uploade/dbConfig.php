<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "app2022";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db) {
    //die("Connection failed: " . $db->connect_error);
    echo "successfull";
}else{
    echo "connection faild";
}
?>