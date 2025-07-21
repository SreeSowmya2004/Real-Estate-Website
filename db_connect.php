<?php
$host = "localhost:8080";
$user = "root";
$pass = "";
$dbname = "realestate";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
   die("Database connection failed: " . $conn->connect_error);
}
?>
