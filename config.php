<?php

$host = 'localhost:3306';
$username = 'root';
$password = '123456';
$db_name = 'sportblog';

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
