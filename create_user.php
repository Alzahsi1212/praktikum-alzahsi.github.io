<?php include "header-admin.php"; ?>
<?php
include('koneksi.php');

if (isset($_POST['add'])) {
    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    $user = mysqli_real_escape_string($koneksi, $user);
    $pass = mysqli_real_escape_string($koneksi, $pass);
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $email = mysqli_real_escape_string($koneksi, $email);

    $query = "SELECT MAX(id) as max_id FROM tuser";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['max_id'];

    $newId = $maxId + 1;

    $passwordHash = md5($pass);

    $query = "INSERT INTO tuser (id, username, password, nama, email) 
    VALUES ('$newId', '$user', '$passwordHash', '$nama', '$email')";
    $result = mysqli_query($koneksi, $query);

    if ($result) { ?>
        <div class="alert alert-success alert-dismissable">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">
        &times;</button>User berhasil dibuat.</div>
<?php    } else { ?>
        <div class="alert alert-danger alert-dismissable">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">
        &times;</button>User gagal dibuat!</div> <?php
    }
}
?>
<div class="container" style="margin: 0 auto;">
    <h2>Menu Admin &raquo; Tambah User</h2>
    <hr>
    <form action="" method="POST" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Username</label>
            <div class="col-sm-2">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Password</label>
            <div class="col-sm-4">
                <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-4">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-4">
                <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <button class="btn btn-sm btn-primary" type="submit" name="add" value="simpan">Simpan</button>
                <button class="btn btn-sm btn-warning" type="reset" value="reset">Reset</button>
                <button class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>
