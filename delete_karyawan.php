<?php include "header.php";
    if($_GET) {
        if(empty($_GET['nik'])){
?>
    <b>Data yang dihapus tidak ada</b>
    <?php
        }
        else {
            $mySql = "DELETE FROM tkaryawan WHERE nik='".
            $_GET['nik']."'";
            $myQry = mysqli_query($koneksi,$mySql) or die
            ("Error saat menghapus data".mysqli_error($koneksi));
        if($myQry) {
    ?>
        <div class="alert alert-success alert-dismassable">
        <button class="close" type="button" data-dismiss="alert"
        aria-hidden="true">&times;</button>Data berhasil dihapus</div>
        <meta http-equiv="refresh" content='1;url=data_karyawan.php'>
    <?php    
    }
        }
    }
    ?>