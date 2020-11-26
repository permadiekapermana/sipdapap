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
include "rupiah.php";
define('FPDF_FONTPATH','font/');
require('fpdf_protection.php');
	

$query= "SELECT * FROM nilai_temp ORDER BY nilai DESC";
		
if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	

	$pdf=new FPDF('L','cm','Legal');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(1,3,1);
	$pdf->SetAutoPageBreak(true,3);
	$pdf->SetFont('Arial','B',14);
	$pdf->Image("images/logo_sh.jpg",2,1.15,'L');
	$pdf->SetFont('Arial','B',16);
	$pdf->Ln();
	$pdf->Cell(0,.6,'PT. XYZ',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,.6,'Mitra Anda ',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,.6,'Office : Jl. Brigjend Dharnoso By Pass Ruko C & D',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,.6,'web : http://FIF.COM e_mail: sispakar@yahoo.com',0,0,'C');	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->Cell(0,1,'Penentuan Karyawan Terbaik Berbasis Kinerja (Metode Fuzzy AHP) ',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',14);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(2,1,'NO',1,0,'C');
	$pdf->Cell(5,1,'NAMA KARYAWAN',1,0,'C');
	$pdf->Cell(5,1,'NILAI',1,0,'C');
	$pdf->Cell(15,1,'KET',1,0,'C');



	$pdf->Ln();
	
	
while ($hasil=mysql_fetch_array($baca))
{
	$no++;
		if ($no == 1){
			
			$ket="Juara Pertama";
		}
		elseif ($no == 2){
			
			$ket="Harapan Pertama";
		}
		elseif ($no == 3){
			
			$ket="Harapan Kedua";
		}
		else
		{
			
			$ket="Belum target";
			
			
		}
	
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(2,1,$no,1,0,'C');
	$pdf->Cell(5,1,$hasil['nm_karyawan'],1,0,'C');
	$pdf->Cell(5,1,$hasil['nilai'],1,0,'C');
	$pdf->Cell(15,1,$ket,1,0,'C');

	$pdf->Ln();
	
	}
	
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Mengetahui,',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Manager ',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'PT. XYZ CIREBON ',0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Hartono, MM',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Nip.2013.98765.034',0,0,'C');
	$pdf->Ln();
	
	}
	$pdf->Output();
	}}
?>
