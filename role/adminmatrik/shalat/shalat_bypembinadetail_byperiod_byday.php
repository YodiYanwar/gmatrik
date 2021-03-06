<?php 
  include 'functions.php';
  $idPembina = $_GET['idP'];
  $idPeriod = $_GET['p'];
  $tgl = $_GET['t'];
 ?>

	<div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            <a href="?page=shalatbpembinabp&idP=<?php echo $idPembina; ?>&id=<?php echo $idPeriod; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            GRAFIK JUMLAH PRESENSI SHALAT MAHASISWA BINAAN &nbsp;
                            <div class="btn-group">
                                  <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php 
                                      $namaPembina = namaPembinaById($idPembina);
                                      foreach($namaPembina as $row){
                                        echo $row['nama'].' '.$row['gelar'];
                                      } 
                                    ?>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <?php
                                      $dataPembina = tampilPembina();
                                      foreach($dataPembina as $row){
                                        ?>
                                          <li><?php echo '<a href="?page=shalatbpembinabpday&idP='.$row['id_pembina'].'&p='.$idPeriod.'&t='.$tgl.'">'.$row['nama'].' '.$row['gelar'].'</a>'; ?></li>
                                        <?php
                                     }
                                    ?>
                                  </ul>
                                </div>
                                <?php 
                                                  if($tgl != '20180302'){
                                                    $percent = shalatByPembinaByDayPercent($idPembina, ($tgl-1), $tgl);
                                                    foreach ($percent as $row){
                                                      if ($row['a'] > $row['b']) {
                                                        echo '<span class="label bg-red">
                                                        <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                                        '.$row['percent'].'% dibandingkan hari sebelumnya</span>';
                                                      } else
                                                      if ($row['a'] < $row['b']) {
                                                        echo '<span class="label bg-green">
                                                        <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                                        +'.$row['percent'].'% dibandingkan hari sebelumnya</span>';
                                                      } else
                                                      if ($row['percent'] == 0) {
                                                        echo '<span class="label bg-cyan">
                                                        <i class="material-icons vertical-align-middle padding-bottom-3">trending_flat</i>
                                                        sama dibandingkan hari sebelumnya</span>';
                                                      }
                                                    }
                                                  }
                                                ?>
                            <small> Tanggal : &nbsp;
                              <div class="btn-group">
                                                    <button type="button" class="btn bg-orange waves-effect dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php 
                                                          echo date('l - d M Y', strtotime($tgl));
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $dataTgl = tampilListTglByPeriod($idPeriod);
                                                          foreach($dataTgl as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatbpembinabpday&idP='.$idPembina.'&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'">'.date('D - d M Y', strtotime($row['tanggal'])).'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                              </div>
                            </small>
                            <?php 
                                  /*$dataTglJPulang = tampilTglJPulang();
                                  foreach ($dataTglJPulang as $row) {
                                    if ($row['tanggal'] == date('Y-m-d', strtotime($tgl))) {
                                      echo '<span class="label bg-purple label-lg">JADWAL PULANG</span>';
                                    }
                                  }*/
                                 ?>
                          </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="55"></canvas>
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
                                          labels: ["Shubuh","Dzuhur","Ashar","Maghrib","Isya"],
                                          datasets: [{
                                              label: "Jumlah Shalat",
                                              data: [<?php
                                                      $dataNilai = shalatByPembinaByDayGraph($idPembina, $tgl);
                                                        foreach ($dataNilai as $row){
                                                          echo '"'.$row['jml'].'",';
                                                        }
                                                    ?>],
                                              backgroundColor: 'rgba(0, 188, 212, 0.8)'
                                          }, {
                                              label: "Jumlah Shalat Hari Sebelumnya",
                                              data: [<?php
                                                      $dataNilai = shalatByPembinaByDayGraph($idPembina, $tgl-1);
                                                        foreach ($dataNilai as $row){
                                                          echo '"'.$row['jml'].'",';
                                                        }
                                                    ?>],
                                              backgroundColor: 'rgba(233, 30, 99, 0.8)'
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
                          <h2>
                            <a href="?page=shalatbpembinabp&idP=<?php echo $idPembina; ?>&id=<?php echo $idPeriod; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            DATA PRESENSI SHALAT MAHASISWA BINAAN &nbsp;
                            <span class="label bg-cyan">
                                    <?php 
                                      $namaPembina = namaPembinaById($idPembina);
                                      foreach($namaPembina as $row){
                                        echo $row['nama'].' '.$row['gelar'];
                                      } 
                                    ?> 
                              </span>
                            <small> Jumlah Binaan : &nbsp; 
                                <span class="label bg-cyan label-lg">
                                  <?php 
                                    $jmlb = tampilJmlBinaan($idPembina);
                                      foreach($jmlb as $row){
                                        echo $row['jmlb'];
                                      } 
                                  ?>
                                </span>
                            </small>
                            <?php 
                                  /*$dataTglJPulang = tampilTglJPulang();
                                  foreach ($dataTglJPulang as $row) {
                                    if ($row['tanggal'] == date('Y-m-d', strtotime($tgl))) {
                                      echo '<span class="label bg-purple label-lg">JADWAL PULANG</span>';
                                    }
                                  }*/
                                 ?>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaByPeriodByDay" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Mahasiswa Binaan</th>
                                  <th>Shubuh</th>
                                  <th>Dzuhur</th>
                                  <th>Ashar</th>
                                  <th>Maghrib</th>
                                  <th>Isya</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPembinaByPeriodByDay($idPembina, $tgl);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php if($row['shubuh'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['shubuh'].'</span>';} ?></td>
                                  <td><?php if($row['dzuhur'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['dzuhur'].'</span>';} ?></td>
                                  <td><?php if($row['ashar'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['ashar'].'</span>';} ?></td>
                                  <td><?php if($row['maghrib'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['maghrib'].'</span>';} ?></td>
                                  <td><?php if($row['isya'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['isya'].'</span>';} ?></td>
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
      var t = $('#tableShalatByPembinaByPeriodByDay').DataTable({});
    } );
    </script> 