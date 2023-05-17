<?php
session_start(); // Mulai sesi
session_destroy(); // Hapus semua data sesi

// Hapus juga cookie jika ada
if (isset($_COOKIE['remember_login'])) {
    $cookie_name = 'remember_login';
    setcookie($cookie_name, '', time() - 3600, '/');
}

// Redirect ke halaman login setelah logout
header("Location: login.html");
exit;
?>
