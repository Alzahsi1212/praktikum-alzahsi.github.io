<?php include 'header.php'; ?>
<div class="container" style="margin: 0 auto;">
    <h2>Data Karyawan</h2>
    <hr />
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
            <?php
                $mySql = "SELECT * FROM tkaryawan";
                $myQry = mysqli_query($koneksi, $mySql) or die('Query salah: '.mysqli_error($koneksi));
                $nomor = 1;
                while ($kolomData = mysqli_fetch_array($myQry)) { 
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $kolomData['nik']; ?></td>
                    <td><?php echo $kolomData['nama']; ?></td>
                    <td><?php echo $kolomData['tempat_lahir']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($kolomData['tanggal_lahir'])); ?></td>
                    <td><?php echo $kolomData['no_telepon']; ?></td>
                    <td><?php echo $kolomData['jabatan']; ?></td>
                    <td><?php echo $kolomData['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>        
    <img src="img/btn_print.png" width="40" onclick="window.print();">
</div>
<?php include "footer.php"; ?>