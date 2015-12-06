<?php
$servername = 'ecomm631.cfcsugvslzjq.us-west-2.rds.amazonaws.com';
$username = 'master631';
$password = "COSC_631!";
$dbname = "631_group0";
$port = 3306;

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
} 
?>