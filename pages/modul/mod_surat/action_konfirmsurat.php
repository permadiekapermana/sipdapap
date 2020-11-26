<?php

if('$_SESSION[kode_surat]' == 'RT'){
  $aksi2 = "modul/mod_surat/surat_pengantar.php"; 
}else if('$_SESSION[kode_surat]' == '474.6'){
  $aksi2 ="modul/mod_surat/surat_penghasilan.php";
}else if('$_SESSION[kode_surat]' == '474.5'){
  $aksi2 ="modul/mod_surat/sktm.php";
}else if('$_SESSION[kode_surat]' == '474.4'){
  $aksi2 ="modul/mod_surat/sku.php";
}else if('$_SESSION[kode_surat]' == '474.3'){
  $aksi2 ="modul/mod_surat/surat_pindah_confirm.php";
}else if('$_SESSION[kode_surat]' == '474.2'){
  $aksi2 ="modul/mod_surat/surat_kematian.php";
}else if('$_SESSION[kode_surat]' == '474.1'){
  $aksi2 ="modul/mod_surat/surat_kelahiran.php";
}else if('$_SESSION[kode_surat]' == '045.2'){
  $aksi2 ="modul/mod_surat/skck.php";



}else{
  $aksi2 ="page_404.html";
}

?>