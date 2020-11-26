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

// Hapus jabatan
if ($module=='jabatan' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM jabatan WHERE id_jabatan='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input jabatan
elseif ($module=='jabatan' AND $act=='input'){

			$query=mysql_query("insert into jabatan (id_jabatan, jabatan) 
			values ('$_POST[id_jabatan]','$_POST[jabatan]')");
  header('location:../../media.php?module='.$module);

  
}

// Update jabatan
elseif ($module=='jabatan' AND $act=='update'){

							 
							     mysql_query("UPDATE jabatan SET jabatan = '$_POST[jabatan]'
                             WHERE id_jabatan   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
