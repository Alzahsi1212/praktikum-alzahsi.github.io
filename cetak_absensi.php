<?php include "header.php"; ?>
<div class="container" style="margin: 0 auto;">
<div>
    <h2>Cetak Absensi Harian</h2><hr>
    <form method="GET" class="from-horizontal" 
    action="laporan_absen.php?tanggal=['tanggal']" target="_blank">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Absen</label>
        <div class="col-sm-3">
            <input type="date" name="tanggal" class="form-control"
            value="<?php echo date("Y-m-d"); ?>"maxlength="10" placeholder="Tanggal Absen"
            required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label><br><br>
        <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-sm btn-primary"
            value="Proses">
            <button onclick="history.back();" class="btn btn-sm btn-danger">
            Batal</button>
        </div>
    </div>
    </form>
</div>
</div>
<?php include "footer.php"; ?>