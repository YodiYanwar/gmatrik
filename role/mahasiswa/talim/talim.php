<?php 
  include 'functions2.php';

  $nim = $_SESSION['nim'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA TA'LIM&nbsp;&nbsp;&nbsp;</h2>
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
                                  <th>Jumlah Hadir Mahasiswa</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataTalim = tampilTalimRoleMhs($nim);
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