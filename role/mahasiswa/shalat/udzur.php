<?php 
  include 'functions2.php';

  $nim = $_SESSION['nim'];
  $gender = $_SESSION['gender'];
 ?>

 <!-- <script type="text/javascript">
 // Referensi : https://bootsnipp.com/snippets/featured/multiple-fields

    (function ($) {
        $(function () {

            var addFormGroup = function (event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                var $formGroupClone = $formGroup.clone();

                $(this)
                    .toggleClass('btn-default btn-add btn-danger btn-remove')
                    .html('–');

                $formGroupClone.find('input').val('');
                $formGroupClone.insertAfter($formGroup);

                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                }
            };

            var removeFormGroup = function (event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                }

                $formGroup.remove();
            };

            var countFormGroup = function ($form) {
                return $form.find('.form-group').length;
            };

            $(document).on('click', '.btn-add', addFormGroup);
            $(document).on('click', '.btn-remove', removeFormGroup);

        });
    })(jQuery);   
 </script> -->
<script type="text/javascript">
function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

function deleteFormGroup(formId) {
  document.getElementById('formUdzur_'+formId).innerHTML = "";
}

var addFormGroup  = function (event) {
    event.preventDefault();
    var r = makeid();
    var addElement = '<div class="form-group multiple-form-group" id="formUdzur_'+r+'"><div class="row"><div class="col-xs-8"><input type="text" class="form-control datepicker" name="tudzur[]" placeholder="Tanggal Udzur"/></div><div class="col-xs-4"><button type="button" class="btn btn-xs btn-link waves-effect btn-delete" title="Hapus Hari" onclick="deleteFormGroup(\''+r+'\');"> <i class="material-icons">delete</i> </button></div></div><br><input type="checkbox" class="flat-red check" name="shubuh[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="dzuhur[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="ashar[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="maghrib[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="isya[]" value="isya">&nbsp;Isya <br><br> </div>';
    $("#defaultForm").append(addElement);
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
};

$(document).on('click', '.btn-add', addFormGroup);
</script>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA UDZUR SHALAT &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahUdzur" title="Input Pengajuan Udzur Shalat"><i class="material-icons">playlist_add</i><span>TAMBAH PENGAJUAN UDZUR</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Pekan ke</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Waktu Shalat</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Udzur</th>
                                  <th>Keterangan</th>
                                  <th>Diajukan pada</th>
                                  <th>Disetujui?</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatRoleMhs($nim);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo ucwords($row['pekan']); ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo ucwords($row['wkt']); ?></td>
                                  <td><?php echo ucwords($row['jmlu']); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['keterangan']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['disetujui'] == 0){echo '<label class="badge bg-orange">Belum di Review<label>';}else if($row['disetujui'] == 1){echo '<label class="badge bg-green">Ya<label>';}else if($row['disetujui'] == 2){echo '<label class="badge bg-red">Tidak<label>';}?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
