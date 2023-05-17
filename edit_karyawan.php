<?php include "header.php"; ?>
    <?php
    $nik = $_GET['nik'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tkaryawan WHERE
    nik='$nik' ");
    if(mysqli_num_rows($sql)==0) {
    ?>
        <div class="alert alert-danger alert-dismissable"><button
        type="button" class="close" data-dismiss="alert" aria-hidden="true">
        &times;</button>NIK Tidak Ada..!</div>
    <?php
    } else {
        $row = mysqli_fetch_assoc($sql);
    }    
    //Proses simpan Data
    if(isset($_POST['update'])) {
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $alamat         = $_POST['alamat'];
        $no_telepon     = $_POST['no_telepon'];
        $jabatan        = $_POST['jabatan'];
        $status         = $_POST['status'];

        $update = mysqli_query($koneksi, "UPDATE tkaryawan SET
        nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', 
        alamat='$alamat', no_telepon='$no_telepon',jabatan='$jabatan', status='$status' WHERE nik='$nik'")
        or die(mysqli_error($koneksi)); if($update) {
        ?>
        <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        &times;</button>Data berhasil diUpdate.</div>
        <?php
        } else {
        ?> <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        &times;</button>Data gagal diUpdate,silahkan coba lagi.</div>
        <?php
        }
    }
    ?>
    
    <h2>Data Karyawan &raquo; Edit Data</h2>
    <hr>
    <form action="" method="POST" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">NIK</label>
            <div class="col-sm-2">
                <input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control"
                placeholder="NIK" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-4">
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control"
                placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-sm-4">
                <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" class="form-control"
                placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-4">
                <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" class="form-control"
                placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-3">
                <textarea name="alamat" class="form-control" 
                placeholder="Alamat"><?php echo $row['alamat']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">No Telepon</label>
            <div class="col-sm-3">
                <input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" maxlength="12"
                class="form-control" placeholder="No Telepon" required>
            </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">Jabatan</label>
        <div class="col-sm-2">
        <select name="jabatan" class="form-control" required>
            <option value="">-Jabatan Terbaru-</option>
            <option value="Operator" <?php echo $row['jabatan'] == 'Operator' ? 'selected' : ''; ?>>Operator</option>
            <option value="Leader" <?php echo $row['jabatan'] == 'Leader' ? 'selected' : ''; ?>>Leader</option>
            <option value="Supervisor" <?php echo $row['jabatan'] == 'Supervisor' ? 'selected' : ''; ?>>Supervisor</option>
            <option value="Manager" <?php echo $row['jabatan'] == 'Manager' ? 'selected' : ''; ?>>Manager</option>
        </select>
        </div>
        <div class="col-sm-3">
        <b>Jabatan Sekarang :</b> <span class="label label-success"><?php echo $row['jabatan']; ?></span>
        </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-2">
                <select name="status" class="form-control">
                    <option value="">-Status Terbaru-</option>
                    <option value="Outsourcing" <?php echo $row['status'] == 'Outsourcing' ? 'selected' : ''; ?>>Outsourcing</option>
                    <option value="Kontrak" <?php echo $row['status'] == 'Kontrak' ? 'selected' : ''; ?>>Kontrak</option>
                    <option value="Tetap" <?php echo $row['status'] == 'Tetap' ? 'selected' : ''; ?>>Tetap</option>
                </select>
            </div>
            <div class="col-sm-3">
            <b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
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
<?php include "footer.php"; ?>