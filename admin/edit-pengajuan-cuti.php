<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<?php include "funcion.php"; ?>

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
                <h3 class="box-title">Edit Data Pengajuan Cuti</h3>
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

              $kd = $_GET['id'];
              $row = $db->get_row("SELECT * FROM pengajuan_cuti WHERE nip='$kd'");
              $sql = mysqli_query($koneksi, "SELECT * FROM pengajuan_cuti WHERE nip='$kd'");
              if (mysqli_num_rows($sql) == 0) {
                header("Location: pengajuan-cuti.php");
              } else {
                $row = mysqli_fetch_assoc($sql);
              }
              if (isset($_POST['update'])) {


                $nip           = $_POST['nip'];
                $nama          = $_POST['nama'];
                $jabatan       = $_POST['jabatan'];
                $masa_kerja    = $_POST['masa_kerja'];
                $alasan_cuti   = $_POST['alasan_cuti'];
                $jenis_cuti    = $_POST['jenis_cuti'];
                $lama_cuti     = $_POST['lama_cuti'];
                $tanggal_mulai = $_POST['tanggal_mulai'];
                $tanggal_selesai = $_POST['tanggal_selesai'];
                $sisa_cuti_n2   = $_POST['sisa_cuti_n2'];
                $sisa_cuti_n1   = $_POST['sisa_cuti_n1'];
                $sisa_cuti_n   = $_POST['sisa_cuti_n'];
                $keterangan_cuti = $_POST['keterangan_cuti'];
                $alamat_cuti   = $_POST['alamat_cuti'];
                $no_telpon     = $_POST['no_telpon'];


                $sql = "UPDATE pengajuan_cuti SET nama='$nama', jabatan='$jabatan', masa_kerja='$masa_kerja', alasan_cuti='$alasan_cuti', jenis_cuti='$jenis_cuti', lama_cuti='$lama_cuti',  tanggal_mulai='$tanggal_mulai',  tanggal_selesai='$tanggal_selesai',  sisa_cuti_n2='$sisa_cuti_n2', sisa_cuti_n1='$sisa_cuti_n1', sisa_cuti_n='$sisa_cuti_n', keterangan_cuti='$keterangan_cuti', alamat_cuti='$alamat_cuti', no_telpon='$no_telpon' WHERE nip='$kd'";
                $res = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                //echo "Gambar berhasil dikirim ke direktori".$gambar;
                echo "<script>alert('Data Pengajaun Cuti berhasil dimasukan!'); window.location = 'pengajuan-cuti.php'</script>";
              }



              //if(isset($_GET['pesan']) == 'sukses'){
              //	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
              //}
              ?>
              <div class="box-body">
                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <input name="nip" type="text" id="nip" class="form-control" placeholder="NIP" value="<?php echo $row['nip']; ?>" autocomplete="off" autofocus="on" required="required" />
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <select name="nip" id="nip" class="form-control select2" required>
                        <?= get_nip_option($row->nip) ?>
                      </select>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Pegawai/Dosen</label>
                    <div class="col-sm-4">
                      <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="Nama Pegawai/Dosen" autocomplete="off" required />

                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Pegawai/Dosen</label>
                    <div class="col-sm-4">
                      <select name="nama" id="nama" class="form-control select2" required>
                        <?= get_nama_option($row->nama) ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                      <select name="jabatan" id="jabatan" class="form-control select2" required>
                        <?= get_jabatan_option($row->jabatan) ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
                    <div class="col-sm-4">
                      <input name="masa_kerja" type="text" id="masa_kerja" class="form-control" value="<?php echo $row['masa_kerja']; ?>" placeholder="Masa Kerja" autocomplete="off" required />

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alasan Cuti</label>
                    <div class="col-sm-4">
                      <input name="alasan_cuti" type="text" id="alasan_cuti" class="form-control" value="<?php echo $row['alasan_cuti']; ?>" placeholder="Alasan Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-4">
                      <select name="jenis_cuti" id="jenis_cuti" class="form-control" required="required">
                        <option value="">----- Pilih Status -----</option>
                        <?php $jenis_cuti = $row['jenis_cuti']; ?>
                        <option <?= ($jenis_cuti == '1.Cuti Tahunan') ? 'selected="selected"' : '' ?>>1.Cuti Tahunan</option>
                        <option <?= ($jenis_cuti == '2.Cuti Besar') ? 'selected="selected"' : '' ?>>2.Cuti Besar</option>
                        <option <?= ($jenis_cuti == '3.Cuti Sakit') ? 'selected="selected"' : '' ?>>3.Cuti Sakit</option>
                        <option <?= ($jenis_cuti == '4.Cuti Melahirkan') ? 'selected="selected"' : '' ?>>4.Cuti Melahirkan</option>
                        <option <?= ($jenis_cuti == '5.Cuti Karena Alasan Penting') ? 'selected="selected"' : '' ?>>5.Cuti Karena Alasan Penting</option>
                        <option <?= ($jenis_cuti == '6.Cuti Di Luar Tanggungan Negara ') ? 'selected="selected"' : '' ?>>6.Cuti Di Luar Tanggungan Negara</option>

                      </select>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-4">
                      <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                        <?= get_jenis_cuti_option($row->nama_cuti) ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                      <select name="jabatan" id="jabatan" class="form-control select2" required>
                        <?= get_jabatan_option($row->jabatan) ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Lama Cuti</label>
                    <div class="col-sm-4">
                      <input name="lama_cuti" type="text" id="lama_cuti" class="form-control" value="<?php echo $row['lama_cuti']; ?>" placeholder="Lama Cuti" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" value="<?php echo $row['tanggal_mulai']; ?>" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_mulai' id="tanggal_mulai" placeholder='Tanggal Mulai' required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" value="<?php echo $row['tanggal_selesai']; ?>" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_selesai' id="tanggal_selesai" placeholder='Tanggal Selesai' required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-2</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n2" type="text" id="sisa_cuti_n2" class="form-control" value="<?php echo $row['sisa_cuti_n2']; ?>" placeholder="Sisa Cuti N-2" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-1</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n1" type="text" id="sisa_cuti_n1" class="form-control" value="<?php echo $row['sisa_cuti_n1']; ?>" placeholder="Sisa Cuti N-1" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N</label>
                    <div class="col-sm-4">
                      <input name="sisa_cuti_n" type="text" id="sisa_cuti_n" class="form-control" value="<?php echo $row['sisa_cuti_n']; ?>" placeholder="Sisa Cuti N" autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan Cuti</label>
                    <div class="col-sm-4">
                      <input name="keterangan_cuti" type="text" id="keterangan_cuti" class="form-control" value="<?php echo $row['keterangan_cuti']; ?>" placeholder="Keterangan Cuti " autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat Cuti</label>
                    <div class="col-sm-4">
                      <input name="alamat_cuti" type="text" id="alamat_cuti" class="form-control" value="<?php echo $row['alamat_cuti']; ?>" placeholder="Alamat Cuti " autocomplete="off" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Telpon</label>
                    <div class="col-sm-4">
                      <input name="no_telpon" type="text" id="no_telpon" class="form-control" value="<?php echo $row['no_telpon']; ?>" placeholder="No Telpon " autocomplete="off" required />

                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
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