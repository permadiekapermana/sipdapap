
<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  $pel="DN.";
  $y=substr($pel,0,2);
  $query=mysql_query("select * from users where substr(id_user,1,2)='$y' order by id_user desc limit 0,1");
  $row=mysql_num_rows($query);
  $data=mysql_fetch_array($query);
  
  if ($row>0){
  $no=substr($data['id_user'],-3)+1;}
  else{
  $no=1;
  }
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$pel2="KRT.";
  $y2=substr($pel2,0,2);
  $query2=mysql_query("select * from ketua_rt where substr(id_ketuart,1,2)='$y2' order by id_ketuart desc limit 0,1");
  $row2=mysql_num_rows($query2);
  $data2=mysql_fetch_array($query2);
  
  if ($row2>0){
  $no2=substr($data2['id_ketuart'],-3)+1;}
  else{
  $no2=1;
  }
$nourut2=1000+$no2;
$nopel2=$pel2.substr($nourut2,-3);

$aksi="modul/mod_ketuart/aksi_ketuart.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RT <small>Daftar Data Ketua RT</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=ketuart&act=tambahketuart'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No</th>
						  <th>Nomor RT</th>
						  <th>Nama Ketua RT</th>
						  <th>Tanggal Jabatan</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM
            `ketua_rt`
  INNER JOIN `penduduk` ON `ketua_rt`.`id_penduduk` = `penduduk`.`id_penduduk`
  INNER JOIN `rt` ON `ketua_rt`.`id_rt` = `rt`.`id_rt`
  INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
   where hapus='N' and status='Y'   ORDER BY id_ketuart DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>RT $r[rt] / RW $r[rw]</td>
						  <td>$r[nama]</td>
                          <td>$r[tgl_menjabat]</td>
                  <td><a href='?module=ketuart&act=editketuart&id=$r[id_ketuart]' class='btn btn-info btn-xs'><i class='fa fa-pencil' ></i> Edit</a></td>
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
  case "tambahketuart":
  echo "
