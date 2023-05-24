<?php include "header.php";
    if($_GET) {
        if(empty($_GET['username'])){
?>
    <b>Data yang dihapus tidak ada</b>
    <?php
        }
        else {
            $mySql = "DELETE FROM tuser WHERE username='".
            $_GET['username']."'";
            $myQry = mysqli_query($koneksi,$mySql) or die
            ("Error saat menghapus user".mysqli_error($koneksi));
        if($myQry) {
    ?>
        <div class="alert alert-success alert-dismassable">
        <button class="close" type="button" data-dismiss="alert"
        aria-hidden="true">&times;</button>User berhasil dihapus</div>
        <meta http-equiv="refresh" content='1;url=data_user.php'>
    <?php    
    }
        }
    }
    ?>