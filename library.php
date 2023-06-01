<?php 
#membalik format tanggal inggris (y-m-d) ke indo (d-m-y)
function IndonesiaTgl($tanggal){
    $tgl = substr($tanggal, 8, 2);
    $bln = substr($tanggal, 5, 2);
    $thn = substr($tanggal, 0, 4);
    $tanggal = "$tgl-$bln-$thn";
    return $tanggal;
}

#membuat format rupiah pada uang
function format_angka($angka) {
    $hasil = number_format($angka,0, ",",".");
    return $hasil;
}
# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (dd Nama Bulan Tahun)
function indonesia2Tgl($tanggal){ 
    $bulan = array ( 
     1 =>  'Januari', 
     'Februari', 
     'Maret', 
     'April', 
     'Mei', 
     'Juni', 
     'Juli', 
     'Agustus', 
     'September', 
     'Oktober', 
     'November', 
     'Desember' 
    ); 
    $pecahkan = explode('-', $tanggal);  
        
    if($pecahkan[1]=="00"){ 
     return "INVALID"; 
    } 
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0]; 
   }

?>