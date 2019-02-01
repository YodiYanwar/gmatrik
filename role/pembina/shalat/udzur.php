<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA UDZUR SHALAT<br>
                          <small>Berdasarkan Tanggal</small></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Tanggal</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Udzur</th>
                                  <th>Waktu Shalat</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Keterangan</th>
                                  <th>Diajukan pada</th>
                                  <th>Setujui?</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatRolePembina($idPembina);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['wkt']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['keterangan']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['disetujui'] == 1){echo 'Disetujui';}else if($row['disetujui'] == 2){echo 'Ditolak';}else if($row['disetujui'] == 0){echo "<a href='#setujuUdzurShalat' data-toggle='modal' class='btn btn-xs bg-green' data-href='action/hapus.php?sudzurshalat=".$row['id_udzur']."'>Ya</a>&nbsp;<a href='#tolakUdzurShalat' data-toggle='modal' class='btn btn-xs bg-red' data-href='action/hapus.php?tudzurshalat=".$row['id_udzur']."'>Tolak</a>";} ?></td>
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
      var t = $('#tableUdzur').DataTable({});
    } );
    </script> 


 <?php
  if(isset($_POST['submitJplg'])){
    if (is_array($_POST['wkt1'])) {
      foreach($_POST['wkt1'] as $s){
        tambahJplg($_POST['tplg1'], $_POST['radiojk'], $s);
      }
    }
    echo "<script>document.location='index.php?page=jplg'</script>";
  }
?>

            <div class="modal fade" id="setujuUdzurShalat" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Setujui Pengajuan Udzur Shalat?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-success btn-ok waves-effect">SETUJU</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="modal fade" id="tolakUdzurShalat" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Tolak Pengajuan Udzur Shalat?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">TOLAK</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>              