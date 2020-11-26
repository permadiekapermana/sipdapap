
<?php
include "../../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{


switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Mutasi Keluar <small>Daftar Data Mutasi Keluar</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
                        <th width='5px'>No.</th>
                        <th>NIK</th>
                        <th>Nama Penduduk</th>
                                    <th>Tempat lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>RT / RW</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
            //$tampil = mysql_query("SELECT * FROM penduduk, pekerjaan where  penduduk.id_pekerjaan=pekerjaan.id_pekerjaan  ORDER BY penduduk.id_penduduk DESC");
            $tampil= mysql_query("SELECT
            *
          FROM
            `surat`
            INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
            INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
            INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
            WHERE kode_surat='474.3' ORDER BY id_surat DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      $d=explode("-",$r[tgl_lahir]);
      $umur=$thn_sekarang - $d[0];
					  
                        echo" <tr>
                        <td>$no.</td>
                        <td>$r[nik]</td>
                        <td>$r[nama]</td>
                        <td>$r[tmp_lahir]</td>
                        <td>$r[tgl_lahir]</td>
                        <td>$r[jk]</td>
                        <td>$umur</td>
                        <td>$r[rt] / $r[rw]</td>
                    <td>
                      <a href='?module=mutasikeluar&act=detailpenduduk&id=$r[id_surat]' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>                    
                    </td>
                        </tr>";
                        $no++;
						
	}
                      echo"</tbody>
                    </table>
                  </div>
                </div>
              </div>
			  </div>";
        
break;
case "detailpenduduk":
$edit = mysql_query("SELECT * FROM `surat`
                    INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                    INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
                    INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
                    INNER JOIN `agama` ON `penduduk`.`id_agama` = `agama`.`id_agama`
                    INNER JOIN `pekerjaan` ON `penduduk`.`id_pekerjaan` = `pekerjaan`.`id_pekerjaan`
                    INNER JOIN `pendidikan` ON `penduduk`.`id_pendidikan` = `pendidikan`.`id_pendidikan`
                    INNER JOIN `detail_field` ON `surat`.`id_surat` = `detail_field`.`id_surat`, `field_surat`
                    INNER JOIN `jenissurat` ON `field_surat`.`kode_surat` = `jenissurat`.`kode_surat`
                    WHERE `surat`.`id_surat` = '$_GET[id]'");
$r    = mysql_fetch_array($edit);

echo "
<form method='POST' action='$aksi?module=penduduk&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_penduduk]' class='form-control' >

<div class='clearfix'></div>

<div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
  <div class='x_panel'>
    <div class='x_title'>
      <h2>Data Penduduk <small>Tambah Data Penduduk</small></h2>
      <div class='clearfix'></div>
    </div>
    <div class='x_content'>
      <p class='text-muted font-13 m-b-30'>
      <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
      </p>
      <h3>A. Data Pribadi</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>NIK</th>
          <td width='1%'>:</td>
          <td>$r[nik]</td>
        </tr>
        <tr>
          <th>Nama Warga</th>
          <td>:</td>
          <td>$r[nama]</td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          <td>:</td>
          <td>$r[tmp_lahir]</td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td>:</td>
          <td>
            $r[tgl_lahir]
          </td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>:</td>
          <td>$r[jk]</td>
        </tr>
      </table>
      
      <h3>B. Data Alamat</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>Alamat</th>
          <td width='1%'>:</td>
          <td>Desa $r[desa_kel] RT $r[rt] / RW $r[rw] Kecamatan $r[kecamatan]</td>
        </tr>
        <tr>
          <th>RT</th>
          <td>:</td>
          <td>$r[rt]</td>
        </tr>
        <tr>
          <th>RW</th>
          <td>:</td>
          <td>$r[rw]</td>
        </tr>
        <tr>
          <th>Desa/Kelurahan</th>
          <td>:</td>
          <td>$r[desa_kel]</td>
        </tr>
        <tr>
          <th>Kecamatan</th>
          <td>:</td>
          <td>$r[kecamatan]</td>
        </tr>
        <tr>
          <th>Kabupaten/Kota</th>
          <td>:</td>
          <td>$r[kota_kab]</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>:</td>
          <td>$r[provinsi]</td>
        </tr>        
      </table>

      <h3>C. Data Mutasi Keluar</h3>
      <table class='table table-striped'>";

      $tampil3 = mysql_query("SELECT  * FROM `field_surat`, `detail_field` WHERE
      `field_surat`.`kode_surat` = '474.3' and detail_field.id_surat='$_GET[id]'
      and field_surat.no_urut=detail_field.no_urut");
         
       $number=$r22[id_surat]+1;
         $no = 1;
         while($r3=mysql_fetch_array($tampil3)){
           
       echo"
      
       <tr>
         <th width='20%'>$r3[isi]</th>
         <td width='1%'>:</td>
         <td>$r3[isi_field]</td>
       </tr>
       ";	
           
       }
       echo"
       <tr>
          <th>Tanggal Mutasi Keluar</th>
          <td>:</td>
          <td>$r[tgl_surat]</td>
        </tr> 
     </table>
      
      
      <h3>D. Data Lain-lain</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>Golongan Darah</th>
          <td width='1%'>:</td>
          <td>$r[gol_darah]</td>
        </tr>
        <tr>
          <th>Agama</th>
          <td>:</td>
          <td>$r[agama]</td>
        </tr>
        <tr>
          <th>Pendidikan</th>
          <td>:</td>
          <td>$r[pendidikan]</td>
        </tr>
        <tr>
          <th>Pekerjaan</th>
          <td>:</td>
          <td>$r[pekerjaan]</td>
        </tr>
        <tr>
          <th>Status Nikah</th>
          <td>:</td>
          <td>$r[status_nikah]</td>
        </tr>
        <tr>
          <th>Status Tinggal</th>
          <td>:</td>
          <td>$r[status_tinggal]</td>
        </tr>        
      </table>
      
  </div>
</div>
</div>
  </div>
</div>
</div>";

  break;
}

}       
        
?>