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
$pel="DN.";
$y=substr($pel,0,2);
$query=mysql_query("select * from pengajuan where surat='kepolisian' order by id_pengajuan desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=$data['id_pengajuan']+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);	
$id=$_POST[nik];
$query= "SELECT *  FROM penduduk, pengajuan  where penduduk.nik=pengajuan.nik and pengajuan.nik='$id'";
		
if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	$r    = mysql_fetch_array($baca);

	$pdf=new FPDF('P','cm','Legal');
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
	$pdf->Cell(0,.2,'___________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'___________________________________________________________________________________',0,0,'C');
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,1,'SURAT KETERANGAN CATATAN KEPOLISIAN',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,1,'No :'.$r[id_pengajuan].' / DS/  '.$bln_sekarang.' /'.$thn_sekarang,0,0,'C');
	
	$x=$pdf->GetY();
	$pdf->SetY($x+2);

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3,1,'Yang bertanda tangan dibawah ini Kuwu Sitiwinangun menerangkan bahwa :',0,0,'L');
	$pdf->Ln();
	
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Nama  ',2,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['nama_penduduk'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Tempat / Tgl Lahir  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['tempat_lahir']." , ".$r['tgl_lahir'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Jenis Kelamin  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['jk'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'NIK Penduduk  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['nik'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Pekerjaan ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['pekerjaan'],2,0,'L');
		$pdf->Ln();
		$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,'Status Perkawinan  ',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r['status'],2,0,'L');
		
		$pdf->Ln();
		$pdf->Cell(1,1,'',2,0,'L');
		$pdf->Cell(3,1,'Adalah salah seorang warga  Desa Kami, telah memohon keterangan pengantar Catatan  ',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(3,1,'Kepolisian Kepada Kami dalam rangka persyaratan : Melamar Kerja .',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(3,1,'Keterangan ini kami berikan kepadanya, dengan berdasarkan sepengetahuan dan ',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(3,1,'pertimbangan bahwa :',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(1,1,'',2,0,'L');
		$pdf->Cell(3,1,'Benar orang tersebut diatas adalah penduduk Desa kami yang belum tercatat di Kepolisian',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(3,1,'Dan berlaku sampai dengan Selesai',0,0,'L');
		$pdf->Ln();
		$pdf->Cell(1,1,'',2,0,'L');
		$pdf->Cell(3,1,'Demikian, surat keterangan ini dapat dipergunakan sebagaimana mestinya.',0,0,'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(7,0.5,' ',0,0,'C');
	$pdf->Cell(16,0.5,'Cirebon,'.$tgl_cetak,0,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(7,0.5,' ',0,0,'C');
	$pdf->Cell(16,0.5,'Kuwu Desa Sutawinangun ',0,0,'C');
	$pdf->Ln();
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,'Budi Santoso',0,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,'Nip.2013.98765.6034',0,0,'C');
	$pdf->Ln();
	
	}
	$pdf->Output();
	}
?>
