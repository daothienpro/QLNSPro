<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "qlnspro";

$conn = new mysqli($host, $user, $password, $database);

$error_occurred = ($conn->connect_error != null);
if ($error_occurred == TRUE) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

