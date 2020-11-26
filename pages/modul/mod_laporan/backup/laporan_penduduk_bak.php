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
                          <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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
                              echo"
                              <tr>
                                <td>$no.</td>
                                <td>$agama[agama]</td>
                                <td></td>
                                <td>%</td>
                                <td></td>
                                <td>%</td>
                                <td></td>
                                <td>%</td>
                              </tr>";
                              $no++;
                  
                              }
                              echo"
                              <tr>
                                <td colspan='2'>Total Keseluruhan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        
                        <div class='tab-pane' id='pekerjaan'>                        
                        <p class='lead'>Data Kependudukan Menurut Pekerjaan
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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
                            echo"
                            <tr>
                              <td>$no.</td>
                              <td>$pekerjaan[pekerjaan]</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";
                            $no++;
                
                            }
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='pendidikan'>                        
                        <p class='lead'>Data Kependudukan Menurut Pendidikan
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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
                            echo"
                            <tr>
                              <td>$no.</td>
                              <td>$pendidikan[pendidikan]</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";
                            $no++;
                
                            }
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='status_nikah'>                        
                        <p class='lead'>Data Kependudukan Menurut Status Nikah
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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

                          $status_nikahs = mysql_query("SELECT * FROM `penduduk`");  
                          $status_nikah = mysql_fetch_array($status_nikahs);
                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Menikah</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Belum Menikah</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td>Cerai Hidup</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td>Cerai Mati</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";

                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='jk'>                        
                        <p class='lead'>Data Kependudukan Menurut Jenis Kelamin
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
                        <table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <th width=5px rowspan='2'>No.</th>
                              <th rowspan='2'>Jenis Kelamin</th>
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

                          $jks= mysql_query("SELECT * FROM `penduduk`");
                          $jk=mysql_fetch_array($jks);
                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Laki-laki</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Perempuan</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";
                
                            
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='stts'>                        
                        <p class='lead'>Data Kependudukan Menurut Status Tinggal
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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

                          $statuss= mysql_query("SELECT * FROM `penduduk`");
                          $status=mysql_fetch_array($statuss);
                            echo"
                            <tr>
                              <td>1.</td>
                              <td>Tetap</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Kontrak</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";
                
                            
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                        <div class='tab-pane' id='rt'>                        
                        <p class='lead'>Data Kependudukan Menurut RT / RW
                        <button class='btn btn-primary' type='button'><i class='fa fa-print'></i> Cetak</button>
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
                            echo"
                            <tr>
                              <td>$no.</td>
                              <td>$rt[rt] / $rt[rw]</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                              <td></td>
                              <td>%</td>
                            </tr>";
                            $no++;
                
                            }
                            echo"
                            <tr>
                              <td colspan='2'>Total Keseluruhan</td>
                              <td></td>
                              <td></td>
                              <td></td>
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
                </div>
              </div>
            </div>
          </div>
        </div>";

?>