<?php 

  include 'functions.php';
    $id = $_GET['id'];
      $dataMahasiswa = mahasiswaDetails($id);

      foreach($dataMahasiswa as $row){
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=mahasiswa" class="btn btn-sm btn-link waves-effect" style="width: 10%;" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;PROFIL MAHASISWA
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="tableProfil" class="table table-condensed">
                            <col width="350">
                            <col width="20">
                            <col width="500">
                                <tr> 
                                  <td colspan="3"> 
                                    <div class="image" align="center">
                                        <img src=<?php
                                          if ($row['avatar'] == NULL) {
                                            if ($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){
                                              echo 'assets/img/user/default-female.jpg';
                                            } else
                                            if ($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){
                                              echo 'assets/img/user/default-male.png';
                                            } else
                                            if ($row['j_kelamin'] == NULL){
                                              echo 'assets/img/user/default.png';
                                            }
                                          } else if($row['avatar'] != NULL){
                                            echo 'assets/img/user/'.$row['avatar'];
                                          }               
                                        ?> width="100" height="100" alt="User" />
                                      <br>
                                      <h5 align="center"><?php echo $row['nama']; ?></h5>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Nomor Induk Mahasiswa</th>
                                  <td>:</td>
                                  <td><?php echo $row['nim']; ?></td>
                                </tr>
                                <tr>
                                  <th>Username</th>
                                  <td>:</td>
                                  <td><span class="label bg-deep-orange"><?php echo $row['username']; ?></span></td>
                                </tr>
                                <tr>
                                  <th>Pembina</th>
                                  <td>:</td>
                                  <td><?php if($row['nama_pembina'] == NULL){echo 'Belum Diset';} else{ echo "<a href=index.php?page=pembinadetails&id=".$row['uid_pembina'].">".$row['nama_pembina']."</a>";} ?></td>
                                </tr>
                                <tr>
                                <tr>
                                  <th>Email</th>
                                  <td>:</td>
                                  <td><?php if($row['email'] == NULL){echo 'Belum diatur';}else{echo $row['email'];} ?></td>
                                </tr>
                                <tr>
                                  <th>No Telp</th>
                                  <td>:</td>
                                  <td><?php if($row['telp'] == NULL){echo 'Belum diatur';}else{echo $row['telp'];} ?></td>
                                </tr>
                                <tr>
                                  <th>Ikhwan/Akhwat</th>
                                  <td>:</td>
                                  <td><?php if($row['j_kelamin'] == NULL){echo 'Belum diatur';}else{echo $row['j_kelamin'];} ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal Lahir</th>
                                  <td>:</td>
                                  <td><?php if($row['tgl_lahir'] == NULL){echo 'Belum diatur';}else{echo date('d F Y', strtotime($row['tgl_lahir']));} ?></td>
                                </tr>
                                <tr>
                                  <th>Password Default</th>
                                  <td>:</td>
                                  <td><?php if(strlen($row['password_default']) == 1){ echo "<code>".$row['password']."</code>";} else{echo "<span class='badge bg-green'>Sudah Diubah</span>" ;} ?></td>
                                </tr>
                              </table>                          
                              
                              <a href="index.php?page=editmahasiswa&id=<?php echo $row['id_user']; ?>" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>&nbsp;EDIT DATA PROFIL</span></a>
                              
                              <?php if($row['password_default'] == 0){ echo "<a class='btn btn-warning btn-block waves-effect' href='#ModalResetPassword' data-toggle='modal' ><i class='material-icons' style='font-size: 16px'>lock_open</i><span>&nbsp;GANTI PASSWORD</span></a>";} ?>

                              <?php echo "<a class='btn btn-danger btn-block waves-effect' href='#ModalHapusMahasiswa' data-toggle='modal' data-href='action/hapus.php?idmahasiswa=".$row['id_mahasiswa']."&iduser=".$row['id_user']."'><i class='material-icons' style='font-size: 16px'>delete</i><span>&nbsp;HAPUS MAHASISWA</span></a>"; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                             
  </div>
</div>
             <div class="modal fade" id="ModalGantiPass" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">GANTI PASSWORD</h4>
                        </div>
                        <div class="modal-body">
                            <label>Password Baru : </label>
                            <div class="form-line">
                              <input type="password" name="pass" class="form-control" id="pwinput2" placeholder="Masukan Password Baru" pattern=".{0}|.{8,}" title="8 Karakter Minimal" required><br>
                            </div>
                            <label>Konfirmasi Password : </label>
                            <div class="form-line">
                              <input type="password" name="passConf" class="form-control" id="pwinput3" placeholder="Masukan Ulang Password Baru" pattern=".{0}|.{8,}" title="8 Karakter Minimal" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-ok waves-effect" name="gantiPass">SIMPAN</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>  

            <div class="modal fade" id="ModalUploadAva" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">UPLOAD FOTO PROFIL</h4>
                        </div>
                        <div class="modal-body">
                          <input type="file" name="file" required>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-ok waves-effect" name="upload" value="UPLOAD">
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 

<?php 
  if (isset($_POST['gantiPass'])) {
    gantiUserPassword($_SESSION['id_user'], $_POST['pass']);
    echo "<script>document.location='?page=profil&alert=passchanged'</script>";
  }

 ?>            