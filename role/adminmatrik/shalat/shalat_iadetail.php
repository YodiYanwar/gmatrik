<?php 
  include 'functions.php';
  $jKelamin = $_GET['j'];
 ?>

  <div class="row clearfix">
    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                          <a href="?page=shalatia" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                          GRAFIK NILAI PRESENSI MAHASISWA <?php if($jKelamin == 'Akhwat'){echo 'AKHWAT';}else if($jKelamin == 'Ikhwan'){echo 'IKHWAN';} ?></h2>
                            <small>
                              Pilih Berdasarkan :
                              <div class="btn-group">
                                                    <button type="button" class="btn <?php if($jKelamin == 'Akhwat'){echo 'bg-pink';}else if($jKelamin == 'Ikhwan'){echo 'bg-cyan';} ?> waves-effect dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php 
                                                          if($jKelamin == 'Akhwat'){echo 'AKHWAT';}else if($jKelamin == 'Ikhwan'){echo 'IKHWAN';}
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <?php 
                                                        if ($jKelamin == 'Ikhwan') {
                                                          echo '<li><a href="?page=shalatiadetail&j=Ikhwan">IKHWAN</a></li>
                                                                <li><a href="?page=shalatiadetail&j=Akhwat">AKHWAT</a></li>';
                                                        } else
                                                        if ($jKelamin == 'Akhwat') {
                                                          echo '<li><a href="?page=shalatiadetail&j=Akhwat">AKHWAT</a></li>
                                                                <li><a href="?page=shalatiadetail&j=Ikhwan">IKHWAN</a></li>';
                                                        }
                                                       ?>
                                                    </ul>
                              </div>
                            </small>
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
                                                    $dataNilai = shalatIAByDetail($jKelamin);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai'].'",';
                                                    }
                                                  ?>],
                                              <?php 
                                                if($jKelamin == 'Ikhwan'){
                                                  echo "borderColor: 'rgba(0, 188, 212, 0.75)',
                                                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                                                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',";
                                                } else
                                                if($jKelamin == 'Akhwat'){
                                                  echo "borderColor: 'rgba(233, 30, 99, 0.75)',
                                                        backgroundColor: 'rgba(200, 30, 99, 0.3)',
                                                        pointBorderColor: 'rgba(200, 30, 99, 0)',
                                                        pointBackgroundColor: 'rgba(200, 30, 99, 0.9)',";
                                                }
                                               ?>
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
                          <h2>GRAFIK NILAI PRESENSI MAHASISWA <?php if($jKelamin == 'Akhwat'){echo 'AKHWAT';}else if($jKelamin == 'Ikhwan'){echo 'IKHWAN';} ?></h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Total</th>
                                  <th>Dispensasi</th>
                                  <th>Jml Udzur</th>
                                  <th>Maks Jml Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $data = shalatIAByDetail($jKelamin);
                                  foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatiabyperiod&j='.$jKelamin.'&p='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jplg']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target_akhir']; ?></td>
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