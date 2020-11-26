
<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  $aksi2="modul/mod_surat/action_konfirmsurat.php";
  $aksi="modul/mod_jenissurat/aksi_surat.php";
switch($_GET[act]){
  // Tampil desa
  default: ?> 

<div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Konfirmasi Permintaan Surat Penduduk</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
				  <form class='form-horizontal'>
                  <p class='lead'>Data Pengajuan Surat Penduduk
                                  
                    <fieldset>
                      <div class='control-group'>                        
                      </div>
                    </fieldset>
                  </form>
                  <table id='datatable' class='table table-striped table-bordered'>
                    <thead>
                      <tr>
                        <th width=5px>No.</th>
                        <th width=11%>Kode Surat</th>
                        <th width=20%>Nomor Surat</th>
                        <th width=30%>Nama Pemohon</th>
                        <th width=15%>Tanggal Surat</th>
                        <th>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator'){
                    $surats= mysql_query("SELECT * FROM `surat`
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        where id_statussurat='SS.001' and id_statuspenduduk='STP.001' and hapus='N' ORDER BY id_surat DESC");
                    }
                    elseif ($_SESSION['leveluser']=='Ketua RT'){
                      $surats= mysql_query("SELECT * FROM `surat`
                                          INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                          where id_statussurat='SS.001' and id_statuspenduduk='STP.001' and hapus='N' and penduduk.id_rt='$_SESSION[id_rt]' and kode_surat='RT' ORDER BY id_surat DESC");
                      }
                    $no = 1;
                    while($surat=mysql_fetch_array($surats)){
                    echo"
                      <tr>
                        <td>$no.</td>
                        <td>$surat[kode_surat]</td>
                        <td>$surat[no_akhirsurat]/$surat[kode_surat]/$bln_sekarang/$thn_sekarang</td>
                        <td>$surat[nama]</td>
                        <td>$surat[tgl_surat]</td>
                        <td>
                        <a href='?module=konfirmasisurat&act=detailsurat&kode_surat=$surat[kode_surat]&id=$surat[id_penduduk]&id_surat=$surat[id_surat]'>
                    <button class='btn btn-primary btn-xs' type='button'><i class='fa fa-print'></i> Konfirmasi Surat</button></a>
                        </td>
                      </tr>";
                      $no++;
            
                      }
                      ?>
                    </tbody>
                  </table>
                  
                    </div>
                    
                      </div>
                    </div>

                    <div class='clearfix'></div>
                  
                  
          </div>
        </div>
        



        <?php break;
        
case "detailsurat":
$edit = mysql_query("SELECT * FROM penduduk, rw WHERE id_statuspenduduk='STP.001' and hapus='N' and id_penduduk='$_GET[id]'");
$r    = mysql_fetch_array($edit);


$pel="$_GET[kode_surat]/$thn_sekarang/$bln_sekarang/";
$y=substr($pel,0,2);
$query=mysql_query("select * from surat where  kode_surat='$_GET[kode_surat]' and tahun='$thn_sekarang' and bulan='$bln_sekarang' and id_user!='null' and no_akhirsurat!='null' order by id_surat desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);


if (($thn_sekarang != $data[tahun]) or ($bln_sekarang != $data[bulan])){
	
$no=1;	
}

else
	
	{
		
$no=substr($data['no_akhirsurat'],-3)+1;	
		
	}


$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$xx=substr($nourut,-3) ;

if($_GET[kode_surat] == 'RT'){
echo"
<form method='POST' action='modul/mod_surat/surat_pengantar_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
}
elseif($_GET[kode_surat] == '474.6'){
echo"
<form method='POST' action='modul/mod_surat/surat_penghasilan_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
}
elseif($_GET[kode_surat] == '474.5'){
echo"
<form method='POST' action='modul/mod_surat/sktm_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
}
elseif($_GET[kode_surat] == '474.4'){
  echo"
  <form method='POST' action='modul/mod_surat/sku_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
  }  
elseif($_GET[kode_surat] == '474.3'){
echo"
<form method='POST' action='modul/mod_surat/surat_pindah_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
}
elseif($_GET[kode_surat] == '474.2'){
  echo"
  <form method='POST' action='modul/mod_surat/surat_kematian_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
  }
  elseif($_GET[kode_surat] == '474.1'){
    echo"
    <form method='POST' action='modul/mod_surat/surat_kelahiran_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
    }
    elseif($_GET[kode_surat] == '045.2'){
      echo"
      <form method='POST' action='modul/mod_surat/surat_pengantar_confirm.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >";
      }

echo"
<input type='hidden' name='id' value='$r[id_penduduk]' class='form-control' >
<input type='hidden' name='id_user' value='$_SESSION[id_user]' class='form-control' >
<input type='hidden' name='no_akhirsurat' value='$thn_sekarang' class='form-control' >
<input type='hidden' name='no_akhirsurat' value='$xx' class='form-control' >
<input type='hidden' name='id_rt' value='$r[id_rt]' class='form-control' >
<input type='hidden' name='id_rw' value='$r[id_rw]' class='form-control' >
<input type='hidden' name='id_surat' value='$_GET[id_surat]' class='form-control' >
<input type='hidden' name='id_surat3' value='$_GET[id_surat]' class='form-control' >

<div class='clearfix'></div>

<div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
  <div class='x_panel'>
    <div class='x_title'>
      <h2>Data Penduduk <small>Data pemohon</small></h2>
      <div class='clearfix'></div>
    </div>
    <div class='x_content'>
      <p class='text-muted font-13 m-b-30'>
      <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
      </p>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kode_surat'>Kode Surat <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='kode_surat'  value='$_GET[kode_surat]'   class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>";
    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Ketua RT' OR $_SESSION['leveluser']=='Operator'){
    echo"
	<div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>No Surat <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='no_akhirsurat'  value='$xx'   class='form-control col-md-7 col-xs-12'>
      </div>
    </div>";
  }
  echo"
<div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>NIK <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='nik' id='nik' value='$r[nik]' placeholder='Masukkan NIK' required='required' class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>	
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>Nama <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='nama' id='nama' value='$r[nama]' placeholder='Masukkan Nama' required='required' class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tmp_lahir'>Tempat Lahir <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='tmp_lahir' id='tmp_lahir' value='$r[tmp_lahir]' placeholder='Masukkan Tempat Lahir' required='required' class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tgl_lahir'>Tanggal Lahir <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='date' name='tgl_lahir' id='tgl_lahir' value='$r[tgl_lahir]' required='required' class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>
    ";
    
    
	$edit22 = mysql_query("SELECT * FROM surat ORDER BY id_surat DESC limit 1");
$r22    = mysql_fetch_array($edit22);
  $tampil3 = mysql_query("SELECT  * FROM `field_surat`, `detail_field` WHERE
 `field_surat`.`kode_surat` = '$_GET[kode_surat]' and detail_field.id_surat='$_GET[id_surat]'
 and field_surat.no_urut=detail_field.no_urut");
    
  $number=$r22[id_surat]+1;
    $no = 1;
    while($r3=mysql_fetch_array($tampil3)){
      
	echo"
	<input type='hidden' name='id_surat[]' value='$number'   required='required' class='form-control col-md-7 col-xs-12'>
	<input type='hidden' name='no_urut[]'  value='$r3[no_urut]'   required='required' class='form-control col-md-7 col-xs-12'>
	<div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' >$r3[isi] <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='isi_field[]' value='$r3[isi_field]' required='required' class='form-control col-md-7 col-xs-12'>
      </div>
    </div>";	
      
  }
  if($_SESSION[kode_surat] != 'RT'){    
    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator'){
    echo"
    <div class='form-group'>
    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='ttd'>Penandatangan Surat <span class='required'>*</span>
    </label>
    <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_perangkatdesa' class='form-control col-md-7 col-xs-12'>
        <option value='' selected>-- Pilih Penandatangan Surat --</option>";
        $tampil=mysql_query("SELECT * FROM `perangkatdesa`
                            INNER JOIN `jabatan` ON `perangkatdesa`.`id_jabatan` = `jabatan`.`id_jabatan`
                            where jabatan='Kepala Desa' OR jabatan='Sekretaris Desa'");
        while($r=mysql_fetch_array($tampil)){
        echo "<option value=$r[id_perangkatdesa]>$r[jabatan] - $r[nama]</option>";
        }
      }
        echo
      "</select> 
    </div>
  </div>
    ";
  }
    
    echo"<div class='ln_solid'></div>
        <div class='form-group'>
          <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
            
            <a href='$aksi?module=surat&act=tolak&id_surat=$_GET[id_surat]'>
            <button class='btn btn-danger' type='button' >Tolak</button>
            </a>
            
            <button type='submit' class='btn btn-success'>Cetak</button>
          </div>
        </div>  
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