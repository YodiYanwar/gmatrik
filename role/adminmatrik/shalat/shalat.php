<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK PRESENSI NILAI RATA-RATA SEMUA MAHASISWA</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                                                    $dataPeriode = shalatIkhtisar();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata",
                                              data: [<?php
                                                    $dataNilaiRata = shalatIkhtisar();
                                                    foreach ($dataNilaiRata as $row){
                                                     echo '"'.$row['nilai'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Target Jumlah Shalat",
                                                  data: [<?php
                                                    $dataNilaiRata = shalatIkhtisar();
                                                    foreach ($dataNilaiRata as $row){
                                                     echo '"'.$row['target'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
                                              }, {
                                                  label: "Jumlah Shalat",
                                                  data: [<?php
                                                    $dataNilaiRata = shalatIkhtisar();
                                                    foreach ($dataNilaiRata as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],

                                                  borderColor: 'rgba(154,10,222,0.75)',
                                                  pointBorderColor: 'rgba(154,10,222, 0)',
                                                  pointBackgroundColor: 'rgba(154,10,222, 0.9)',
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
                          <h2>PRESENSI SHALAT WAJIB MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect " data-toggle="modal" data-target="#importShalat" title="Import Database Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA PRESENSI</span></button>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisar" class="table table-hover">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Target Jml Waktu Shalat</th>
                                  <th>Rata-rata Jml Waktu Shalat Per-Mhs</th>
                                  <th>Nilai Rata-rata Per-Mhs</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatIkhtisar();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])); ?></td>
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

            <!-- Small Size -->
<!--             <div class="modal fade" id="ModalHapusMahasiswa" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Mahasiswa ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div> -->

           <div class="modal fade" id="importShalat" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">IMPORT DATA PRESENSI MAHASISWA</h4>
                        </div>
                        <div class="modal-body">
                        	<div class="input-group">
                        		<label>Periode :</label>
														<div class="form-line">
															<input type="text" name="daterangeShalat" class="form-control date" id="reportrange" required>
														</div>
													</div>
													<div class="input-group spinner" data-trigger="spinner">
													<label>Jumlah Waktu Shalat :</label>
													<div class="form-line">
													<input type="text" class="form-control" name="jmlWktShalat" value="35" data-rule="quantity" required>
													</div>
													<span class="input-group-addon">
													<a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
													<a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
													</span>
													</div>                          
													<div class="bootstrap-timepicker">
			                      <div class="row">
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Shubuh :</label>
			                              <input type="text" name="shubuhFrom" id="shubuh_dari" class="timepicker form-control" placeholder="Dari" value="04:00">
			                              <input type="text" name="shubuhTo" id="shubuh_sampai" class="timepicker form-control" placeholder="Sampai" value="06:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Dzuhur :</label>
			                              <input type="text" name="dzuhurFrom" id="dzuhur_dari" class="timepicker form-control" placeholder="Dari" value="12:00">
			                              <input type="text" name="dzuhurTo" id="dzuhur_sampai" class="timepicker form-control" placeholder="Sampai" value="13:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Ashar :</label>
			                              <input type="text" name="asharFrom" id="ashar_dari" class="timepicker form-control" placeholder="Dari" value="15:00">
			                              <input type="text" name="asharTo" id="ashar_sampai" class="timepicker form-control" placeholder="Sampai" value="16:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Maghrib :</label>
			                              <input type="text" name="maghribFrom" id="maghrib_dari" class="timepicker form-control" placeholder="Dari" value="18:00">
			                              <input type="text" name="maghribTo" id="maghrib_sampai" class="timepicker form-control" placeholder="Sampai" value="18:35">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Isya :</label>
			                              <input type="text" name="isyaFrom" id="isya_dari" class="timepicker form-control" placeholder="Dari" value="19:00">
			                              <input type="text" name="isyaTo" id="isya_sampai" class="timepicker form-control" placeholder="Sampai" value="21:00">
			                          </div>
			                        </div>
			                      </div>
			                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="importPresensiShalat">IMPORT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 

    <?php 

      if(isset($_POST['importPresensiShalat'])) {
        $tgl = explode('-', $_POST['daterangeShalat']);
        $from = $tgl[0];
        $to = $tgl[1];

        $jmlWktShalat = $_POST['jmlWktShalat'];

        $datefrom = date('Y-m-d', strtotime($from));
        $dateto = date('Y-m-d',strtotime($to));

        $shubuhFrom = $_POST['shubuhFrom'];
        $shubuhTo = $_POST['shubuhTo'];

        $dzuhurFrom = $_POST['dzuhurFrom'];
        $dzuhurTo = $_POST['dzuhurTo'];

        $asharFrom = $_POST['asharFrom'];
        $asharTo = $_POST['asharTo'];

        $maghribFrom = $_POST['maghribFrom'];
        $maghribTo = $_POST['maghribTo'];

        $isyaFrom = $_POST['isyaFrom'];
        $isyaTo = $_POST['isyaTo'];

        updateTimeSetup($from, $to, $shubuhFrom, $shubuhTo, $dzuhurFrom, $dzuhurTo, $asharFrom, $asharTo, $maghribFrom, $maghribTo, $isyaFrom, $isyaTo);
        importShalat('17', $datefrom, $dateto, $jmlWktShalat);

        echo "<script>document.location='?page=shalat'</script>";
      }
    ?>

    </section>
    <!-- /.content -->

<!-- Daterange picker import data presensi shalat mahasiswa -->
    <script>
    $(document).ready(function() {
      var t = $('#tableShalatIkhtisar').DataTable({});
    } );
    </script>  

<script type="text/javascript">
var startDate;
var endDate;

    $('#reportrange').daterangepicker(
       {
          startDate: moment().subtract('days', 6),
          endDate: moment(),
          //minDate: '01/01/2012',
          //maxDate: '12/31/2014',
          dateLimit: { days: 60 },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
             'Hari ini': [moment(), moment()],
             'Kemarin': [moment().subtract('days', 1), moment().subtract('days', 1)],
             '7 Hari Terakhir': [moment().subtract('days', 6), moment()],
             '30 Hari Terakhir': [moment().subtract('days', 29), moment()],
             'Bulan Ini': [moment().startOf('month'), moment().endOf('month')]
             //'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-primary'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'DD/MM/YYYY',
          separator: ' to ',
          locale: {
              applyLabel: 'Submit',
              fromLabel: 'Dari',
              toLabel: 'Sampai',
              customRangeLabel: 'Custom Range',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
          }
       },
       function(start, end) {
        console.log("Callback has been called!");
        $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        startDate = start;
         endDate = end;    

       }
    );
    //Set the initial state of the picker label
    $('#reportrange span').html(moment().subtract('days', 29).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));

    $('#saveBtn').click(function(){
        console.log(startDate.format('D MMMM YYYY') + ' - ' + endDate.format('D MMMM YYYY'));
    });

 ;
</script>    

<script type="text/javascript">
      $('#shubuh_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#shubuh_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#dzuhur_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#dzuhur_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#ashar_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#ashar_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#maghrib_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#maghrib_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#isya_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#isya_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $.material.init()
    ;
</script>