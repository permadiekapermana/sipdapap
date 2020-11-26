<?php

if($_SESSION[kode_surat] == 'RT'){
  $action_surat = "modul/mod_surat/surat_pengantar.php"; 
}else if($_SESSION[kode_surat] == '474.6'){
  $action_surat ="modul/mod_surat/surat_penghasilan.php";
}else if($_SESSION[kode_surat] == '474.5'){
  $action_surat ="modul/mod_surat/sktm.php";
}else if($_SESSION[kode_surat] == '474.4'){
  $action_surat ="modul/mod_surat/sku.php";
}else if($_SESSION[kode_surat] == '474.3'){
  $action_surat ="modul/mod_surat/surat_pindah.php";
}else if($_SESSION[kode_surat] == '474.2'){
  $action_surat ="modul/mod_surat/surat_kematian.php";
}else if($_SESSION[kode_surat] == '474.1'){
  $action_surat ="modul/mod_surat/surat_kelahiran.php";
}else if($_SESSION[kode_surat] == '045.2'){
  $action_surat ="modul/mod_surat/skck.php";



}else{
  $action_surat ="page_404.html";
}

?>