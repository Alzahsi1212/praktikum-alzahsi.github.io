<?php include "header.php";
    $tgl = $_GET['tanggal'];
    $masukSql = "SELECT absen_harian.*,tkaryawan.nama FROM absen_harian
    LEFT JOIN tkaryawan ON tkaryawan.nik=absen_harian.nik WHERE 
    tgl_absensi='".$tgl."'ORDER BY absen_harian.nik ASC";
?>
<body onload="window.print()">
<div class="container" style="margin: 0 auto;">
    <h2>Laporan Absen Tanggal <?php echo IndonesiaTgl($tgl); ?></h2>
    <hr><br>
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Absensi</th>
        </tr>
        <?php
            $sql = mysqli_query($koneksi, $masukSql);
            $no = 1;
            while($row = mysqli_fetch_assoc($sql)){
            ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['absensi']; ?></td>
        </tr>    
        <?php
        } ?>
    </table>
    </div>
</div>
</body>
<?php
if (!isset($_GET['tanggal'])) {
    include "footer.php";
}
?>