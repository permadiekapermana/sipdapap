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

$jml=count($_POST[no_urut]);
$id_surat=$_POST[id_surat];
$id_surat3=$_POST[id_surat3];
$id_surat2=$_POST[id_surat2];
$isi_field=$_POST[isi_field];
$no_urut=$_POST[no_urut];
$id_rt=$_POST[id_rt];
$id_rw=$_POST[id_rw];
$id_perangkatdesa=$_POST[id_perangkatdesa];
				  
				  for ($i=0; $i < $jml; $i++){
					mysql_query("UPDATE detail_field SET isi_field = '$isi_field[$i]'
								WHERE id_surat='$id_surat3' AND no_urut=$i+1");	
						
					}
				$id=$_POST[id];
				mysql_query("UPDATE surat SET id_user = '$_POST[id_user]', no_akhirsurat='$_POST[no_akhirsurat]', id_statussurat='SS.003'
								WHERE id_surat='$id_surat3'");
mysql_query("UPDATE penduduk SET id_statuspenduduk = 'STP.002'
WHERE id_penduduk   = '$_POST[id]'");

mysql_query("UPDATE users SET blokir = 'Y'
WHERE id_penduduk   = '$_POST[id]'");
								  
				include "bulan_romawi.php";
				
				$query= "SELECT * FROM `penduduk`
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
				INNER JOIN `pendidikan` ON `penduduk`.`id_pendidikan` = `pendidikan`.`id_pendidikan`
				INNER JOIN `pekerjaan` ON `penduduk`.`id_pekerjaan` = `pekerjaan`.`id_pekerjaan`
				WHERE id_penduduk='$id' ";		
				if (!empty($query))
					  {
					  
					  $baca= mysql_query($query);
					$r    = mysql_fetch_array($baca);
						
					$lat=explode("-",$r[tgl_lahir]);
					$rt = mysql_query("SELECT * FROM penduduk where id_penduduk =
														(Select id_penduduk FROM ketua_rt WHERE id_rt = $id_rt AND  status = 'Y')");
						$ketuart    = mysql_fetch_array($rt);
					$rw	=	mysql_query("SELECT * FROM penduduk where id_penduduk =
														(Select id_penduduk FROM ketua_rw WHERE id_rw = (Select id_rw from rt WHERE id_rt=$id_rw) AND  status = 'Y')");
						$ketuarw    = mysql_fetch_array($rw);
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
	$pdf->Cell(0,1,'SURAT KETERANGAN PINDAH',0,0,'C');
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	$pdf->Cell(0,1,'No : '.$_POST[no_akhirsurat].'/'.$_POST[kode_surat].'/'.$bln_sekarang.'/'.$thn_sekarang,0,0,'C');
	
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
		$pdf->Cell(3,1,'Alamat Asal',0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,'Desa Sitiwinangun RT '.$r['rt'].' RW '.$r['rt'].' Kecamatan Jamblang',2,0,'L');
		$pdf->Ln();

		$tampil1 = mysql_query("SELECT * FROM detail_field ORDER BY id_detail DESC limit $jml ");
  
    $no = 1;
    while($r1=mysql_fetch_array($tampil1)){
		$edit9 = mysql_query("SELECT * FROM surat,field_surat,detail_field  WHERE surat.kode_surat=field_surat.kode_surat and field_surat.no_urut=detail_field.no_urut and field_surat.no_urut='$r1[no_urut]' and field_surat.kode_surat='$_POST[kode_surat]' ");
    $r99    = mysql_fetch_array($edit9);
	$pdf->Cell(2,1,'',2,0,'L');
		$pdf->Cell(3,1,$r99['isi'],0,0,'L');
		$pdf->Cell(2,1,':',2,0,'C');
		$pdf->Cell(3,1,$r1['isi_field'],2,0,'L');
		$pdf->Ln();	
		
	}
				
		$pdf->Ln();
		$pdf->Cell(3,1,'Demikian surat keterangan pindah ini kami buat agar menjadi tahu dan maklum adanya dan dapat',0,0,'L');
		$pdf->Ln();		
		$pdf->Cell(3,1,'dipergunakan sebagaimana mestinya.',0,0,'L');
		
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(21,1,'Sitiwinangun, '.$tgl_cetak,0,0,'C');
		
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(7,0.5,'',0,0,'C');
	$pdf->Cell(16,0.5,'Mengetahui,',0,0,'C');
	$pdf->Ln();
	
	$ttds	=	mysql_query("SELECT * FROM `perangkatdesa`
							INNER JOIN `jabatan` ON `perangkatdesa`.`id_jabatan` = `jabatan`.`id_jabatan`
							where id_perangkatdesa='$id_perangkatdesa'");
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
