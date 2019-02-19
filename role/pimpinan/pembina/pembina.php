<?php 
  include 'functions.php';

 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">              
                    <div class="card">
                        <div class="header">
                          <h2>DATA PEMBINA MAHASISWA &nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePembina" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Nama</th>
                                <th>Gelar</th>
						                    <th>Ikhwan/Akhwat</th>
                                <th>Kota Asal</th>
						                    <th>Telepon</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPembina = tampilPembina();
						                    
						                    $no = 1;
						                    foreach($dataPembina as $row){
						                   ?>
						                <tr>
						                  <td><b><?php echo $no ?></b></td>  
						                  <td><?php echo $row['nama'];?></td>
						                  <td><?php echo $row['gelar'] ?></td>
						                  <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                              <td><?php echo $row['kota_asal'] ?></td>
						                  <td><?php echo $row['telepon'] ?></td>
						                </tr>
						                  <?php 
						                    $no++; }
						                   ?>      
						                </tbody>          
						              </table>
						              <!-- /Table Daftar Pembina -->   
						              </div>                       
                        </div>
                    </div>
                </div>
            </div>
</div>

    <script>
    $(document).ready(function() {
      var t = $('#tablePembina').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,5]}
            ]
        } );

    } );
    </script>    


<div class="modal fade" id="tambahDataPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Mahasiswa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                            		<div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_box</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nomor Induk Mahasiswa (akan menjadi username untuk keperluan login sistem)" disabled="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-sm-12">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">school</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Gelar" required>
                                        </div>
                                  </div>
                                  </div> -->
                                
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
	                                        <option value="">-- Ikhwan/Akhwat --</option>
	                                        <option value="Ikhwan">Ikhwan</option>
	                                        <option value="Akhwat">Akhwat</option>
                                    	</select>                                            
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">bookmark</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="Angkatan" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="Kota Asal" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="No Telp." required>
                                        </div>
                                  </div>
                                </div>
                                 <br><br>
                                <!--<h5 align="center">Data User</h5><br>
                                 <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control date" placeholder="Username" required>
                                        </div>
                                  </div>
                                </div> 
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control date" placeholder="Password" required>
                                        </div>
                                  </div>
                                </div> 
                                -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahPembina" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>    