<?php 

  include 'functions.php';

  $nim = $_GET['nim'];     
  $dataMahasiswa = mahasiswaDetails($nim);
  $namaMhs = tampilPembina();
  foreach($dataMahasiswa as $row){
?>

<div class="row clearfix">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=mahasiswa" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;EDIT DATA MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
                          <form method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="nim" class="form-control" placeholder="NIM" value="<?php echo $row['nim']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">turned_in_not</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo $row['angkatan']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">wc</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
                                          <?php 
                                            if ($row['gender'] == "Ikhwan") {
                                              echo "<option>Ikhwan</option>
                                                    <option>Akhwat</option>";
                                            } else
                                            if($row['gender'] == "Akhwat"){
                                              echo "<option>Akhwat</option>
                                                    <option>Ikhwan</option>";
                                            } else
                                            if($row['gender'] == NULL){
                                              echo "<option selected='selected' value=''>Ikhwan/Akhwat</option>
                                                    <option>Ikhwan</option>
                                                    <option>Akhwat</option>";
                                            }
                                         ?>
                                        </select>                                            
                                    </div>

                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" data-live-search="true" name="idPembina" required>
                                                        <option value="<?php echo $row['id_pembina']; ?>" selected><?php echo $row['namapembina']; ?></option>
                                                        <?php 
                                                          foreach($namaMhs as $row){
                                                            echo '<option value="'.$row['id_pembina'].'">'.$row['nama'].' '.$row['gelar'].'</option>';
                                                          }
                                                        ?>
                                        </select>                                           
                                    </div>
                                  
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kotaasal" class="form-control" placeholder="Kota Asal" value="<?php echo $row['kota_asal']; ?>">
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="telepon" class="form-control" placeholder="No Telp." value="<?php echo $row['telepon']; ?>" >
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">power_settings_new</i>
                                        </span>
                                        <select class="form-control show-tick" name="aktif" required>
                                          <?php 
                                            if ($row['aktif'] == 0) {
                                              echo "<option value=1>Aktif</option>
                                                    <option value=0>Tidak Aktif</option>";
                                            } else
                                            if($row['aktif'] == 1){
                                              echo "<option value=1>Aktif</option>
                                                    <option value=0>Tidak Aktif</option>";
                                            } else
                                            if($row['aktif'] == NULL){
                                              echo "<option selected value=''>-- Aktif/Tidak Aktif --</option>
                                                    <option value=1>Aktif</option>
                                                    <option value=0>Tidak Aktif</option>";
                                            }
                                         ?>
                                        </select>                                            
                                    </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="editMahasiswa" ><span>SIMPAN</span></button>
                                  <a href="?page=mahasiswa" class="btn btn-default btn-block waves-effect" ><span>BATAL</span></a>
                                  </form>
                                </div>
                    </div>
                </div>
  </div>
</div>           

<?php
    if (isset($_POST['editMahasiswa'])) {
      editMahasiswa($nim, $_POST['nama'], $_POST['angkatan'], $_POST['gender'], $_POST['idPembina'], $_POST['kotaasal'], $_POST['telepon'], $_POST['aktif']);
      echo "<script>document.location='index.php?page=mahasiswa'</script>";
    }
  }
?>