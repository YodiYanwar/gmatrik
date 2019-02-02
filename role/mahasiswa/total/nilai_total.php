<?php 
  include 'functions.php';

  $idPekan = $_GET['idpekan'];
  $nim = $_SESSION['nim'];
 ?>


	<div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=pekantalim" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;NILAI PRESENSI TOTAL
                            <small>Pekan ke :
                                <div class="btn-group">
                                                      <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <?php 
                                                            $pekan = tampilPekanById($idPekan);
                                                            foreach($pekan as $row){
                                                              echo $row['pekan'].') '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai']));
                                                            } 
                                                          ?>
                                              <span class="caret"></span>
                                                      </button>
                                                      <ul class="dropdown-menu">
                                                          <?php
                                                            $dataPekanShalat = tampilPekanShalat();
                                                            foreach($dataPekanShalat as $row){
                                                            ?>
                                                              <li><?php echo '<a href="?page=nilaitotal&idpekan='.$row['id_pekan'].'">'.$row['pekan'].') '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
                                                          <?php } ?>
                                                      </ul>
                                      </div>
                              </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatMhs" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIM</th>
                                  <th>Nama</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Pembina Mahasiswa</th>
                                  <th>Shalat</th>
                                  <th>Ta'lim</th>
                                  <th>Tahsin/Tahfidz</th>
                                  <th>Nilai Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $nilai = tampilNilaiTotalnByPekanByMhs($idPekan, $nim);
                                  foreach($nilai as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nim']; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                  <td><?php echo $row['namapembina'].' '.$row['gelar']; ?></td>
                                  <td><?php echo $row['shalat']; ?></td>
                                  <td><?php echo $row['talim']; ?></td>
                                  <td><?php echo $row['tahsin']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                              </tbody> 
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- /.content -->

<!-- Daterange picker import data presensi shalat mahasiswa -->
    <script>
    $(document).ready(function() {
      var t = $('#tableShalatMhs').DataTable({});
    } );
    </script> 