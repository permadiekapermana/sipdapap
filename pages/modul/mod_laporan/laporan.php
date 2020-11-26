<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

   echo "<h3> Laporan penerimaan Barang </h3><br><form action='modul/mod_laporan/cetak_penerimaan.php' target='_blank'> <input type=submit name=submit value=Cetak_Penerimaan></form> <br>";
    echo "<h3> Laporan Penjualan Barang </h3><br><form action='modul/mod_laporan/cetak_penjualan.php' target='_blank'> <input type=submit name=submit value=Cetak_Penjualan></form> <br>";
	 echo "<h3> Laporan Persediaan Barang </h3><br><form action='modul/mod_laporan/cetak_persediaan.php' target='_blank'> <input type=submit name=submit value=Cetak_Persediaan></form> <br>";
	 echo "<div></div> <br>";
	 

}
?>
