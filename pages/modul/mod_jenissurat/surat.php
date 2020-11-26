
<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$pel="FLD.";
$y=substr($pel,0,2);
$query=mysql_query("select * from field_surat where substr(id_field,1,2)='$y' order by id_field desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_field'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

$aksi="modul/mod_jenissurat/aksi_surat.php";

switch($_GET[act]){
  // Tampil desa
  default:

echo "<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Daftar Data Jenis Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                      <a href='?module=jenissurat&act=tambahjenissurat'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                    </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
						  <th width='15%'>Kode Jenis Surat</th>
						  <th>Nama Jenis Surat</th>
						  <th>Keterangan</th>
						  <th width='23%'>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
					  $tampil = mysql_query("SELECT * FROM jenis_surat  ORDER BY kode_surat DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>$r[kode_surat]</td>
						  <td>$r[nama_surat]</td>
                          <td>$r[keterangan]</td>
                          <td>
                          <a href='?module=jenissurat&act=jenissurat&act=tambahfield&id=$r[kode_surat]' class='btn btn-success btn-xs'><i class='fa fa-ellipsis-v'></i> Field Surat</a>
                          <a href='?module=jenissurat&act=editjenissurat&id=$r[kode_surat]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=jenissurat&act=hapus&id=$r[kode_surat]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  case "lihatfieldsurat":
            echo"<div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Daftar Data Field Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  <p class='text-muted font-13 m-b-30'>
                  
                  <a href='?module=jenissurat&act=tambahfield&id=$r[kode_surat]'><button type='button' class='btn btn-round btn-primary'><i class='fa fa-plus'></i> Tambah</button></a>
                </p>
                    <table id='datatable' class='table table-striped table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
						<th>Kode</th>
						  <th>No Urut</th>
						  <th>Isi</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
			
					  $tampil = mysql_query("SELECT * FROM field_surat  ORDER BY id_field ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>$r[kode_surat]</td>
						  <td>$r[no_urut]</td>
                          <td>$r[isi]</td>
                          <td><a href='?module=jenissurat&act=editjenissurat&id=$r[id_field]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=jenissurat&act=hapus&id=$r[id_field]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
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
  break;
  case "tambahjenissurat":
  echo "
<form method='POST' action='$aksi?module=jenissurat&act=input'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Tambah Data Jenis Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kode'>Kode Jenis Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='kode_surat' id='kode' class='form-control col-md-7 col-xs-12' placeholder='Masukkan Kode Jenis Surat'>
                    </div>
                  </div> 
				  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Jenis Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='nama_surat' id='nama' placeholder='Masukkan Nama Jenis Surat' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div> 
					<div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='ket'>Keterangan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='keterangan' id='ket' placeholder='Masukkan Keterangan' required='required' class='form-control col-md-7 col-xs-12'>
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
 case "tambahfield":

 $_SESSION[kode_surat]     = $_GET[id];
 

  echo "
<form method='POST' action='$aksi?module=jenissurat&act=field'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Tambah Data Field Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kode'>Nomor Field Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>                      
                      <input type='hidden' name='id_field' value='$nopel'  id='kode' class='form-control col-md-7 col-xs-12'>
                      <input type='hidden' name='kode_surat' value='$_SESSION[kode_surat]'  id='kode' class='form-control col-md-7 col-xs-12'>
                      <input type='text' name='no_urut'  id='kode' class='form-control col-md-7 col-xs-12' placeholder='Masukkan Nomor Urut Field Surat'>
                    </div>
                  </div> 
				  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Field <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='isi' id='nama' placeholder='Masukkan Nama Field' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div> 
					
                  </div>   				  
                  
                      <div class='form-group'>
                        <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                          <button class='btn btn-primary' type='button' onclick=self.history.back()>Cancel</button>
                          <button class='btn btn-primary' type='reset'>Reset</button>
                          <button type='submit' class='btn btn-success'>Submit</button>
                        </div>
                      </div>";
                      echo"
                      <br>
                    <table class='table table-bordered'>
                      <thead>
                        <tr>
						<th>No.</th>
						<th>Kode</th>
						  <th>Nomor Urut</th>
						  <th>Isi</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>";
			
            $tampil = mysql_query("SELECT * FROM field_surat  ORDER BY id_field ASC");
            $tampil2 = mysql_query("SELECT * FROM `jenis_surat`
                                    INNER JOIN `field_surat` ON `jenis_surat`.`kode_surat` = `field_surat`.`kode_surat`
                                    where field_surat.kode_surat='$_SESSION[kode_surat]' order by field_surat.no_urut ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil2)){
					  
                        echo" <tr>
						<td>$no</td>
						  <td>$r[kode_surat]</td>
						  <td>$r[no_urut]</td>
                          <td>$r[isi]</td>
                          <td><a href='?module=jenissurat&act=editfieldsurat&id=$r[id_field]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <a href='$aksi?module=jenissurat&act=hapusfield&id=$r[id_field]' class='btn btn-danger btn-xs' onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\"><i class='fa fa-trash-o'></i> Hapus</a></td>
                        </tr>";
						$no++;
						
	}
                      echo"</tbody>
                    </table>  
								</div>
              </div>
              </div>
                </div>
              </div>
        </div>";        
  break;  
  case "editjenissurat":
   $edit = mysql_query("SELECT * FROM jenis_surat WHERE kode_surat='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=jenissurat&act=update'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[kode_surat]' class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Edit Data Jenis Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kode'>Kode Jenis Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='kode_surat' id='kode' value='$r[kode_surat]' placeholder='Masukkan Kode Jenis Surat' required='required' class='form-control col-md-7 col-xs-12' readonly>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama Jenis Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='nama_surat' id='nama' value='$r[nama_surat]' placeholder='Masukkan Nama Jenis Surat' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>  
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='ket'>Keterangan <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='keterangan' id='ket' value='$r[keterangan]' placeholder='Masukkan Keterangan' required='required' class='form-control col-md-7 col-xs-12'>
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
  case "editfieldsurat":
   $edit = mysql_query("SELECT * FROM field_surat WHERE id_field='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "
<form method='POST' action='$aksi?module=jenissurat&act=updatefield'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
<input type='hidden' name='id' value='$r[id_field]' class='form-control' >

<div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Jenis Surat <small>Edit Data Field Surat</small></h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <p class='text-muted font-13 m-b-30'>
                    <button type='button' class='btn btn-round btn-success' onclick=self.history.back()><i class='fa fa-chevron-left'></i> Lihat Data</button></a>
                    </p>
                  <div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='no'>Nomor Field Surat <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='no_urut' id='no' value='$r[no_urut]' placeholder='Masukkan Nomor Field Surat' required='required' class='form-control col-md-7 col-xs-12'>
                    </div>
                  </div>  
<div class='form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='isi'>Nama Field <span class='required'>*</span>
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                      <input type='text' name='isi' id='isi' value='$r[isi]' placeholder='Masukkan Nama Field' required='required' class='form-control col-md-7 col-xs-12'>
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