<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];

 ?>

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
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    }); 
};

</script>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA UDZUR TA'LIM &nbsp;&nbsp;&nbsp;
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Tanggal</th>
                                  <th>Udzur</th>
                                  <th>Keterangan</th>
                                  <th>Diajukan</th>
                                  <th>Setujui?</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurTalimRolePembina($idPembina);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                 
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['keterangan']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['disetujui'] == 1){echo 'Disetujui';}else if($row['disetujui'] == 2){echo 'Ditolak';}else if($row['disetujui'] == 0){echo "<a href='#setujuUdzurTalim' data-toggle='modal' class='btn btn-xs bg-green' data-href='action/hapus.php?sudzurtalim=".$row['id_udzur']."'>Ya</a>&nbsp;<a href='#tolakUdzurTalim' data-toggle='modal' class='btn btn-xs bg-red' data-href='action/hapus.php?tudzurtalim=".$row['id_udzur']."'>Tolak</a>";} ?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
  </div>
</div>
</div>   
  

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tableUdzur').DataTable({});
    } );
    </script> 

            <div class="modal fade" id="setujuUdzurTalim" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Setujui Pengajuan Udzur Ta'lim?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-success btn-ok waves-effect">SETUJU</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="modal fade" id="tolakUdzurTalim" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Tolak Pengajuan Udzur Ta'lim?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">TOLAK</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>              