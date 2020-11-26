
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

$pel2="PDS.";
$y2=substr($pel2,0,2);
$query2=mysql_query("select * from perangkat_desa where substr(id_perangkatdesa,1,2)='$y2' order by id_perangkatdesa desc limit 0,1");
$row2=mysql_num_rows($query2);
$data2=mysql_fetch_array($query2);

if ($row2>0){
$no2=substr($data2['id_perangkatdesa'],-3)+1;}
else{
$no2=1;
}
$nourut2=1000+$no2;
$nopel2=$pel2.substr($nourut2,-3);

$aksi="modul/mod_perangkatdesa/aksi_perangkatdesa.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Perangkat Desa <small>Daftar Data Perangkat Desa</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <a href='?module=perangkatdesa&act=tambahperangkatdesa'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>username</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
            //$tampil = mysql_query("SELECT * FROM perangkatdesa, jabatan, users where perangkatdesa.id_user=users.id_user and perangkatdesa.id_jabatan=jabatan.id_jabatan  ORDER BY perangkatdesa.id_perangkatdesa DESC");
            $tampil = mysql_query("SELECT * FROM `perangkat_desa`
                                  INNER JOIN `users` ON `users`.`id_user` = `perangkat_desa`.`id_user`
                                  INNER JOIN `jabatan` ON `perangkat_desa`.`id_jabatan` = `jabatan`.`id_jabatan`
                                  WHERE users.blokir !='Y'
                                  ORDER BY perangkat_desa.id_perangkatdesa DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
        echo" <tr>
						  <td>$no</td>
              <td>$r[nama]</td>
              <td>$r[jabatan]</td>
              <td>$r[username]</td>
                          
                          <td><a href='?module=perangkatdesa&act=editperangkatdesa&id=$r[id_perangkatdesa]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
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
  case "tambahperangkatdesa":
  echo "
<form method='POST' action='$aksi?module=perangkatdesa&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Perangkat Desa <small>Tambah Data Perangkat Desa</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama <span class='required'>*</span>
                    </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' id='nama' placeholder='Masukkan Nama' required='required' class='form-control col-md-7 col-xs-12'>
                    <input type='hidden' name='id_user' id='nama' value='$nopel' required='required' class='form-control col-md-7 col-xs-12'>
                    <input type='hidden' name='id_perangkatdesa' id='nama' value='$nopel2' required='required' class='form-control col-md-7 col-xs-12'>
                    <input type='hidden' name='blokir' id='blokir' value='N' required='required' class='form-control col-md-7 col-xs-12'>
                  </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_jabatan'>Jabatan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                    <select name='id_jabatan' class='form-control col-md-7 col-xs-12'>
                      <option value='' selected>-- Pilih Jabatan --</option>";
                      $tampil=mysql_query("SELECT * FROM jabatan ORDER BY jabatan");
                      while($r=mysql_fetch_array($tampil)){
                      echo "<option value=$r[id_jabatan]>$r[jabatan]</option>";
                      }
                      echo
                    "</select> 
                  </div>
                </div>
            <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
                    </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='username' id='username' placeholder='Masukkan username' required='required' class='form-control col-md-7 col-xs-12'>
                  </div>
            </div>
            <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password'>Password <span class='required'>*</span>
                    </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='password' name='password' id='password' placeholder='Masukkan password' required='required' class='form-control col-md-7 col-xs-12'>
                  </div>
            </div>
            <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_level'>Level <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <div id='gender' name='id_level' class='btn-group' data-toggle='buttons'>                         
                              <p>                            
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.001' checked='' required /> Admin
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.002' /> Operator
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.003' /> Kepala Desa
                              </p>
                            </div>
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
  
  case "editperangkatdesa":
   $edit = mysql_query("SELECT * FROM perangkat_desa, users WHERE id_perangkatdesa='$_GET[id]' and perangkat_desa.id_user=users.id_user");
   $r    = mysql_fetch_array($edit);
   $pass=($r[password]);
   echo "
<form method='POST' action='$aksi?module=perangkatdesa&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_perangkatdesa]' class='form-control' >
<input type='hidden' name='id2' value='$r[id_user]' class='form-control' >
<input type='hidden' name='pass66' value='$pass' class='form-control' >
<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Perangkat Desa<small>Edit Data Perangkat Desa</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama <span class='required'>*</span>
                    </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='nama' id='nama' value='$r[nama]' placeholder='Masukkan Nama' required='required' class='form-control col-md-7 col-xs-12'>
                  </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_jabatan'>Jabatan <span class='required'>*</span>
                    </label>
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                      <select name='id_jabatan' class='form-control col-md-7 col-xs-12'>";
                            
                      $tampil=mysql_query("SELECT * FROM jabatan ORDER BY jabatan");
                      if ($r[id_jabatan]==0){
                      echo "<option value='0' selected>-- Pilih Jabatan --</option>";
                      }   

                      while($w=mysql_fetch_array($tampil)){
                      if ($r[id_jabatan]==$w[id_jabatan]){
                        echo "<option value=$w[id_jabatan] selected>$w[jabatan]</option>";
                      }
                      else{
                        echo "<option value=$w[id_jabatan]>$w[jabatan]</option>";
                      }
                      }
                        echo "</select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='username' id='username' value='$r[username]' placeholder='Masukkan username' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password'>Password Baru
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='password' name='password' id='password'  placeholder='Masukkan Password Baru (Jika Kosong Maka Password Tidak Berubah)'  class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>
                  <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_level'>Level <span class='required'>*</span>
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <div id='gender' class='btn-group' data-toggle='buttons'> ";
                            if ($r[id_level]=='LVL.001')   {                         
                              echo"<p>                            
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.001' checked='' required /> Admin
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.002' /> Operator
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.003' /> Kepala Desa
                              </p>";
                            }
                            elseif ($r[id_level]=='LVL.002')    {
                              echo"<p>                            
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.001'  required /> Admin
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.002' checked='' /> Operator
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.003' /> Kepala Desa
                              </p>";
                            }
                            elseif ($r[id_level]=='LVL.003') {
                              echo"<p>                            
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.001'  required /> Admin               
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.002'  /> Operator
                                <input type='radio' class='flat' name='id_level' id='id_level' value='LVL.003' checked='' /> Kepala Desa
                              </p>";
                            }
                            echo"</div>
                          </div>
                        </div>
                        <div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='blokir'>Blokir User <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <div id='gender' class='btn-group' data-toggle='buttons'> ";
                          if ($r[blokir]=='N')  {                        
                            echo"<p>                            
                              <input type='radio' class='flat' name='blokir' id='blokir1' value='N' checked='' required /> Tidak             
                              <input type='radio' class='flat' name='blokir' id='blokir2' value='Y' /> Ya
                            </p>";
                          }
                          else
                            echo"<p>                            
                              <input type='radio' class='flat' name='blokir' id='blokir1' value='N' required /> Tidak               
                              <input type='radio' class='flat' name='blokir' id='blokir2' value='Y' checked='' /> Ya
                            </p>";
                          echo"</div>
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
}

}       
        
?>


                
               
        
        
        