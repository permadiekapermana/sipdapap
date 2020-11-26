<?php
  include "../config/koneksi.php";
  error_reporting(0);
  session_start(0); 
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<script>alert('Untuk mengakses sistem, Anda harus login'); window.location = '../'</script>";
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPDAPAP | Desa Sitiwinangun</title>
<?php if ($_GET[module]=='penduduk'){ ?> 
<!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.gif">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<?php } else { ?> 
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.gif">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<?php } ?> 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="?module=dashboard" class="site_title"><i class="fa fa-institution"></i> <span>SIPDAPAP</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo"$_SESSION[namalengkap]"; ?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <?php  if ($_SESSION['leveluser']=='Admin' ){ ?> 
                <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=agama">Agama</a></li>
                      <li><a href="?module=pekerjaan">Pekerjaan</a></li>
                      <li><a href="?module=pendidikan">Pendidikan</a></li>
                      <li><a href="?module=jabatan">Jabatan</a></li>
                      <li><a href="?module=perangkatdesa">Perangkat Desa</a></li>
					            <li><a href="?module=jenissurat">Jenis Surat</a></li>
                      <li><a href="?module=rw">Nomor RW</a></li>
                      <li><a href="?module=rt">Nomor RT</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=penduduk">Penduduk</a></li>
                      <li><a href="?module=ketuarw">Ketua RW</a></li>
                      <li><a href="?module=ketuart">Ketua RT</a></li>                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-mail-reply"></i> Mutasi Penduduk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=mutasimasuk">Mutasi Masuk</a></li>
                      <li><a href="?module=mutasikeluar">Mutasi Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope"></i> Pelayanan Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=surat">Pengajuan Surat</a></li>
                      <li><a href="?module=konfirmasisurat">Konfirmasi Surat</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text-o"></i>Laporan dan Statistik<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=laporan_penduduk">Statistik Kependudukan</a></li>
                      <li><a href="?module=laporan_surat">Laporan Surat Penduduk</a></li>
                      <li><a href="?module=laporan_bulanan">Laporan Bulanan</a></li>
                    </ul>
                  </li>
                </ul>
                <?php } elseif ($_SESSION['leveluser']=='Operator' ){ ?> 
                <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-users"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=penduduk">Penduduk</a></li>
                      <li><a href="?module=ketuarw">Ketua RW</a></li>
                      <li><a href="?module=ketuart">Ketua RT</a></li>                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-mail-reply"></i> Mutasi Penduduk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=mutasimasuk">Mutasi Masuk</a></li>
                      <li><a href="?module=mutasikeluar">Mutasi Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope"></i> Pelayanan Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=surat">Pengajuan Surat</a></li>
                      <li><a href="?module=konfirmasisurat">Konfirmasi Surat</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text-o"></i>Laporan dan Statistik<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=laporan_penduduk">Statistik Kependudukan</a></li>
                      <li><a href="?module=laporan_surat">Laporan Surat Penduduk</a></li>
                      <li><a href="?module=laporan_bulanan">Laporan Bulanan</a></li>
                    </ul>
                  </li>
                </ul>
                <?php } elseif ($_SESSION['leveluser']=='Kepala Desa' ){ ?> 
                <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-file-text-o"></i>Laporan dan Statistik<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=laporan_penduduk">Statistik Kependudukan</a></li>
                      <li><a href="?module=laporan_surat">Laporan Surat Penduduk</a></li>
                      <li><a href="?module=laporan_bulanan">Laporan Bulanan</a></li>
                    </ul>
                  </li>
                </ul>
                <?php } elseif ($_SESSION['leveluser']=='Penduduk' ) {?>
                  <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  
                  <li><a><i class="fa fa-envelope"></i> Pelayanan Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=surat">Pengajuan Surat</a></li>
                      <li><a href="?module=riwayat_surat">Riwayat Pengajuan Surat</a></li>
                    </ul>
                  </li>
                </ul>
                <?php } elseif ($_SESSION['leveluser']=='Ketua RT' ) {?>
                  <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  
                  <li><a><i class="fa fa-envelope"></i> Pelayanan Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?module=surat">Pengajuan Surat</a></li>
                      <li><a href="?module=konfirmasisurat">Konfirmasi Surat</a></li>
                    </ul>
                  </li>
                  <li><a href="?module=laporan_surat"><i class="fa fa-file-text-o"></i>Laporan Surat Penduduk</a>
                    
                  </li>
                </ul>
                <?php } elseif ($_SESSION['leveluser']=='Ketua RW' ) {?>
                  <ul class="nav side-menu">
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  
                  <li><a href="?module=laporan_surat"><i class="fa fa-file-text-o"></i>Laporan Surat Penduduk</a>
                    
                  </li>
                </ul>

                <?php }?> 
              </div>
			  <!-- 
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>-->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>  -->
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
                    <img src="images/img.jpg" alt=""><?php echo"$_SESSION[namauser]"; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="?module=profile"> Lihat Profil</a></li>
                    <li>
                      <a href="?module=password">
                        <span>Ubah Password</span>
                      </a>
                    </li>
                    
                    <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <?php  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){ ?>                 
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <?php
                    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator'){                   
                    $suratpending    = mysql_num_rows(mysql_query("SELECT * FROM surat
                    INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                    INNER JOIN `jenis_surat` ON `jenis_surat`.`kode_surat` = `surat`.`kode_surat`
                    INNER JOIN `status_surat` ON `status_surat`.`id_statussurat` = `surat`.`id_statussurat`
                    where status_surat='Pending' and id_statuspenduduk='STP.001' and hapus='N'")); 
                    } 
                    elseif ($_SESSION['leveluser']=='Ketua RT'){                   
                    $suratpending    = mysql_num_rows(mysql_query("SELECT * FROM surat
                                                                  INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                                                  INNER JOIN `jenis_surat` ON `jenis_surat`.`kode_surat` = `surat`.`kode_surat`
                                                                  INNER JOIN `status_surat` ON `status_surat`.`id_statussurat` = `surat`.`id_statussurat`
                                                                  where status_surat='Pending' and id_statuspenduduk='STP.001' and hapus='N' and surat.kode_surat='RT' and id_rt='$_SESSION[id_rt]'")); 
                    }                  
                    echo"
                    <span class='badge bg-green'>$suratpending</span>
                    
                  </a>
                  <ul id='menu1' class='dropdown-menu list-unstyled msg_list' role='menu'>";                                    
                  $aksi="modul/mod_jenissurat/aksi_surat.php";
                  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
                  $tampil = mysql_query("SELECT * FROM surat
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        INNER JOIN `jenis_surat` ON `jenis_surat`.`kode_surat` = `surat`.`kode_surat`
                                        INNER JOIN `status_surat` ON `status_surat`.`id_statussurat` = `surat`.`id_statussurat`
                                        where status_surat='Pending' and id_statuspenduduk='STP.001' and hapus='N' ORDER BY tgl_surat DESC LIMIT 5");
                  }
                  if ($_SESSION['leveluser']=='Ketua RT'){
                  $tampil = mysql_query("SELECT * FROM surat
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        INNER JOIN `jenis_surat` ON `jenis_surat`.`kode_surat` = `surat`.`kode_surat`
                                        INNER JOIN `status_surat` ON `status_surat`.`id_statussurat` = `surat`.`id_statussurat`
                                        where status_surat='Pending' and id_statuspenduduk='STP.001' and hapus='N' and surat.kode_surat='RT' and id_rt='$_SESSION[id_rt]' ORDER BY tgl_surat DESC LIMIT 5");
                  }
                  while($r=mysql_fetch_array($tampil)){
                  echo"
                    <li>
                      <a href='?module=konfirmasisurat&act=detailsurat&kode_surat=$r[kode_surat]&id=$r[id_penduduk]&id_surat=$r[id_surat]'>
                        <span class='image'><img src='images/img.jpg' alt='Profile Image' /></span>
                        <span>
                          <span>$r[nama]</span>
                          
                        </span>
                        <span class='message'>
                          <span class='time'>$r[nik]</span> <br>
                          Permintaan $r[nama_surat] dari $r[nama] pada tanggal $r[tgl_surat]
                        </span>
                      </a>
                    </li>";
                  
                  }
                
                  
                  
                    ?>
                    
                    
                    <li>
                      <div class="text-center">
                        <a href='?module=konfirmasisurat'>
                          <strong>Lihat Semua Permintaan Surat</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                    <?php }?>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Log Out</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin ingin Log Out ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="logout.php"><button type="button" class="btn btn-primary">Log Out</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /Modal Logout -->

        <!-- page content -->        
        <?php include "content.php"; ?> 
        <!-- /page content -->

        <!-- footer content
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
         /footer content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; 2019 SIPDAPAP - Universitas Muhammadiyah Cirebon | <a href="#">Permadi Eka Permana</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<?php if ($_GET[module]=='penduduk'){ ?> 
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<?php } else { ?> 
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>    
    <!-- Ketua RW -->
    <script>
  $("select").bind('change', function(){
    var url = $(':selected', this).attr('surls');
    if(url){
      window.location =url;
    }
  })
</script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<?php } ?> 
  </body>
</html>