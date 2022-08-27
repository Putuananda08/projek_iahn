<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <?php include "header.php"; ?>
    <?php include "menu.php"; ?>
    <?php include "waktu.php"; ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Pengajuan Cuti
          <small>Human Resource Management System</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Pengajuan Cuti</li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Input Data Pengajuan Cuti</h3>
              </div>
              <?php
              if (isset($_POST['simpan'])) {
                $kode          = $_POST['kode'];
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

                $sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip='$nip'");
                if (mysqli_num_rows($sql) == 0) {
                  header("Location: cuti.php");
                } else {
                  $row = mysqli_fetch_assoc($sql);
                }

                $jumlah_cuti = $row['jumlah_cuti'];
                $nama = $row['nama'];

                if ($jumlah_cuti == 0) {
                  echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'cuti.php'</script>";
                } else if ($jumlah_cuti <= 0) {
                  echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'cuti.php'</script>";
                } else {

                  $query = mysqli_query($koneksi, "INSERT INTO cuti (kode, nip, jabatan, masa_kerja, alasan_cuti, tanggal_mulai, tanggal_selesai, lama_cuti,sisa_n1, sisa_n2, jenis_cuti, keterangan_cuti, alamat_cuti, no_telpon, nip_atasan_langsung) VALUES 
('$kode','$nip','$jabatan','$masa_kerja','$alasan_cuti','$tanggal_mulai','$tanggal_selesai','$lama_cuti','$sisa_n1','$sisa_n2','$jenis_cuti','$keterangan_cuti','$alamat_cuti','$no_telpon','$nip_atasan_langsung')");

                  $qu     = mysqli_query($koneksi, "UPDATE karyawan SET jumlah_cuti=(jumlah_cuti-'$lama_cuti') WHERE nip='$nip'");
                  if ($query && $qu) {
                    echo "<script>alert('cuti $nama berhasil di buat!'); window.location = 'cuti.php'</script>";
                  } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                  }
                }
              }

              ?>
              <div class="box-body">
                <div class="form-panel">
                  <form class="form-horizontal style-form" action="input-cuti.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                      <div class="col-sm-4">
                        <input name="kode" type="text" id="kode" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a = "CT";
                                                                                                                              $b = rand(1000, 10000);
                                                                                                                              $c = $a . $b;
                                                                                                                              echo $c; ?>" readonly="readonly" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Pegawai/Dosen</label>
                      <div class="col-sm-4">
                        <select name="nip" id="nip" class="form-control select2" required>
                          <option value=""> --- Pilih NIP dan Nama Pegawai/Dosen --- </option>
                          <?php
                          $query2 = "select * from karyawan order by nip";
                          $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                          while ($data1 = mysqli_fetch_array($tampil)) {
                          ?>
                            <option value="<?php echo $data1['nip']; ?>"><?php echo $data1['nip']; ?> - <?php echo $data1['nama']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-4">
                        <input name="jabatan" type="text" id="jabatan" class="form-control" placeholder="Jabatan.." autocomplete="off" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
                      <div class="col-sm-4">
                        <input name="masa_kerja" type="text" id="masa_kerja" class="form-control" placeholder="Masa Kerja.." autocomplete="off" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Alasan Cuti</label>
                      <div class="col-sm-4">
                        <textarea name="alasan_cuti" id="alasan_cuti" class="form-control" placeholder="Alasan Cuti.." required autocomplete="off"></textarea>
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
                      <label class="col-sm-2 col-sm-2 control-label">Lama Cuti</label>
                      <div class="col-sm-2">
                        <input name="lama_cuti" type="number" id="lama_cuti" class="form-control text-center" placeholder="Lama Cuti" autocomplete="off" required />
                      </div>
                      <div class="col-sm-2">
                        <input readonly type="text" class="form-control text-center" value="Hari" autocomplete="off" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-1</label>
                      <div class="col-sm-2">
                        <input name="sisa_n1" type="number" id="sisa_n1" class="form-control text-center" placeholder="Sisa Cuti N-1" autocomplete="off" required />
                      </div>
                      <div class="col-sm-2">
                        <input readonly type="text" class="form-control text-center" value="Hari" autocomplete="off" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Sisa Cuti N-2</label>
                      <div class="col-sm-2">
                        <input name="sisa_n2" type="number" id="sisa_n2" class="form-control text-center" placeholder="Sisa Cuti N-2" autocomplete="off" required />
                      </div>
                      <div class="col-sm-2">
                        <input readonly type="text" class="form-control text-center" value="Hari" autocomplete="off" required />
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
                            <option value="<?php echo $data1['nama_cuti']; ?>"><?php echo $data1['id_cuti']; ?>.<?php echo $data1['nama_cuti']; ?></option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Keterangan Cuti</label>
                      <div class="col-sm-4">
                        <textarea name="keterangan_cuti" id="keterangan_cuti" class="form-control" placeholder="Keterangan Cuti.." required autocomplete="off"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Alamat Cuti</label>
                      <div class="col-sm-4">
                        <textarea name="alamat_cuti" id="alamat_cuti" class="form-control" placeholder="Alamat Cuti.." required autocomplete="off"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">No Telpon</label>
                      <div class="col-sm-4">
                        <input name="no_telpon" type="number" id="no_telpon" class="form-control" placeholder="No Telpon" autocomplete="off" required />

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Atasan</label>
                      <div class="col-sm-4">
                        <select name="nip_atasan_langsung" id="nip" class="form-control select2" required>
                          <option value=""> --- Pilih NIP dan Nama Atasan --- </option>
                          <?php
                          $query2 = "select * from atasan order by nip_atasan";
                          $tampil = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                          while ($data1 = mysqli_fetch_array($tampil)) {
                          ?>
                            <option value="<?php echo $data1['nip_atasan']; ?>"><?php echo $data1['nip_atasan']; ?> - <?php echo $data1['nama_atasan']; ?></option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-4">
                        <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Sebelum Menekan Tombol Simpan Pastikan Data Yang Anda Inputkan benar.</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                        <a href="cuti.php" class="btn btn-sm btn-danger">Batal </a>
                      </div>
                    </div>
                  </form>
                </div>
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