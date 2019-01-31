<?php 
  include 'functions.php';
 ?>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA JADWAL KEPULANGAN &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahJplg" title="Tambah Data Jadwal Kepulangan"><i class="material-icons">add</i><span>TAMBAH DATA</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableJplg" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Pekan ke</th>
                                  <th>Tanggal</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Waktu Shalat</th>
                                  <th>Jumlah Dispensasi Waktu Shalat</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataPresensi = tampilJplg();
                                  $no = 1;
                                  foreach($dataPresensi as $row){

                                 ?>
                                <tr>
                                  <td><b><?php echo $no; ?></b></td>  
                                  <td><?php echo $row['pekan']; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['gender']; ?></td>
                                  <td><?php echo $row['waktu_shalat']; ?></td>
                                  <td><?php echo $row['jws']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
</div>
</div>

            <div class="modal fade" id="tambahJplg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formJplg" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT DATA JADWAL KEPULANGAN</h4>
                        </div>
                        <div class="modal-body">
                                <input type="radio" id="radio_30" class="radiojk" name="gender" id="rdi" value="Ikhwan" required />
                                <label for="radio_30">IKHWAN</label>&nbsp;
                                <input type="radio" id="radio_31" class="radiojk" name="gender" id="rda" value="Akhwat"/>
                                <label for="radio_31">AKHWAT</label><br><br>   
                                <!-- <label>Pekan ke :</label>&nbsp; -->
                                <!-- <select class="form-control show-tick" name="idPekan" required>
                                  <option value=''>-- Pilih Pekan --</option>
                                  <?php /*$dataPekan = tampilPekan();
                                                          foreach($dataPekan as $row){
                                                            echo "<option value='".$row['id_pekan']."'>. ".date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']))."</option>";
                                                          }*/
                                                        ?>

                                  <?php /*$dataPresensi = tampilPeriodeShalat();
                                                          foreach($dataPresensi as $row){
                                                            echo "<option value='".$row['id_periode']."'>".$row['id_periode'].". ".date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']))."</option>";
                                                          }*/
                                                        ?>
                                        </select>  -->
                                    <br>   
                                    <label>Hari 1 :</label>&nbsp;
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 

                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg1" placeholder="Tanggal Pulang di Hari 1"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="shubuh1" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="dzuhur1" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="ashar1" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="maghrib1" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="isya1" value="isya">&nbsp;Isya
                                          <br>
                                          <!-- <button type="button" class="btn btn-xs btn-primary waves-effect btn-add">
                                              <i class="material-icons">add</i>
                                          </button> -->
                                          <!-- <button class="hapus"></button> -->
                                          <br>
                                        <!-- </div> -->
                                      <!-- </div> -->
                                    <!-- </div>                           -->
                                    <label>Hari 2 :</label>&nbsp;
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg2" placeholder="Tanggal Pulang di Hari 2"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all2">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="shubuh2" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="dzuhur2" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="ashar2" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="maghrib2" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="isya2" value="isya">&nbsp;Isya
                                          
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitJplg">SIMPAN</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 
</div>      

    <script>
    $(document).ready(function() {
      var t = $('#tableJplg').DataTable({});
    } );
    </script> 

        <script>
    $(document).ready(function() {
      var t = $('#tablepekan').DataTable({});
    } );
    </script> 


 <?php

        if (isset($_POST['submitJplg'])) {

          if(!empty($_POST['tplg1'])){
            if(!empty($_POST['shubuh1'])) {
              $shubuh_ = 1;
            }else
            if(empty($_POST['shubuh1'])) {
              $shubuh_ = 0;
            }

            if(!empty($_POST['dzuhur1'])) {
              $dzuhur_ = 1;
            }else
            if(empty($_POST['dzuhur1'])) {
              $dzuhur_ = 0;
            }

            if(!empty($_POST['ashar1'])) {
              $ashar_ = 1;
            }else
            if(empty($_POST['ashar1'])) {
              $ashar_ = 0;
            }

            if(!empty($_POST['maghrib1'])) {
              $maghrib_ = 1;
            }else
            if(empty($_POST['maghrib1'])) {
              $maghrib_ = 0;
            }

            if(!empty($_POST['isya1'])) {
              $isya_ = 1;
            }else
            if(empty($_POST['isya1'])) {
              $isya_ = 0;
            }

            tambahJplg($_POST['tplg1'], $_POST['gender'], $shubuh_, $dzuhur_, $ashar_, $maghrib_, $isya_);
          }

          if(!empty($_POST['tplg2'])){
            if(!empty($_POST['shubuh2'])) {
              $shubuh2_ = 1;
            }else
            if(empty($_POST['shubuh2'])) {
              $shubuh2_ = 0;
            }

            if(!empty($_POST['dzuhur2'])) {
              $dzuhur2_ = 1;
            }else
            if(empty($_POST['dzuhur2'])) {
              $dzuhur2_ = 0;
            }

            if(!empty($_POST['ashar2'])) {
              $ashar2_ = 1;
            }else
            if(empty($_POST['ashar2'])) {
              $ashar2_ = 0;
            }

            if(!empty($_POST['maghrib2'])) {
              $maghrib2_ = 1;
            }else
            if(empty($_POST['maghrib2'])) {
              $maghrib2_ = 0;
            }

            if(!empty($_POST['isya2'])) {
              $isya2_ = 1;
            }else
            if(empty($_POST['isya2'])) {
              $isya2_ = 0;
            }

            tambahJplg($_POST['tplg2'], $_POST['gender'], $shubuh2_, $dzuhur2_, $ashar2_, $maghrib2_, $isya2_);
          }


          /*if(!empty($_POST['tplg1'])){
            if(!empty($_POST['shubuh1'])) {
              $shubuh_ = 1
              // tambahJplg($_POST['tplg1'], $_POST['gender'], $_POST['shubuh1']);
            }else
            if(!empty($_POST['shubuh1'])) {
              $shubuh_ = 1
            }
            if(!empty($_POST['dzuhur1'])) {
              tambahJplg($_POST['tplg1'], $_POST['gender'], $_POST['dzuhur1']);
            }
            if(!empty($_POST['ashar1'])) {
              tambahJplg($_POST['tplg1'], $_POST['gender'], $_POST['ashar1']);
            }
            if(!empty($_POST['maghrib1'])) {
              tambahJplg($_POST['tplg1'], $_POST['gender'], $_POST['maghrib1']);
            }
            if(!empty($_POST['isya1'])) {
              tambahJplg($_POST['tplg1'], $_POST['gender'], $_POST['isya1']);
            }
          }*/

          /*if(!empty($_POST['tplg2'])){
            if(!empty($_POST['shubuh2'])) {
              tambahJplg($_POST['tplg2'], $_POST['gender'], $_POST['shubuh2']);
            }
            if(!empty($_POST['dzuhur2'])) {
              tambahJplg($_POST['tplg2'], $_POST['gender'], $_POST['dzuhur2']);
            }
            if(!empty($_POST['ashar2'])) {
              tambahJplg($_POST['tplg2'], $_POST['gender'], $_POST['ashar2']);
            }
            if(!empty($_POST['maghrib2'])) {
              tambahJplg($_POST['tplg2'], $_POST['gender'], $_POST['maghrib2']);
            }
            if(!empty($_POST['isya2'])) {
              tambahJplg($_POST['tplg2'], $_POST['gender'], $_POST['isya2']);
            }
          }*/

        echo "<script>document.location='index.php?page=jplg'</script>";
      }    

/* Percobaan Array variable on tplg[] & wkt shalat[]        
if (isset($_POST['submitJplg'])) {
          foreach($_POST['tplg'] as $tplg) {
            if(!empty($_POST['shubuh'])) {
              foreach($_POST['shubuh'] as $shubuh) {
                tambahJplg($tplg, $_POST['gender'], $shubuh);
              }
            }
            if(!empty($_POST['dzuhur'])) {
              foreach($_POST['dzuhur'] as $dzuhur) {
                tambahJplg($tplg, $_POST['gender'], $dzuhur);
              }
            }
            if(!empty($_POST['ashar'])) {
              foreach($_POST['ashar'] as $ashar) {
                tambahJplg($tplg, $_POST['gender'], $ashar);
              }
            }
            if(!empty($_POST['maghrib'])) {
              foreach($_POST['maghrib'] as $maghrib) {
                tambahJplg($tplg, $_POST['gender'], $maghrib);
              }
            }
            if(!empty($_POST['isya'])) {
              foreach($_POST['isya'] as $isya) {
                tambahJplg($tplg, $_POST['gender'], $isya);
              }
            }
          }

        echo "<script>document.location='index.php?page=jplg'</script>";
      }        */
    
?>
    <script>
    $('input').on('ifChecked', function(event){
      var s = $(this).val();
      $('#formJplg').append(
        $('<input>')
          .attr('type', 'hidden')
          .attr('id', 'input'+s)
          .attr('name', 'wkt1[]')
          .val(s)
      );
    });

    $('input').on('ifUnchecked', function(event){
      var s = $(this).val();
      document.getElementById("input"+s).remove();
    });

    //j_kelamin radiobutton on Jplg
    $('#rdi').on('ifChecked', function (event) {
        $('#rdi').val('Ikhwan');
    });

    $('#rda').on('ifChecked', function (event) {
        $('#rda').val('Akhwat');
    });
    </script>