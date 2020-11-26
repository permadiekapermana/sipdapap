<?php
include "../config/koneksi.php";

$pel="DN.";
$y=substr($pel,0,2);

$query=mysql_query("select * from users where substr(id_user,1,2)='$y' order by id_user desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_user'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = $_POST['username'];
$pass     = sha1($_POST['password']);
$pass2    = sha1($_POST['password2']);
$nik = $_POST['nik'];
$captcha = $_POST['captcha'];
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysql_query("SELECT p.id_penduduk as id_pen, p.nik, u.id_user, u.id_penduduk FROM `penduduk` as p Left JOIN users as u on p.`id_penduduk`= u.id_penduduk WHERE p.nik = '$nik' and u.id_user is NULL");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
$login2=mysql_query("SELECT p.id_penduduk as id_pen, p.`nik`, u.id_user, u.id_penduduk FROM `penduduk` as p Left JOIN users as u on p.`id_penduduk`= u.id_penduduk WHERE p.nik = '$nik' and u.id_user is not NULL");
$ketemu2=mysql_num_rows($login2);

  session_start();
	    if($_SESSION["Captcha"]!=$_POST["captcha"]){
		    
        echo"<script>alert('Kode Captcha Anda Salah!');history.go(-1);</script>";
        
			}else{ // jika teryata lolos
			
			
//Apabila username dan password ditemukan

if ($_POST['password']==$_POST['password2'] ) {
  //proses simpan data, $_POST['pw'] dan $_POST['pw1'] adalah name dari masing masing text password 
  


if ($ketemu > 0){
  session_start();
  

  $query=mysql_query("insert into users (id_user,id_penduduk,username,password,id_level,blokir) 
  values ('$nopel','$r[id_pen]','$username','$pass','LVL.006','N')");
  

  echo"<script>alert('Anda berhasil terdaftar di Sistem!');history.go(-1);</script>";
}
else if ($ketemu2 > 0){
    
  echo"<script>alert('Anda telah terdaftar di Sistem!');history.go(-1);</script>";
    
}
else{
  echo"<script>alert('Anda tidak terdaftar di data penduduk!');history.go(-1);</script>";
}

}else {
  echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
  }

  }

}
?>
