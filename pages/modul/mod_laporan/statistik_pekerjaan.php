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
	

$query= "SELECT *  FROM pekerjaan ";
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
	$pdf->Cell(0,1,'Data Kependudukan Menurut Pekerjaan',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(1,1,'No.',1,0,'C');
	$pdf->Cell(6,1,'Pekerjaan',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Laki-laki',1,0,'C');
	$pdf->Cell(3,1,'% Laki-laki',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Perempuan',1,0,'C');
	$pdf->Cell(3,1,'% Perempuan',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Total',1,0,'C');
	$pdf->Cell(4,1,'% Total',1,0,'C');



	$pdf->Ln();
	
	
while ($pekerjaan=mysql_fetch_array($baca))
{
    // $limited_string = limit_words($pekerjaan[pekerjaan], 2);
	$penduduk             = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
	$j_pekerjaan_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_pekerjaan='$pekerjaan[id_pekerjaan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
	$pros_pekerjaan_l     = round($j_pekerjaan_l / $penduduk * 100,2);
	$j_pekerjaan_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_pekerjaan='$pekerjaan[id_pekerjaan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
	$pros_pekerjaan_p     = round($j_pekerjaan_p / $penduduk * 100,2);
	$j_tot_pekerjaan      = $j_pekerjaan_l+$j_pekerjaan_p;
	$j_pros_pekerjaan     = $pros_pekerjaan_l+$pros_pekerjaan_p;

	$all_tot_l            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
	$all_pros_l           = round($all_tot_l / $penduduk * 100,2);
	$all_tot_p            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
	$all_pros_p           = round($all_tot_p / $penduduk * 100,2);
	$all_tot_lp           = $all_tot_l+$all_tot_p;
	$all_pros_lp          = $all_pros_l+$all_pros_p;

	$no++;
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,$no,1,0,'C');
	$pdf->Cell(6,1, $pekerjaan[pekerjaan] ,1,0,'C');
	$pdf->Cell(4,1,$j_pekerjaan_l,1,0,'C');
	$pdf->Cell(3,1,$pros_pekerjaan_l.'%',1,0,'C');
	$pdf->Cell(4,1,$j_pekerjaan_p,1,0,'C');
	$pdf->Cell(3,1,$pros_pekerjaan_p.'%',1,0,'C');
	$pdf->Cell(4,1,$j_tot_pekerjaan,1,0,'C');
	$pdf->Cell(4,1,$j_pros_pekerjaan.'%',1,0,'C');
	

	
	$pdf->Ln();
	}
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(7,1,'Total Keseluruhan',1,0,'C');
	$pdf->Cell(4,1,$all_tot_l,1,0,'C');
	$pdf->Cell(3,1,$all_pros_l.'%',1,0,'C');
	$pdf->Cell(4,1,$all_tot_p,1,0,'C');
	$pdf->Cell(3,1,$all_pros_p.'%',1,0,'C');
	$pdf->Cell(4,1,$all_tot_lp,1,0,'C');
	$pdf->Cell(4,1,$all_pros_lp.'%',1,0,'C');
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
