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

// Hapus pendidikan
if ($module=='pendidikan' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM pendidikan WHERE id_pendidikan='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input pendidikan
elseif ($module=='pendidikan' AND $act=='input'){

			$query=mysql_query("insert into pendidikan (id_pendidikan, pendidikan) 
			values ('$_POST[id_pendidikan]','$_POST[pendidikan]')");
  header('location:../../media.php?module='.$module);

  
}

// Update pendidikan
elseif ($module=='pendidikan' AND $act=='update'){

							 
							     mysql_query("UPDATE pendidikan SET pendidikan = '$_POST[pendidikan]'
                             WHERE id_pendidikan   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
