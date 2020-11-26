<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    echo "          
          <div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Ubah Password</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>                  
          <form method='POST' action='modul/mod_password/aksi_password.php'  enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left' >
      
          <div class='clearfix'></div>
          <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='pass_lama'>Masukkan Password Lama </span>*
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='password' name='pass_lama' id='pass_lama'  placeholder='Masukkan Password Lama' class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='pass_baru'>Masukkan Password Baru </span>*
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='password' name='pass_baru' id='pass_baru'  placeholder='Masukkan Password Baru' class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label class='control-label col-md-3 col-sm-3 col-xs-12' for='pass_ulangi'>Ulangi Password Baru </span>*
                          </label>
                          <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='password' name='pass_ulangi' id='pass_ulangi'  placeholder='Ulangi Password Baru' class='form-control col-md-7 col-xs-12'>
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
          </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";
}
?>
