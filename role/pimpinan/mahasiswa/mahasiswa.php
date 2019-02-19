<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA MAHASISWA &nbsp;&nbsp;&nbsp;
                            <!-- <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Tambah Data Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA</span></button> -->
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                
                                      <table id="tableMahasiswa" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Ikhwan/Akhwat</th>
                                            <th>Pembina Mahasiswa</th>
                                            <th>Angkatan</th>
                                            <th>Kota Asal</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataMahasiswa = tampilMahasiswa();
                                            
                                            $no = 1;
                                            foreach($dataMahasiswa as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td>  
                                          <td><?php echo $row['nim'];?></td>
                                          <td><?php echo $row['nama'] ?></td>
                                          <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                          <td><?php echo $row['namapembina'].' '.$row['gelar']; ?></td>
                                          <td><?php echo $row['angkatan'] ?></td>
                                          <td><?php echo $row['kota_asal'] ?></td>
                                          <td><?php echo $row['telepon'] ?></td>
                                          <td><?php if ($row['aktif'] == 0){ echo 'Tidak Aktif';}else{ echo 'Aktif' ;}?></td>
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
/*    $(document).ready(function() {
      var t = $('#tablePembina').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/gmatrik/dataMahasiswa.php",
            "order": [[ 4, "asc" ]],
            "columnDefs": [
              { "visible": false, "targets": [0,1,2]},
              { "searchable": false, "orderable": false, "targets": [5,6,7]}
            ]
        } );

    } );*/
    </script>

    <script>
    $(document).ready(function() {
      var t = $('#tableMahasiswa').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,5]}
            ]
        } );

    } );
    </script>        