<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src=<?php echo "assets/img/user/".$_SESSION['ava']; ?> width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama']; ?></div>
                    <div class="email"><?php echo $_SESSION['rolename']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="?page=profil" style="color:#3C8DBC;"><i class="material-icons">person</i>Profil</a></li>
                            <li role="seperator" class="divider"></li> -->
                            <li><a href="#ModalLogout" data-toggle='modal' style='color:#DD4B39;'><i class="material-icons">power_settings_new</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">HOME</li>
                    <li <?php 
                          if ($_SERVER['REQUEST_URI'] == '/gmatrik/index.php') {
                             echo "class='active'";
                          }
                        ?>
                    ><a href="index.php">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">PROGRAM PEMBINAAN</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'importshalat' || $_GET['page'] == 'pekanshalat' || $_GET['page'] == 'nilaishalat' || $_GET['page'] == 'udzurslt') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">watch_later</i>
                            <span>Shalat</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekanshalat' || $_GET['page'] == 'nilaishalat') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pekanshalat">Nilai Presensi Shalat</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurslt') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurslt">Data Udzur Shalat</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talim' || $_GET['page'] == 'presensitalim' || $_GET['page'] == 'inputtalim' || $_GET['page'] == 'udzurtalim' || $_GET['page'] == 'pekantalim' || $_GET['page'] == 'nilaitalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ta'lim</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekantalim' || $_GET['page'] == 'nilaitalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=pekantalim">Nilai Presensi Ta'lim</a>
                            </li>
                            <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'talim' || $_GET['page'] == 'presensitalim' || $_GET['page'] == 'inputtalim') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=talim">Data Ta'lim</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurtalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurtalim">Data Udzur Ta'lim</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'inputtahsin' || $_GET['page'] == 'tahsin' || $_GET['page'] == 'presensitahsin' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'tahsinprt' || $_GET['page'] == 'targethafalan' || $_GET['page'] == 'setor' || $_GET['page'] == 'hafalanm' || $_GET['page'] == 'hafalans' || $_GET['page'] == 'pekantahsin' || $_GET['page'] == 'nilaitahsin') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">import_contacts</i>
                            <span>Tahsin/Tahfidz</span>
                        </a>
                        <ul class="ml-menu">
                          <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekantahsin' || $_GET['page'] == 'nilaitahsin') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=pekantahsin">Nilai Presensi Tahsin/Tahfidz</a>

                            <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'tahsin' || $_GET['page'] == 'presensitahsin' || $_GET['page'] == 'inputtahsin') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=tahsin">Data Tahsin/Tahfidz</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurtahsin') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurtahsin">Data Udzur Tahsin/Tahfidz</a>
                            </li>
                        </ul>
                        <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'pekantotal' || $_GET['page'] == 'nilaitotal') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Nilai Total</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekantotal' || $_GET['page'] == 'nilaitotal') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pekantotal">Nilai Presensi Total</a>
                            </li>
                        </ul>
                    </li>
                    </li>

                    <li class="header">ADMINISTRATIF</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'jplg') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                        >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">card_travel</i>
                            <span>Jadwal Kepulangan</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'jplg' || $_GET['page'] == 'jplgdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=jplg">Data Jadwal Pulang</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'pekan') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                        >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">calendar_today</i>
                            <span>Pekan</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=pekan">Data Pekan</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'semester') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>Semester</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'semester') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=semester">Data Semester</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="header">PENGGUNA</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'ubahpassword') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_identity</i>
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'ubahpassword') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=ubahpassword" data-toggle="modal">Ubah Password Saya</a>
                            </li>
                        </ul>
                    </li><br><br>
                    <li class="header"></li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
           <!--  <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div> -->
            <!-- #Footer -->
</aside>

