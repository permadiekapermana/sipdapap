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

// Hapus rt
if ($module=='rt' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM rt WHERE id_rt='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input rt
elseif ($module=='rt' AND $act=='input'){

			$query=mysql_query("insert into rt (id_rt, id_rw, rt) 
			values ('$_POST[id_rt]','$_POST[id_rw]','$_POST[rt]')");
  header('location:../../media.php?module='.$module);

  
}

// Update rt
elseif ($module=='rt' AND $act=='update'){

							 
							     mysql_query("UPDATE rt SET id_rw = '$_POST[id_rw]', rt = '$_POST[rt]'
                             WHERE id_rt   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
