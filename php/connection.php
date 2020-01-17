<?php

date_default_timezone_set('UTC');
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "loja_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?> 