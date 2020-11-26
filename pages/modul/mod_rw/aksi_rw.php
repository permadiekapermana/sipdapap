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

// Hapus rw
if ($module=='rw' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM rw WHERE id_rw='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input rw
elseif ($module=='rw' AND $act=='input'){

			$query=mysql_query("insert into rw (id_rw, rw) 
			values ('$_POST[id_rw]','$_POST[rw]')");
  header('location:../../media.php?module='.$module);

  
}

// Update rw
elseif ($module=='rw' AND $act=='update'){

							 
							     mysql_query("UPDATE rw SET rw = '$_POST[rw]'
                             WHERE id_rw   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





  }

?>