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
$pel="NIK.";
$y=substr($pel,0,2);
$query=mysql_query("select * from penduduk where substr(nik,1,2)='$y' order by nik desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['nik'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$module=$_GET[module];
$act=$_GET[act];

// Hapus penduduk
if ($module=='mutasimasuk' AND $act=='hapus'){
  
	 mysql_query("UPDATE penduduk SET hapus = 'Y', delete_by = '$_SESSION[id_user]' WHERE no='$_GET[id]'");
	 
	 mysql_query("DELETE FROM mutasi_masuk WHERE id_mutasimasuk='$_GET[id_mutasimasuk]'");
     
  header('location:../../media.php?module='.$module);
}

// Input penduduk
elseif ($module=='mutasimasuk' AND $act=='input'){
// 	if (empty($_POST[nik]) ){
// $nik="$nopel";
// 	} else {
// 		$nik=$_POST[nik];



// 	}

	$query=mysql_query("insert into mutasi_masuk (id_mutasimasuk,
	id_penduduk,
	id_rt,
	id_rw,
	id_provinsi,
	id_kabupaten,
	id_kecamatan,
	id_desa,tgl_mutasimasuk) 
values ('$_POST[id_mutasimasuk]',
'$_POST[id_penduduk]',
'$_POST[id_rtasal]',
'$_POST[id_rwasal]',
'$_POST[id_provinsiasal]',
'$_POST[id_kabupatenasal]',
'$_POST[id_kecamatanasal]',
'$_POST[id_desaasal]',
'$tgl_sekarang')");

$cek_nik = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE nik = '$_POST[nik]'"));
	if ( $cek_nik > 0 ){
		echo "<script>alert('NIK yang Anda Masukkan Sudah Terdaftar di Sistem!');history.go(-1)</script>";
	} else{

$query=mysql_query("insert into penduduk (no_reff,
													id_penduduk,
													nik,
													nama,
													tmp_lahir,
													tgl_lahir,
													id_jk,
													id_goldarah,
													id_agama,
													id_pekerjaan,
													id_pendidikan,
													id_statusnikah,
													id_statustinggal,
													id_statuspenduduk,
													id_rt,
													id_provinsi,
													id_kabupaten,
													id_kecamatan,
													id_desa,
													hapus, created_by, delete_by) 
												values (NULL,
												'$_POST[id_penduduk]',
												'$_POST[nik]',
												'$_POST[nama]',
												'$_POST[tmp_lahir]',
												'$_POST[tgl_lahir]',
												'$_POST[id_jk]',
												'$_POST[id_goldarah]',
												'$_POST[id_agama]',			
												'$_POST[id_pekerjaan]',
												'$_POST[id_pendidikan]',
												'$_POST[id_statusnikah]',
												'$_POST[id_statustinggal]',
												'STP.001',
												'$_POST[id_rt]',
												'$_POST[id_provinsi]',
												'$_POST[id_kabupaten]',
												'$_POST[id_kecamatan]',
												'$_POST[id_desa]',
												'N','$_SESSION[id_user]',NULL)");

	$query=mysql_query("UPDATE penduduk SET id_penduduk = '$_POST[id_penduduk]' WHERE no='1'");
	
			
  header('location:../../media.php?module='.$module);

	}
}

// Update penduduk
elseif ($module=='mutasimasuk' AND $act=='update'){

	$query=mysql_query("insert into penduduk (no_reff,
	id_penduduk,
	nik,
	nama,
	tmp_lahir,
	tgl_lahir,
	id_jk,
	id_goldarah,
	id_agama,
	id_pekerjaan,
	id_pendidikan,
	id_statusnikah,
	id_statustinggal,
	id_statuspenduduk,
	id_rt,
	id_provinsi,
	id_kabupaten,
	id_kecamatan,
	id_desa,
	hapus, created_by, delete_by) 
values ('$_POST[no]',
'$_POST[id3]',
'$_POST[nik]',
'$_POST[nama]',
'$_POST[tmp_lahir]',
'$_POST[tgl_lahir]',
'$_POST[id_jk]',
'$_POST[id_goldarah]',
'$_POST[id_agama]',			
'$_POST[id_pekerjaan]',
'$_POST[id_pendidikan]',
'$_POST[id_statusnikah]',
'$_POST[id_statustinggal]',
'STP.001',
'$_POST[id_rt]',
'$_POST[id_provinsi]',
'$_POST[id_kabupaten]',
'$_POST[id_kecamatan]',
'$_POST[id_desa]',
'N','$_SESSION[id_user]', NULL)");

mysql_query("UPDATE penduduk SET hapus = 'Y', delete_by ='$_SESSION[id_user]' WHERE no='$_POST[no]'");

	mysql_query("UPDATE mutasi_masuk SET id_rt = '$_POST[rt_asal]',id_rw = '$_POST[rw_asal]',id_provinsi = '$_POST[provinsi_asal]',
				id_kabupaten = '$_POST[kabupaten_asal]',id_kecamatan = '$_POST[kecamatan_asal]',id_desa = '$_POST[desa_asal]'				
				WHERE id_mutasimasuk='$_POST[id2]'");
  header('location:../../media.php?module='.$module);
 
  
  
}



}

?>
