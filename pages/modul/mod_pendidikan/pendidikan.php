
<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$pel="PDN.";
$y=substr($pel,0,2);
$query=mysql_query("select * from pendidikan where substr(id_pendidikan,1,2)='$y' order by id_pendidikan desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_pendidikan'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_pendidikan/aksi_pendidikan.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Pendidikan <small>Daftar Data Pendidikan Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=pendidikan&act=tambahpendidikan' type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i>  Tambah</a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
              <th>Kode Pendidikan</th>
              <th>Nama Pendidikan</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM pendidikan  ORDER BY id_pendidikan DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
            <td>$no</td>
              <td>$r[id_pendidikan]</td>
						  <td>$r[pendidikan]</td>
                          
                          <td><a href='?module=pendidikan&act=editpendidikan&id=$r[id_pendidikan]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
										<a href='$aksi?module=pendidikan&act=hapus&id=$r[id_pendidikan]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  case "tambahpendidikan":
  echo "
<form method='POST' action='$aksi?module=pendidikan&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Pendidikan <small>Tambah Data Pendidikan Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  <p class='text-muted font-13 m-b-30'>
                  <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                  <div class='form-group'>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Pendidikan <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='hidden' name='id_pendidikan' id='nama' value='$nopel' placeholder='Masukkan Nama Pendidikan' required='required' class='form-control col-md-7 col-xs-12'>  
                    <input type='text' name='pendidikan' id='nama' value='$r[pendidikan]' placeholder='Masukkan Nama Pendidikan' required='required' class='form-control col-md-7 col-xs-12'>
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
  
  case "editpendidikan":
   $edit = mysql_query("SELECT * FROM pendidikan WHERE id_pendidikan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=pendidikan&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_pendidikan]' class='form-control' >
<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Pendidikan <small>Edit Data Pendidikan Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  <p class='text-muted font-13 m-b-30'>
                  <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                  <div class='form-group'>
                  <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Pendidikan <span class='required'>*</span>
                  </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input type='text' name='pendidikan' id='nama' value='$r[pendidikan]' placeholder='Masukkan Nama Pendidikan' required='required' class='form-control col-md-7 col-xs-12'>
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


                
               
        
        
        