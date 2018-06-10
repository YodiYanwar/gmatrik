<?php 
  include 'functions.php';
  $idPeriod = $_GET['id'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalat" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI RATA-RATA PRESENSI SEMUA MAHASISWA
                              <small> Periode
                                <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                  foreach($dataPresensi as $row){
                                    echo date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                  } 
                                ?>
                              </small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="70"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
                          });

                          function getChartJs(type) {
                              var config = null;

                              if (type === 'bar') {
                                  config = {
                                      type: 'bar',
                                      data: {
                                          labels: [<?php
                                                    $dataPeriode = shalatByPeriodID($idPeriod);
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.date('d M Y', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Harian Rata-rata",
                                              data: [<?php
                                                    $dataNilai = shalatByPeriodID($idPeriod);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai_harian'].'",';
                                                    }
                                                  ?>],
                                              backgroundColor: 'rgba(0, 188, 212, 0.8)',
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
                          <h2>DATA NILAI RATA-RATA PRESENSI MAHASISWA
                            <small> Periode
                              <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                foreach($dataPresensi as $row){
                                  echo date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                } 
                              ?>
                            </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisarDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Tanggal</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPeriodID($idPeriod);
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['nilai_harian']; ?></td>
                                  
                                </tr>
                                <?php } ?>
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
      var t = $('#tableShalatIkhtisarDetail').DataTable({});
    } );
    </script> 