
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

$pel2="KRW.";
$y2=substr($pel2,0,2);
$query2=mysql_query("select * from ketua_rw where substr(id_ketuarw,1,2)='$y2' order by id_ketuarw desc limit 0,1");
$row2=mysql_num_rows($query2);
$data2=mysql_fetch_array($query2);

if ($row2>0){
$no2=substr($data2['id_ketuarw'],-3)+1;}
else{
$no2=1;
}
$nourut2=1000+$no2;
$nopel2=$pel2.substr($nourut2,-3);

$aksi="modul/mod_ketuarw/aksi_ketuarw.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RW <small>Daftar Data Ketua RW</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=ketuarw&act=tambahketuarw'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No</th>
						  <th>Nomor RW</th>
						  <th>Nama Ketua RW</th>
						  <th>Tanggal Jabatan</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT
            *
          FROM
            `ketua_rw`
            INNER JOIN `penduduk` ON `ketua_rw`.`id_penduduk` = `penduduk`.`id_penduduk`
            INNER JOIN `rw` ON `ketua_rw`.`id_rw` = `rw`.`id_rw`
   where hapus='N' and status='Y'   ORDER BY id_ketuarw DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>$r[rw]</td>
						  <td>$r[nama]</td>
                          <td>$r[tgl_menjabat]</td>
                  <td><a href='?module=ketuarw&act=editketuarw&id=$r[id_ketuarw]' class='btn btn-info btn-xs'><i class='fa fa-pencil' ></i> Edit</a></td>
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
  case "tambahketuarw":
  echo "
<form method='POST' action='$aksi?module=ketuarw&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id_penduduk' value='$_GET[id_penduduk]'  class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ketua RW <small>Tambah Data Ketua RW</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>                  
                  <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rw'>Nomor RW <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <select name='id_rw' class='form-control col-md-7 col-xs-12'>
                              <option value='' selected>-- Pilih Nomor RW --</option>";
                              $tampil=mysql_query("SELECT * FROM rw ORDER BY rw.rw");
                              while($r=mysql_fetch_array($tampil)){
                                if($_GET[rw] != $r[id_rw]){
                                  echo "<option value='$r[id_rw]' surls='?module=ketuarw&act=cekpenduduk&rw=$r[rw]'
                                  >$r[rw]</option>";
                                }else{
                                  echo "<option value='$r[id_rw]' surls='?module=ketuarw&act=cekpenduduk&rw=$r[rw]'
                                      selected>$r[rw]</option>";
                                }  
                                
                              }
                              echo
                            "</select>
                          </div>
                        </div>
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RW<span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input type='hidden' value='$_GET[rw]' name='rw'>
                          <input type='text' name='nama' value='$_GET[nama]'  class='form-control' placeholder='Masukkan Nama Ketua RW' readonly='active'>
                        </div>                        
                      </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='hidden' name='id_ketuarw' id='nama' value='$nopel2' required='required' class='form-control col-md-7 col-xs-12'>
                            <input type='hidden' name='id_user' id='nama' value='$nopel' required='required' class='form-control col-md-7 col-xs-12'>
                            <input type='hidden' name='id_level' id='nama' value='LVL.004' required='required' class='form-control col-md-7 col-xs-12'>                                                        
                            <input type='text' name='username' value='$_GET[rw]$thn_sekarang'  class='form-control' placeholder='Masukkan Username'>
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
                          <th>RW</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
            $tampil= mysql_query("SELECT * FROM`penduduk`
                      INNER JOIN `jenis_kelamin` ON `penduduk`.`id_jk` = `jenis_kelamin`.`id_jk`
                      INNER JOIN `rt` ON `rt`.`id_rt` = `penduduk`.`id_rt`
                      INNER JOIN `rw` ON `rw`.`id_rw` = `rt`.`id_rw`
                      WHERE rw='$_GET[rw]' ORDER BY penduduk.id_penduduk DESC");
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
                          <td>$r[rw]</td>
                          <td><a href='?module=ketuarw&act=tambahketuarw&id_penduduk=".urlencode(base64_encode($r[id_penduduk]))."&nama=$r[nama]&rw=$r[id_rw]'><button type='button' class='btn btn-success' >Pilih</button></a></td>
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
  
  case "editketuarw":
   $edit = mysql_query("SELECT * FROM ketua_rw, penduduk  WHERE ketua_rw.id_penduduk=penduduk.id_penduduk and ketua_rw.id_ketuarw='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	
	$edit2 = mysql_query("SELECT * FROM rw WHERE id_rw='$r[id_rw]'");
    $r2    = mysql_fetch_array($edit2);
   echo "
<form method='POST' action='$aksi?module=ketuarw&act=update'  enctype='multipart/form-data'  id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'  >
<input type='hidden' name='id_penduduk' value='$r[id_penduduk]'  class='form-control' >
<input type='hidden' name='id' value='$r[id_ketuarw]'  class='form-control' >

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
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Ketua RW <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' value='$r[nama]' readonly=true  class='form-control' placeholder='Masukkan Nama Ketua RW Lama'>
                  </div>
                </div>
                <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rw'>Nomor RW <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' value='$r2[rw]'  class='form-control' placeholder='Masukkan Nama Ketua RW Lama' readonly=true>
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


                
               
        
        
        