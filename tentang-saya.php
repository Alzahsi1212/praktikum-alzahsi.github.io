<?php include "header.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tentang Saya</title>
    <style>
      body {
        background-color: #e8e8e8;
      }
      
      .kartu {
        width: 800px;
        margin: 0 auto;
        margin-top: 70px;
            box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,.03);
    transition: all .3s;
           background-color: #591869;
    border: solid 8px #ea92ff;
    border-top-right-radius: 80px;
    border-bottom-left-radius: 80px;
      } 
      .kartu:hover {
        background-color: #1f8a45;
        border: solid 8px #4fd47e;
        border-top-left-radius: 80px;
    border-bottom-right-radius: 80px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
      }
      .foto {
            padding: 20px;
    margin-left: 30px;
    margin-top: 10px;
      }
      tbody {
    font-size: 20px;
    font-weight: 300;
    color:white;
}
.biodata {
    margin-top: 30px;
}
.black-button {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }
    </style>
  </head>
  <body>
    <center>
    <h2>Tentang Saya</h2>
    </center>
<div class="container">
  <div class="card kartu">
    <div class="row">
      <div class="col-md-4">
      <div class="foto">
        <img src="img/user.png" class="img-thumbnail" alt="" width="150" height="auto">
      </div>
      </div>
      <div class="col-md-8 kertas-biodata">
        <div class="biodata">
        <table width="100%" border="0">
    <tbody><tr>
        <td valign="top">
        <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;">
          <tbody>
            <tr>
              <td width="25%" valign="top" class="textt">Nama</td>
                <td width="2%">:</td>
                <td style="color: #e9a7f9; font-weight:bold">M. Alzahsi Ansari</td>
            </tr>
          <tr>
              <td class="textt">Jenis Kelamin</td>
                <td>:</td>
                <td>Laki-Laki</td>
            </tr>
          <tr>
              <td class="textt">Tempat Lahir</td>
                <td>:</td>
                <td>Banjarmasin</td>
            </tr>
          <tr>
              <td class="textt">Tanggal Lahir</td>
                <td>:</td>
                <td>15 Juli 2002</td>
            </tr>
          <tr>
              <td class="textt">Fakultas</td>
                <td>:</td>
                <td>Teknologi Informasi</td>
            </tr>
          <tr>
              <td valign="top" class="textt">Prodi</td>
                <td valign="top">:</td>
                <td>Teknik Informatika</td>
            </tr>
        </tbody></table>
        </td>
    </tr>
    </tbody></table>
  </div>
      </div>
    </div>
  </div><br>
  <center>
  <a href="https://github.com/Alzahsi1212"><button class="black-button">
  <img src="img/github.png" alt="Gambar" width="30">Github</button></a>
  </center>
</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php include "footer.php"; ?>