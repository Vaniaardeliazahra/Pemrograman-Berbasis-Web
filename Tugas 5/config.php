<?php
$conn = new mysqli("localhost", "root", "admin123", "kampus");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
