<?php
session_start();
$servername = "emart631group0.cfcsugvslzjq.us-west-2.rds.amazonaws.com:3306";
$username = "master631";
$password = "COSC_631!";
$dbname = "631_group0";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
?>