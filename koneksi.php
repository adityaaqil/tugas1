<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "artikel";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
