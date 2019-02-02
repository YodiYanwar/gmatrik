<?php 
  include 'functions2.php';

  $nim = $_SESSION['nim'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA TAHSIN/TAHFIDZ&nbsp;&nbsp;&nbsp;
                          <a href="?page=inputtahsin" class="btn btn-sm btn-default waves-effect" title="Tambah Data Tahsin/Tahfidz & Input Presensi Tahsin/Tahfidz"><i class="material-icons">add</i><span>TAMBAH DATA</span></a></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableTahsin" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Pekan ke</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Tahsin</th>
                                  <th>Deskripsi</th>
                                  <th>Jumlah Hadir Mahasiswa</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataTahsin = tampilTahsinRoleMhs($nim);
                                  $no = 1;
                                  if (is_array($dataTahsin) || is_object($dataTahsin)){
                                    foreach($dataTahsin as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['pekan']; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php if($row['tahsin'] == 'badashubuh'){echo "Ba'da Shubuh";}else if($row['tahsin'] == 'badaashar'){echo "Ba'da Ashar";} ?></td>
                                  <td><?php echo $row['deskripsi']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
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