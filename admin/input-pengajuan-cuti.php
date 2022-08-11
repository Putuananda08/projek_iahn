<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">

    <?php include "header.php"; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include "menu.php"; ?>

    <?php include "waktu.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Pengajuan Cuti
          <small>IAHN GDE PUDJA MATARAM</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Pengajuan Cuti</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">

            <!-- TO DO List -->
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Input Data Pengajuan Cuti</h3>
                <div class="box-tools pull-right">
                  <!-- <form action='admin.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                    </form> -->
                </div>
              </div><!-- /.box-header -->
              <?php
              if (isset($_POST['input'])) {
                $nip           = $_POST['nip'];
                $nama          = $_POST['nama'];
                $jabatan       = $_POST['jabatan'];
                $masa_kerja    = $_POST['masa_kerja'];
                $jenis_cuti    = $_POST['jenis_cuti'];
                $alasan_cuti   = $_POST['alasan_cuti'];
                $lama_cuti     = $_POST['lama_cuti'];
                $tanggal_mulai = $_POST['tanggal_mulai'];
                $tanggal_selesai = $_POST['tanggal_selesai'];
                $sisa_cuti_n2  = $_POST['sisa_cuti_n2'];
                $sisa_cuti_n1  = $_POST['sisa_cuti_n1'];
                $sisa_cuti_n   = $_POST['sisa_cuti_n'];
                $keterangan_cuti = $_POST['keterangan_cuti'];
                $alamat_cuti   = $_POST['alamat_cuti'];
                $no_telpon     = $_POST['no_telpon'];

                $sql = "INSERT INTO pengajuan_cuti(nip,nama,jabatan,masa_kerja,jenis_cuti,alasan_cuti,lama_cuti,tanggal_mulai,tanggal_selesai,sisa_cuti_n2,sisa_cuti_n1,sisa_cuti_n,keterangan_cuti,alamat_cuti,no_telpon) VALUES
                  ('$nip','$nama','$jabatan','$masa_kerja','$jenis_cuti','$alasan_cuti','$lama_cuti','$tanggal_mulai','$tanggal_selesai','$sisa_cuti_n2','$sisa_cuti_n1','$sisa_cuti_n','$keterangan_cuti','$alamat_cuti','$no_telpon')";
                $res = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                //echo "Gambar berhasil dikirim ke direktori".$gambar;
                echo "<script>alert('Data berhasil dimasukan!'); window.location = 'pengajuan-cuti.php'</script>";
              }

              ?>
              <div class="box-body">
                <form class="form-horizontal style-form" action="input-pengajuan-cuti.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <input name="nip" type="text" id="nip" class="form-control" placeholder="NIP" autocomplete="off" autofocus="on" required="required" />
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <select name="nip" id="nip" class="form-control select2" required>
                        <option value=""> --- Pilih NIP Anda --- </option>
                        <?php
                        $query2 = "select * from karyawan order by nip";
                        $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                        while ($data1 = mysqli_fetch_array($tampil)) {
                        ?>

                          <option value="<?php echo $data1['nip']; ?>"><?php echo $data1['nip']; ?> </option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Pegawai/Dosen</label>
                    <div class="col-sm-4">
                      <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Pegawai/Dosen" autocomplete="off" required />

                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data Pegawai/Dosen</label>
                    <div class="col-sm-4">
                      <select name="nama" id="nama" class="form-control select2" required>
                        <option value=""> --- Data Pegawai/Dosen --- </option>
                        <?php
                        $query2 = "select * from karyawan order by nama";
                        $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                        while ($data1 = mysqli_fetch_array($tampil)) {
                        ?>



                          <option value="<?php echo $data1['nama']; ?>"><?php echo $data1['nama']; ?> </option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                      <input name="jabatan" type="text" id="jabatan" class="form-control" placeholder="Jabatan" autocomplete="off" required />

                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                      <select name="jabatan" id="jabatan" class="form-control select2" required>
                        <option value=""> --- Pilih Jabatan Anda --- </option>
                        <?php
                        $query2 = "select * from jabatan order by jabatan";
                        $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                        while ($data1 = mysqli_fetch_array($tampil)) {
                        ?>



                          <option value="<?php echo $data1['jabatan']; ?>"><?php echo $data1['jabatan']; ?> </option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
                    <div class="col-sm-4">
                      <input name="masa_kerja" type="text" id="masa_kerja" class="form-control" placeholder="Masa Kerja" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-4">
                      <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                        <option value=""> --- Pilih Jenis Cuti --- </option>
                        <?php
                        $query2 = "select * from jenis_cuti order by id_cuti";
                        $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                        while ($data1 = mysqli_fetch_array($tampil)) {
                        ?>



                          <option value="<?php echo $data1['id_cuti']; ?>.<?php echo $data1['nama_cuti']; ?>"><?php echo $data1['id_cuti']; ?>. <?php echo $data1['nama_cuti']; ?></option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alasan Cuti</label>
                    <div class="col-sm-4">
                      <input name="alasan_cuti" type="text" id="alasan_cuti" class="form-control" placeholder="Alasan Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Lama Cuti</label>
                    <div class="col-sm-4">
                      <input name="lama_cuti" type="text" id="lama_cuti" class="form-control" placeholder="Lama Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
                    <div class="col-sm-4">
                      <input name="tanggal_mulai" type="date" id="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
                    <div class="col-sm-4">
                      <input name="tanggal_selesai" type="date" id="tanggal_selesai" class="form-control" placeholder="Tanggal Selesai" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N2</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n2" type="text" id="sisa_cuti_n2" class="form-control" placeholder="Sisa Cuti N2" autocomplete="off" required />

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N1</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n1" type="text" id="sisa_cuti_n1" class="form-control" placeholder="Sisa Cuti N1" autocomplete="off" required />

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n" type="text" id="sisa_cuti_n" class="form-control" placeholder="Sisa Cuti N" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan Cuti</label>
                    <div class="col-sm-4">
                      <input name="keterangan_cuti" type="text" id="keterangan_cuti" class="form-control" placeholder="Keterangan Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat Cuti</label>
                    <div class="col-sm-4">
                      <input name="alamat_cuti" type="text" id="alamat_cuti" class="form-control" placeholder="Alamat Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Telpon</label>
                    <div class="col-sm-4">
                      <input name="no_telpon" type="text" id="no_telpon" class="form-control" placeholder="No Telpon" autocomplete="off" required />

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                      <a href="pengajuan-cuti.php" class="btn btn-sm btn-danger">Batal </a>
                    </div>
                  </div>
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->

          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "footer.php"; ?>

    <?php include "sidecontrol.php"; ?>
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

  <script src="../plugins/select2/select2.full.min.js"></script>

  <script>
    //options method for call datepicker
    $(".input-group.date").datepicker({
      autoclose: true,
      todayHighlight: true
    });
  </script>

  <script>
    $(function() {
      $(".select2").select2();
    });
  </script>
</body>

</html>