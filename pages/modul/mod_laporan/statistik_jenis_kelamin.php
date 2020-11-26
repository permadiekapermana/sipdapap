<?php
error_reporting(0);
include "../config/koneksi.php";
session_start();
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "class.ezpdf.php";
include "../../../config/koneksi.php";
include "rupiah.php";
define('FPDF_FONTPATH','font/');
require('fpdf_protection.php');
	

$query= "SELECT * FROM penduduk WHERE status_penduduk='hidup' and status_tinggal='Tetap'";
$nama=$_GET[nama];
		
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
	$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->Cell(0,1,'Data Kependudukan Menurut Jenis Kelamin',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(1,1,'No.',1,0,'C');
	$pdf->Cell(6,1,'Jenis Kelamin',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Laki-laki',1,0,'C');
	$pdf->Cell(3,1,'%',1,0,'C');



	$pdf->Ln();
	
	

	// $limited_string = limit_words($pendidikan[pendidikan], 2);
	
	$jumlah    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
	$rjumlahltetap    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.001' and id_jk='JK.001' AND id_statuspenduduk='STP.001' and hapus='N'"));
	$rjumlahlkontrak    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.002' and id_jk='JK.001' AND id_statuspenduduk='STP.001' and hapus='N'"));
							  
	$rjumlahptetap    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.001' and id_jk='JK.002' AND id_statuspenduduk='STP.001' and hapus='N'"));
	$rjumlahpkontrak    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.002' and id_jk='JK.002' AND id_statuspenduduk='STP.001' and hapus='N'"));
	
	$j_tot=$rjumlah+$rjumlahp;
	$j_pros=$prosentase+$prosentasep;
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'1.',1,0,'C');
	$pdf->Cell(6,1,'Laki-laki',1,0,'C');
	$pdf->Cell(4,1,$rjumlah,1,0,'C');
	$pdf->Cell(3,1,$prosentase.'%',1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'2.',1,0,'C');
	$pdf->Cell(6,1,'Perempuan',1,0,'C');
	$pdf->Cell(4,1,$rjumlahp,1,0,'C');
	$pdf->Cell(3,1,$prosentasep.'%',1,0,'C');
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(7,1,'Total Keseluruhan',1,0,'C');
	$pdf->Cell(4,1,$j_tot,1,0,'C');
	$pdf->Cell(3,1,$j_pros.'%',1,0,'C');

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
