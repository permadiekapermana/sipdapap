<?php

include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$perangkatdesa = mysql_query("SELECT * FROM `perangkat_desa`
                            INNER JOIN `jabatan` ON `perangkat_desa`.`id_jabatan` = `jabatan`.`id_jabatan`
                            INNER JOIN `users` ON `users`.`id_user` = `perangkat_desa`.`id_user`
                            INNER JOIN `level` ON `users`.`id_level` = `level`.`id_level`
                            WHERE users.id_user='$_SESSION[id_user]'
                            ");
$profil = mysql_fetch_array($perangkatdesa);

$penduduk = mysql_query("SELECT * FROM `penduduk`
                      INNER JOIN `users` ON `penduduk`.`id_penduduk` = `users`.`id_penduduk`
                      INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
                      INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
                      INNER JOIN `agama` ON `penduduk`.`id_agama` = `agama`.`id_agama`
                      INNER JOIN `pendidikan` ON `penduduk`.`id_pendidikan` = `pendidikan`.`id_pendidikan`
                      INNER JOIN `pekerjaan` ON `penduduk`.`id_pekerjaan` = `pekerjaan`.`id_pekerjaan`
                      WHERE users.id_penduduk='$_SESSION[id_penduduk]'
                      ");
$profil2    = mysql_fetch_array($penduduk);

echo "

<div role='main'>
  <div class='clearfix'></div>
    <div class='row'>
      <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
          <div class='x_title'>
            <h2>Profil User</h2>
            <div class='clearfix'></div>
          </div>
          <div class='x_content'>
          <br>";
          
          if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Kepaladesa'){
            
            echo"
          <table class='table table-striped'>
        <tr>
          <th width='20%'>Nama</th>
          <td width='1%'>:</td>
          <td>$profil[nama]</td>
        </tr>
        <tr>
          <th>Jabatan</th>
          <td>:</td>
          <td>$profil[jabatan]</td>
        </tr>
        <tr>
          <th>Username</th>
          <td>:</td>
          <td>
            $profil[username]
          </td>
        </tr>
        <tr>
          <th>Hak Akses</th>
          <td>:</td>
          <td>$profil[level]</td>
        </tr>
      </table>";
      }
      if ($_SESSION['leveluser']=='Penduduk' OR $_SESSION['leveluser']=='Ketua RT' OR $_SESSION['leveluser']=='Ketua RW'){
      echo" 
      <h3>A. Data Pribadi</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>NIK</th>
          <td width='1%'>:</td>
          <td>$profil2[nik]</td>
        </tr>
        <tr>
          <th>Nama Warga</th>
          <td>:</td>
          <td>$profil2[nama]</td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          <td>:</td>
          <td>$profil2[tmp_lahir]</td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td>:</td>
          <td>
            $profil2[tgl_lahir]
          </td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>:</td>
          <td>$profil2[jk]</td>
        </tr>
      </table>
      
      <h3>B. Data Alamat</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>Alamat</th>
          <td width='1%'>:</td>
          <td>Desa $profil2[desa_kel] RT $profil2[rt] / RW $profil2[rw] Kecamatan $profil2[kecamatan]</td>
        </tr>
        <tr>
          <th>RT</th>
          <td>:</td>
          <td>$profil2[rt]</td>
        </tr>
        <tr>
          <th>RW</th>
          <td>:</td>
          <td>$profil2[rw]</td>
        </tr>
        <tr>
          <th>Desa/Kelurahan</th>
          <td>:</td>
          <td>$profil2[desa_kel]</td>
        </tr>
        <tr>
          <th>Kecamatan</th>
          <td>:</td>
          <td>$profil2[kecamatan]</td>
        </tr>
        <tr>
          <th>Kabupaten/Kota</th>
          <td>:</td>
          <td>$profil2[kota_kab]</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>:</td>
          <td>$profil2[provinsi]</td>
        </tr>        
      </table>
      
      <h3>C. Data Lain-lain</h3>
      <table class='table table-striped'>
        <tr>
          <th width='20%'>Golongan Darah</th>
          <td width='1%'>:</td>
          <td>$profil2[gol_darah]</td>
        </tr>
        <tr>
          <th>Agama</th>
          <td>:</td>
          <td>$profil2[agama]</td>
        </tr>
        <tr>
          <th>Pendidikan</th>
          <td>:</td>
          <td>$profil2[pendidikan]</td>
        </tr>
        <tr>
          <th>Pekerjaan</th>
          <td>:</td>
          <td>$profil2[pekerjaan]</td>
        </tr>
        <tr>
          <th>Status Nikah</th>
          <td>:</td>
          <td>$profil2[status_nikah]</td>
        </tr>
        <tr>
          <th>Status Tinggal</th>
          <td>:</td>
          <td>$profil2[status_tinggal]</td>
        </tr>
      </table>";
      }
      echo"
          </div>
        </div>
      </div>
    </div>
  </div>
</div>;"
    
?>