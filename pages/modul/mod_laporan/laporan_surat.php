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
				  <form class='form-horizontal' action='modul/mod_laporan/lap_bulananperiode.php' target='_blank' method='post'>
                  <p class='lead'>Data Pengajuan Surat Penduduk
                                  
                    <fieldset>
                      <div class='control-group'>
                        <div class='controls'>
                          <div class='input-prepend input-group'>
                            <span class='add-on input-group-addon'><i class='glyphicon glyphicon-calendar fa fa-calendar'></i></span>
                            <input type='date' style='width: 200px' name='dari'  class='form-control' title='Dari tanggal' />
                            <input type='date' style='width: 200px' name='sampai'  class='form-control' title='Sampai tanggal' />";
                            if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Kepala Desa'){
                              echo"
                            <select name='jenissurat' class='form-control col-md-7 col-xs-12'>
                            <option value='' selected>-- Pilih Jenis Surat --</option>
                            <option value='semua'>Semua Surat</option>";
                            
                            $tampil=mysql_query("SELECT * FROM jenis_surat ORDER BY kode_surat");
                            }
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[kode_surat]>$r[nama_surat]</option>";
                            }
                            echo
                          "</select>";
                          if ($_SESSION['leveluser']=='Ketua RT'){
                            echo"
                          <select name='jenissurat' class='form-control col-md-7 col-xs-12'>
                          <option value='RT' selected>Surat RT</option>";
                          }
                          if ($_SESSION['leveluser']=='Ketua RW'){
                            echo"
                          <select name='jenissurat' class='form-control col-md-7 col-xs-12'>
                          <option value='RT' selected>Surat RT</option>";
                          }
                          echo
                        "</select>
                            <button class='btn btn-primary' type='submit'><i class='fa fa-print'></i> Cetak</button>
                          </div>
                        </div>
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
                        <th width=4%>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>";
                    if ($_SESSION['leveluser']=='Admin' OR $_SESSION['leveluser']=='Operator' OR $_SESSION['leveluser']=='Kepala Desa'){
                    $surats= mysql_query("SELECT * FROM `surat`
                                        INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                        INNER JOIN `jenis_surat` ON `surat`.`kode_surat` = `jenis_surat`.`kode_surat`
                                        where id_statussurat='SS.003' and id_statuspenduduk='STP.001' and hapus='N' ORDER BY id_surat DESC");
                    }
                    elseif ($_SESSION['leveluser']=='Ketua RT'){
                      $surats= mysql_query("SELECT * FROM `surat`
                                          INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                          INNER JOIN `jenissurat` ON `surat`.`kode_surat` = `jenissurat`.`kode_surat`
                                          where id_statussurat='SS.003' and id_statuspenduduk='STP.001' and hapus='N' and surat.kode_surat='RT' and id_rt='$_SESSION[id_rt]' ORDER BY id_surat DESC");
                      }
                      elseif ($_SESSION['leveluser']=='Ketua RW'){
                        $surats= mysql_query("SELECT * FROM `surat`
                                            INNER JOIN `jenissurat` ON `surat`.`kode_surat` = `jenissurat`.`kode_surat`
                                            INNER JOIN `penduduk` ON `surat`.`id_penduduk` = `penduduk`.`id_penduduk`
                                            INNER JOIN `rt` ON `penduduk`.`id_rt` = `rt`.`id_rt`
                                            INNER JOIN `rw` ON `rt`.`id_rw` = `rw`.`id_rw`
                                            where id_statussurat='SS.003' and id_statuspenduduk='STP.001' and hapus='N' and surat.kode_surat='RT' and rw.id_rw='$_SESSION[id_rw]' ORDER BY id_surat DESC");
                        }
                    $no = 1;
                    while($surat=mysql_fetch_array($surats)){
                    echo"
                      <tr>
                        <td>$no.</td>
                        <td>$surat[nama_surat]</td>
                        <td>$surat[no_akhirsurat]/$surat[kode_surat]/$bln_sekarang/$thn_sekarang</td>
                        <td>$surat[nama]</td>
                        <td>$surat[tgl_surat]</td>
                        <td>";
                        if ($surat['kode_surat']=='RT'){
                        echo"
                        <a href='modul/mod_surat/surat_pengantar_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                        ";
                        }
                        elseif ($surat['kode_surat']=='045.2'){
                        echo"
                        <a href='modul/mod_surat/skck_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                        ";
                        }
                        elseif ($surat['kode_surat']=='474.6'){
                          echo"
                          <a href='modul/mod_surat/surat_penghasilan_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                          ";
                          }
                          elseif ($surat['kode_surat']=='474.5'){
                            echo"
                            <a href='modul/mod_surat/sktm_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                            ";
                            }
                            elseif ($surat['kode_surat']=='474.4'){
                              echo"
                              <a href='modul/mod_surat/sku_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                              ";
                              }
                              elseif ($surat['kode_surat']=='474.3'){
                                echo"
                                <a href='modul/mod_surat/surat_pindah_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                                ";
                                }
                                elseif ($surat['kode_surat']=='474.2'){
                                  echo"
                                  <a href='modul/mod_surat/surat_kematian_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                                  ";
                                  }
                                  elseif ($surat['kode_surat']=='474.1'){
                                    echo"
                                    <a href='modul/mod_surat/surat_kelahiran_detail.php?id_surat=$surat[id_surat]' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-info'></i> Detail</a>
                                    ";
                                    }
                        else{
                        echo"<a href='' class='btn btn-danger btn-xs'><i class='fa fa-info'></i> Error</a>";
                        }
                        echo"
                        </td>
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