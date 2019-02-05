<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA TA'LIM&nbsp;&nbsp;&nbsp;
                          <a href="?page=inputtalim" class="btn btn-sm btn-default waves-effect" title="Tambah Data Ta'lim & Input Presensi Ta'lim"><i class="material-icons">add</i><span>TAMBAH DATA</span></a></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableTalim" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Pekan ke</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Deskripsi</th>
                                  <th>Jumlah Hadir Mahasiswa Binaan</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataTalim = tampilTalim($idPembina);
                                  $no = 1;
                                  if (is_array($dataTalim) || is_object($dataTalim)){
                                    foreach($dataTalim as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['pekan']; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['deskripsi']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><a href='?page=presensitalim&id=<?php echo $row['id_talim']; ?>' class='btn btn-xs'>Lihat Data Presensi</a></td>
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
      var t = $('#tableTalim').DataTable({});
    } );
    </script> 