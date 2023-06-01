<?php include "header.php"; ?>
<div class="container" style="margin: 0 auto;">
    <h2>Proses Absen Harian &raquo; Edit Data</h2>
    <hr>

    <?php
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM absen_harian WHERE id='$id'");
    if(mysqli_num_rows($sql) == 0){
        header("location: admin.php");
    } else {
        $row = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['save'])){
        $tgl_absensi = $_POST['tgl_absensi'];
        $nik         = $_POST['nik'];
        $absensi     = $_POST['absensi'];

        // Validasi jika opsi kosong dipilih
        if(!empty($absensi)){
            $update = mysqli_query($koneksi, "UPDATE absen_harian SET tgl_absensi='$tgl_absensi'
            , nik='$nik', absensi='$absensi' WHERE id='$id'") or die(mysqli_error($koneksi));
            if($update){
                header("location: absenhari_data.php?id=".$id."&pesan=sukses");
            } else {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan, silahkan coba lagi
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Absensi harus dipilih
            </div>
            <?php
        }
    }

    if(isset($_GET['pesan']) == 'sukses'){
        ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil disimpan.
        </div>
        <?php
    }

    $now = date("Y-m-d");
    ?>

    <form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Absen</label>
            <div class="col-sm-2">
                <input type="date" name="tgl_absensi" class="form-control" value=
                "<?php echo $row['tgl_absensi']; ?>" placeholder="NIK" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">NIK</label>
            <div class="col-sm-2">
                <select name="nik" class="form-control">
                    <option value="">Pilih Karyawan</option>
                    <?php
                    $Que = "SELECT * FROM tkaryawan";
                    $myQry = mysqli_query($koneksi, $Que) or die ("Gagal Query tkaryawan"
                     . mysqli_error($koneksi));
                    while ($list = mysqli_fetch_array($myQry)){
                        if ($row['nik'] == $list['nik']){
                            $cek = "selected";
                        } else {
                            $cek = "";
                        }
                        echo "<option value='$list[nik]' $cek> $list[nik]
                         $list[nama] </option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-2">
                <select name="absensi" class="form-control">
                    <option value="">Pilih Absensi</option>
                    <option value="Masuk" <?php if($row['absensi'] == 'Masuk')
                     echo "selected"; ?>>Masuk</option>
                    <option value="Alpa" <?php if($row['absensi'] == 'Alpa')
                     echo "selected"; ?>>Alpa</option>
                    <option value="Izin" <?php if($row['absensi'] == 'Izin')
                     echo "selected"; ?>>Izin</option>
                    <option value="Sakit" <?php if($row['absensi'] == 'Sakit')
                     echo "selected"; ?>>Sakit</option>
                </select>
            </div>
            <div class="col-sm-3">
                <b>Absen Sekarang :</b><span class="label label-info">
                    <?php echo $row['absensi']; ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
                <a href="absenhari_data.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>
