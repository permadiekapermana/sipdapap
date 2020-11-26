
<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "action_surat.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  
  $pel2="SRT.";
  $y2=substr($pel2,0,2);
  $query2=mysql_query("select * from surat where substr(id_surat,1,2)='$y2' order by id_surat desc limit 0,1");
  $row2=mysql_num_rows($query2);
  $data2=mysql_fetch_array($query2);
  
  if ($row2>0){
  $no2=substr($data2['id_surat'],-3)+1;}
  else{
  $no2=1;
  }
  $nourut2=1000+$no2;
  $nopel2=$pel2.substr($nourut2,-3);

  $aksi="modul/mod_jenissurat/aksi_surat.php";
switch($_GET[act]){
  // Tampil desa
  default: ?> 

          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Surat<small> Daftar Data Surat </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<div class="row">
<p>Pengajuan Surat Penduduk</p> 
            
          <?php
          if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator'){
          $tampil = mysql_query("SELECT * FROM jenis_surat  ORDER BY kode_surat DESC");
          }
          elseif ($_SESSION['leveluser']=='Ketua RT'){
            $tampil = mysql_query("SELECT * FROM jenis_surat  WHERE kode_surat='RT'");
            }
            elseif ($_SESSION['leveluser']=='Penduduk'){
              $tampil = mysql_query("SELECT * FROM jenis_surat  WHERE kode_surat!='474.2'");
              }
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){ ?> 

                      

                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="images/mail2.png" alt="image" />
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="?module=surat&act=lihatsurat&id=<?php echo "$r[kode_surat]"; ?> "><i class="fa fa-link" title="<?php echo "$r[kode_surat]"; ?>"></i></a>
                            
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><?php echo "$r[nama_surat]"; ?>
                            </p>
                          </div>
                        </div>
                      </div>
                                       
					<?php } ?>   
                      
                   </div> 
                      
                      
                      
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        



        <?php break;
		case "lihatsurat":
    $_SESSION[kode_surat]     = $_GET[id];

		
		
		
		
		echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Penduduk <small>Data Pengajuan Surat</small></h2>
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
                      if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator'){
            //$tampil = mysql_query("SELECT * FROM penduduk,agama, pekerjaan where penduduk.id_agama=agama.id_agama and penduduk.id_pekerjaan=pekerjaan.id_pekerjaan  ORDER BY penduduk.id_penduduk DESC");
            $tampil= mysql_query("SELECT * FROM`penduduk`
            INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
            INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
            INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw` WHERE id_statuspenduduk='STP.001' and hapus='N'
            ORDER BY penduduk.id_penduduk DESC");
                      }
                      elseif ($_SESSION['leveluser']=='Penduduk' ) {
                        $tampil= mysql_query("SELECT * FROM`penduduk`
                        INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
                        INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
                        INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw` WHERE id_statuspenduduk='STP.001' and hapus='N'
                        and id_penduduk='$_SESSION[id_penduduk]'
                      ");
                      }
                      elseif ($_SESSION['leveluser']=='Ketua RT' ) {
                        $tampil= mysql_query("SELECT * FROM`penduduk`
                        INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
                        INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
                        INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw` WHERE id_statuspenduduk='STP.001' and hapus='N'
                        and penduduk.id_rt='$_SESSION[id_rt]'
                      ");
                      }
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
                    <td> ";                  
                    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
                      echo"
                    <a href='?module=surat&act=detailsurat&kode_surat=$_SESSION[kode_surat]&id=$r[id_penduduk]'>
                    <button class='btn btn-primary btn-xs' type='button'><i class='fa fa-print'></i> Cetak</button></a>";
                    }
                    elseif ($_SESSION['leveluser']=='Penduduk') {
                      echo"
                    <a href='?module=surat&act=detailsurat&kode_surat=$_SESSION[kode_surat]&id=$r[id_penduduk]'>
                    <button class='btn btn-primary btn-xs' type='button'><i class='fa fa-print'></i> Ajukan Surat</button></a>";
                    }
                    echo" 
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
        
case "detailsurat":
$edit = mysql_query("SELECT * FROM`penduduk`
INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw` WHERE id_statuspenduduk='STP.001' and hapus='N' and id_penduduk='$_GET[id]'");
$r    = mysql_fetch_array($edit);


$pel="$_SESSION[kode_surat]/$thn_sekarang/$bln_sekarang/";
$y=substr($pel,0,2);
$query=mysql_query("select * from surat where  kode_surat='$_SESSION[kode_surat]' and tahun='$thn_sekarang' and bulan='$bln_sekarang' and id_user!='null' and no_akhirsurat!='null' order by id_surat desc limit 0,1");
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

if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
  echo"
<form method='POST' action='$action_surat' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
";
}
elseif ($_SESSION['leveluser']=='Penduduk'){
  echo"
<form method='POST' action='$aksi?module=surat&act=konfirmasi' enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
";
}
echo"
<input type='hidden' name='id' value='$r[id_penduduk]' class='form-control' >
<input type='hidden' name='id_user' value='$_SESSION[id_user]' class='form-control' >
<input type='hidden' name='no_akhirsurat' value='$thn_sekarang' class='form-control' >
<input type='hidden' name='no_akhirsurat' value='$xx' class='form-control' >
<input type='hidden' name='id_rt' value='$r[id_rt]' class='form-control' >
<input type='hidden' name='id_rw' value='$r[id_rw]' class='form-control' >
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
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>Kode Surat <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='kode_surat'  value='$_GET[kode_surat]'   class='form-control col-md-7 col-xs-12' readonly>
      </div>
    </div>";
    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
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
        <input type='hidden' name='id_surat2' value='$nopel2'   required='required' class='form-control col-md-7 col-xs-12'>
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
    
    
	$edit22 = mysql_query("SELECT * FROM surat  ORDER BY id_surat DESC limit 1");
$r22    = mysql_fetch_array($edit22);
	$tampil3 = mysql_query("SELECT * FROM field_surat where kode_surat='$_GET[kode_surat]' ");
  $number=$r22[id_surat]+1;
    $no = 1;
    while($r3=mysql_fetch_array($tampil3)){
	echo"
  <input type='hidden' name='id_surat[]' value='$nopel2'   required='required' class='form-control col-md-7 col-xs-12'>  
	<input type='hidden' name='no_urut[]'  value='$r3[no_urut]'   required='required' class='form-control col-md-7 col-xs-12'>
	<div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' >$r3[isi] <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='isi_field[]'   required='required' class='form-control col-md-7 col-xs-12'>
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
        $tampil=mysql_query("SELECT * FROM `perangkat_desa`
                            INNER JOIN `jabatan` ON `perangkat_desa`.`id_jabatan` = `jabatan`.`id_jabatan`
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
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
    echo"<div class='ln_solid'></div>
        <div class='form-group'>
          <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
            <button class='btn btn-primary' type='button' onclick=self.history.back()>Cancel</button>
            
            <button type='submit' class='btn btn-success'>Cetak</button>
          </div>
        </div>  
  </div>";
  }
  elseif ($_SESSION['leveluser']=='Penduduk'){
    echo"<div class='ln_solid'></div>
        <div class='form-group'>
          <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
            <button class='btn btn-primary' type='button' onclick=self.history.back()>Cancel</button>
            
            <button type='submit' class='btn btn-success'>Ajukan Surat</button>
          </div>
        </div>  
  </div>";
  }
  echo"
</div>
</div>
  </div>
</div>
</div>";
  break;
}

}       
        
?>