<?php 

  include 'functions.php';

    $id = $_GET['id'];
      $dataPembina = pembinaDetails($id);
      foreach($dataPembina as $row){  

        //$np = namaPembinaById($row['id_pembina']);
        $idPembina = $row['id_pembina'];
 ?>


<div class="container-fluid">

  <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <a href="?page=pembina" class="btn btn-sm btn-link waves-effect" style="width: 10%;" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;DATA PEMBINA
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="tablePelanggaran" class="table table-condensed">
                            <col width="170">
                            <col width="20">
                            <col width="750">
                                <tr> 
                                  <td colspan="3"> 
                                    <div class="image" align="center">
                                      <img src=<?php echo "assets/img/user/".$_SESSION['ava']; ?> width="48" height="48" alt="User" />
                                    </div>
                                  </td>
                                </tr>
                                <tr> 
                                  <th>Nama Pembina</th>
                                  <td>:</td>
                                  <td><?php echo $row['nama'].' '.$row['gelar']; ?></td>
                                </tr>
                                <tr>
                                  <th>ID</th>
                                  <td>:</td>
                                  <td><?php echo $row['id_pembina']; ?></td>
                                </tr>
                                <tr>
                                  <th>Username</th>
                                  <td>:</td>
                                  <td><code><?php echo $row['username']; ?></code></td>
                                </tr>
                                <tr>
                                  <th>Login Terakhir</th>
                                  <td>:</td>
                                  <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo 'Belum Pernah';}else{ echo date("d-m-Y H:i", strtotime($row['last_login']));} ?></td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td>:</td>
                                  <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                  <th>No Telp</th>
                                  <td>:</td>
                                  <td><?php echo $row['telp']; ?></td>
                                </tr>
                                <tr>
                                  <th>Ikhwan/Akhwat</th>
                                  <td>:</td>
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                </tr>
                                <tr>
                                  <th>Kota Asal</th>
                                  <td>:</td>
                                  <td><?php echo $row['asalkota']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal Lahir</th>
                                  <td>:</td>
                                  <td><?php echo date('d F Y', strtotime($row['tgl_lahir'])); ?></td>
                                </tr>
                                <tr>
                                  <th>Jumlah Binaan</th>
                                  <td>:</td>
                                  <td><a href="index.php?page=bypembinadetail&idPembina=<?php echo $row['id_pembina']; ?>"><?php echo $row['jml_binaan']; ?></a></td>
                                </tr>
                              </table>                          
                              
                              <a href="?page=editpembina&id=<?php echo $id; ?>" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>EDIT DATA PROFIL</span></a>
                              <?php echo "<a class='btn btn-danger btn-block waves-effect' href='#ModalHapusPembina' data-toggle='modal' data-href='action/hapus.php?idpembina=".$row['id_pembina']."&iduser=".$row['id_user']."'><i class='material-icons' style='font-size: 16px'>delete</i><span>HAPUS PEMBINA</span></a>"; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MAHASISWA BINAAN &nbsp;
                                <a href="?page=tambahbinaan&id=<?php echo $idPembina; ?>" class="btn btn-sm btn-link waves-effect" style="width: 17%;" title="Tambah Mahasiswa Binaan"><i class="material-icons">playlist_add</i></a>
                            </h2>
                        </div>
                        <div class="body">
                        <!-- Table Daftar Pembina -->
                          <table id="tableDaftarBinaan" class="table table-bordered table-hover table-condensed">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa Binaan</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $dataByPembina = MhsByPembinaDetail($row['id_pembina']);

                              $no = 1;

                              if (is_array($dataByPembina) || is_object($dataByPembina)){

                               foreach($dataByPembina as $row){  
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo "<span class='badge bg-green'>".$row['nim']."</span>" ?></td>
                              <td><a href="index.php?page=mahasiswadetails&id=<?php echo $row['uid_mahasiswa']; ?>" style='text-decoration:none'><?php echo $row['nama_mahasiswa']?></a></td>
                              <td>
                                

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><?php echo "<a style='color:#DD4B39;' href='#ModalHapusBinaan' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idmahasiswabinaan=".$row['id_mahasiswa']."&uidpembina=".$row['uid_pembina']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>delete</i></a>"; ?></li>
                                    </ul>
                                </div>
                              </td>
                            </tr>
                           <?php 
                              $no++; }
                              }
                            ?> 
                            </tbody>          
                          </table>
                          <!-- /Table Daftar Pembina -->
                        </div>
                    </div>
                </div>
                <!-- #END# Color Variations -->                
  </div>
</div>


            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Akun Pembina ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusBinaan" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Mahasiswa Binaan ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>            