</div>
</div>

            <div class="modal fade" id="tambahUdzur" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formUdzur" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT DATA UDZUR SHALAT</h4>
                        </div>
                        <div class="modal-body">

                        <!-- <label>Nama Mahasiswa : </label>&nbsp;&nbsp; Adelina <br>
                        <label>Udzur : </label>&nbsp;&nbsp; Izin Syar'i&nbsp;&nbsp; <br>
                        <label>Keterangan : </label>&nbsp;&nbsp;Nenek Meninggal&nbsp;&nbsp; <br>
                        <label>Tanggal Pengajuan Udzur : </label>&nbsp;&nbsp; 23 Okt 2018&nbsp;&nbsp; <br><br>

                        &nbsp;&nbsp;<label>Udzur tidak hadir pada,</label><br>
                        &nbsp;&nbsp;<label>Tahsin/Tahfidz : </label>&nbsp;&nbsp; Ba'da Shubuh <br>
                        &nbsp;&nbsp;<label>Tanggal Pelaksanaan Tahsin/Tahfidz : </label>&nbsp;&nbsp; 20 Okt 2018&nbsp;&nbsp; <br>
                        &nbsp;&nbsp;<label>Deskripsi Tahsin/Tahfidz : </label>&nbsp;&nbsp;Makhrajul Huruf 3&nbsp;&nbsp; <br><br>

                        <label>Setuju?</label>
                                <input name="udzur" type="radio" class="radiojk" id="sakit" value="Sakit"/>
                                <label for="sakit">Ya</label>&nbsp;&nbsp;

                                <input name="udzur" type="radio" class="radiojk" id="izin" value="Izin"/>
                                <label for="izin">Tidak</label>&nbsp;&nbsp; -->

                                <!-- <input name="udzur" type="radio" class="radiojk" id="haid" value="Haid"/>
                                <label for="sakit">Haid</label>&nbsp;&nbsp; -->
                                <label>Udzur :</label><br>
                                <input name="udzur" type="radio" class="radiojk" id="hujan" value="Hujan" required/>
                                <label for="hujan">Hujan</label>&nbsp;&nbsp;

                                <input name="udzur" type="radio" class="radiojk" id="izin" value="Izin Syar'i"/>
                                <label for="izin">IZIN SYAR'I</label>&nbsp;&nbsp;
                                <?php 
                                  if($gender == 'Akhwat'){
                                    echo '<input name="udzur" type="radio" class="radiojk" id="haid" value="Haid"/>
                                          <label for="radio_32">HAID</label>';
                                  }
                                ?>
                                <br><br>              
                                <div class="form-group multiple-form-group" id="defaultForm">   
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  -->

                                    
                                       
                                      <label>Udzur Untuk Tanggal :</label><br>
                                          <input type="text" class="form-control datepicker" name="tanggal" placeholder="Tanggal Udzur" required/><br>
                                         <!-- <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp; -->
                                     <label>Waktu Shalat :</label><br>
                                          <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="shubuh" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="dzuhur" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="ashar" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="maghrib" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="isya" value="isya">&nbsp;Isya
                                       <!-- <label>Tahsin/Tahfidz :</label>
                                        <select class="form-control show-tick" data-live-search="true" onchange="location = this.value;">
                                          <option selected>-- Pilih Tahsin/Tahfidz & Tanggal --</option>

                                        </select> --><br><br>
                                        <label>Keterangan :</label>
                                          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Udzur" required/><br>
                                          
                                      <!-- <label>Keterangan :</label><br>
                                      <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Udzur"/> -->
                               
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitUdzur">SIMPAN</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    
                  </form>
                </div>
            </div> 
</div>      

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tableUdzur').DataTable({
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        });
      $(document).on('focus', '.datepicker',function(){
          $(this).bootstrapMaterialDatePicker({ weekStart : 0, time: false })
      });
    } );
    </script> 


    <?php 
        if (isset($_POST['submitUdzur'])) {

        
            if(!empty($_POST['shubuh'])) {
              $shubuh_ = 1;
            }else
            if(empty($_POST['shubuh'])) {
              $shubuh_ = 0;
            }

            if(!empty($_POST['dzuhur'])) {
              $dzuhur_ = 1;
            }else
            if(empty($_POST['dzuhur'])) {
              $dzuhur_ = 0;
            }

            if(!empty($_POST['ashar'])) {
              $ashar_ = 1;
            }else
            if(empty($_POST['ashar'])) {
              $ashar_ = 0;
            }

            if(!empty($_POST['maghrib'])) {
              $maghrib_ = 1;
            }else
            if(empty($_POST['maghrib'])) {
              $maghrib_ = 0;
            }

            if(!empty($_POST['isya'])) {
              $isya_ = 1;
            }else
            if(empty($_POST['isya'])) {
              $isya_ = 0;
            }

            tambahUdzurShalat($nim, $_POST['tanggal'], $shubuh_, $dzuhur_, $ashar_, $maghrib_, $isya_, $_POST['udzur'], $_POST['keterangan']);

            // tambahJplg($_POST['tplg1'], $_POST['gender'], $shubuh_, $dzuhur_, $ashar_, $maghrib_, $isya_);
                    

         
            /*if(!empty($_POST['shubuh'])) {
              foreach($_POST['shubuh'] as $shubuh) {
                tambahUdzurShalat($nim, $_POST['tanggal'], $shubuh, $_POST['udzur']);
              }
            }
            if(!empty($_POST['dzuhur'])) {
              foreach($_POST['dzuhur'] as $dzuhur) {
                tambahUdzurShalat($nim, $_POST['tanggal'], $dzuhur, $_POST['udzur']);
              }
            }
            if(!empty($_POST['ashar'])) {
              foreach($_POST['ashar'] as $ashar) {
                tambahUdzurShalat($nim, $_POST['tanggal'], $ashar, $_POST['udzur']);
              }
            }
            if(!empty($_POST['maghrib'])) {
              foreach($_POST['maghrib'] as $maghrib) {
                tambahUdzurShalat($nim, $_POST['tanggal'], $maghrib, $_POST['udzur']);
              }
            }
            if(!empty($_POST['isya'])) {
              foreach($_POST['isya'] as $isya) {
                tambahUdzurShalat($nim, $_POST['tanggal'], $isya, $_POST['udzur']);
              }
            }*/
          

        echo "<script>document.location='index.php?page=udzurslt'</script>";
      }
    ?>