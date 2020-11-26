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
	$pdf->Cell(0,1,'Data Kependudukan Menurut Pendidikan',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(1,1,'No.',1,0,'C');
	$pdf->Cell(6,1,'Status Nikah',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Laki-laki',1,0,'C');
	$pdf->Cell(3,1,'% Laki-laki',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Perempuan',1,0,'C');
	$pdf->Cell(3,1,'% Perempuan',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Total',1,0,'C');
	$pdf->Cell(4,1,'% Total',1,0,'C');



	$pdf->Ln();
	
	

	// $limited_string = limit_words($pendidikan[pendidikan], 2);
	
	$penduduk         = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));

	$j_nikah_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.001' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_nikah_l     = round($j_nikah_l / $penduduk * 100,2);                          
	$j_nikah_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.001' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_nikah_p     = round($j_nikah_p / $penduduk * 100,2);                          
	$j_tot_nikah      = $j_nikah_l+$j_nikah_p;
	$j_pros_nikah     = $pros_nikah_l+$pros_nikah_p;
	
	$j_single_l       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.002' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_single_l    = round($j_single_l / $penduduk * 100,2);
	$j_single_p       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.002' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_single_p    = round($j_single_p / $penduduk * 100,2);                          
	$j_tot_single     = $j_single_l+$j_single_p;
	$j_pros_single    = $pros_single_l+$pros_single_p;

	$j_chidup_l       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.003' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_chidup_l    = round($j_chidup_l / $penduduk * 100,2);                            
	$j_chidup_p       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.003' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_chidup_p    = round($j_chidup_p / $jumlah * 100,2);                            
	$j_tot_chidup     = $j_chidup_l+$j_chidup_p;
	$j_pros_chidup    = $pros_chidup_l+$pros_chidup_p;

	$j_cmati_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.004' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_cmati_l     = round($j_cmati_l / $penduduk * 100,2);                            
	$j_cmati_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.004' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
	$pros_cmati_p     = round($j_cmati_p / $penduduk * 100,2);                            
	$j_tot_cmati      = $j_cmati_l+$j_cmati_p;
	$j_pros_cmati     = $pros_cmati_l+$pros_cmati_p;
	
	$all_tot_l        = $j_nikah_l+$j_single_l+$j_chidup_l+$j_cmati_l;
	$all_pros_l       = $pros_nikah_l+$pros_single_l+$pros_chidup_l+$pros_cmati_l;
	$all_tot_p        = $j_nikah_p+$j_single_p+$j_chidup_p+$j_cmati_p;
	$all_pros_p       = $pros_nikah_p+$pros_single_p+$pros_chidup_p+$pros_cmati_p;
	$all_tot_lp       = $j_tot_nikah+$j_tot_single+$j_tot_chidup+$j_tot_cmati;
	$all_pros_lp      = $j_pros_nikah+$j_pros_single+$j_pros_chidup+$j_pros_cmati;
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'1.',1,0,'C');
	$pdf->Cell(6,1,'Menikah',1,0,'C');
	$pdf->Cell(4,1,$j_nikah_l,1,0,'C');
	$pdf->Cell(3,1,$pros_nikah_l.'%',1,0,'C');
	$pdf->Cell(4,1,$j_nikah_p,1,0,'C');
	$pdf->Cell(3,1,$pros_nikah_p.'%',1,0,'C');
	$pdf->Cell(4,1,$j_tot_nikah,1,0,'C');
	$pdf->Cell(4,1,$j_pros_nikah.'%',1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'2.',1,0,'C');
	$pdf->Cell(6,1,'Belum Menikah',1,0,'C');
	$pdf->Cell(4,1,$j_single_l,1,0,'C');
	$pdf->Cell(3,1,$pros_single_l.'%',1,0,'C');
	$pdf->Cell(4,1,$j_single_p,1,0,'C');
	$pdf->Cell(3,1,$pros_single_p.'%',1,0,'C');
	$pdf->Cell(4,1,$j_tot_single,1,0,'C');
	$pdf->Cell(4,1,$j_pros_single.'%',1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'3.',1,0,'C');
	$pdf->Cell(6,1,'Cerai Hidup',1,0,'C');
	$pdf->Cell(4,1,$j_chidup_l,1,0,'C');
	$pdf->Cell(3,1,$pros_chidup_l.'%',1,0,'C');
	$pdf->Cell(4,1,$j_chidup_p,1,0,'C');
	$pdf->Cell(3,1,$pros_chidup_p.'%',1,0,'C');
	$pdf->Cell(4,1,$j_tot_chidup,1,0,'C');
	$pdf->Cell(4,1,$j_pros_chidup.'%',1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'4.',1,0,'C');
	$pdf->Cell(6,1,'Cerai Mati',1,0,'C');
	$pdf->Cell(4,1,$j_cmati_l,1,0,'C');
	$pdf->Cell(3,1,$pros_cmati_l.'%',1,0,'C');
	$pdf->Cell(4,1,$j_cmati_p,1,0,'C');
	$pdf->Cell(3,1,$pros_cmati_p.'%',1,0,'C');
	$pdf->Cell(4,1,$j_tot_cmati,1,0,'C');
	$pdf->Cell(4,1,$j_pros_cmati.'%',1,0,'C');
	

	
	$pdf->Ln();
	
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
