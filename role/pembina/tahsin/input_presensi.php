<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

	<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=tahsin" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                          TAMBAH DATA TAHSIN/TAHFIDZ & INPUT PRESENSI TAHSIN/TAHFIDZ</h2>
                        </div>
                        <form method="POST" id="formInputPresensiTahsin">
                        <div class="body">   
                          <div class="row">
                            <div class="col col-sm-4">
                              <div class="input-group">
                                      <label>Tahsin :</label>
                                      <div class="form-line">
                                        <select class="form-control show-tick" name="namatahsin" required>
                                          <option value="">- Pilih Tahsin -</option>
                                          <option value="badashubuh">Tahsin Ba'da Shubuh</option>
                                          <option value="badaashar">Tahsin Ba'da Ashar</option>
                                        </select>
                                      </div>
                                    </div>
                            </div>
                            <div class="col col-sm-4">
                              <div class="input-group">
                                      <label>Tanggal :</label>
                                      <div class="form-line">
                                        <input type="text" class="form-control datepicker" name="tgltahsin" placeholder="Tanggal Tahsin" required /><br>
                                      </div>
                                    </div>
                            </div>
                            <div class="col col-sm-4">
                              <div class="input-group">
                                      <label>Deskripsi :</label>
                                      <div class="form-line">
                                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Tahsin" /><br>
                                      </div>
                                    </div>
                            </div>
                          </div>     

                                                
                                    <label>Input Presensi Tahsin/Tahfidz :</label>
                                    <div class="table-responsive">
                                    <!-- Table Daftar Pembina -->
                                      <table class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>Hadir?</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          &nbsp;&nbsp;&nbsp;<input type="checkbox" class="flat-red" id="check-all-tahsin">&nbsp;&nbsp;Hadir Semua
                                          <?php 
                                            $binaanTahsin = tampilDaftarBinaanTahsin($idPembina);
                                            $no = 1;

                                            if (is_array($binaanTahsin) || is_object($binaanTahsin)){
                                              foreach($binaanTahsin as $row){
                                          ?>
                                        <tr style="height: 5px;">
                                          <td><input type="checkbox" class="flat-red checktahsin" name="nim[]" value="<?php echo $row['nim']; ?>"></td>
                                          <td><?php echo "<span class='badge'>".$row['nim']."</span>"; ?></td>
                                          <td><?php echo $row['nama']; ?></td>
                                        </tr>
                                          <?php 
                                            $no++; }
                                           }
                                          ?>      
                                        </tbody>          
                                      </table>
                                      <!-- /Table Daftar Pembina -->
                                    </div>
                                  <button type="submit" class="btn btn-primary waves-effect" name="submitPresensiTahsin">SUBMIT</button>
                          </div>
                        </form>
</div>
</div>
</div>   

    <?php 
     
        if (isset($_POST['submitPresensiTahsin'])) {
          inputTahsin($idPembina, $_POST['namatahsin'], $_POST['tgltahsin'], $_POST['deskripsi']);

          if(!empty($_POST['nim'])) {
            foreach($_POST['nim'] as $nim) {
              inputTahsinPresensi($nim, $idPembina, $_POST['tgltahsin'], $_POST['namatahsin']);
            }
          }
        echo "<script>document.location='?page=tahsin'</script>";
        }
    ?>


    <script>
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-green'
    })

    $('input').on('ifChecked', function(event){
      var nim = $(this).val();
      $('#formInputPresensiTahsin').append(
        $('<input>')
          .attr('type', 'hidden')
          .attr('id', 'input'+nim)
          .attr('name', 'nim[]')
          .val(nim)
      );
    });

    $('input').on('ifUnchecked', function(event){
      var nim = $(this).val();
      document.getElementById("input"+nim).remove();
    });
    </script>