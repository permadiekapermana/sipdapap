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
$dari=$_POST[dari];	
$sampai=$_POST[sampai];
$surat=$_POST[jenissurat];
if ($surat=='semua'){


	$query= "SELECT * FROM surat
			INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
			INNER JOIN `jenis_surat` ON `surat`.`kode_surat` = `jenis_surat`.`kode_surat`
			where surat.id_penduduk=penduduk.id_penduduk and id_statuspenduduk='STP.001' and hapus='N' and surat.tgl_surat Between '$dari' and '$sampai' and surat.id_statussurat='SS.003' ORDER BY surat.kode_surat DESC";
}
else {
	$query= "SELECT * FROM surat
			INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
			INNER JOIN `jenis_surat` ON `surat`.`kode_surat` = `jenis_surat`.`kode_surat`
			where surat.id_penduduk=penduduk.id_penduduk and id_statuspenduduk='STP.001' and hapus='N' and surat.tgl_surat Between '$dari' and '$sampai' and surat.kode_surat='$surat' and surat.id_statussurat='SS.003' ORDER BY surat.kode_surat DESC";
}		
if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	

	$pdf=new FPDF('L','cm','Legal');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(1,3,1);
	$pdf->SetAutoPageBreak(true,3);
	$pdf->SetFont('Arial','B',14);
	$pdf->Image("images/logooo.jpg",2,1.15,'L');
	$pdf->SetFont('Arial','B',16);
	$pdf->Ln();
	$pdf->Cell(0,.6,'PEMERINTAH KABUPATEN CIREBON',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,.6,'KECAMATAN JAMBLANG',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,.6,'DESA SITIWINANGUN',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,.6,'Jln. Moh Ramdhan Desa Sitiwinangun No.225 .',0,0,'C');	
	$pdf->Ln();
	$pdf->Cell(0,.6,' Kec. Jamblang Kab.Cirebon  45157.',0,0,'C');	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->Cell(0,1,'Rekapitulasi Pengajuan Surat Penduduk',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(2,1,'No.',1,0,'C');
	$pdf->Cell(8,1,'Nama Surat',1,0,'C');
	$pdf->Cell(5,1,'Nomor Surat',1,0,'C');
	$pdf->Cell(8,1,'Pemohon',1,0,'C');
	$pdf->Cell(4,1,'Tanggal Surat',1,0,'C');



	$pdf->Ln();
	
	
while ($hasil=mysql_fetch_array($baca))
{
	$no++;

	
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(2,1,$no.'.',1,0,'C');
	$pdf->Cell(8,1,$hasil['nama_surat'],1,0,'L');
	$pdf->Cell(5,1,$hasil['no_akhirsurat'].'/'.$hasil['kode_surat'].'/'.$bln_sekarang.'/'.$thn_sekarang,1,0,'L');
	$pdf->Cell(8,1,$hasil['nama'],1,0,'L');
	$pdf->Cell(4,1,$hasil['tgl_surat'],1,0,'C');

	$pdf->Ln();
	
	}
	
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Mengetahui,',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Perangkat Desa ',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Kantor Desa Sitiwinangun ',0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,$_SESSION[namalengkap],0,0,'C');
	$pdf->Ln();
	
	}
	$pdf->Output();
	}}
?>
