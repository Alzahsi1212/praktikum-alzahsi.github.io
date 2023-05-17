<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "praktikum";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>