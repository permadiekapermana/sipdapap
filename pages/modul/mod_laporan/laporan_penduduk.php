<?php
echo"

          <div role='main'>
          <div class='clearfix'></div>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Statistik Kependudukan</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>                  

                    <div class='col-xs-3'>
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class='nav nav-tabs tabs-left'>
                        <li class='active'><a href='#agama' data-toggle='tab'>Agama</a>
                        </li>
                        <li><a href='#pekerjaan' data-toggle='tab'>Pekerjaan</a>
                        </li>
                        <li><a href='#pendidikan' data-toggle='tab'>Pendidikan</a>
                        </li>
                        <li><a href='#status_nikah' data-toggle='tab'>Status Nikah</a>
                        </li>
                        <li><a href='#jk' data-toggle='tab'>Jenis Kelamin</a>
                        </li>
                        <li><a href='#stts' data-toggle='tab'>Status Tinggal</a>
                        </li>
                        <li><a href='#rt' data-toggle='tab'>RT / RW</a>
                        </li>
                      </ul>
                    </div>

                    <div class='col-xs-9'>
                      <!-- Tab panes -->
                      <div class='tab-content'>

                        <div class='tab-pane active' id='agama'>                          
                          <p class='lead'>Data Kependudukan Menurut Agama
                          <a href='modul/mod_laporan/statistik_agama.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>                          
                          <table class='table table-striped table-bordered'>
                            <thead>
                              <tr>
                                <th width=5px rowspan='2'>No.</th>
                                <th rowspan='2'>Agama</th>
                                <th width='20%' colspan='2'>Laki-laki</th>
                                <th width='20%' colspan='2'>Perempuan</th>
                                <th width='20%' colspan='2'>Total</th>
                              </tr>
                              <tr>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                              </tr>
                            </thead>
                            <tbody>";

                            $agamas= mysql_query("SELECT * FROM `agama`");  
                            $no = 1;
                              while($agama=mysql_fetch_array($agamas)){
                                $penduduk             = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                                $j_agama_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_agama='$agama[id_agama]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                                $pros_agama_l     = round($j_agama_l / $penduduk * 100,2);
                                $j_agama_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_agama='$agama[id_agama]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                                $pros_agama_p     = round($j_agama_p / $penduduk * 100,2);
                                $j_tot_agama      = $j_agaman_l+$j_agama_p;
                                $j_pros_agama     = $pros_agama_l+$pros_agama_p;
    
                                $all_tot_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                                $all_pros_l       = round($all_tot_l / $penduduk * 100,2);
                                $all_tot_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                                $all_pros_p       = round($all_tot_p / $penduduk * 100,2);
                                $all_tot_lp       = $all_tot_l+$all_tot_p;
                                $all_pros_lp      = $all_pros_l+$all_pros_p;
    
                                echo"
                                <tr>
                                  <td>$no.</td>
                                  <td>$agama[agama]</td>
                                  <td>$j_agama_l</td>
                                  <td>$pros_agama_l %</td>
                                  <td>$j_agama_p</td>
                                  <td>$pros_agama_p %</td>
                                  <td>$j_tot_agama</td>
                                  <td>$j_pros_agama %</td>
                                </tr>";
                                $no++;
                    
                                }
                                echo"
                                <tr>
                                  <td colspan='2'>Total Keseluruhan</td>
                                  <td>$all_tot_l</td>
                                  <td>$all_pros_l %</td>
                                  <td>$all_tot_p</td>
                                  <td>$all_pros_p %</td>
                                  <td>$all_tot_lp</td>
                                  <td>$all_pros_lp %</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        
                        <div class='tab-pane' id='pekerjaan'>                        
                        <p class='lead'>Data Kependudukan Menurut Pekerjaan
                        <a href='modul/mod_laporan/statistik_pekerjaan.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>                                              
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                                <th width=5px rowspan='2'>No.</th>
                                <th rowspan='2'>Pekerjaan</th>
                                <th width='20%' colspan='2'>Laki-laki</th>
                                <th width='20%' colspan='2'>Perempuan</th>
                                <th width='20%' colspan='2'>Total</th>
                              </tr>
                              <tr>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                              </tr>
                            </thead>
                          <tbody>";

                          $pekerjaans= mysql_query("SELECT * FROM `pekerjaan`");  
                          $no = 1;
                            while($pekerjaan=mysql_fetch_array($pekerjaans)){
                              $penduduk             = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                              $j_pekerjaan_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_pekerjaan='$pekerjaan[id_pekerjaan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                              $pros_pekerjaan_l     = round($j_pekerjaan_l / $penduduk * 100,2);
                              $j_pekerjaan_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_pekerjaan='$pekerjaan[id_pekerjaan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                              $pros_pekerjaan_p     = round($j_pekerjaan_p / $penduduk * 100,2);
                              $j_tot_pekerjaan      = $j_pekerjaan_l+$j_pekerjaan_p;
                              $j_pros_pekerjaan     = $pros_pekerjaan_l+$pros_pekerjaan_p;
  
                              $all_tot_l            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                              $all_pros_l           = round($all_tot_l / $penduduk * 100,2);
                              $all_tot_p            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                              $all_pros_p           = round($all_tot_p / $penduduk * 100,2);
                              $all_tot_lp           = $all_tot_l+$all_tot_p;
                              $all_pros_lp          = $all_pros_l+$all_pros_p;
  
                              echo"
                              <tr>
                                <td>$no.</td>
                                <td>$pekerjaan[pekerjaan]</td>
                                <td>$j_pekerjaan_l</td>
                                <td>$pros_pekerjaan_l %</td>
                                <td>$j_pekerjaan_p</td>
                                <td>$pros_pekerjaan_p %</td>
                                <td>$j_tot_pekerjaan</td>
                                <td>$j_pros_pekerjaan %</td>
                              </tr>";
                              $no++;
                  
                              }
                              echo"
                              <tr>
                                <td colspan='2'>Total Keseluruhan</td>
                                <td>$all_tot_l</td>
                                <td>$all_pros_l %</td>
                                <td>$all_tot_p</td>
                                <td>$all_pros_p %</td>
                                <td>$all_tot_lp</td>
                                <td>$all_pros_lp %</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='pendidikan'>                        
                        <p class='lead'>Data Kependudukan Menurut Pendidikan
                        <a href='modul/mod_laporan/statistik_pendidikan.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                                <th width=5px rowspan='2'>No.</th>
                                <th rowspan='2'>Pendidikan</th>
                                <th width='20%' colspan='2'>Laki-laki</th>
                                <th width='20%' colspan='2'>Perempuan</th>
                                <th width='20%' colspan='2'>Total</th>
                              </tr>
                              <tr>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Jumlah</th>
                                <th>%</th>
                              </tr>
                            </thead>
                          <tbody>";

                          $pendidikans= mysql_query("SELECT * FROM `pendidikan`");  
                          $no = 1;
                            while($pendidikan=mysql_fetch_array($pendidikans)){
                              $penduduk             = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                              $j_pendidikan_l       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_pendidikan='$pendidikan[id_pendidikan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                              $pros_pendidikan_l    = round($j_pendidikan_l / $penduduk * 100,2);
                              $j_pendidikan_p       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_pendidikan='$pendidikan[id_pendidikan]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                              $pros_pendidikan_p    = round($j_pendidikan_p / $penduduk * 100,2);
                              $j_tot_pendidikan     = $j_pendidikan_l+$j_pendidikan_p;
                              $j_pros_pendidikan    = $pros_pendidikan_l+$pros_pendidikan_p;
  
                              $all_tot_l            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                              $all_pros_l           = round($all_tot_l / $penduduk * 100,2);
                              $all_tot_p            = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                              $all_pros_p           = round($all_tot_p / $penduduk * 100,2);
                              $all_tot_lp           = $all_tot_l+$all_tot_p;
                              $all_pros_lp          = $all_pros_l+$all_pros_p;
  
                              echo"
                              <tr>
                                <td>$no.</td>
                                <td>$pendidikan[pendidikan]</td>
                                <td>$j_pendidikan_l</td>
                                <td>$pros_pendidikan_l %</td>
                                <td>$j_pendidikan_p</td>
                                <td>$pros_pendidikan_p %</td>
                                <td>$j_tot_pendidikan</td>
                                <td>$j_pros_pendidikan%</td>
                              </tr>";
                              $no++;
                  
                              }
                              echo"
                              <tr>
                                <td colspan='2'>Total Keseluruhan</td>
                                <td>$all_tot_l</td>
                                <td>$all_pros_l %</td>
                                <td>$all_tot_p</td>
                                <td>$all_pros_p %</td>
                                <td>$all_tot_lp</td>
                                <td>$all_pros_lp %</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='status_nikah'>                        
                        <p class='lead'>Data Kependudukan Menurut Status Nikah
                        <a href='modul/mod_laporan/statistik_status_nikah.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <th width=5px rowspan='2'>No.</th>
                              <th rowspan='2'>Status Nikah</th>
                              <th width='20%' colspan='2'>Laki-laki</th>
                              <th width='20%' colspan='2'>Perempuan</th>
                              <th width='20%' colspan='2'>Total</th>
                            </tr>
                            <tr>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                            </tr>
                          </thead>
                          <tbody>";
                          
                          $penduduk         = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));

                          $j_nikah_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.001' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_nikah_l     = round($j_nikah_l / $penduduk * 100,2);                          
                          $j_nikah_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.001' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_nikah_p     = round($j_nikah_p / $penduduk * 100,2);                          
                          $j_tot_nikah      = $j_nikah_l+$j_nikah_p;
                          $j_pros_nikah     = $pros_nikah_l+$pros_nikah_p;
                          
                          $j_single_l       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.002' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_single_l    = round($j_single_l / $penduduk * 100,2);
                          $j_single_p       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.002' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_single_p    = round($j_single_p / $penduduk * 100,2);                          
                          $j_tot_single     = $j_single_l+$j_single_p;
                          $j_pros_single    = $pros_single_l+$pros_single_p;

                          $j_chidup_l       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.003' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_chidup_l    = round($j_chidup_l / $penduduk * 100,2);                            
                          $j_chidup_p       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.003' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_chidup_p    = round($j_chidup_p / $jumlah * 100,2);                            
                          $j_tot_chidup     = $j_chidup_l+$j_chidup_p;
                          $j_pros_chidup    = $pros_chidup_l+$pros_chidup_p;

                          $j_cmati_l        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.004' and id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_cmati_l     = round($j_cmati_l / $penduduk * 100,2);                            
                          $j_cmati_p        = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statusnikah='STN.004' and id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $pros_cmati_p     = round($j_cmati_p / $penduduk * 100,2);                            
                          $j_tot_cmati      = $j_cmati_l+$j_cmati_p;
                          $j_pros_cmati     = $pros_cmati_l+$pros_cmati_p;
                          
                          $all_tot_l        = $j_nikah_l+$j_single_l+$j_chidup_l+$j_cmati_l;
                          $all_pros_l       = $pros_nikah_l+$pros_single_l+$pros_chidup_l+$pros_cmati_l;
                          $all_tot_p        = $j_nikah_p+$j_single_p+$j_chidup_p+$j_cmati_p;
                          $all_pros_p       = $pros_nikah_p+$pros_single_p+$pros_chidup_p+$pros_cmati_p;
                          $all_tot_lp       = $j_tot_nikah+$j_tot_single+$j_tot_chidup+$j_tot_cmati;
                          $all_pros_lp      = $j_pros_nikah+$j_pros_single+$j_pros_chidup+$j_pros_cmati;
								
                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Menikah</td>
                              <td>$j_nikah_l</td>
                              <td>$pros_nikah_l %</td>
                              <td>$j_nikah_p</td>
                              <td>$pros_nikah_p %</td>
                              <td>$j_tot_nikah</td>
                              <td>$j_pros_nikah %</td>
                            </tr>				  								
								
                            <tr>
                              <td>2.</td>
                              <td>Belum Menikah</td>
                              <td>$j_single_l</td>
                              <td>$pros_single_l %</td>
                              <td>$j_single_p</td>
                              <td>$pros_single_p %</td>
                              <td>$j_tot_single </td>
                              <td>$j_pros_single %</td>
                            </tr>
                            <tr>
                            
                             <td>3.</td>
                              <td>Cerai Hidup</td>
                              <td>$j_chidup_l</td>
                              <td>$pros_chidup_l %</td>
                              <td>$j_chidup_p</td>
                              <td>$pros_chidup_p %</td>
                              <td>$j_tot_chidup</td>
                              <td>$j_pros_chidup %</td>
                            </tr>
                            
                            <tr>
                              <td>4.</td>
                              <td>Cerai Mati</td>
                              <td>$j_cmati_l</td>
                              <td>$pros_cmati_l %</td>
                              <td>$j_cmati_p</td>
                              <td>$pros_cmati_p %</td>
                              <td>$j_tot_cmati</td>
                              <td>$j_pros_cmati %</td>
                            </tr>

                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td>$all_tot_l</td>
                              <td>$all_pros_l</td>
                              <td>$all_tot_p</td>
                              <td>$all_pros_p</td>
                              <td>$all_tot_lp</td>
                              <td>$all_pros_lp</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>                      
								
                        <div class='tab-pane' id='jk'>                        
                        <p class='lead'>Data Kependudukan Menurut Jenis Kelamin
                        <a href='modul/mod_laporan/statistik_jenis_kelamin.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <th width=5px rowspan='2'>No.</th>
                              <th rowspan='2'>Jenis Kelamin</th>
                            </tr>
                            <tr>
                              <th>Jumlah</th>
                              <th>%</th>
                            </tr>
                          </thead>
                          <tbody>";

                          $jumlah    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                          $rjumlah    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $prosentase= round($rjumlah / $jumlah * 100,2);
                          
                          $rjumlahp    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                          $prosentasep = round($rjumlahp / $jumlah * 100,2);
                          
                          $j_tot=$rjumlah+$rjumlahp;
                          $j_pros=$prosentase+$prosentasep;
                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Laki-laki</td>
                              <td>$rjumlah</td>
                              <td>$prosentase %</td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Perempuan</td>
                              <td>$rjumlahp</td>
                              <td>$prosentasep %</td>
                            </tr>
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td>$j_tot</td>
                              <td>$j_pros</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='stts'>                        
                        <p class='lead'>Data Kependudukan Menurut Status Tinggal
                        <a href='modul/mod_laporan/statistik_status_tinggal.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <th width=5px rowspan='2'>No.</th>
                              <th rowspan='2'>Status Tinggal</th>
                              <th width='20%' colspan='2'>Laki-laki</th>
                              <th width='20%' colspan='2'>Perempuan</th>
                              <th width='20%' colspan='2'>Total</th>
                            </tr>
                            <tr>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                            </tr>
                          </thead>
                          <tbody>";

                          $jumlah    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                          $rjumlahltetap    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.001' and id_jk='JK.001' AND id_statuspenduduk='STP.001' and hapus='N'"));
                          $rjumlahlkontrak    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.002' and id_jk='JK.001' AND id_statuspenduduk='STP.001' and hapus='N'"));
                                                    
                          $rjumlahptetap    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.001' and id_jk='JK.002' AND id_statuspenduduk='STP.001' and hapus='N'"));
                          $rjumlahpkontrak    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statustinggal='STT.002' and id_jk='JK.002' AND id_statuspenduduk='STP.001' and hapus='N'"));
                          
                          $prosentaseltetap = round($rjumlahltetap / $jumlah * 100,2);
                          $prosentaselkontrak = round($rjumlahlkontrak / $jumlah * 100,2);

                          $prosentaseptetap = round($rjumlahptetap / $jumlah * 100,2);
                          $prosentasepkontrak = round($rjumlahpkontrak / $jumlah * 100,2);
                          
                          $j_tot_tetap=$rjumlahltetap + $rjumlahptetap;
                          $j_pros_tetap=$prosentaseltetap+$prosentaseptetap;
                          $j_tot_kontrak=$rjumlahlkontrak+$rjumlahpkontrak;
                          $j_pros_kontrak=$prosentaselkontrak+$prosentasepkontrak;

                          $seluruh_l=$rjumlahltetap+$rjumlahlkontrak;
                          $seluruh_prosl=$prosentaseltetap+$prosentaselkontrak;
                          $seluruh_p=$rjumlahptetap+$rjumlahpkontrak;
                          $seluruh_prosp=$prosentaseptetap+$prosentasepkontrak;
                          $seluruh_total=$j_tot_tetap+$j_tot_kontrak;
                          $seluruh_pros=$j_pros_tetap+$j_pros_kontrak;

                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Tetap</td>
                              <td>$rjumlahltetap</td>
                              <td>$prosentaseltetap %</td>
                              <td>$rjumlahptetap</td>
                              <td>$prosentaseptetap %</td>
                              <td>$j_tot_tetap</td>
                              <td>$j_pros_tetap %</td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Kontrak</td>
                              <td>$rjumlahlkontrak</td>
                              <td>$prosentaselkontrak %</td>
                              <td>$rjumlahpkontrak</td>
                              <td>$prosentasepkontrak %</td>
                              <td>$j_tot_kontrak</td>
                              <td>$j_pros_kontrak %</td>
                            </tr>
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td>$seluruh_l</td>
                              <td>$seluruh_prosl</td>
                              <td>$seluruh_p</td>
                              <td>$seluruh_prosp</td>
                              <td>$seluruh_total</td>
                              <td>$seluruh_pros</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='rt'>                        
                        <p class='lead'>Data Kependudukan Menurut RT / RW
                        <a href='modul/mod_laporan/statistik_rt.php' target='_blank'><button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button></a>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <th width=5px rowspan='2'>No.</th>
                              <th rowspan='2'>RT / RW</th>
                              <th width='20%' colspan='2'>Laki-laki</th>
                              <th width='20%' colspan='2'>Perempuan</th>
                              <th width='20%' colspan='2'>Total</th>
                            </tr>
                            <tr>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                              <th>Jumlah</th>
                              <th>%</th>
                            </tr>
                          </thead>
                          <tbody>";

                          $rts= mysql_query("SELECT * FROM `rt`
                                            INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`");  
                          $no = 1;
                            while($rt=mysql_fetch_array($rts)){
                            
                            $penduduk       = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
                            $j_rt_l         = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_rt='$rt[id_rt]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                            $pros_rt_l      = round($j_rt_l / $penduduk * 100,2);
                            $j_rt_p         = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_rt='$rt[id_rt]' and id_statuspenduduk='STP.001' and hapus='N'")); 
                            $pros_rt_p      = round($j_rt_p / $penduduk * 100,2);
                            $j_tot_rt       = $j_rt_l+$j_rt_p;
                            $j_pros_rt      = $pros_rt_l+$pros_rt_p;

                            $all_tot_l      = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
                            $all_pros_l     = round($all_tot_l / $penduduk * 100,2);
                            $all_tot_p      = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
                            $all_pros_p     = round($all_tot_p / $penduduk * 100,2);
                            $all_tot_lp     = $all_tot_l+$all_tot_p;
                            $all_pros_lp    = $all_pros_l+$all_pros_p;

                            echo"
                            <tr>
                              <td>$no.</td>
                              <td>$rt[rt] / $rt[rw]</td>
                              <td>$j_rt_l</td>
                              <td>$pros_rt_l %</td>
								              <td>$j_rt_p</td>
                              <td>$pros_rt_p %</td>
                              <td>$j_tot_rt</td>
                              <td>$j_pros_rt%</td>
                            </tr>";
                            $no++;
                
                            }
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td>$all_tot_l</td>
                              <td>$all_pros_l %</td>
                              <td>$all_tot_p</td>
                              <td>$all_pros_p %</td>
                              <td>$all_tot_lp</td>
                              <td>$all_pros_lp %</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      </div>
                    </div>

                    <div class='clearfix'></div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";

?>