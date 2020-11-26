<?php 
include "../config/koneksi.php";
$pel="NIK.";
$y=substr($pel,0,2);
$query=mysql_query("select * from penduduk where substr(nik,1,2)='$y' order by nik desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['nik'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nik=$pel.substr($nourut,-3);
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Pengajuan Surat </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Tentang Aplikasi
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>Samuel Doe</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>
                      </ul>

                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      <!-- start skills -->
                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#surat_pengantar" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" title="Surat Keterangan RT/RW">SK RT</a>
                          </li>
                          <li role="presentation" class=""><a href="#skck" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false" title="Surat Catatan Kepolisian">SKCK</a>
                          </li>
                          <li role="presentation" class=""><a href="#miskin" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Tidak Mampu">SKTM</a>
                          </li>
						  <li role="presentation" class=""><a href="#usaha" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Usaha">SKU</a>
                          </li>
						  <li role="presentation" class=""><a href="#kelahiran" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Kelahiran">SKK</a>
                          </li>
						  <li role="presentation" class=""><a href="#kematian" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Kematian">SKKM</a>
                          </li>
						  <li role="presentation" class=""><a href="#pindah" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Pindah">SKP</a>
                          </li>
						  <li role="presentation" class=""><a href="#penghasilan" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Penghasilan">SKH</a>
                          </li>
						  <li role="presentation" class=""><a href="#duda" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Duda">SKD</a>
                          </li>
						  <li role="presentation" class=""><a href="#janda" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" title="Surat Keterangan Janda">SKJ</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
						<!--surat pengantar rt/rw-->
                          <div role="tabpanel" class="tab-pane fade active in" id="surat_pengantar" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              
                             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan surat pengantar <small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="pengantar" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

                            </ul>
							
							<?php 
							if (isset($_POST['pengantar'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,keterangan) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','Pengantar')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                            <!-- end recent activity -->

                          </div>
						<!--surat keterangan catatan kepolisian-->
                          <div role="tabpanel" class="tab-pane fade" id="skck" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan catatan kepolisian <small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status perkawinan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="status">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat tinggal </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="alamat">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="polisi" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  <?php 
							if (isset($_POST['polisi'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$status=$_POST['status'];
$alamat=$_POST['alamat'];
$keterangan="SKCK";

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,status,alamat,keterangan) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','$status','$alamat','$keterangan')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                </div>
              </div>
                            <!-- end user projects -->

                          </div>
						  <!--surat keterangan miskin-->
                          <div role="tabpanel" class="tab-pane fade" id="miskin" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan keterangan miskin<small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pendidikan">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="miskin" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  				  <?php 
							if (isset($_POST['miskin'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$status=$_POST['status'];
$alamat=$_POST['alamat'];
$pendidikan=$_POST['pendidikan'];
$keterangan="Miskin";

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,status,alamat,keterangan,pendidikan) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','$status','$alamat','$keterangan','$pendidikan')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                </div>
              </div>
                          </div>
						  
						  <!--surat keterangan usaha-->
						  <div role="tabpanel" class="tab-pane fade" id="usaha" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan keterangan usaha<small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pendidikan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No KTP </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="no_ktp">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="usaha" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  				  <?php 
							if (isset($_POST['usaha'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$status=$_POST['status'];
$alamat=$_POST['alamat'];
$pendidikan=$_POST['pendidikan'];
$no_ktp=$_POST['no_ktp'];
$keterangan="Usaha";

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,status,alamat,keterangan,pendidikan,no_ktp) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','$status','$alamat','$keterangan','$pendidikan','$no_ktp')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                </div>
              </div>
                          </div>
	<!--surat kematian-->
<div role="tabpanel" class="tab-pane fade" id="kematian" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan keterangan kelahiran<small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ayah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="ayah">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="ibu">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="kelahiran" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  				  <?php 
							if (isset($_POST['kelahiran'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$hari_lahir=$_POST['hari_lahir'];
$alamat=$_POST['alamat'];
$ayah=$_POST['ayah'];
$ibu=$_POST['ibu'];
$keterangan="Kelahiran";

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,hari_lahir,alamat,keterangan,ayah,ibu) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','$hari_lahir','$alamat','$keterangan','$ayah','$ibu')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                </div>
              </div>
                          </div>	
						  
						  
						  <div role="tabpanel" class="tab-pane fade" id="kelahiran" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form pengajuan keterangan kelahiran<small>Mohon Disi dengan data yang benar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Penduduk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nik" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_penduduk" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="umur" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Agama </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Pria"> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat lahir </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_lahir" > 
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ayah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="ayah">
                        </div>
                      </div>
					  <div class="form-group">
                        
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="ibu">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="kelahiran" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  				  <?php 
							if (isset($_POST['kelahiran'])){
$nik=$_POST['nik'];
$nama_penduduk=$_POST['nama_penduduk'];
$umur=$_POST['umur'];
$agama=$_POST['agama'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$hari_lahir=$_POST['hari_lahir'];
$alamat=$_POST['alamat'];
$ayah=$_POST['ayah'];
$ibu=$_POST['ibu'];
$keterangan="Kelahiran";

		if (!empty($nama_penduduk) or  !empty($umur) ){
			$query=mysql_query("insert into penduduk (nik,nama_penduduk,umur,agama,jk,tempat_lahir,tgl_lahir,pekerjaan,hari_lahir,alamat,keterangan,ayah,ibu) 
			values ('$nik','$nama_penduduk','$umur','$agama','$jk','$tempat_lahir','$tgl_lahir','$pekerjaan','$hari_lahir','$alamat','$keterangan','$ayah','$ibu')");
			if ($query){
				echo  "Data telah tersimpan";
				}
				else
				{
				echo"Data tidak tersimpan";
				}
		}
}
							
							?> 
                </div>
              </div>
                          </div>
						  
						  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>