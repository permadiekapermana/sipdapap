<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus pekerjaan
if ($module=='pekerjaan' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM pekerjaan WHERE id_pekerjaan='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input pekerjaan
elseif ($module=='pekerjaan' AND $act=='input'){

			$query=mysql_query("insert into pekerjaan (id_pekerjaan, pekerjaan) 
			values ('$_POST[id_pekerjaan]','$_POST[pekerjaan]')");
  header('location:../../media.php?module='.$module);

  
}

// Update pekerjaan
elseif ($module=='pekerjaan' AND $act=='update'){

							 
							     mysql_query("UPDATE pekerjaan SET pekerjaan = '$_POST[pekerjaan]'
                             WHERE id_pekerjaan   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
