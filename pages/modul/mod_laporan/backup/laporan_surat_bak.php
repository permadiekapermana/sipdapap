<?php

include "bulan_romawi.php";

echo"

          <div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Laporan Surat Penduduk</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  <p class='lead'>Data Pengajuan Surat Penduduk
                  <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
                  <form class='form-horizontal'>
                    <fieldset>
                      <div class='control-group'>
                        <div class='controls'>
                          <div class='input-prepend input-group'>
                            <span class='add-on input-group-addon'><i class='glyphicon glyphicon-calendar fa fa-calendar'></i></span>
                            <input type='text' style='width: 200px' name='reservation' id='reservation' class='form-control' value='' />
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                  <table id='datatable' class='table table-striped table-bordered'>
                    <thead>
                      <tr>
                        <th width=5px>No.</th>
                        <th width=11%>Kode Surat</th>
                        <th width=20%>Nomor Surat</th>
                        <th width=40%>Nama Pemohon</th>
                        <th width=15%>Tanggal Surat</th>
                        <th>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $surats= mysql_query("SELECT * FROM `surat`
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        ORDER BY kode_surat DESC");
                    $no = 1;
                    while($surat=mysql_fetch_array($surats)){
                    echo"
                      <tr>
                        <td>$no.</td>
                        <td>$surat[kode_surat]</td>
                        <td>$surat[no_akhirsurat]/$surat[kode_surat]/$bln_sekarang/$thn_sekarang</td>
                        <td>$surat[nama]</td>
                        <td>$surat[tgl_surat]</td>
                        <td>a</td>
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