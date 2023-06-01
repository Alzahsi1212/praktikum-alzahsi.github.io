<?php
ob_start(); // Memulai output buffering
include "header.php";
?>

<div class="container" style="margin: 0 auto;">
    <h2>Proses Absensi Harian</h2><hr>
    <?php
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'delete') {
        $id = $_GET['id'];
        $cek = mysqli_query($koneksi, "SELECT * FROM absen_harian WHERE id='$id'");
        if (mysqli_num_rows($cek) == 0) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data tidak ditemukan
            </div>
            <?php
        } else {
            $delete = mysqli_query($koneksi, "DELETE FROM absen_harian WHERE id='$id'");
            if ($delete) {
                ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data berhasil dihapus
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data gagal dihapus
                </div>
                <?php
            }
        }
    }
    
    $pageSql = "SELECT absen_harian.*, tkaryawan.nama FROM absen_harian LEFT JOIN tkaryawan ON tkaryawan.nik = absen_harian.nik";
    if (isset($_POST['qcari'])) {
        $qcari = $_POST['qcari'];
        $pageSql .= " WHERE tgl_absensi LIKE '%$qcari%' OR absen_harian.nik LIKE '%$qcari%' OR tkaryawan.nama LIKE '%$qcari%'";
    }
    ?>
    <div class="col-md-6">
        <a href="absenhari_add.php" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Tambah Data
        </a>
    </div> <br><br>
    <div class="form-group">
        <div class="left">
            <form method="post" class="form-inline">
                <select name="filter" onchange="this.form.submit()" class="form-control">
                    <?php $filter = (isset($_POST['filter']) ? strtolower($_POST['filter']) : NULL); ?>
                    <option value="0" <?php if ($filter == '0') { echo 'selected'; } ?>>Filter</option>
                    <option value="absenhari_data">Semua</option>
                    <option value="Masuk" <?php if ($filter == 'Masuk') { echo 'selected'; } ?>>Masuk</option>
                    <option value="Alpa" <?php if ($filter == 'Alpa') { echo 'selected'; } ?>>Alpa</option>
                    <option value="Izin" <?php if ($filter == 'Izin') { echo 'selected'; } ?>>Izin</option>
                    <option value="Sakit" <?php if ($filter == 'Sakit') { echo 'selected'; } ?>>Sakit</option>
                </select>
            </form>
        </div>
        <div class="right">
            <form action="absenhari_data.php" method="POST">
                <input type="text" class="form-control" name="qcari" placeholder="Cari..." autofocus/>
            </form>
        </div>
    </div>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Tanggal Absensi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Absensi</th>
                <th>Tools</th>
            </tr>
            <?php
            if (isset($_POST['filter'])) {
                $filter = $_POST['filter'];
                if ($filter == 'absenhari_data') {
                    header('Location: absenhari_data.php');
                    exit;
                }
            }
            if ($filter) {
                $sql = mysqli_query($koneksi, "SELECT absen_harian.*, tkaryawan.nama FROM absen_harian 
                INNER JOIN tkaryawan ON tkaryawan.nik = absen_harian.nik WHERE absensi = '$filter' ORDER BY tgl_absensi ASC");
            } else {
                $sql = mysqli_query($koneksi, $pageSql." ORDER BY tgl_absensi ASC");
            }
            if ($sql) {
                if (mysqli_num_rows($sql) == 0) {
                    ?>
                    <tr>
                        <td colspan="8">Data Tidak Ada.</td>
                    </tr>
                    <?php
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo IndonesiaTgl($row['tgl_absensi']); ?></td>
                            <td><?php echo $row['nik']; ?></td>
                            <td>
                                <a href="detail_karyawan.php?nik=<?php echo $row['nik']; ?>">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <?php echo $row['nama']; ?>
                                </a>
                            </td>
                            <td><?php echo $row['absensi']; ?></td>
                            <td>
                                <a href="absenhari_edit.php?id=<?php echo $row['id']; ?>" title="Edit Data" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                                <a href="absenhari_data.php?aksi=delete&id=<?php echo $row['id']; ?>" title="Hapus Data"
                                    onclick="return confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            } else {
                echo "Query error: " . mysqli_error($koneksi);
            }
            ?>
        </table>
    </div>
</div>
<?php
ob_end_flush(); // Mengakhiri dan mengirimkan output buffering
include "footer.php";
?>