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

// Hapus agama
if ($module=='agama' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM agama WHERE id_agama='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input agama
elseif ($module=='agama' AND $act=='input'){

			$query=mysql_query("insert into agama (id_agama, agama) 
			values ('$_POST[id_agama]','$_POST[agama]')");
  header('location:../../media.php?module='.$module);

  
}

// Update agama
elseif ($module=='agama' AND $act=='update'){

							 
							     mysql_query("UPDATE agama SET agama = '$_POST[agama]'
                             WHERE id_agama   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
