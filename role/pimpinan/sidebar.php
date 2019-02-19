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
                                    if ($_GET['page'] == 'importshalat' || $_GET['page'] == 'pekanshalat' || $_GET['page'] == 'nilaishalat') {
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
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekantalim' || $_GET['page'] == 'nilaitalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
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
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pekantahsin' || $_GET['page'] == 'nilaitahsin') {
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
                            if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Pembina Mahasiswa</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pembina">Data Pembina Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa' || $_GET['page'] == 'ortu' || $_GET['page'] == 'ortudetail' || $_GET['page'] == 'editortu') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervised_user_circle</i>
                            <span>Mahasiswa</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=mahasiswa">Data Mahasiswa</a>
                            </li>
                        </ul>
                    </li>

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
                    <!-- <li <?php 
                          /*if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                              echo "class='active'";
                            }
                          }*/
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Profil</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  /*if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                                      echo "class='active'";
                                    }
                                  }*/
                                ?>
                            ><a href="?page=profil">Profil Saya</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
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
            } else if ($_GET['page'] == 'pembina') {
              include 'pembina/pembina.php';
            } else if ($_GET['page'] == 'pembinadetails') {
              include 'pembina/pembina_detail.php';
            } else if ($_GET['page'] == 'editpembina') {
              include 'pembina/pembina_edit.php';
            } else if ($_GET['page'] == 'profil') {
              include 'profil.php';
            } else if ($_GET['page'] == 'targethafalan') {
              include 'tahsin/hafalan/inputtarget.php';
            } else if ($_GET['page'] == 'ubahpassword') {
              include 'user/ubahpassword.php';
            } else if ($_GET['page'] == 'pekanshalat') {
              include 'shalat/pekan_shalat.php';
            } else if ($_GET['page'] == 'nilaishalat') {
              include 'shalat/nilai_shalat.php';
            } else if ($_GET['page'] == 'nilaitalim') {
              include 'talim/nilai_talim.php';
            } else if ($_GET['page'] == 'nilaitahsin') {
              include 'tahsin/nilai_tahsin.php';
            } else if ($_GET['page'] == 'pekantalim') {
              include 'talim/pekan_talim.php';
            } else if ($_GET['page'] == 'pekantahsin') {
              include 'tahsin/pekan_tahsin.php';
            } else if ($_GET['page'] == 'pekantotal') {
              include 'total/pekan_total.php';
            } else if ($_GET['page'] == 'nilaitotal') {
              include 'total/nilai_total.php';
            } else if ($_GET['page'] == 'mahasiswa') {
              include 'mahasiswa/mahasiswa.php';
            } else if ($_GET['page'] == 'pembina') {
              include 'pembina/pembina.php';
            } else if ($_GET['page'] == 'pekan') {
              include 'pekan/pekan.php';
            } else if ($_GET['page'] == 'semester') {
              include 'semester/semester.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>