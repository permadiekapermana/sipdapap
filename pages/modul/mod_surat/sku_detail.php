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
$id_surat=$_POST[id_surat];
$id_surat2=$_POST[id_surat2];
$isi_field=$_POST[isi_field];
$no_urut=$_POST[no_urut];
$id_rt=$_POST[id_rt];
$id_rw=$_POST[id_rw];
$id_perangkatdesa=$_POST[id_perangkatdesa];

$jml=count($_GET[id_surat]);
$id=$_GET[id_surat];

include "bulan_romawi_detail.php";

$query= "SELECT * FROM `surat`
INNER JOIN `jenis_surat` ON `surat`.`kode_surat` = `jenis_surat`.`kode_surat`
INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
INNER JOIN `agama` ON `penduduk`.`id_agama` = `agama`.`id_agama`
INNER JOIN `pekerjaan` ON `penduduk`.`id_pekerjaan` = `pekerjaan`.`id_pekerjaan`
INNER JOIN `pendidikan` ON `penduduk`.`id_pendidikan` = `pendidikan`.`id_pendidikan`
INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
where id_statussurat='SS.003' and surat.id_surat='$id'";

if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	$r    = mysql_fetch_array($baca);
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
	$pdf->SetY($x+1);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,1,'SURAT KETERANGAN TIDAK MAMPU',0,0,'C');
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	$pdf->Cell(0,1,'No : '.$r[no_akhirsurat].'/'.$r[kode_surat].'/'.$r[bulan].'/'.$r[tahun],0,0,'C');
	
	$x=$pdf->GetY();
	$pdf->SetY($x+2);

	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(2,1,'',2,0,'L');
	$pdf->Cell(3,1,'Yang bertanda tangan di bawah ini Kepala Desa Sitiwinangun Kecamatan Jamblang Kabupaten',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(3,1,'Cirebon, dengan ini menerangkan bahwa :',0,0,'L');
		$pdf->Ln();
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
		$pdf->Cell(3,1,'Jenis Kelamin  ',2,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['jk'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Tempat Tanggal Lahir  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['tmp_lahir']." , ".$r['tgl_lahir'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Agama  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['agama'],2,0,'L');
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
		$pdf->Cell(3,1,'Alamat ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,'Desa Sitiwinangun RT '.$r['rt'].' RW '.$r['rt'].' Kecamatan Jamblang',2,0,'L');
		$pdf->Ln();

		$tampil1 = mysql_query("SELECT * FROM detail_field WHERE id_surat='$r[id_surat]' ORDER BY id_detail DESC limit $jml");
  
    $no = 1;
    while($r1=mysql_fetch_array($tampil1)){
		$edit9 = mysql_query("SELECT * FROM surat,field_surat,detail_field  WHERE surat.kode_surat=field_surat.kode_surat and field_surat.no_urut=detail_field.no_urut and field_surat.no_urut='$r1[no_urut]' and field_surat.kode_surat='$r[kode_surat]' ");
    $r99    = mysql_fetch_array($edit9);
	$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,$r99['isi'],0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r1['isi_field'],2,0,'L');
		$pdf->Ln();	
		
	}
		
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Bahwa nama tersebut benar mempunyai usaha dan termasuk dalam warga desa kami.',0,0,'L');
		
		$pdf->Ln();
		$pdf->Cell(3,1,'Demikian surat keterangan usaha ini kami buat agar menjadi tahu dan maklum adanya dan dapat',0,0,'L');
		$pdf->Ln();		
		$pdf->Cell(3,1,'dipergunakan sebagaimana mestinya.',0,0,'L');
		
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(21,1,'Sitiwinangun, '.$r[tgl_surat],0,0,'C');
		
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,'Mengetahui,',0,0,'C');
	$pdf->Ln();
	
	$ttds	=	mysql_query("SELECT * FROM `perangkatdesa`
							INNER JOIN `jabatan` ON `perangkatdesa`.`id_jabatan` = `jabatan`.`id_jabatan`
							where jabatan='Kepala Desa'  ORDER BY id_perangkatdesa DESC");
	$ttd    =	mysql_fetch_array($ttds);
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,$ttd['jabatan'],0,0,'C');
	$pdf->Ln();
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,$ttd[nama],0,0,'C');
	$pdf->Ln();
	
	$pdf->Ln();
	
	}
	$pdf->Output();
	}
?>
