<?php 
  include '../functions.php';

  $idPekan = $_GET['idpekan'];
  $idPembina = $_GET['idpembina'];

 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>   
  <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="body">
                              <div >
                              <table width="900" border="0" cellpadding="5" cellspacing="5" bgcolor="white">
                                  <tr> 
                                    <td width="100"> 
                                      <img src="../assets/img/logo_tazkia.png" width="50" height="71"/> 
                                    </td> 
                                    <td align="center"> 
                                      <font face="Times New Roman, Times, serif"> 
                                        <b><font size="4">Kampus Matrikulasi</font> 
                                        <br /> 
                                        <font size="5">Sekolah Tinggi Ekonomi Islam TAZKIA</font> 
                                        <br /></b> 
                                        <font size="3">Jl. Raya Dramaga KM.07 </font> 
                                      </font> 
                                    </td> 
                                  </tr> 
                                  <tr> <td colspan="2"><hr /></td> </tr>
                              </table>
                              <br /> 
                              <table width="900" border="0" cellpadding="5" cellspacing="5" bgcolor="white"> 
                                <tr> 
                                  <td align="center"> 
                                    <font face="Times New Roman, Times, serif"> 
                                        <font size="4"><b>Laporan Nilai Presensi Tahsin/Tahfidz</b></font> <br/>
                                        <font size="3">Pekan ke 
                                          <?php 
                                            $pekan = tampilPekanById($idPekan);
                                            foreach($pekan as $row){
                                              echo $row['pekan'].' ('.date('d M Y', strtotime($row['tanggal_dari'])).' sampai '.date('d M Y', strtotime($row['tanggal_sampai'])).') ';
                                            }
                                           ?>
                                        </font> 
                                        <br/>
                                    </font>   
                                  </td> 
                                </tr>
                              </table>
                              <br/>
                              <table width="900" border="0" cellpadding="5" cellspacing="5" bgcolor="white">
                                <tr>
                                  <td><b><font size="2">Pembina Mahasiswa : <?php 
                                            $pekan = tampilPembinaById($idPembina);
                                            foreach($pekan as $row){
                                              echo $row['nama'].' '.$row['gelar'];
                                            }
                                           ?>
                                             
                                           </font> 
                                        <br /></b> </td>
                                </tr>
                              </table>
                                <table width="900" border="1" bordercolor="#333333" style="border-collapse: collapse;">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>NIM</th>
                                      <th>Nama</th>
                                      <th>Perolehan Presensi</th>
                                      <th>Jumlah Udzur</th>
                                      <th>Target</th>
                                      <th>Nilai</th>
                                    </tr>
                                  </thead>
                                      <tbody>
                                    <?php 
                                      $no = 1;
                                      $nilai = tampilNilaiTahsinByPekanByPembina($idPekan, $idPembina);
                                      foreach($nilai as $row){
                                     ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $row['nim']; ?></td>
                                      <td><?php echo $row['nama']; ?></td>
                                      <td align="center"><?php echo $row['total']; ?></td>
                                      <td align="center"><?php echo $row['jmlu']; ?></td>
                                      <td align="center"><?php echo $row['target2']; ?></td>
                                      <td align="center"><?php echo $row['nilai']; ?></td>
                                    </tr>
                                    <?php $no++; } ?>
                                  </tbody> 
                                </table>

<script>
    window.print();
</script>

                              </div>
                            </div>
</body>
</html>