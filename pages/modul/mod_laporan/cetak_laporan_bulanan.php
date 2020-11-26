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
include "../../../config/library.php";
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
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,1,'PEMERINTAH KABUPATEN/KOTA CIREBON',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,1,'LAPORAN PERKEMBANGAN PENDUDUK (LAMPIRAN A - 9)',0,0,'C');
	$pdf->SetFont('Times','B',12);
	$pdf->Ln();


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(1,1,'No.',1,0,'C');
	$pdf->Cell(8,1,'Perincian',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Laki-laki',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Perempuan',1,0,'C');
	$pdf->Cell(4,1,'Jumlah Total',1,0,'C');



	$pdf->Ln();
	
	

	// $limited_string = limit_words($pendidikan[pendidikan], 2);
	  $lahir    = mysql_num_rows(mysql_query(
		"SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
		AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
		and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap'"));
	  $lahirl    = mysql_num_rows(mysql_query(
		"SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
		AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
		and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap' and jk='Laki-laki'"));          
	  $lahirp    = mysql_num_rows(mysql_query(
		"SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
		AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
		and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap' and jk='Perempuan'"));

	  $kematian=mysql_num_rows(mysql_query("SELECT * FROM surat where kode_surat='474.2' and tahun='$thn_sekarang' and bulan='$bln_sekarang' "));
				$kematianl=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.2' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Laki-laki' "));
	  $kematianp=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.2' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Perempuan' "));
	  
	  $pendatang=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
		INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
		where MONTH(tgl_mutasi_masuk)=$bln_sekarang and YEAR(tgl_mutasi_masuk)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap'"));
	  $pendatangl=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
		INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
		where MONTH(tgl_mutasi_masuk)=$bln_sekarang and YEAR(tgl_mutasi_masuk)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap' and penduduk.jk='Laki-laki' "));
	  $pendatangp=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
		INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
		where MONTH(tgl_mutasi_masuk)=$bln_sekarang and YEAR(tgl_mutasi_masuk)=$thn_sekarang and status_penduduk='hidup' and status_tinggal='Tetap' and penduduk.jk='Perempuan' "));

	  $pindah=mysql_num_rows(mysql_query("SELECT * FROM surat where kode_surat='474.3' and tahun='$thn_sekarang' and bulan='$bln_sekarang' "));
				$pindahl=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.3' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Laki-laki' "));
	  $pindahp=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.3' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Perempuan' "));

	  $total_tambah_l = $lahirl+$pendatangl;
	  $total_tambah_p = $lahirp+$pendatangp;
	  $total_tambah   = $lahir+$pendatang;
	  $total_kurang_l = $kematianl+$pindahl;
	  $total_kurang_p = $kematianp+$pindahp;
	  $total_kurang   = $kematian+$pindah;
	
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'1.',1,0,'C');
	$pdf->Cell(8,1,'Kelahiran Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$lahirl,1,0,'C');
	$pdf->Cell(4,1,$lahirp,1,0,'C');
	$pdf->Cell(4,1,$lahir,1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'2.',1,0,'C');
	$pdf->Cell(8,1,'Kematian Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$kematianl,1,0,'C');
	$pdf->Cell(4,1,$kematianp,1,0,'C');
	$pdf->Cell(4,1,$kematian,1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'3.',1,0,'C');
	$pdf->Cell(8,1,'Pendatang Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$pendatangl,1,0,'C');
	$pdf->Cell(4,1,$pendatangp,1,0,'C');
	$pdf->Cell(4,1,$pendatang,1,0,'C');
	

	
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(1,1,'4.',1,0,'C');
	$pdf->Cell(8,1,'Pindah/Pergi Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$pindahl,1,0,'C');
	$pdf->Cell(4,1,$pindahp,1,0,'C');
	$pdf->Cell(4,1,$pindah,1,0,'C');
	

	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(9,1,'Total Pertambahan Penduduk Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$total_tambah_l,1,0,'C');
	$pdf->Cell(4,1,$total_tambah_p,1,0,'C');
	$pdf->Cell(4,1,$total_tambah,1,0,'C');
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(9,1,'Total Pengurangan Penduduk Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$total_kurang_l,1,0,'C');
	$pdf->Cell(4,1,$total_kurang_p,1,0,'C');
	$pdf->Cell(4,1,$total_kurang,1,0,'C');
	$pdf->Ln();
	
	$total_penduduk   = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE status_penduduk='hidup' and status_tinggal='Tetap'"));
	$total_penduduk_l = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE jk='Laki-laki' and status_penduduk='hidup' and status_tinggal='Tetap'"));
	$total_penduduk_p = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE jk='Perempuan' and status_penduduk='hidup' and status_tinggal='Tetap'"));

	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(9,1,'Total Penduduk Bulan Ini',1,0,'L');
	$pdf->Cell(4,1,$total_penduduk_l,1,0,'C');
	$pdf->Cell(4,1,$total_penduduk_p,1,0,'C');
	$pdf->Cell(4,1,$total_penduduk,1,0,'C');
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
