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
if ($module=='ketuart' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM ketuart WHERE id_ketuart='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}

// Input rt
elseif ($module=='ketuart' AND $act=='input'){
  
  $edit = mysql_query("SELECT * FROM ketua_rt, rt  WHERE ketua_rt.id_rt=rt.id_rt 
          and rt.id_rt='$_POST[id_rt]' and status='Y'");
    $r    = mysql_fetch_array($edit);
  
  $password=sha1($_POST[password]);
			
      $querys = mysql_query("update ketua_rt set status='N', tgl_akhirjabatan= '$tgl_sekarang' where id_rt = '$_POST[id_rt]' and status='Y'");
      $querys =  mysql_query("update users set blokir='Y'
                      where id_penduduk = '$r[id_penduduk]' and id_level='$_POST[id_level]'");
      if($querys){
        $query=mysql_query("insert into ketua_rt (id_ketuart,id_penduduk,id_rt,tgl_menjabat,status) 
        values ('$_POST[id_ketuart]','".base64_decode(urldecode($_POST[id_penduduk]))."','$_POST[id_rt]','$tgl_sekarang','Y')");  
        $query=mysql_query("insert into users (id_user,id_penduduk, username,password,id_level,blokir) 
        values ('$_POST[id_user]','".base64_decode(urldecode($_POST[id_penduduk]))."','$_POST[username]','$password','$_POST[id_level]','N')");
      }
      header('location:../../media.php?module='.$module);

  
}

// Update rt
elseif ($module=='ketuart' AND $act=='update'){
if ($_POST[status] == "N"){
$tgl_akhirjabatan=$tgl_sekarang;	
}
else 
{
$tgl_akhirjabatan='NULL';	
	
}

							 
							     mysql_query("UPDATE ketua_rt SET status = '$_POST[status]',
								 tgl_akhirjabatan='$tgl_akhirjabatan'

                             WHERE id_ketuart   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }





}

?>
