
<?php
include "../../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$pel="PDK.";
$y=substr($pel,0,2);
$query=mysql_query("select * from penduduk where no='1' and substr(id_penduduk,1,2)='$y' order by id_penduduk desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_penduduk'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_penduduk/aksi_penduduk.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Penduduk <small>Daftar Data Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=penduduk&act=tambahpenduduk'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
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
            $tampil= mysql_query("SELECT * FROM`penduduk`
                      INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
                      INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
                      INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw` WHERE id_statuspenduduk='STP.001' and hapus='N'
                      ORDER BY penduduk.id_penduduk DESC");
  
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
                    <div class='btn-group'>
                    <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle btn-xs' type='button'>Pilihan <span class='caret'></span>
                    </button>
                    <ul role='menu' class='dropdown-menu'>
                      <li><a href='?module=penduduk&act=detailpenduduk&id=$r[no]'><i class='fa fa-info'></i> Detail</a>
                      </li>
                      <li><a href='?module=penduduk&act=editpenduduk&id=$r[no]'><i class='fa fa-edit'></i> Edit</a>
                      </li>                     
                      <li class='divider'></li>
                      <li><a href='$aksi?module=penduduk&act=hapus&id=$r[no]' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ><i class='fa fa-remove'></i> Hapus</a>
                      </li>
                    </ul>
                    </div>
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
        case "tambahpenduduk":
        echo "
      <form method='POST' action='$aksi?module=penduduk&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
      
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
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>NIK <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='hidden' name='id_penduduk' value='$nopel' id='nik'  placeholder='Masukkan NIK' class='form-control col-md-7 col-xs-12'>
                            <input type='text' name='nik' id='nik'  placeholder='Masukkan NIK' class='form-control col-md-7 col-xs-12' maxlength='16'>
                          </div>
                        </div>  
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>Nama <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='text' name='nama' id='nama' placeholder='Masukkan Nama' required='required' class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tmp_lahir'>Tempat Lahir <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='text' name='tmp_lahir' id='tmp_lahir' placeholder='Masukkan Tempat Lahir' required='required' class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tgl_lahir'>Tanggal Lahir <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='date' name='tgl_lahir' id='tgl_lahir' required='required' class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>                        
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_jk'>Jenis Kelamin <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <select name='id_jk' class='form-control col-md-7 col-xs-12'>
                            <option value='' selected>-- Pilih Jenis Kelamin --</option>";
                            $tampil=mysql_query("SELECT * FROM jenis_kelamin ORDER BY jk");
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[id_jk]>$r[jk]</option>";
                            }
                            echo
                          "</select> 
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_goldarah'>Golongan Darah <span class='required'>*</span>
                      </label>
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                        <select name='id_goldarah' class='form-control col-md-7 col-xs-12'>";
                          $tampil=mysql_query("SELECT * FROM gol_darah ORDER BY id_goldarah");
                          while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[id_goldarah]>$r[gol_darah]</option>";
                          }
                          echo
                        "</select> 
                      </div>
                    </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_agama'>Agama <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_agama' class='form-control col-md-7 col-xs-12'>
                              <option value='' selected>-- Pilih Agama --</option>";
                              $tampil=mysql_query("SELECT * FROM agama ORDER BY agama");
                              while($r=mysql_fetch_array($tampil)){
                              echo "<option value=$r[id_agama]>$r[agama]</option>";
                              }
                              echo
                            "</select> 
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_pekerjaan'>Pekerjaan <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_pekerjaan' class='select2_single form-control' tabindex='-1'>
                            <option value='' selected>-- Pilih Pekerjaan --</option>";
                              $tampil=mysql_query("SELECT * FROM pekerjaan ORDER BY pekerjaan");
                              while($r=mysql_fetch_array($tampil)){
                              echo "<option value=$r[id_pekerjaan]>$r[pekerjaan]</option>";
                              }
                              echo
                            "</select> 
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_pendidikan'>Pendidikan <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_pendidikan' class='select2_single form-control' tabindex='-1'>
                              <option value='' selected>-- Pilih Pendidikan --</option>";
                              $tampil=mysql_query("SELECT * FROM pendidikan ORDER BY pendidikan");
                              while($r=mysql_fetch_array($tampil)){
                              echo "<option value=$r[id_pendidikan]>$r[pendidikan]</option>";
                              }
                              echo
                            "</select>
                          </div>
                        </div>
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_statusnikah'>Status Nikah <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <select name='id_statusnikah' class='select2_single form-control' tabindex='-1'>
                            <option value='' selected>-- Pilih Status Nikah --</option>";
                            $tampil=mysql_query("SELECT * FROM status_nikah ORDER BY id_statusnikah");
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[id_statusnikah]>$r[status_nikah]</option>";
                            }
                            echo
                          "</select>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_statustinggal'>Status Tinggal <span class='required'>*</span>
                      </label>
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                        <select name='id_statustinggal' class='select2_single form-control' tabindex='-1'>
                          <option value='' selected>-- Pilih Status Tinggal --</option>";
                          $tampil=mysql_query("SELECT * FROM status_tinggal ORDER BY id_statustinggal");
                          while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[id_statustinggal]>$r[status_tinggal]</option>";
                          }
                          echo
                        "</select>
                      </div>
                    </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rt'>RT / RW <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_rt' class='form-control col-md-7 col-xs-12'>
                              <option value='' selected>-- Pilih RT / RW --</option>";
                              $tampil=mysql_query("SELECT * FROM rt, rw where rt.id_rw=rw.id_rw ORDER BY rt.rt");
                              while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[id_rt]>RT $r[rt] / RW $r[rw]</option>";
                              }
                              echo
                            "</select>
                          </div>
                        </div>
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_provinsi'>Provinsi <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <select name='id_provinsi' class='select2_single form-control' tabindex='-1'>";
                            $tampil=mysql_query("SELECT * FROM provinsi WHERE id_provinsi='32'");
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[id_provinsi]>$r[provinsi]</option>";
                            }
                            echo
                          "</select>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_kabupaten'>Kota / Kabupaten <span class='required'>*</span>
                      </label>
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                        <select name='id_kabupaten' class='select2_single form-control' tabindex='-1'>";
                          $tampil=mysql_query("SELECT * FROM kabupaten WHERE id_kabupaten='3209'");
                          while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[id_kabupaten]>$r[kabupaten]</option>";
                          }
                          echo
                        "</select>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_kecamatan'>Kecamatan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <select name='id_kecamatan' class='select2_single form-control' tabindex='-1'>";
                        $tampil=mysql_query("SELECT * FROM kecamatan WHERE id_kecamatan='3209191'");
                        while($r=mysql_fetch_array($tampil)){
                        echo "<option value=$r[id_kecamatan]>$r[kecamatan]</option>";
                        }
                        echo
                      "</select>
                    </div>
                  </div>
                  <div class='form-group'>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_desa'>Desa / Kelurahan <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <select name='id_desa' class='select2_single form-control' tabindex='-1'>";
                      $tampil=mysql_query("SELECT * FROM desa WHERE id_desa='3209191005'");
                      while($r=mysql_fetch_array($tampil)){
                      echo "<option value=$r[id_desa]>$r[desa]</option>";
                      }
                      echo
                    "</select>
                  </div>
                </div>                        
                        <div class='ln_solid'></div>
                            <div class='form-group'>
                              <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                                <button class='btn btn-primary' type='button' onclick=self.history.back()>Cancel</button>
                                <button class='btn btn-primary' type='reset'>Reset</button>
                                <button type='submit' class='btn btn-success'>Submit</button>
                              </div>
                            </div>  
                      </div>
                    </div>
                    </div>
                      </div>
                    </div>
              </div>";	  
				  
break;
case "editpenduduk":
$edit = mysql_query("SELECT * FROM penduduk WHERE no='$_GET[id]'");
$r    = mysql_fetch_array($edit);

echo "
<form method='POST' action='$aksi?module=penduduk&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$_GET[id]' class='form-control' >
<input type='hidden' name='id2' value='$nopel' class='form-control' >
<input type='hidden' name='id3' value='$r[id_penduduk]' class='form-control' >

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
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>NIK <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='nik' id='nik' value='$r[nik]' placeholder='Masukkan NIK' required='required' class='form-control col-md-7 col-xs-12' maxlength='16'>        
      </div>
    </div>  
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nik'>Nama <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='nama' id='nama' value='$r[nama]' placeholder='Masukkan Nama' required='required' class='form-control col-md-7 col-xs-12'>
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tmp_lahir'>Tempat Lahir <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='text' name='tmp_lahir' id='tmp_lahir' value='$r[tmp_lahir]' placeholder='Masukkan Tempat Lahir' required='required' class='form-control col-md-7 col-xs-12'>
        <input type='hidden' name='creator' id='creator' value='$r[created_by]' placeholder='Masukkan Tempat Lahir' required='required' class='form-control col-md-7 col-xs-12'>      
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tgl_lahir'>Tanggal Lahir <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <input type='date' name='tgl_lahir' id='tgl_lahir' value='$r[tgl_lahir]' required='required' class='form-control col-md-7 col-xs-12'>
      </div>
    </div>
    <div class='form-group'>
    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_jk'>Jenis Kelamin <span class='required'>*</span>
    </label>
    <div class='col-md-6 col-sm-6 col-xs-12'>
        <select name='id_jk' class='form-control col-md-7 col-xs-12'>";              
        $tampil=mysql_query("SELECT * FROM jenis_kelamin ORDER BY id_jk");
        if ($r[id_jk]==0){
        echo "<option value='' selected>-- Pilih Jenis Kelamin --</option>";
        }
        while($w=mysql_fetch_array($tampil)){
        if ($r[id_jk]==$w[id_jk]){
          echo "<option value=$w[id_jk] selected>$w[jk]</option>";
        }
        else{
          echo "<option value=$w[id_jk]>$w[jk]</option>";
        }
        }
          echo
      "</select> 
    </div>
  </div>   
  <div class='form-group'>
  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_goldarah'>Golongan Darah <span class='required'>*</span>
  </label>
  <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_goldarah' class='form-control col-md-7 col-xs-12'>";              
      $tampil=mysql_query("SELECT * FROM gol_darah ORDER BY id_goldarah");
      if ($r[id_goldarah]==0){
      echo "<option value='' selected>-- Pilih Golongan Darah --</option>";
      }
      while($w=mysql_fetch_array($tampil)){
      if ($r[id_goldarah]==$w[id_goldarah]){
        echo "<option value=$w[id_goldarah] selected>$w[gol_darah]</option>";
      }
      else{
        echo "<option value=$w[id_goldarah]>$w[gol_darah]</option>";
      }
      }
        echo
    "</select> 
  </div>
</div>    
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_agama'>Agama <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
        <select name='id_agama' class='form-control col-md-7 col-xs-12'>";              
          $tampil=mysql_query("SELECT * FROM agama ORDER BY agama");
          if ($r[id_agama]==0){
          echo "<option value='' selected>-- Pilih Agama --</option>";
          }
          while($w=mysql_fetch_array($tampil)){
          if ($r[id_agama]==$w[id_agama]){
            echo "<option value=$w[id_agama] selected>$w[agama]</option>";
          }
          else{
            echo "<option value=$w[id_agama]>$w[agama]</option>";
          }
          }
            echo
        "</select> 
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_pekerjaan'>Pekerjaan <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_pekerjaan' class='select2_single form-control' tabindex='-1'>";
						 
      $tampil=mysql_query("SELECT * FROM pekerjaan ORDER BY pekerjaan");
      if ($r[id_pekerjaan]==0){
      echo "<option value='' selected>-- Pilih Pekerjaan --</option>";
      }   

      while($w=mysql_fetch_array($tampil)){
      if ($r[id_pekerjaan]==$w[id_pekerjaan]){
        echo "<option value=$w[id_pekerjaan] selected>$w[pekerjaan]</option>";
      }
      else{
        echo "<option value=$w[id_pekerjaan]>$w[pekerjaan]</option>";
      }
      }
  echo "</select> 
      </div>
    </div>
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_pendidikan'>Pendidikan <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_pendidikan' class='select2_single form-control' tabindex='-1'>";
						 
      $tampil=mysql_query("SELECT * FROM pendidikan ORDER BY pendidikan");
      if ($r[id_pendidikan]==0){
      echo "<option value='' selected>-- Pilih Pendidikan --</option>";
      }   

      while($w=mysql_fetch_array($tampil)){
      if ($r[id_pendidikan]==$w[id_pendidikan]){
        echo "<option value=$w[id_pendidikan] selected>$w[pendidikan]</option>";
      }
      else{
        echo "<option value=$w[id_pendidikan]>$w[pendidikan]</option>";
      }
      }
  echo "</select>
      </div>
    </div>
    <div class='form-group'>
    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_statusnikah'>Status Nikah <span class='required'>*</span>
    </label>
    <div class='col-md-6 col-sm-6 col-xs-12'>
    <select name='id_statusnikah' class='select2_single form-control' tabindex='-1'>";
           
    $tampil=mysql_query("SELECT * FROM status_nikah ORDER BY id_statusnikah");
    if ($r[id_statusnikah]==0){
    echo "<option value='' selected>-- Pilih Status Tinggal --</option>";
    }   

    while($w=mysql_fetch_array($tampil)){
    if ($r[id_statusnikah]==$w[id_statusnikah]){
      echo "<option value=$w[id_statusnikah] selected>$w[status_nikah]</option>";
    }
    else{
      echo "<option value=$w[id_statusnikah]>$w[status_nikah]</option>";
    }
    }
echo "</select>
    </div>
  </div> 
    <div class='form-group'>
    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_statustinggal'>Status Tinggal <span class='required'>*</span>
    </label>
    <div class='col-md-6 col-sm-6 col-xs-12'>
    <select name='id_statustinggal' class='select2_single form-control' tabindex='-1'>";
           
    $tampil=mysql_query("SELECT * FROM status_tinggal ORDER BY id_statustinggal");
    if ($r[id_statustinggal]==0){
    echo "<option value='' selected>-- Pilih Status Tinggal --</option>";
    }   

    while($w=mysql_fetch_array($tampil)){
    if ($r[id_statustinggal]==$w[id_statustinggal]){
      echo "<option value=$w[id_statustinggal] selected>$w[status_tinggal]</option>";
    }
    else{
      echo "<option value=$w[id_statustinggal]>$w[status_tinggal]</option>";
    }
    }
echo "</select>
    </div>
  </div>    
  <div class='form-group'>
  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_statuspenduduk'>Status Penduduk <span class='required'>*</span>
  </label>
  <div class='col-md-6 col-sm-6 col-xs-12'>
  <select name='id_statuspenduduk' class='select2_single form-control' tabindex='-1'>";
         
  $tampil=mysql_query("SELECT * FROM status_penduduk ORDER BY id_statuspenduduk");
  if ($r[id_statuspenduduk]==0){
  echo "<option value='' selected>-- Pilih Status Penduduk --</option>";
  }   

  while($w=mysql_fetch_array($tampil)){
  if ($r[id_statuspenduduk]==$w[id_statuspenduduk]){
    echo "<option value=$w[id_statuspenduduk] selected>$w[status_penduduk]</option>";
  }
  else{
    echo "<option value=$w[id_statuspenduduk]>$w[status_penduduk]</option>";
  }
  }
echo "</select>
  </div>
</div> 
    <div class='form-group'>
      <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rt'>RT / RW <span class='required'>*</span>
      </label>
      <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_rt' class='form-control col-md-7 col-xs-12'>";
						 
      $tampil=mysql_query("SELECT * FROM rt, rw where rt.id_rw=rw.id_rw ORDER BY rt.rt");
      if ($r[id_rt]==0){
      echo "<option value='' selected>-- Pilih RT / RW --</option>";
      }   

      while($w=mysql_fetch_array($tampil)){
      if ($r[id_rt]==$w[id_rt]){
        echo "<option value=$w[id_rt] selected>RT $w[rt] / RW $w[rw]</option>";
      }
      else{
        echo "<option value=$w[id_rt]>RT $w[rt] / RW $w[rw]</option>";
      }
      }

  echo "</select>
      </div>
    </div>
    <div class='form-group'>
    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_provinsi'>Provinsi <span class='required'>*</span>
    </label>
    <div class='col-md-6 col-sm-6 col-xs-12'>
      <select name='id_provinsi' class='select2_single form-control' tabindex='-1'>";
        $tampil=mysql_query("SELECT * FROM provinsi WHERE id_provinsi='32'");
        while($r=mysql_fetch_array($tampil)){
        echo "<option value=$r[id_provinsi]>$r[provinsi]</option>";
        }
        echo
      "</select>
    </div>
  </div>
  <div class='form-group'>
  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_kabupaten'>Kota / Kabupaten <span class='required'>*</span>
  </label>
  <div class='col-md-6 col-sm-6 col-xs-12'>
    <select name='id_kabupaten' class='select2_single form-control' tabindex='-1'>";
      $tampil=mysql_query("SELECT * FROM kabupaten WHERE id_kabupaten='3209'");
      while($r=mysql_fetch_array($tampil)){
      echo "<option value=$r[id_kabupaten]>$r[kabupaten]</option>";
      }
      echo
    "</select>
  </div>
</div>
<div class='form-group'>
<label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_kecamatan'>Kecamatan <span class='required'>*</span>
</label>
<div class='col-md-6 col-sm-6 col-xs-12'>
  <select name='id_kecamatan' class='select2_single form-control' tabindex='-1'>";
    $tampil=mysql_query("SELECT * FROM kecamatan WHERE id_kecamatan='3209191'");
    while($r=mysql_fetch_array($tampil)){
    echo "<option value=$r[id_kecamatan]>$r[kecamatan]</option>";
    }
    echo
  "</select>
</div>
</div>
<div class='form-group'>
<label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_desa'>Desa / Kelurahan <span class='required'>*</span>
</label>
<div class='col-md-6 col-sm-6 col-xs-12'>
<select name='id_desa' class='select2_single form-control' tabindex='-1'>";
  $tampil=mysql_query("SELECT * FROM desa WHERE id_desa='3209191005'");
  while($r=mysql_fetch_array($tampil)){
  echo "<option value=$r[id_desa]>$r[desa]</option>";
  }
  echo
"</select>
</div>
</div>    
    <div class='ln_solid'></div>
        <div class='form-group'>
          <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
            <button class='btn btn-primary' type='button' onclick=self.history.back()>Cancel</button>
            <button class='btn btn-primary' type='reset'>Reset</button>
            <button type='submit' class='btn btn-success' onClick=\"return confirm('Yakin ingin ubah data ?')\">Submit</button>
          </div>
        </div>  
  </div>
</div>
</div>
  </div>
</div>
</div>";

break;
case "detailpenduduk":
$edit = mysql_query("SELECT * FROM `penduduk`
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
                    WHERE no='$_GET[id]'");
$r    = mysql_fetch_array($edit);
$edit2 = mysql_query("SELECT * FROM perangkat_desa WHERE id_user='$r[created_by]'");
$r2    = mysql_fetch_array($edit2);

echo "
<form method='POST' action='modul/mod_laporan/cetak_penduduk.php' target='_blank'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[no]' class='form-control' >

<div class='clearfix'></div>

<div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
  <div class='x_panel'>
    <div class='x_title'>
      <h2>Data Penduduk <small>Detail Data Penduduk</small></h2>
      <div class='clearfix'></div>
    </div>
    <div class='x_content'>
      <p class='text-muted font-13 m-b-30'>
      <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
      <button class='btn btn-primary' type='submit'><i class='fa fa-print'></i> Cetak</button></p>
      
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
          <td>DESA $r[desa] RT $r[rt] / RW $r[rw] KECAMATAN $r[kecamatan]</td>
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
          <td>$r[desa]</td>
        </tr>
        <tr>
          <th>Kecamatan</th>
          <td>:</td>
          <td>$r[kecamatan]</td>
        </tr>
        <tr>
          <th>Kabupaten/Kota</th>
          <td>:</td>
          <td>$r[kabupaten]</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>:</td>
          <td>$r[provinsi]</td>
        </tr>        
      </table>
      
      <h3>C. Data Lain-lain</h3>
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
        <tr>
          <th>Diinput Oleh</th>
          <td>:</td>
          <td>$r2[nama]</td>
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