<section class="content">

    <?php  
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'mahasiswa') {
              include 'mahasiswa/mahasiswa.php';
            } else if ($_GET['page'] == 'profil') {
              include 'profil.php';
            } else if ($_GET['page'] == 'editprofil') {
              include 'profil_edit.php';
            } else if ($_GET['page'] == 'mahasiswadetails') {
              include 'mahasiswa/mahasiswa_detail.php';
            } else if ($_GET['page'] == 'editmahasiswa') {
              include 'mahasiswa/mahasiswa_edit.php';
            } else if ($_GET['page'] == 'bypembina') {
              include 'bypembina.php';
            } else if ($_GET['page'] == 'bypembinadetail') {
              include 'bypembinadetail.php';
            } else if ($_GET['page'] == 'tambahbinaan') {
              include 'pembina/pembina_tambahbinaan.php';
            } else if ($_GET['page'] == 'shalat') {
              include 'shalat.php';
            } else if ($_GET['page'] == 'udzurslt') {
              include 'shalat/udzur.php';
            } else if ($_GET['page'] == 'udzursltdetail') {
              include 'shalat/udzur_detail.php';
            } else if ($_GET['page'] == 'manualslt') {
              include 'shalat/manual.php';
            } else if ($_GET['page'] == 'manualsltdetail') {
              include 'shalat/manual_detail.php';
            } else if ($_GET['page'] == 'pbentuk') {
              include 'pelanggaran/pbentuk.php';
            } else if ($_GET['page'] == 'paksi') {
              include 'pelanggaran/paksi.php';
            } else if ($_GET['page'] == 'psanksi') {
              include 'pelanggaran/psanksi.php';
            } else if ($_GET['page'] == 'planjut') {
              include 'pelanggaran/planjut.php';
            } else if ($_GET['page'] == 'pikhtisar') {
            include 'pelanggaran/pikhtisar.php';
	          } else if ($_GET['page'] == 'pmaindetail') {
	            include 'pelanggaran/pikhtisar_detail.php';
	          } else if ($_GET['page'] == 'pbentukdetail') {
	            include 'pelanggaran/pbentuk_detail.php';
	          } else if ($_GET['page'] == 'paksidetail') {
	            include 'pelanggaran/paksi_detail.php';
	          } else if ($_GET['page'] == 'psanksidetail') {
	            include 'pelanggaran/psanksi_detail.php';
	          } else if ($_GET['page'] == 'planjutdetail') {
	            include 'pelanggaran/planjut_detail.php';
	          } else if ($_GET['page'] == 'udzurtahsin') {
              include 'tahsin/udzur.php';
            } else if ($_GET['page'] == 'udzurtalim') {
              include 'talim/udzur.php';
            } else if ($_GET['page'] == 'ubahpassword') {
              include 'user/ubahpassword.php';
            } else if ($_GET['page'] == 'pekanshalat') {
              include 'shalat/pekan_shalat.php';
            } else if ($_GET['page'] == 'nilaishalat') {
              include 'shalat/nilai_shalat.php';
            } else if ($_GET['page'] == 'nilaitalim') {
              include 'talim/nilai_talim.php';
            } else if ($_GET['page'] == 'talim') {
              include 'talim/talim.php';
            } else if ($_GET['page'] == 'nilaitahsin') {
              include 'tahsin/nilai_tahsin.php';
            } else if ($_GET['page'] == 'tahsin') {
              include 'tahsin/tahsin.php';
            } else if ($_GET['page'] == 'pekantalim') {
              include 'talim/pekan_talim.php';
            } else if ($_GET['page'] == 'pekantahsin') {
              include 'tahsin/pekan_tahsin.php';
            } else if ($_GET['page'] == 'pekantotal') {
              include 'total/pekan_total.php';
            } else if ($_GET['page'] == 'nilaitotal') {
              include 'total/nilai_total.php';
            } else if ($_GET['page'] == 'pekan') {
              include 'pekan/pekan.php';
            } else if ($_GET['page'] == 'semester') {
              include 'semester/semester.php';
            } else if ($_GET['page'] == 'jplg') {
              include 'shalat/jplg.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>