<?php include "header.php"; ?>
<h2>Data Karyawan &raquo; Biodata</h2>
<hr>
<?php
    $nik = $_GET['nik'];

    $sql = mysqli_query($koneksi, "SELECT * FROM tkaryawan WHERE nik='$nik'");
    if(mysqli_num_rows($sql) == 0){
        header("Location: admin.php");
        exit();
    } else {
        $row = mysqli_fetch_assoc($sql);
    }

    if(isset($_GET['aksi']) && $_GET['aksi'] == 'delete'){
        $delete = mysqli_query($koneksi, "DELETE FROM tkaryawan WHERE nik='$nik'");
        if($delete){
?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data berhasil dihapus.
            </div>
<?php
        } else {
?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data gagal dihapus.
            </div>
<?php
        }
    }
?>
<table class="table table-striped table-condensed">
    <tr>
        <th width="20%">NIK</th>
        <td><?php echo $row['nik']; ?></td>
    </tr>
    <tr>
        <th>Nama Karyawan</th>
        <td><?php echo $row['nama']; ?></td>
    </tr>
    <tr>
        <th>Tempat & Tanggal Lahir</th>
        <td><?php echo $row['tempat_lahir'].', '.indonesiaTgl($row['tanggal_lahir']); ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php echo $row['alamat']; ?></td>
    </tr>
    <tr>
        <th>No Telepon</th>
        <td><?php echo $row['no_telepon']; ?></td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td><?php echo $row['jabatan']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo $row['status']; ?></td>
    </tr>
</table>

<a href="data_karyawan.php" class="btn btn-sm btn-info">
<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>
<a href="edit_karyawan.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success">
<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>
<a href="delete_karyawan.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger">
<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>

<?php include "footer.php"; ?>