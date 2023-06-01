<?php include "header.php"; ?>
<div class="container" style="margin: 0 auto;">
<h2>Proses Absensi Harian &raquo; Tambah Data</h2><hr>
<?php
    if(isset($_POST['add'])){
        $tgl_absensi = $_POST['tgl_absensi'];
        $nik         = $_POST['nik'];
        $absensi     = $_POST['absensi'];

    // Validasi jika option value kosong
    if(empty($absensi)){
        echo '<div class="alert alert-danger alert-dismissable"><button type="button"
        class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Keterangan Absensi harus dipilih.</div>';
    } else {
        $cek = mysqli_query($koneksi, "SELECT absen_harian.id,
        absen_harian.tgl_absensi,absen_harian.nik,absen_harian.absensi
        FROM absen_harian WHERE nik='$nik' AND tgl_absensi='$tgl_absensi' ")
        or die ("Error Query ".mysqli_error($koneksi)); ;
        $jmlcek = mysqli_num_rows($cek);
        if($jmlcek==0){
            // Mendapatkan id terbesar
            $getMaxId = mysqli_query($koneksi, "SELECT MAX(id) AS maxid FROM absen_harian");
            $row = mysqli_fetch_assoc($getMaxId);
            $maxid = $row['maxid'];

            // Mengecek jika id masih kosong, maka diinisialisasi dengan 0
            if(empty($maxid)){
                $maxid = 0;
            }

            $insert = mysqli_query($koneksi, "INSERT INTO absen_harian (id, tgl_absensi,
            nik, absensi) VALUES ('$maxid'+1, '$tgl_absensi','$nik','$absensi') ") or die
            (mysqli_error($koneksi));
            if($insert){
                ?> <div class="alert alert-success alert-dismissable"><button type="button"
                class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Proses Absensi Harian berhasil Di Simpan.<a href="absenhari_data.php">
                Kembali ke halaman Absen Harian</a></div>
            <?php
            }else{ 
                ?> <div class="alert alert-danger alert-dismissable"><button type="button"
                class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Proses Absensi Harian Gagal Di Simpan.</div>
                <?php
            }
        }else{
            ?> <div class="alert alert-danger alert-dismissable"><button type="button"
            class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Absen sudah ada!</div>
            <?php
        }
    } }
        $now = date("Y-m-d");
            ?>
    <form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Absen</label>
            <div class="col-sm-3">
                <input type="date" name="tgl_absensi" class="form-control" value="<?php
                echo $now; ?>" maxlength="10" placeholder="Tanggal Absen" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">NIK</label>
            <div class="col-sm-3">
                <select name="nik" class="form-control">
                    <?php
                    $Que = "SELECT tkaryawan.* FROM tkaryawan LEFT JOIN absen_harian ON
                    absen_harian.nik=tkaryawan.nik WHERE tkaryawan.nik NOT IN (SELECT nik
                    from absen_harian WHERE absen_harian.tgl_absensi='$now') GROUP BY
                    tkaryawan.nik";
                    $myQry = mysqli_query($koneksi,$Que) or die ("Gagal Query tkaryawan".
                    mysqli_error($koneksi));
                    while ($list = mysqli_fetch_array($myQry)){
                        if ($data == $list['nik']){
                            $cek= "selected";
                        } else {$cek="";}
                        echo "<option value = '$list[nik]' $cek> $list[nik] $list[nama]
                        </option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Keterangan Absensi</label>
            <div class="col-sm-3">
                <select name="absensi" class="form-control">
                    <option value="">Pilih Absensi</option>
                    <option value="Masuk">Masuk</option>
                    <option value="Alpa">Alpa</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="add" class="btn btn-sm btn-primary"
                value="Simpan">
                <a href="absenhari_data.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>
