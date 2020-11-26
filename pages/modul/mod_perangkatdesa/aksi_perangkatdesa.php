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

// Hapus perangkatdesa
if ($module=='perangkatdesa' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM perangkat_desa WHERE id_perangkatdesa='$_GET[id]'");
     mysql_query("DELETE FROM users WHERE id_user='$_GET[id]' ");
  header('location:../../media.php?module='.$module);
}

// Input perangkatdesa
elseif ($module=='perangkatdesa' AND $act=='input'){
$password=sha1($_POST[password]);
$query=mysql_query("insert into users (id_user, username,password,id_level,blokir) 
values ('$_POST[id_user]','$_POST[username]','$password','$_POST[id_level]','$_POST[blokir]')");
			$query=mysql_query("insert into perangkat_desa (id_perangkatdesa, id_user, nama,id_jabatan) 
      values ('$_POST[id_perangkatdesa]','$_POST[id_user]','$_POST[nama]','$_POST[id_jabatan]')");
      
      
  header('location:../../media.php?module='.$module);

  
}

// Update perangkatdesa
elseif ($module=='perangkatdesa' AND $act=='update'){
  $password=sha1($_POST[password]);

  if (empty($_POST[password]) ){


    mysql_query("UPDATE perangkat_desa SET nama = '$_POST[nama]',id_jabatan = '$_POST[id_jabatan]'
    WHERE id_perangkatdesa   = '$_POST[id]'");

mysql_query("UPDATE users SET password = '$_POST[pass66]', username = '$_POST[username]', id_level = '$_POST[id_level]', blokir = '$_POST[blokir]'
WHERE id_user   = '$_POST[id2]'");

  }
  else {
    mysql_query("UPDATE perangkat_desa SET nama = '$_POST[nama]',id_jabatan = '$_POST[id_jabatan]'
                             WHERE id_perangkatdesa   = '$_POST[id]'");

 mysql_query("UPDATE users SET password = '$password', username = '$_POST[username]', id_level = '$_POST[id_level]', blokir = '$_POST[blokir]'
 WHERE id_user   = '$_POST[id2]'");
  }							 
							     

    header('location:../../media.php?module='.$module);
    }





}

?>
