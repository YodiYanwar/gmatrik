<?php 
  include 'functions2.php';

  $idTahsin = $_GET['id'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=tahsin" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;DATA PRESENSI TAHSIN/TAHFIDZ
                          <small>
                            <?php 
                                  $dataTahsin = tampilTahsinById($idTahsin);
                                    foreach($dataTahsin as $row){
                                      echo 'Tanggal : '.$row['tanggal'].'<br>Tahsin/Tahfidz : '.$row['tahsin'];
                                    }
                            ?>
                          </small>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableTahsin" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIM</th>
                                  <th>Nama Mahasiswa</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataPresensiTahsin = tampilPresensiTahsin($idTahsin);
                                  $no = 1;
                                  if (is_array($dataPresensiTahsin) || is_object($dataPresensiTahsin)){
                                    foreach($dataPresensiTahsin as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nim']; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
          </div>

      </div>
</div>      

    <script>
    $(document).ready(function() {
      var t = $('#tableTahsin').DataTable({});
    } );
    </script> 