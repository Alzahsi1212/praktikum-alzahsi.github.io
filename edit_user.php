<?php include "header-admin.php"; ?>
<?php
$user = $_GET['username'];
$sql = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username='$user' ");
if (mysqli_num_rows($sql) == 0) {
?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        User Tidak Ada..!
    </div>
<?php
} else {
    $row = mysqli_fetch_assoc($sql);
}
//Proses simpan Data
if (isset($_POST['update'])) {
    $user   = $_POST['username'];
    $pass   = $_POST['password'];
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];

    $update = mysqli_query($koneksi, "UPDATE tuser SET nama='$nama', password='$pass', email='$email' WHERE username='$user'") or die(mysqli_error($koneksi));
    if ($update) {
?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            User berhasil diUpdate.
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            User gagal diUpdate, silahkan coba lagi.
        </div>
<?php
    }
}
?>
<div class="container" style="margin: 0 auto;">
<h2>Data User &raquo; Edit User</h2>
<hr>
<form action="" method="POST" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-2">
            <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" placeholder="Username" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-4">
            <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-4">
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="Nama" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-4">
            <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
            <button class="btn btn-sm btn-primary" type="submit" name="update" value="update">Simpan</button>
            <button class="btn btn-sm btn-warning" type="reset" value="reset">Reset</button>
            <button class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
        </div>
    </div>
</form>
</div>
<?php include "footer.php"; ?>
