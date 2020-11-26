<?php
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
                  <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>&nbsp;
                  <button class='btn btn-primary' type='button'><i class='fa fa-file-text'></i> Riwayat Cetak</button>
                  
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

                  $penduduks= mysql_query("SELECT * FROM `penduduk`");
                  $penduduk=mysql_fetch_array($penduduks);
                    echo"
                    <tr>
                      <td>1.</td>
                      <td>Kelahiran Bulan Ini</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kematian Bulan Ini</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Pendatang Bulan Ini</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Pindah/Pergi Bulan Ini</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan='2'>Total Penduduk Bulan Ini</td>
                      <td></td>
                      <td></td>
                      <td></td>
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