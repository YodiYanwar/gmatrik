<?php 

  include 'functions.php';

?>

<div class="row clearfix">
                <div class="col-md-6">

            <?php 
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'passchanged') {
                echo "<div class='alert bg-green'>Password berhasil diubah !</div> ";
                }
              }
             ?>

                    <div class="card">
                        <div class="header">
                            <h2>UBAH PASSWORD
                            </h2>
                        </div>
                        <div class="body">
                          <form method="POST">
                                    <div class="input-group">

                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="pass" id="pwinput2" pattern=".{0}|.{8,}" title="8 Karakter Minimal" placeholder="Masukan Password Baru" required>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="passConf" id="pwinput3" pattern=".{0}|.{8,}" title="8 Karakter Minimal" placeholder="Konfirmasi Password Baru" required>
                                        </div>
                                    </div>
                                    
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="gantiPass" ><span>UBAH</span></button>
                                  </form>
                                </div>
                    </div>
                </div>
  </div>
</div>           

<?php 
  if (isset($_POST['gantiPass'])) {
    gantiUserPassword($_SESSION['id_user'], $_POST['pass']);
    echo "<script>document.location='?page=ubahpassword&alert=passchanged'</script>";
  }

 ?>   