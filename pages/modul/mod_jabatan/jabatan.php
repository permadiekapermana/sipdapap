
<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$pel="JBN.";
$y=substr($pel,0,2);
$query=mysql_query("select * from jabatan where substr(id_jabatan,1,2)='$y' order by id_jabatan desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_jabatan'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_jabatan/aksi_jabatan.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jabatan <small>Daftar Data Jabatan</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=jabatan&act=tambahjabatan'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
						  <th>Nama Jabatan</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM jabatan  ORDER BY id_jabatan DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>$r[jabatan]</td>
                          
                          <td><a href='?module=jabatan&act=editjabatan&id=$r[id_jabatan]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=jabatan&act=hapus&id=$r[id_jabatan]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  case "tambahjabatan":
  echo "
<form method='POST' action='$aksi?module=jabatan&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jabatan <small>Tambah Data Jabatan</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Jabatan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='hidden' name='id_jabatan' value='$nopel' id='nama' placeholder='Masukkan Nama Jabatan' required='required' class='form-control col-md-7 col-xs-12'>
                      <input type='text' name='jabatan' id='nama' placeholder='Masukkan Nama Jabatan' required='required' class='form-control col-md-7 col-xs-12'>
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
  
  case "editjabatan":
   $edit = mysql_query("SELECT * FROM jabatan WHERE id_jabatan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=jabatan&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_jabatan]' class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jabatan <small>Edit Data Jabatan</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Jabatan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='jabatan' id='nama' value='$r[jabatan]' placeholder='Masukkan Nama jabatan' required='required' class='form-control col-md-7 col-xs-12'>
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