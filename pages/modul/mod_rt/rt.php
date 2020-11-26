
<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$pel="RT.";
$y=substr($pel,0,2);
$query=mysql_query("select * from rt where substr(id_rt,1,2)='$y' order by id_rt desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_rt'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_rt/aksi_rt.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data RT <small>Daftar Data RT</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=rt&act=tambahrt'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
              <th>Nomor RT</th>
              <th>Nomor RW</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM rt, rw  WHERE rt.id_rw=rw.id_rw ORDER BY id_rt DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
              <td>$r[rt]</td>
              <td>$r[rw]</td>
                          
                          <td><a href='?module=rt&act=editrt&id=$r[id_rt]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=rt&act=hapus&id=$r[id_rt]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  case "tambahrt":
  echo "
<form method='POST' action='$aksi?module=rt&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data RT <small>Tambah Data RT Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nomor RT <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='hidden' name='id_rt' value='$nopel' id='nama' placeholder='Masukkan Nomor RT' required='required' class='form-control col-md-7 col-xs-12'>
                      <input type='text' name='rt' id='nama' placeholder='Masukkan Nomor RT' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rw'>Nomor RW <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                    <select name='id_rw' class='form-control col-md-7 col-xs-12'>";
                          
                        $tampil=mysql_query("SELECT * FROM rw ORDER BY rw");
                        if ($r[id_rw]==0){
                        echo "<option value='0' selected>-- Pilih Nomor RW --</option>";
                        }   

                        while($w=mysql_fetch_array($tampil)){
                        if ($r[id_rw]==$w[id_rw]){
                          echo "<option value=$w[id_rw] selected>$w[rw]</option>";
                        }
                        else{
                          echo "<option value=$w[id_rw]>$w[rw]</option>";
                        }
                        }
                          echo "</select>
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
  
  case "editrt":
   $edit = mysql_query("SELECT * FROM rt WHERE id_rt='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=rt&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_rt]' class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data RT <small>Edit Data RT</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nomor RT <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='rt' id='nama' value='$r[rt]' placeholder='Masukkan Nomor RT' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='id_rw'>Nomor RW <span class='required'>*</span>
                    </label>
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                      <select name='id_rw' class='form-control col-md-7 col-xs-12'>";
                            
                        $tampil=mysql_query("SELECT * FROM rw ORDER BY rw");
                        if ($r[id_rw]==0){
                        echo "<option value='' selected>-- Pilih Nomor RW --</option>";
                        }   

                        while($w=mysql_fetch_array($tampil)){
                        if ($r[id_rw]==$w[id_rw]){
                          echo "<option value=$w[id_rw] selected>$w[rw]</option>";
                        }
                        else{
                          echo "<option value=$w[id_rw]>$w[rw]</option>";
                        }
                        }
                          echo "</select>
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