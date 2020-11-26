
<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";

  $id_operator=$_SESSION[id_operator];                 
                   
 echo"<div class='right_col' role='main'>
          <div class=''>  ";     
if ($_GET['module']=='home'){
	?>

<?php
    if ($_SESSION['leveluser']=='admin'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, Imam selamat datang di halaman kami<br> 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website atau pilih ikon-ikon pada Control Panel. </p><br>
		  
		  <img src='images/img.jpg' alt='...'  width=10%>

 		


          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  }
  elseif ($_SESSION['leveluser']=='user'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator CMS Lokomedia.<br> 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>


          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 	}
}
// Bagian Modul
elseif ($_GET[module]=='agama'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_agama/agama.php";
  }
}
// Bagian User
elseif ($_GET['module']=='users'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}



// Bagian Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Laporan
elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_laporan/laporan.php";
  }
}

//bagian testimoni
elseif ($_GET[module]=='pekerjaan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_pekerjaan/pekerjaan.php";
  }
}

// Modul jenis
elseif ($_GET[module]=='perangkat_desa'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_perangkat_desa/perangkat_desa.php";
  }
}
// Modul pembayaran
elseif ($_GET[module]=='jabatan'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_jabatan/jabatan.php";
  }
}
// Modul pelanggan
elseif ($_GET[module]=='penduduk'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/penduduk.php";
  }
}


// Modul orders
elseif ($_GET[module]=='pendidikan'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_pendidikan/pendidikan.php";
  }
}
// Modul orders
elseif ($_GET[module]=='polisi'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/polisi.php";
  }
}
// Modul orders
elseif ($_GET[module]=='pengantar'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/pengantar.php";
  }
}
// Modul orders
elseif ($_GET[module]=='mampu'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/mampu.php";
  }
}
// Modul orders
elseif ($_GET[module]=='usaha'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/usaha.php";
  }
}
// Modul orders
elseif ($_GET[module]=='kelahiran'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/kelahiran.php";
  }
}
// Modul pos
elseif ($_GET[module]=='kematian'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/kematian.php";
  }
}
// Modul pos
elseif ($_GET[module]=='pindah'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/pindah.php";
  }
}
// Modul pos
elseif ($_GET[module]=='penghasilan'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/penghasilan.php";
  }
}

// Modul pos
elseif ($_GET[module]=='duda'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/duda.php";
  }
}

// Modul pos
elseif ($_GET[module]=='janda'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_penduduk/janda.php";
  }
}
// Bagian Download
elseif ($_GET[module]=='kartukeluarga'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_kartukeluarga/kartukeluarga.php";
  }
}
// Bagian Download
elseif ($_GET[module]=='rt'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_rt/rt.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='rw'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_rw/rw.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Download
elseif ($_GET[module]=='fb'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_fb/fb.php";
  }
}
elseif ($_GET[module]=='tag'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_tag/tag.php";
  }
}
elseif ($_GET[module]=='katajelek'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_katajelek/katajelek.php";
  }
}
elseif ($_GET[module]=='komentar'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_komentar/komentar.php";
  }
}
elseif ($_GET[module]=='header'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_header/header.php";
  }
}
elseif ($_GET[module]=='laporan'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_laporan/laporan.php";
  }
}
else{
  echo "<p><b>MODUL Tidak DITEMUKAN</b></p>";
}		
echo"</div>
</div>";
?>   
