<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>alert('Untuk mengakses sistem, Anda harus login'); window.location = '../'</script>";
}
else{
$pel="AGM.";
$y=substr($pel,0,2);
$query=mysql_query("select * from agama where substr(id_agama,1,2)='$y' order by id_agama desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_agama'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_agama/aksi_agama.php";

switch($_GET[act]){
  // Tampil desa
  default:


echo "<div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Agama <small>Daftar Data Agama Penduduk</small></h2>                    
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=agama&act=tambahagama'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
            <th>No.</th>
            <th>Kode Agama</th>
            <th>Nama Agama</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM agama  ORDER BY id_agama DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
            <td>$no</td>
            <td>$r[id_agama]</td>
						  <td>$r[agama]</td>
                          
                          <td><a href='?module=agama&act=editagama&id=$r[id_agama]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=agama&act=hapus&id=$r[id_agama]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  case "tambahagama":
  echo "
<form method='POST' action='$aksi?module=agama&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Agama <small>Tambah Data Agama Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Agama <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='hidden' value='$nopel' name='id_agama' id='nama' placeholder='Masukkan Nama Agama' required='required' class='form-control col-md-7 col-xs-12'>
                      <input type='text' name='agama' id='nama' placeholder='Masukkan Nama Agama' required='required' class='form-control col-md-7 col-xs-12'>
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
  
  case "editagama":
   $edit = mysql_query("SELECT * FROM agama WHERE id_agama='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=agama&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_agama]' class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Agama <small>Edit Data Agama Penduduk</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Agama <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='agama' id='nama' value='$r[agama]' placeholder='Masukkan Nama Agama' required='required' class='form-control col-md-7 col-xs-12'>
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