<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$pel2="SRT.";
  $y2=substr($pel2,0,2);
  $query2=mysql_query("select * from surat where substr(id_surat,1,2)='$y2' order by id_surat desc limit 0,1");
  $row2=mysql_num_rows($query2);
  $data2=mysql_fetch_array($query2);
  
  if ($row2>0){
  $no2=substr($data2['id_surat'],-3)+1;}
  else{
  $no2=1;
  }
  $nourut2=1000+$no2;
  $nopel2=$pel2.substr($nourut2,-3);

$module=$_GET[module];
$act=$_GET[act];

// Hapus jenissurat
if ($module=='jenissurat' AND $act=='hapus'){
  
 
     mysql_query("DELETE FROM jenis_surat WHERE kode_surat='$_GET[id]'");
     
  header('location:../../media.php?module='.$module);
}
elseif ($module=='jenissurat' AND $act=='hapusfield'){
 
     mysql_query("DELETE FROM field_surat WHERE id_field='$_GET[id]'");
     header('location:../../media.php?module='.$module); 
  //header('location:../../media.php?module=jenissurat&act=tambahfield&id=$_GET[id]');
}
// Input jenissurat
elseif ($module=='jenissurat' AND $act=='input'){

			$query=mysql_query("insert into jenis_surat (kode_surat,nama_surat,keterangan) 
			values ('$_POST[kode_surat]','$_POST[nama_surat]','$_POST[keterangan]')");
  header('location:../../media.php?module='.$module);

  
}
elseif ($module=='jenissurat' AND $act=='field'){

			$query=mysql_query("insert into field_surat (id_field, kode_surat,no_urut,isi) 
      values ('$_POST[id_field]','$_POST[kode_surat]','$_POST[no_urut]','$_POST[isi]')");
      
  header('location:../../media.php?module='.$module);

  
}
// Update jenissurat
elseif ($module=='jenissurat' AND $act=='update'){

							 
							     mysql_query("UPDATE jenis_surat SET kode_surat = '$_POST[kode_surat]', nama_surat = '$_POST[nama_surat]',
								 keterangan = '$_POST[keterangan]'
                             WHERE kode_surat   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }

    elseif ($module=='jenissurat' AND $act=='updatefield'){

							 
      mysql_query("UPDATE field_surat SET no_urut = '$_POST[no_urut]',
    isi = '$_POST[isi]'
                WHERE id_field   = '$_POST[id]'");
header('location:../../media.php?module='.$module);
}

elseif ($module=='surat' AND $act=='konfirmasi'){

  $jml=count($_POST[id_surat]);
  $id_surat=$_POST[id_surat];
  $id_surat2=$_POST[id_surat2];
  $isi_field=$_POST[isi_field];
  $no_urut=$_POST[no_urut];
  $id_rt=$_POST[id_rt];
  $id_rw=$_POST[id_rw];
  for ($i=0; $i < $jml; $i++){
  mysql_query("INSERT INTO detail_field(id_surat,
              no_urut,
              isi_field) 
            VALUES('$id_surat[$i]',
            '$no_urut[$i]',
            '$isi_field[$i]')");	
    
  }
  $query=mysql_query("insert into surat (id_surat, kode_surat,id_penduduk,tahun,bulan,tgl_surat,id_statussurat) 
			values ('$nopel2','$_POST[kode_surat]','$_POST[id]','$thn_sekarang','$bln_sekarang','$tgl_sekarang','SS.001')");
header('location:../../media.php?module='.$module);
}

elseif ($module=='surat' AND $act=='tolak'){

							 
  mysql_query("UPDATE surat SET id_statussurat = 'SS.002'    
                WHERE id_surat   = '$_GET[id_surat]'");
header('location:../../media.php?module='.$module);
}

elseif ($module=='surat' AND $act=='confirm'){

							 
  mysql_query("UPDATE surat SET id_user='$_SESSION[id_user]', id_statussurat = 'SS.003'    
                WHERE id_surat   = '$_GET[id_surat]'");
header('location:../../media.php?module='.$module);
}

}

?>
