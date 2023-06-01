<?php
    session_start();
    include('koneksi.php');
    include('library.php');

    // Periksa apakah pengguna sudah login
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Ambil nama pengguna yang sedang login
    $namaPengguna = '';
    if ($username != '') {
        $query = "SELECT * FROM tuser WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $namaPengguna = $user['nama'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Pemrograman Web</title>
    <link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    /* CSS untuk footer */
    #footer {
      background: #f1f1f1;
      padding: 10px;
      text-align: center;
      font-size: 12px;
      color: #888;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }

    /* CSS untuk konten footer */
    #footer-content {
      display: inline-block;
    }
</style>
</head>

<body>
<div class="container">
        <div class="content">
            <nav class="navbar navbar-inverse">
                <div id="navbar">
                    <ul class="dropDownMenu">
                        <li><a href="./">Beranda</a></li>
                        <?php if ($username != '') : ?>
                            <li>
                                <a href="#">Master Data</a>
                                <ul>
                                    <li><a href="data_karyawan.php">Data Karyawan</a></li>
                                    <li><a href="absenhari_data.php">Absensi</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                                <ul>
                                    <li><a href="create_user.php">Buat User</a></li>
                                    <li><a href="data_user.php">Data User</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                            <li>
                                <a href="#">Laporan</a>
                                <ul>
                                    <li><a href="cetak_karyawan.php">Cetak Data Karyawan</a></li>
                                    <li><a href="cetak_absensi.php">Cetak Absensi Karyawan</a></li>
                                </ul>
                            </li>
                        <li><a href="tentang-saya.php">Tentang Saya</a></li>
                        <ul class="dropDownMenu navbar-right">
                            <?php if ($username != '') : ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php echo $namaPengguna; ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li><a href="login.html">Login</a></li>
                            <?php endif; ?>
                        </ul>
                            </ul>
            </div>
            </nav>
        </div>
    </div>
        <div class="container">
        <div class="content">
        <!-- Konten halaman lainnya -->
        </div>
    </div>
</body>
</html>