<form method='POST' action='$aksi?module=ketuart&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id_penduduk' value='$_GET[id_penduduk]'  class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RT <small>Tambah Data Ketua RT</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>                  
                  <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rt'>Nomor RT <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_rt' class='form-control col-md-7 col-xs-12'>
                              <option value='' selected>-- Pilih Nomor RT --</option>";
                              $tampil=mysql_query("SELECT * FROM rt, rw WHERE  rt.id_rw=rw.id_rw ORDER BY rt.rt");
                              while($r=mysql_fetch_array($tampil)){
                                if($_GET[rt] != $r[id_rt]){
                                  echo "<option value='$r[id_rt]' surls='?module=ketuart&act=cekpenduduk&id_rt=$r[id_rt]'
                                  >RT $r[rt] / RW $r[rw]</option>";
                                }else{
                                  echo "<option value='$r[id_rt]' surls='?module=ketuart&act=cekpenduduk&id_rt=$r[id_rt]'
                                      selected>RT $r[rt] / RW $r[rw]</option>";
                                }  
                                
                              }
                              echo
                            "</select>
                          </div>
                        </div>
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RT <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input type='hidden' value='$_GET[rt]' name='id_rt'>
                          <input type='text' name='nama' value='$_GET[nama]'  class='form-control' placeholder='Masukkan Nama Ketua RT' readonly='active'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='hidden' name='id_ketuart' id='nama' value='$nopel2' required='required' class='form-control col-md-7 col-xs-12'>
                            <input type='hidden' name='id_user' id='nama' value='$nopel' required='required' class='form-control col-md-7 col-xs-12'>
                            <input type='hidden' name='id_level' id='nama' value='LVL.004' required='required' class='form-control col-md-7 col-xs-12'>                            
                            <input type='text' name='username' value='$_GET[rt]$thn_sekarang'  class='form-control' placeholder='Masukkan Username'>
                          </div>                        
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password'>Password <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='password' name='password' class='form-control' placeholder='Masukkan Password' required>
                          </div>                        
                        </div>   
                  <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                          <button class='btn btn-primary' type='button' onclick=self.history.back() >Cancel</button>
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
  case "cekpenduduk":
  echo "<div class='clearfix'></div>

            <div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    
                  <h2>Data Penduduk <small>Daftar Data Penduduk</small></h2>
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
            $tampil= mysql_query("SELECT * FROM`penduduk`
                      INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
                      INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
                      INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
                      WHERE penduduk.id_rt='$_GET[id_rt]'  ORDER BY penduduk.id_penduduk DESC");
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
                          <td>RT $r[rt] / RW $r[rw]</td>
                          <td><a href='?module=ketuart&act=tambahketuart&id_penduduk=".urlencode(base64_encode($r[id_penduduk]))."&nama=$r[nama]&rt=$r[id_rt]'><button type='button' class='btn btn-success' >Pilih</button></a></td>
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
  
  case "editketuart":
   $edit = mysql_query("SELECT * FROM ketua_rt, penduduk  WHERE ketua_rt.id_penduduk=penduduk.id_penduduk and ketua_rt.id_ketuart='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	
	$edit2 = mysql_query("SELECT * FROM rt WHERE id_rt='$r[id_rt]'");
    $r2    = mysql_fetch_array($edit2);
   echo "
<form method='POST' action='$aksi?module=ketuart&act=update'  enctype='multipart/form-data'  id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'  >
<input type='hidden' name='id_penduduk' value='$r[id_penduduk]'  class='form-control' >
<input type='hidden' name='id' value='$r[id_ketuart]'  class='form-control' >

<div class='clearfix'></div>
<div class='x_content'>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RT <small>Tambah Data Ketua RT</small></h2>
                    <div class='clearfix'></div>
                  </div>

                  <p class='text-muted font-13 m-b-30'>
                  <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                  </p>
                <div class='form-group'>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RT <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' value='$r[nama]' readonly=true  class='form-control' placeholder='Masukkan Nomor RT'>
                  </div>
                </div>
                <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rt'>Nomor RT <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' value='$r2[rt]'  class='form-control' placeholder='Masukkan Nomor RT' readonly=true>
                  </div>
                        </div> 

<div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='jk'>Status<span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <div id='gender' class='btn-group' data-toggle='buttons'>                         
                              <p>                            
                                <input type='radio' class='flat' name='status' id='genderM' value='Y' checked='' required /> Aktif                
                                <input type='radio' class='flat' name='status' id='genderF' value='N' /> Tidak Aktif
                              </p>
                            </div>
                          </div>
                        </div>						
                <div class='ln_solid'></div>
                    <div class='form-group'>
                      <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                        <button class='btn btn-primary' type='button' onclick=self.history.back() >Cancel</button>
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
  
    case "cekketuarw":
  echo "<div class='clearfix'></div>

            <div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                        <ul class='dropdown-menu' role='menu'>
                          <li><a href='#'>Settings 1</a>
                          </li>
                          <li><a href='#'>Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                       Daftar data $_GET[nm2]
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
                          <th>NIK</th>
						  <th>Name Penduduk</th>
                          <th>Tempat lahir</th>
                          <th>Tgl Lahir</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM penduduk,agama, pekerjaan where penduduk.id_agama=agama.id_agama and penduduk.id_pekerjaan=pekerjaan.id_pekerjaan  ORDER BY penduduk.id_penduduk DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
                          <td>$r[nik]</td>
						  <td>$r[nama]</td>
                          <td>$r[tmp_lahir]</td>
                          <td>$r[tgl_lahir]</td>
                          
                          <td><a href='?module=ketuarw&act=editketuarw2&id_penduduk=$r[id_penduduk]&nama=$r[nama]&nm2=$_GET[nm2]&id_ketuarw=$_GET[id_ketuarw]'><button type='button' class='btn btn-success' >Pilih</button></a></td>
                        </tr>";
						
	}
                      echo"</tbody>
                    </table>
                  </div>
                </div>
              </div>
			  </div>";
  break;

  case "editketuarw2":
  $edit = mysql_query("SELECT * FROM ketuarw, penduduk  WHERE ketuarw.id_penduduk=penduduk.id_penduduk and ketuarw.id_ketuarw='$_GET[id_ketuarw]'");
  $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=ketuarw&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id_penduduk' value='$_GET[id_penduduk]'  class='form-control' >
<input type='hidden' name='id' value='$_GET[id_ketuarw]'  class='form-control' >

<div class='clearfix'></div>
<div class='x_content'>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RW <small>Tambah Data Ketua RW</small></h2>
                    <div class='clearfix'></div>
                  </div>

                  <p class='text-muted font-13 m-b-30'>
                  <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                  </p>
                <div class='form-group'>
                <div class='form-group'>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RW Lama <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <a href='?module=ketuarw&act=cekpenduduk'><input type='text' name='nama' value='$r[nama]'  class='form-control' placeholder='Masukkan Nama Ketua RW Lama'></a>
                  </div>
                </div>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RW Baru <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <a href='?module=ketuarw&act=cekketuarw&nm2=$r[nama]&id_ketuarw=$r[id_ketuarw]'><input type='text' name='nama' value='$_GET[nama]'  class='form-control' placeholder='Masukkan Nama Ketua RW Baru'></a>
                  </div>
                </div>
                <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rw'>Nomor RW <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_rw' class='form-control col-md-7 col-xs-12'>
                              <option value='' selected>-- Pilih Nomor RW --</option>";
                              $tampil=mysql_query("SELECT * FROM rw ORDER BY rw.rw");
                              while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[id_rw]>$r[rw]</option>";
                              }
                              echo
                            "</select>
                          </div>
                        </div>   
                <div class='ln_solid'></div>
                    <div class='form-group'>
                      <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                        <button class='btn btn-primary' type='button' onclick=self.history.back() >Cancel</button>
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
  
}

}       
        
?>


                
               
        
        
        