<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['gambar']; ?>" height="110" width="160" style="border: 2px solid white;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <p><i class="fa fa-circle text-success"></i><small>&nbsp;&nbsp;<?php echo $_SESSION['status']; ?></small></p>
            </div>
            <br>
            <br>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i><span>Dashboard</span>
              </a>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Pegawai/Dosen</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="karyawan.php"><i class="fa fa-circle-o"></i> Pegawai/Dosen</a></li>
              </ul>
            </li>
            
            <?php 
            $tampil=mysqli_query($koneksi, "select * from cuti order by nip desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
            <li>
              <a href="#">
                <i class="fa fa-upload"></i> <span>Pengajuan Cuti</span>
                <small class="label pull-right bg-yellow"><?php echo $total; ?></small>
              </a>
              <ul class="treeview-menu">
                <li><a href="cuti.php"><i class="fa fa-circle-o"></i> Data Cuti </a></li>
                <li><a href="input-cuti.php"><i class="fa fa-circle-o"></i> Input Cuti </a></li>
              </ul>
            </li>
            
            <!-- <li>
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Cuti</a></li>
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Detail Cuti</a></li>
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Balance Cuti</a></li>
                <li><a href="404.php" target="_blank"><i class="fa fa-circle-o"></i> Cetak Karyawan</a></li>
              </ul>
            </li> -->
        </section>
        <!-- /.sidebar -->
      </aside>