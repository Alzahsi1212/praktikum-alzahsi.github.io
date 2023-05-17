<?php
session_start();
include "koneksi.php";

// Periksa apakah file ini tidak dipanggil secara langsung
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: login.html");
    exit;
}

// Mendapatkan data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan sanitasi input untuk mencegah SQL injection
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Melakukan query untuk mendapatkan data user berdasarkan username
$query = "SELECT * FROM tuser WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dieksekusi dan menghasilkan hasil
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Memeriksa kesesuaian password
    if (md5($password) == $user['password']) {
        // Login berhasil, simpan username dalam session
        $_SESSION['username'] = $username;

        // Jika checkbox "Ingat Saya" dicentang, simpan informasi login dalam cookie
        if (isset($_POST['remember']) && $_POST['remember'] == '1') {
            $cookie_name = 'remember_login';
            $cookie_value = base64_encode($username . '|' . md5($password));
            $cookie_expire = time() + (30 * 24 * 60 * 60); // Cookie berlaku selama 30 hari
            setcookie($cookie_name, $cookie_value, $cookie_expire, '/');
        } else {
            // Jika checkbox "Ingat Saya" tidak dicentang, hapus cookie sebelumnya (jika ada)
            if (isset($_COOKIE['remember_login'])) {
                $cookie_name = 'remember_login';
                setcookie($cookie_name, '', time() - 3600, '/');
            }
        }

        header("Location: index.php");
        exit;
    }
}

// Jika login gagal, kembali ke halaman login dengan pesan error
header("Location: login.html?error=1");
exit;
?>
