<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA PEKAN PRESENSI TAHSIN/TAHFIDZ&nbsp;&nbsp;&nbsp;
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                      <table id="DataPekan" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Semester</th>
                                            <th>Pekan ke</th>
                                            <th>Dari Tanggal</th>
                                            <th>Sampai Tanggal</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataPekan = tampilPekanTahsin();
                                            $no = 1;
                                            foreach($dataPekan as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td>  
                                          <td><?php echo $row['semester'];?></td>
                                          <td><?php echo $row['pekan']; ?></td>
                                          <td><?php echo date('l - d M Y', strtotime($row['tanggal_dari'])); ?></td>
                                          <td><?php echo date('l - d M Y', strtotime($row['tanggal_sampai'])); ?></td>
                                          <td><a href='?page=nilaitahsin&idpekan=<?php echo $row['id_pekan']; ?>' class='btn btn-xs'>Lihat Nilai</a></td>
                                        </tr>
                                          <?php 
                                             $no++; }
                                           ?>      
                                        </tbody> 
                                      </table>
                                    
                                      </div>                       
                        </div>
                    </div>
                </div>
            </div> 



    </section>
    <!-- /.content -->

    <script>
    $(document).ready(function() {
      var t = $('#DataPekan').DataTable( {
            
        } );

    } );
    </script>        