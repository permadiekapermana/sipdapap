<?php

include "bulan_romawi.php";

echo"

          <div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Riwayat Permintaan Surat Penduduk</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
				  <form class='form-horizontal'>
                  <p class='lead'>Data Pengajuan Surat Penduduk
                                  
                    <fieldset>
                      <div class='control-group'>                        
                      </div>
                    </fieldset>
                  </form>
                  <table id='datatable' class='table table-striped table-bordered'>
                    <thead>
                      <tr>
                        <th width=1%>No.</th>
                        <th width=23%>Nama Surat</th>
                        <th width=10%>Nomor Surat</th>
                        <th width=25%>Nama Pemohon</th>
                        <th width=12%>Tanggal Surat</th>
                        <th width=4%>Status</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $surats= mysql_query("SELECT * FROM `surat`
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        INNER JOIN `jenissurat` ON `surat`.`kode_surat` = `jenissurat`.`kode_surat`
                                        where surat.id_penduduk='$_SESSION[id_penduduk]'
                                        ORDER BY id_surat DESC");
                    $no = 1;
                    while($surat=mysql_fetch_array($surats)){
                    echo"
                      <tr>
                        <td>$no.</td>
                        <td>$surat[nama_surat]</td>
                        <td>$surat[no_akhirsurat]/$surat[kode_surat]/$bln_sekarang/$thn_sekarang</td>
                        <td>$surat[nama]</td>
                        <td>$surat[tgl_surat]</td>
                        <td>$surat[status_surat]</td>
                      </tr>";
                      $no++;
            
                      }
                      echo"
                    </tbody>
                  </table>
                  
                    </div>
                    
                      </div>
                    </div>

                    <div class='clearfix'></div>
                  
                  
          </div>
        </div>";

?>