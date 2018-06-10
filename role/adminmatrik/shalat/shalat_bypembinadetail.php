<?php 
  include 'functions.php';
  $idPembina = $_GET['id'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatbpembina" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;GRAFIK NILAI RATA-RATA PRESENSI MAHASISWA BERDASARKAN PEMBINA
                              <small>
                                <?php $namaPembina = namaPembinaById($idPembina);
                                  foreach($namaPembina as $row){
                                    echo $row['nama'].' '.$row['gelar'];
                                  } 
                                ?>
                              </small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="70"></canvas>
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
                                                    $dataPeriode = tampilPeriodeShalat();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Rata-rata Nilai Shalat",
                                              data: [<?php
                                                    $dataNilai = shalatByPembinaId($idPembina);
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
                                                  label: "Rata-rata Jumlah Maksimal Shalat",
                                                  data: [<?php
                                                    $dataTarget = shalatByPembinaId($idPembina);
                                                    foreach ($dataTarget as $row){
                                                     echo '"'.$row['target'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
                                              }, {
                                                  label: "Rata-rata Jumlah Shalat",
                                                  data: [<?php
                                                    $dataJmlSlt = shalatByPembinaId($idPembina);
                                                    foreach ($dataJmlSlt as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(173, 66, 244, 0.75)',
                                                  pointBorderColor: 'rgba(173, 66, 244, 0)',
                                                  pointBackgroundColor: 'rgba(173, 66, 244, 0.9)',
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
                          <h2>DATA NILAI RATA-RATA PRESENSI MAHASISWA BERDASARKAN PEMBINA
                            <small>
                                <?php $namaPembina = namaPembinaById($idPembina);
                                  foreach($namaPembina as $row){
                                    echo $row['nama'].' '.$row['gelar'];
                                  } 
                                ?>
                              </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Jumlah Maks</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPembina = shalatByPembinaId($idPembina);
                                  foreach($dataPembina as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatpdetail&id='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['target']; ?></td>
                                  <td><?php echo $row['jmlrt']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
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
      var t = $('#tableShalatByPembinaDetail').DataTable({});
    } );
    </script> 