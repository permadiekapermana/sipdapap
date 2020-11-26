<div role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dashboard</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <?php
                    
          $penduduk    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_statuspenduduk='STP.001' and hapus='N'"));
          $rjumlahl    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.001' and id_statuspenduduk='STP.001' and hapus='N'"));
          $rjumlahp    = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE id_jk='JK.002' and id_statuspenduduk='STP.001' and hapus='N'"));
          $j_tot=$rjumlahl+$rjumlahp;
          $regis       = mysql_num_rows(mysql_query("SELECT * FROM `users`
                                                    INNER JOIN `level` ON `level`.`id_level` = `users`.`id_level`
                                                    WHERE `level`.`level` = 'Penduduk' AND `users`.`blokir` = 'N'"));                    
          $penduduklebih17    = mysql_num_rows(mysql_query(
            "SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
            AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) >= 17 and id_statuspenduduk='STP.001' and hapus='N'"));
            $pendudukkurang17    = mysql_num_rows(mysql_query(
              "SELECT tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir))
              AS Umur FROM penduduk WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) < 17 and id_statuspenduduk='STP.001' and hapus='N'"));

          

          echo"
            <div class='row tile_count'>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-users'></i> Penduduk Registrasi</span>
                <div class='count'>$regis</div>
              </div>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-user'></i> Total Laki Laki</span>
                <div class='count'>$rjumlahl</div>
              </div>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-user'></i> Total Perempuan</span>
                <div class='count'>$rjumlahp</div>
              </div>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-users'></i> Penduduk >= 17 Thn</span>
                <div class='count'>$penduduklebih17</div>
              </div>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-users'></i> Penduduk < 17 Tahun</span>
                <div class='count'>$pendudukkurang17</div>
              </div>
              <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
                <span class='count_top'><i class='fa fa-users'></i> Total Penduduk</span>
                <div class='count'>$j_tot</div>
              </div>
            </div>
            ";
            ?>           
            <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <div class="text-center">
                        <img style="width: 80%; display: block;" class="img-responsive center-block" src="images/desa.png" alt="image" />
                      </div>
                    </div>
                  </div>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>