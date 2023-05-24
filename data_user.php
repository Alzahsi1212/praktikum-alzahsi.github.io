<?php
    include "header-admin.php";
?>

<div class="container" style="margin: 0 auto;">
<h2>Data User</h2>
<hr />
<div class="form-group">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    <a href="create_user.php">Tambah User</a> 
</div>
<br />
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tools</th>
        </tr>
        <?php
            $mySql = "SELECT * FROM tuser";
            $myQry = mysqli_query($koneksi, $mySql) or die('Query salah: '.mysqli_error($koneksi));
            $nomor = 1;
            while ($kolomData = mysqli_fetch_array($myQry)) { 
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $kolomData['username']; ?></td>
            <td><?php echo $kolomData['password']; ?></td>
            <td><?php echo $kolomData['nama']; ?></td>
            <td><?php echo $kolomData['email']; ?></td>
            <td>
                <a href="edit_user.php?username=<?php echo $kolomData['username']; ?>" title="Edit User" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="delete_user.php?username=<?php echo $kolomData['username']; ?>" title="Hapus User" onclick="return confirm('Yakin menghapus User ini?')" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</div>

<?php include 'footer.php'; ?>
