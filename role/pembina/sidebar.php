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
                            <li><a href="?page=profil" style="color:#3C8DBC;"><i class="material-icons">person</i>Profil</a></li>
                            <li role="seperator" class="divider"></li>
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
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'udzurslt' || $_GET['page'] == 'udzursltrev' || $_GET['page'] == 'manualslt' || $_GET['page'] == 'manualsltdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">watch_later</i>
                            <span>Shalat Wajib</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalat') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=shalat">Ikhtisar</a>
                            </li>
                            <li>
                                <a href="pages/ui/animations.html">...</a>
                            </li>
                            <li>
                                <a href="pages/ui/badges.html">...</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurslt' || $_GET['page'] == 'udzursltrev') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurslt">Udzur</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'manualslt' || $_GET['page'] == 'manualsltdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=manualslt">Presensi Manual</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talim' || $_GET['page'] == 'presensitalim' || $_GET['page'] == 'inputtalim' || $_GET['page'] == 'udzurtalim') {
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
                                            if ($_GET['page'] == 'talim' || $_GET['page'] == 'presensitalim' || $_GET['page'] == 'inputtalim') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=talim">
                                            <span>Data Ta'lim</span>
                                        </a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurtalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurtalim">
                                    <span>Data Udzur Ta'lim</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'inputtahsin' || $_GET['page'] == 'tahsin' || $_GET['page'] == 'presensitahsin' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'tahsinprt' || $_GET['page'] == 'targethafalan' || $_GET['page'] == 'setor' || $_GET['page'] == 'hafalanm' || $_GET['page'] == 'hafalans') {
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
                                            if ($_GET['page'] == 'tahsin' || $_GET['page'] == 'presensitahsin' || $_GET['page'] == 'inputtahsin') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=tahsin">
                                            <span>Data Tahsin/Tahfidz</span>
                                        </a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurtahsin') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurtahsin">
                                    <span>Data Udzur Tahsin/Tahfidz</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">BINAAN</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
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
                            ><a href="?page=mahasiswa">Data Mahasiswa Binaan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">PROFIL</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Profil</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=profil">Profil Saya</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
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
              include 'shalat/shalat.php';
            } else if ($_GET['page'] == 'udzurslt') {
              include 'shalat/udzur.php';
            } else if ($_GET['page'] == 'manualslt') {
              include 'shalat/manual.php';
            } else if ($_GET['page'] == 'manualsltdetail') {
              include 'shalat/manual_detail.php';
            } else if ($_GET['page'] == 'udzursltrev') {
              include 'shalat/udzur_review.php';
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
            } else if ($_GET['page'] == 'tambahpelanggaran') {
              include 'pelanggaran/tambah.php';
            } else if ($_GET['page'] == 'inputtahsin') {
              include 'tahsin/input_presensi.php';
            } else if ($_GET['page'] == 'tahsin') {
              include 'tahsin/tahsin.php';
            } else if ($_GET['page'] == 'presensitahsin') {
              include 'tahsin/tahsin_presensi.php';
            } else if ($_GET['page'] == 'udzurtahsin') {
              include 'tahsin/udzur.php';
            } else if ($_GET['page'] == 'tahsinprt') {
              include 'tahsin/tahsin_bypertemuan.php';
            } else if ($_GET['page'] == 'targethafalan') {
              include 'tahsin/hafalan/target.php';
            } else if ($_GET['page'] == 'setor') {
              include 'tahsin/hafalan/setor.php';
            } else if ($_GET['page'] == 'hafalanm') {
              include 'tahsin/hafalan/hafalan_bymhs.php';
            } else if ($_GET['page'] == 'hafalans') {
              include 'tahsin/hafalan/hafalan_bysurah.php';
            } else if ($_GET['page'] == 'talim') {
              include 'talim/talim.php';
            } else if ($_GET['page'] == 'inputtalim') {
              include 'talim/input_presensi.php';
            } else if ($_GET['page'] == 'presensitalim') {
              include 'talim/talim_presensi.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>