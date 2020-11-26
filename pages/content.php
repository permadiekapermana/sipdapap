<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";

$id_Operator=$_SESSION[id_Operator];                 
                   
 echo"<div class='right_col' role='main'>
          <div class=''>  ";     
if ($_GET['module']=='dashboard'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION[leveluser]=='Penduduk' OR $_SESSION[leveluser]=='Ketua RT' OR $_SESSION[leveluser]=='Ketua RW' OR $_SESSION[leveluser]=='Kepala Desa'){
    include "modul/mod_dashboard/dashboard.php";
  }
}
// Modul Agama
elseif ($_GET[module]=='agama'){
   if ($_SESSION['leveluser']=='Admin'){
    include "modul/mod_agama/agama.php";
  }
}
// Modul Pekerjaan
elseif ($_GET[module]=='pekerjaan'){
  if ($_SESSION['leveluser']=='Admin'){
    include "modul/mod_pekerjaan/pekerjaan.php";
  }
}
// Modul Pendidikan
elseif ($_GET[module]=='pendidikan'){
  if ($_SESSION['leveluser']=='Admin'){
   include "modul/mod_pendidikan/pendidikan.php";
 }
}
// Modul Jabatan
elseif ($_GET[module]=='jabatan'){
  if ($_SESSION['leveluser']=='Admin'){
   include "modul/mod_jabatan/jabatan.php";
 }
}
// Modul Perangkat Desa
elseif ($_GET[module]=='perangkatdesa'){
  if ($_SESSION['leveluser']=='Admin'){
   include "modul/mod_perangkatdesa/perangkatdesa.php";
 }
}
// Modul Profile
elseif ($_GET[module]=='profile'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION[leveluser]=='Penduduk' OR $_SESSION[leveluser]=='Ketua RT' OR $_SESSION[leveluser]=='Ketua RW' OR $_SESSION[leveluser]=='Kepala Desa'){
    include "modul/mod_profile/profile.php";
  }
}
// Modul Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION[leveluser]=='Penduduk' OR $_SESSION[leveluser]=='Ketua RT' OR $_SESSION[leveluser]=='Ketua RW' OR $_SESSION[leveluser]=='Kepala Desa'){
    include "modul/mod_password/password.php";
  }
}
// Modul Penduduk
elseif ($_GET[module]=='penduduk'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_penduduk/penduduk.php";
 }
}
// Modul RT
elseif ($_GET[module]=='rt'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_rt/rt.php";
 }
}
// Modul Ketua RT
elseif ($_GET[module]=='ketuart'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_ketuart/ketuart.php";
 }
}
// Modul Ketua RT
elseif ($_GET[module]=='jenissurat'){
  if ($_SESSION['leveluser']=='Admin'){
   include "modul/mod_jenissurat/surat.php";
 }
}
// Modul Ketua RT
elseif ($_GET[module]=='surat'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator' OR $_SESSION[leveluser]=='Penduduk' OR $_SESSION[leveluser]=='Ketua RT'){
   include "modul/mod_surat/surat.php";
 }
}
elseif ($_GET[module]=='konfirmasisurat'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator' OR $_SESSION['leveluser']=='Ketua RT'){
   include "modul/mod_surat/konfirmasi_surat.php";
 }
}
elseif ($_GET[module]=='riwayat_surat'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Penduduk' OR $_SESSION['leveluser']=='Ketua RT'){
   include "modul/mod_surat/riwayat_pengajuan.php";
 }
}
// Modul RW
elseif ($_GET['module']=='rw'){
  if ($_SESSION['leveluser']=='Admin'){
   include "modul/mod_rw/rw.php";
 }
}
// Modul Ketua RW
elseif ($_GET['module']=='ketuarw'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_ketuarw/ketuarw.php";
 }
}
// Modul Mutasi Masuk
elseif ($_GET['module']=='mutasimasuk'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_mutasimasuk/mutasimasuk.php";
 }
}
// Modul Mutasi Keluar
elseif ($_GET['module']=='mutasikeluar'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator'){
   include "modul/mod_mutasikeluar/mutasikeluar.php";
 }
}

elseif ($_GET[module]=='laporan_penduduk'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator' OR $_SESSION[leveluser]=='Kepala Desa'){
    include "modul/mod_laporan/laporan_Penduduk.php";
  }
}
elseif ($_GET[module]=='laporan_surat'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator' OR $_SESSION[leveluser]=='Kepala Desa' OR $_SESSION[leveluser]=='Ketua RT' OR $_SESSION[leveluser]=='Ketua RW'){
    include "modul/mod_laporan/laporan_surat.php";
  }
}
elseif ($_GET[module]=='laporan_bulanan'){
  if ($_SESSION['leveluser']=='Admin' OR $_SESSION[leveluser]=='Operator' OR $_SESSION[leveluser]=='Kepala Desa'){
    include "modul/mod_laporan/laporan_bulanan.php";
  }
}
else{
  echo "<p><b>MODUL Tidak DITEMUKAN</b></p>";
}		
echo"</div>
</div>";
?>   
