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
          <li class="active">Cuti</li>
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
                <h3 class="box-title">Edit Data Cuti</h3>
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

              $row = $db->get_row("SELECT * FROM cuti WHERE nip='$kd'");
              $sql = mysqli_query($koneksi, "SELECT * FROM cuti WHERE nip='$kd'");
              // 
              if (mysqli_num_rows($sql) > 0) {

                $row = mysqli_fetch_assoc($sql);
              }
              if (isset($_POST['update'])) {

                // benerin edit nip sama atasan langsung
                $nip           = $_POST['nip'];
                $jabatan       = $_POST['jabatan'];
                $masa_kerja    = $_POST['masa_kerja'];
                $alasan_cuti   = $_POST['alasan_cuti'];
                $tanggal_mulai = $_POST['tanggal_mulai'];
                $tanggal_selesai = $_POST['tanggal_selesai'];
                $lama_cuti     = $_POST['lama_cuti'];
                $sisa_n1     = $_POST['sisa_n1'];
                $sisa_n2     = $_POST['sisa_n2'];
                $jenis_cuti    = $_POST['jenis_cuti'];
                $keterangan_cuti = $_POST['keterangan_cuti'];
                $alamat_cuti   = $_POST['alamat_cuti'];
                $no_telpon     = $_POST['no_telpon'];
                $nip_atasan_langsung = $_POST['nip_atasan_langsung'];



                $sql = "UPDATE cuti SET nip='$nip', jabatan='$jabatan', masa_kerja='$masa_kerja', alasan_cuti='$alasan_cuti', tanggal_mulai='$tanggal_mulai',  tanggal_selesai='$tanggal_selesai', lama_cuti='$lama_cuti', sisa_n1='$sisa_n1', sisa_n2='$sisa_n2', jenis_cuti='$jenis_cuti', keterangan_cuti='$keterangan_cuti', alamat_cuti='$alamat_cuti', no_telpon='$no_telpon', nip_atasan_langsung='$nip_atasan_langsung'  WHERE nip='$kd'";
                $res = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                //echo "Gambar berhasil dikirim ke direktori".$gambar;
                echo "<script>alert('Data Cuti berhasil dimasukan!'); window.location = 'cuti.php'</script>";
              }
              ?>
              <div class="box-body">
                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <?php
                  $datanip = array();
                  $ambil = $koneksi->query("SELECT * FROM karyawan WHERE nip='$kd'");
                  while ($tiap = $ambil->fetch_assoc()) {
                    $datanip[] = $tiap;
                  }
                  ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="nip">
                        <?php foreach ($datanip as $key => $value) : ?>

                          <option value="<?php echo $value["nip"] ?>" <?php if ($row["nip"] == $value["nip"]) {
                                                                        echo "selected";
                                                                      } ?>><?php echo $value["nip"] ?> - <?php echo $value["nama"] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                      <input name="jabatan" type="text" id="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" placeholder="Jabatan.." autocomplete="off" required />
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
                    <textarea name="alasan_cuti" id="alasan_cuti" class="form-control" placeholder="Alasan Cuti.." required autocomplete="off"><?php echo $row['alasan_cuti']; ?></textarea>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
                    <div class="col-sm-4">
                      <input readonly="true" type='text' class="form-control" value="<?php echo $row['tanggal_mulai']; ?>" name='tanggal_mulai' id="tanggal_mulai" placeholder='Tanggal Mulai' required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
                    <div class="col-sm-4">
                      <input readonly type='text'class="form-control" value="<?php echo $row['tanggal_selesai']; ?>" name='tanggal_selesai' id="tanggal_selesai" placeholder='Tanggal Selesai' required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Lama Cuti</label>
                    <div class="col-sm-2">
                      <input readonly name="lama_cuti" type="text" id="lama_cuti" class="form-control text-center" value="<?php echo $row['lama_cuti']; ?>"  autocomplete="off" required />
                    </div>
                    <div class="col-sm-2">
                      <input readonly type="text"  class="form-control text-center" value="Hari"  autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-1</label>
                    <div class="col-sm-2">
                      <input readonly name="sisa_n1" type="text" id="sisa_n1" class="form-control text-center" value="<?php echo $row['sisa_n1']; ?>"  autocomplete="off" required />
                    </div>
                    <div class="col-sm-2">
                      <input readonly type="text"  class="form-control text-center" value="Hari"  autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-2</label>
                    <div class="col-sm-2">
                      <input readonly name="sisa_n2" type="text" id="sisa_n2" class="form-control text-center" value="<?php echo $row['sisa_n2']; ?>"  autocomplete="off" required />
                    </div>
                    <div class="col-sm-2">
                      <input readonly type="text"  class="form-control text-center" value="Hari"  autocomplete="off" required />
                    </div>
                  </div>
                  <?php
                  $datajenis = array();
                  $ambil = $koneksi->query("SELECT * FROM jenis_cuti");
                  while ($tiaps = $ambil->fetch_assoc()) {
                    $datajenis[] = $tiaps;
                  }
                  ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti test</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="jenis_cuti">
                        <?php foreach ($datajenis as $key => $value) : ?>

                          <option value="<?php echo $value["nama_cuti"] ?>" <?php if ($row["jenis_cuti"] == $value["nama_cuti"]) {
                                                                              echo "selected";
                                                                            } ?>><?php echo $value["id_cuti"] ?>.<?php echo $value["nama_cuti"] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan Cuti</label>
                    <div class="col-sm-4">
                    <textarea name="keterangan_cuti" id="keterangan_cuti" class="form-control" placeholder="Keterangan Cuti.." required autocomplete="off"><?php echo $row['keterangan_cuti']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat Cuti</label>
                    <div class="col-sm-4">
                    <textarea name="alamat_cuti" id="alamat_cuti" class="form-control" placeholder="Alamat Cuti.." required autocomplete="off"><?php echo $row['alamat_cuti']; ?></textarea>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Telpon</label>
                    <div class="col-sm-4">
                      <input name="no_telpon" type="number" id="no_telpon" class="form-control" value="<?php echo $row['no_telpon']; ?>" placeholder="No Telpon " autocomplete="off" required />

                    </div>
                  </div>
                  <?php
                  $datacuti = array();
                  $ambil = $koneksi->query("SELECT * FROM atasan");
                  while ($tiap = $ambil->fetch_assoc()) {
                    $datacuti[] = $tiap;
                  }
                  ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP & Nama Atasan</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="nip_atasan_langsung">
                        <?php foreach ($datacuti as $key => $value) : ?>

                          <option value="<?php echo $value["nip_atasan"] ?>" <?php if ($row["nip_atasan_langsung"] == $value["nip_atasan"]) {
                                                                                echo "selected";
                                                                              } ?>><?php echo $value["nip_atasan"] ?> - <?php echo $value["nama_atasan"] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                      <a href="cuti.php" class="btn btn-sm btn-danger">Batal </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>
    <?php include "footer.php"; ?>
    <?php include "sidecontrol.php"; ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <script src="../dist/js/app.min.js"></script>
  <script src="../dist/js/demo.js"></script>
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="../plugins/select2/select2.full.min.js"></script>
  <script>
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