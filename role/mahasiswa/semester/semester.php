<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA SEMESTER &nbsp;&nbsp;&nbsp;
                            <!-- <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Tambah Data Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA</span></button> -->
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                      <table id="DataSemester" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Angkatan</th>
                                            <th>Semester</th>
                                            <th>Tanggal Dari</th>
                                            <th>Tanggal Sampai</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataSemester = tampilSemester();
                                            
                                            $no = 1;
                                            foreach($dataSemester as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td>  
                                          <td><?php echo $row['angkatan'] ?></td>
                                          <td><?php echo $row['semester'];?></td>
                                          <td><?php echo date('d M Y', strtotime($row['tanggal_dari'])); ?></td>
                                          <td><?php echo date('d M Y', strtotime($row['tanggal_sampai'])); ?></td>
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


<div class="modal fade" id="tambahDataSemester" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Input Data Semester</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                              <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="angkatan" class="form-control" placeholder="Angkatan" required>
                                        </div>
                                    </div>
                                </div>

                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="semester" class="form-control" placeholder="Semester" required>
                                        </div>
                                    </div>
                                </div>


                              <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="tanggaldari" class="datepicker form-control" placeholder="Dari Tanggal" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_box</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="tanggalsampai" class="datepicker form-control" placeholder="Sampai Tanggal" required>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahSemester" class="btn btn-primary btn-block waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link btn-block waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>   

    <?php 

      if (isset($_POST['tambahSemester'])) {
        tambahSemester($_POST['angkatan'], $_POST['semester'], $_POST['tanggaldari'], $_POST['tanggalsampai']);
        echo "<script>document.location='index.php?page=semester'</script>";
      }

/*      if (isset($_POST['importMahasiswa'])) {
        importMahasiswa($_POST['angkatan']);
        echo "<script>document.location='index.php?page=mahasiswa'</script>";
      }*/
    ?>

    </section>
    <!-- /.content -->


    <script>
    $(document).ready(function() {
      var t = $('#DataSemester').DataTable( {
            
        } );

    } );
    </script>        