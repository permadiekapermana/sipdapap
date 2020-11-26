<?php
error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "class.ezpdf.php";
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "rupiah.php";
define('FPDF_FONTPATH','font/');
require('fpdf_protection.php');
$id=$_POST[id];
$query= "SELECT * FROM `mutasi_masuk`
INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
INNER JOIN `desa` ON `penduduk`.`id_desa` = `desa`.`id_desa`
INNER JOIN `kecamatan` ON `penduduk`.`id_kecamatan` = `kecamatan`.`id_kecamatan`
INNER JOIN `kabupaten` ON `penduduk`.`id_kabupaten` = `kabupaten`.`id_kabupaten`
INNER JOIN `provinsi` ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
INNER JOIN `gol_darah` ON `penduduk`.`id_goldarah` = `gol_darah`.`id_goldarah`
INNER JOIN `status_nikah` ON `penduduk`.`id_statusnikah` = `status_nikah`.`id_statusnikah`
INNER JOIN `status_tinggal` ON `penduduk`.`id_statustinggal` = `status_tinggal`.`id_statustinggal`
INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
INNER JOIN `agama` ON `penduduk`.`id_agama` = `agama`.`id_agama`
INNER JOIN `pekerjaan` ON `penduduk`.`id_pekerjaan` = `pekerjaan`.`id_pekerjaan`
INNER JOIN `pendidikan` ON `penduduk`.`id_pendidikan` = `pendidikan`.`id_pendidikan`
WHERE id_mutasimasuk='$id'";
$query2= "SELECT
*
FROM
`mutasi_masuk`
INNER JOIN `rt` ON `rt`.`id_rt` = `mutasi_masuk`.`id_rt`
INNER JOIN `rw` ON `rw`.`id_rw` = `mutasi_masuk`.`id_rw`
INNER JOIN `provinsi` ON `provinsi`.`id_provinsi` =
  `mutasi_masuk`.`id_provinsi`
INNER JOIN `kabupaten` ON `kabupaten`.`id_kabupaten` =
  `mutasi_masuk`.`id_kabupaten`
INNER JOIN `kecamatan` ON `kecamatan`.`id_kecamatan` =
  `mutasi_masuk`.`id_kecamatan`
INNER JOIN `desa` ON `desa`.`id_desa` = `mutasi_masuk`.`id_desa`
WHERE id_mutasimasuk='$id'";
		
if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	$r    = mysql_fetch_array($baca);
	$baca2= mysql_query($query2);
	$r2    = mysql_fetch_array($baca2);
		
	$lat=explode("-",$r[tgl_lahir]);
	$usia=$thn_sekarang-$lat[0];

	$pdf=new FPDF('P','cm','Legal');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(1,3,1);
	$pdf->SetAutoPageBreak(true,3);
	$pdf->SetFont('Times','B',14);
	$pdf->Image("images/logooo.jpg",2,1.15,'L');
	$pdf->SetFont('Times','B',8);
	$pdf->Ln();
	$pdf->Cell(0,.6,' ',0,0,'C');
	$pdf->SetFont('Times','B',16);
	$pdf->Ln();
	$pdf->Cell(0,.6,'PEMERINTAH KABUPATEN CIREBON',0,0,'C');
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,.6,'',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,.6,'KECAMATAN JAMBLANG',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,.6,'DESA SITIWINANGUN',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,.6,'Jl. Moh Ramdhan Desa Sitiwinangun No. 225',0,0,'C');	
	$pdf->Ln();
	$pdf->Cell(0,.6,' Kecamatan Jamblang Kabupaten Cirebon 45157',0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(0,.2,'___________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'___________________________________________________________________________________',0,0,'C');
	
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(2,1,'',2,0,'L');
	$pdf->Cell(3,1,'A. DATA PRIBADI',2,0,'L');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'NIK  ',2,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['nik'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Nama  ',2,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['nama'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Tempat Tanggal Lahir  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['tmp_lahir']." , ".$r['tgl_lahir'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Jenis Kelamin  ',2,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['jk'],2,0,'L');
		$pdf->Ln();

		$pdf->SetFont('Times','B',14);
	$pdf->Cell(2,1,'',2,0,'L');
	$pdf->Cell(3,1,'B. DATA ALAMAT',2,0,'L');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
		
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Alamat',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,'Desa Sitiwinangun RT '.$r['rt'].' RW '.$r['rt'].' Kecamatan Jamblang',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'RT',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['rt'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'RW',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['rw'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Desa/Kelurahan',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['desa'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Kecamatan',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['kecamatan'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Kabupaten/Kota',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['kabupaten'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Provinsi',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r['provinsi'].'',2,0,'L');
		$pdf->Ln();

		$pdf->SetFont('Times','B',14);
	$pdf->Cell(2,1,'',2,0,'L');
	$pdf->Cell(3,1,'C. DATA ALAMAT ASAL',2,0,'L');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
		
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Alamat',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,'Desa '.$r2['desa'].' RT '.$r2['rt'].' RW '.$r2['rt'].' '.$r2['kecamatan'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'RT',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['rt'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'RW',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['rw'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Desa/Kelurahan',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['desa'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Kecamatan',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['kecamatan'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Kabupaten/Kota',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['kabupaten'].'',2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Provinsi',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,''.$r2['provinsi'].'',2,0,'L');
		$pdf->Ln();

		$pdf->SetFont('Times','B',14);
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'D. DATA LAIN LAIN',2,0,'L');
		$pdf->Ln();
		$pdf->SetFont('Times','',12);

		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Golongan Darah  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['gol_darah'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Agama  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['agama'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Pendidikan  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['pendidikan'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Pekerjaan  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['pekerjaan'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Status Nikah ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['status_nikah'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Status Tinggal ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['status_tinggal'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Tanggal Mutasi Masuk',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['tgl_mutasimasuk'],2,0,'L');
		$pdf->Ln();
		
	}
	$pdf->Output();
	}
?>
