<?php 
  include 'functions.php';
  $wkt = $_GET['w'];
  $idPeriod = $_GET['p'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatwdetail&p=<?php echo $idPeriod; ?>&w=<?php echo $wkt; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI PRESENSI SHALAT MAHASISWA &nbsp;
                                          <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo ucfirst($wkt); ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><?php echo '<a href="?page=shalatwperiod&p='.$idPeriod.'&w=shubuh">Shubuh</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwperiod&p='.$idPeriod.'&w=dzuhur">Dzuhur</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwperiod&p='.$idPeriod.'&w=ashar">Ashar</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwperiod&p='.$idPeriod.'&w=maghrib">Maghrib</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwperiod&p='.$idPeriod.'&w=isya">Isya</a>'; ?></li>
                                                    </ul>
                                          </div>       
                                  <?php 
                                    if($idPeriod != 1){
                                      $percent = shalatWktByPeriodPercent(($idPeriod-1), $idPeriod, $wkt);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo 
                                          '<span class="label bg-red">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan periode sebelumnya
                                          </span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo 
                                          '<span class="label bg-green">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                             +'.$row['percent'].'% dibandingkan periode sebelumnya
                                          </span>';
                                        } 
                                      }
                                    }
                                  ?>
                                
                              <small> Periode : &nbsp;
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-orange waves-effect dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                                          foreach($dataPresensi as $row){
                                                            echo $row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                                          } 
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $dataPeriode = tampilPeriodeShalat();
                                                          foreach($dataPeriode as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatwperiod&p='.$row['id_periode'].'&w='.$wkt.'">'.$row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                                                </div>
                              </small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="80"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
                          });

                          function getChartJs(type) {
                              var config = null;

                              if (type === 'line') {
                                  config = {
                                      type: 'line',
                                      data: {
                                          labels: [<?php
                                                    $dataPeriode = shalatWktByPeriod($idPeriod, $wkt);
                                                    foreach ($dataPeriode as $row){
                                                      echo '"'.date('D - d M Y', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata",
                                              data: [<?php
                                                    $dataNilai = shalatWktByPeriod($idPeriod, $wkt);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Hari Yang Sama Pada Periode Sebelumnya",
                                                  data: [<?php

                                                    if($idPeriod != 1){
                                                      $dataTarget = shalatWktByPeriod($idPeriod-1, $wkt);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                    } else
                                                    if($idPeriod == 1){
                                                      $dataTarget = shalatWktByPeriod($idPeriod, $wkt);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  backgroundColor: 'rgba(200, 30, 99, 0.3)',
                                                  pointBorderColor: 'rgba(200, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(200, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
                                              }]
                                      },
                                      options: {
                                          responsive: true,
                                          legend: false
                                      }
                                  }
                              }
                              return config;
                          }                          
                        </script>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA NILAI PRESENSI SHALAT MAHASISWA <br><small>
                              Waktu Shalat : 
                              <span class="label bg-cyan">
                                <?php echo ucfirst($wkt); ?>
                              </span>
                              </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByWktByPeriod" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari</th>
                                  <th>Tanggal</th>
                                  <th>Total</th>
                                  <th>Dispensasi</th>
                                  <th>Jml Udzur</th>
                                  <th>Maks Jml Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatWktByPeriod($idPeriod, $wkt);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'&w='.$wkt.'">'.date('l', strtotime($row['tanggal'])).'</a>'; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['total_jplg']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target2']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                              </tbody> 
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->

<!-- Daterange picker import data presensi shalat mahasiswa -->
    <script>
    $(document).ready(function() {
      var t = $('#tableShalatByWktByPeriod').DataTable({});
    } );
    </script> 