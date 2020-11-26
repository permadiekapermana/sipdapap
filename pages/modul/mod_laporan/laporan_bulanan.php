<?php
include "../../../config/library.php";
echo"

          <div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Laporan Kependudukan Bulanan</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  <a href='modul/mod_laporan/cetak_laporan_bulanan.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                  
                  <h3 align=center><b>PEMERINTAH KABUPATEN/KOTA CIREBON</b></h3>
                  <h4 align=center><b>LAPORAN PERKEMBANGAN PENDUDUK (LAMPIRAN A - 9)</b></h4>
                  <br>

                  <table class='table table-striped table-bordered'>
                  <thead>
                    <tr>
                      <th width=5px rowspan='2'>No.</th>
                      <th rowspan='2'>Perincian</th>
                      <th width='20%'>Laki-laki</th>
                      <th width='20%'>Perempuan</th>
                      <th width='20%'>Total</th>
                    </tr>
                    <tr>
                      <th>Jumlah</th>
                      <th>Jumlah</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>";

          //         $penduduks= mysql_query("SELECT * FROM `surat`");
          //         $penduduk=mysql_fetch_array($penduduks);
				  // $lahir=mysql_num_rows(mysql_query("SELECT * FROM surat where kode_surat='RT' and tahun='$thn_sekarang' and bulan='$bln_sekarang' "));
				  // $lahirl=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='RT' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Laki-laki' "));
          //         $lahirp=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='RT' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.jk='Perempuan' "));
				  $lahir    = mysql_num_rows(mysql_query(
            "SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
            AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
            and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N'"));
          $lahirl    = mysql_num_rows(mysql_query(
            "SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
            AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
            and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N' and id_jk='JK.001'"));          
          $lahirp    = mysql_num_rows(mysql_query(
            "SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
            AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 1 
            and MONTH(tgl_lahir)=$bln_sekarang and YEAR(tgl_lahir)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N' and id_jk='JK.002'"));

          $kematian=mysql_num_rows(mysql_query("SELECT * FROM surat where kode_surat='474.2' and tahun='$thn_sekarang' and bulan='$bln_sekarang' "));
					$kematianl=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.2' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.id_jk='JK.001' "));
          $kematianp=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.2' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and penduduk.id_jk='JK.002' "));
          
          $pendatang=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
            INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
            where MONTH(tgl_mutasimasuk)=$bln_sekarang and YEAR(tgl_mutasimasuk)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N'"));
          $pendatangl=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
            INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
            where MONTH(tgl_mutasimasuk)=$bln_sekarang and YEAR(tgl_mutasimasuk)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N' and penduduk.id_jk='JK.001' "));
          $pendatangp=mysql_num_rows(mysql_query("SELECT * FROM mutasi_masuk 
            INNER JOIN `penduduk` ON `mutasi_masuk`.`id_penduduk` = `penduduk`.`id_penduduk`
            where MONTH(tgl_mutasimasuk)=$bln_sekarang and YEAR(tgl_mutasimasuk)=$thn_sekarang and id_statuspenduduk='STP.001' and hapus='N' and penduduk.id_jk='JK.002' "));

          $pindah=mysql_num_rows(mysql_query("SELECT * FROM surat where kode_surat='474.3' and tahun='$thn_sekarang' and bulan='$bln_sekarang' "));
					$pindahl=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.3' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and id_jk='JK.001' "));
          $pindahp=mysql_num_rows(mysql_query("SELECT * FROM surat, penduduk where surat.id_penduduk=penduduk.id_penduduk and surat.kode_surat='474.3' and surat.tahun='$thn_sekarang' and surat.bulan='$bln_sekarang' and id_jk='JK.002' "));

          $total_tambah_l = $lahirl+$pendatangl;
          $total_tambah_p = $lahirp+$pendatangp;
          $total_tambah   = $lahir+$pendatang;
          $total_kurang_l = $kematianl+$pindahl;
          $total_kurang_p = $kematianp+$pindahp;
          $total_kurang   = $kematian+$pindah;
          
					echo"
                    <tr>
                      <td>1.</td>
                      <td>Kelahiran Bulan Ini </td>
                      <td>$lahirl</td>
                      <td>$lahirp</td>
                      <td>$lahir</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kematian Bulan Ini</td>
                      <td>$kematianl</td>
                      <td>$kematianp</td>
                      <td>$kematian</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Pendatang Bulan Ini</td>
                      <td>$pendatangl</td>
                      <td>$pendatangp</td>
                      <td>$pendatang</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Pindah/Pergi Bulan Ini</td>
                      <td>$pindahl</td>
                      <td>$pindahp</td>
                      <td>$pindah</td>
                    </tr>
                    <tr>          
                      <td colspan='2'>Total Pertambahan Penduduk Bulan Ini</td>
                      <td>$total_tambah_l</td>
                      <td>$total_tambah_p</td>
                      <td>$total_tambah</td>
                    </tr>
                    <tr>
                      <td colspan='2'>Total Pengurangan Penduduk Bulan Ini</td>
                      <td>$total_kurang_l</td>
                      <td>$total_kurang_p</td>
                      <td>$total_kurang</td>
                    </tr>";
                    $total_penduduk   = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                    $total_penduduk_l = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N' and id_statustinggal='STT.001'"));
                    $total_penduduk_p = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N' and id_statustinggal='STT.001'"));
                    echo"
                    <tr>
                      <td colspan='2'>Total Penduduk Bulan Ini</td>
                      <td>$total_penduduk_l</td>
                      <td>$total_penduduk_p</td>
                      <td>$total_penduduk</td>
                    </tr>
                  </tbody>
                  </table>

                  </div>                    
                </div>
              </div>
              <div class='clearfix'></div>
          </div>
        </div>";

?>