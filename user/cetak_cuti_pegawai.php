<?php
include "session.php";
include "funcion.php";
$kd = $_GET['id'];
$row = $db->get_row("SELECT * FROM cuti WHERE nip='$kd'");
$sql = mysqli_query($koneksi, "SELECT * FROM cuti WHERE nip='$kd'");
if (mysqli_num_rows($sql) == 0) {
    header("Location: cuti.php");
} else {
    $row = mysqli_fetch_assoc($sql);
}
?>

<html>

<head>
    <title>Pengajuan Cuti</title>
</head>

<body>
    <table align="center" border="0" cellpadding="1" style="width: 700px;">
        <tbody>
            <tr>
                <td colspan="3">&nbsp;&nbsp;
                    <div class="row" style="float: right;">
                        <div class="col">
                            <table border="0">
                                <tbody>
                                    <tr>
                                        <td width="93"><span style="font-size: x-small;"></span></td>
                                        <td width="8"><span style="font-size: x-small;"></span></td>
                                        <td width="200"><span style="font-size: x-small;">ANAK LAMPIRAN 1 b</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;">PERATURAN BADAN KEPEGAWAIAN NEGARA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;">REPUBLIK INDONESIA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;">NOMOR 24 TAHUN 2017</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;"></span></td>
                                        <td><span style="font-size: x-small;">TENTANG</span></td>
                                    </tr>
                                    <tr>
                                        <td width="10"><span style="font-size: x-small;"></span></td>
                                        <td width="10"><span style="font-size: x-small;"></span></td>
                                        <td width="353"><span style="font-size: x-small;">TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="top">
                    <div>
                        <pre><span style="font-size: x-small;">Mataram, <?php
        $tanggal = mktime(date("m"), date("d"), date("Y"));
        echo "" . date("d F Y", $tanggal) . "";
        date_default_timezone_set('Asia/Jakarta');
        ?>,
                kepada
Yth.Ketua STAHN Gde Pudja Mataram
  di
   Mataram
    </span></pre>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="0" style="width: 704px;text-align: center;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">SURAT PERMINTAAN DAN PENGAJUAN CUTI</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">1.DATA PEGAWAI</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <?php
                            $cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip='$kd'");
                            $data2  = mysqli_fetch_array($cek);
                            ?>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">Nama</span></td>
                                <td width="8"><span style="font-size: x-small;">:</span></td>
                                <td width="200"><span style="font-size: x-small;"><?php echo $data2['nama']; ?></span></td>
                            </tr>
                            <tr>
                                <td width="10"><span style="font-size: x-small;">Jabatan</span></td>
                                <td width="10"><span style="font-size: x-small;">:</span></td>
                                <td width="353"><span style="font-size: x-small;"><?php echo $row['jabatan']; ?></span></td>
                            </tr>

                            <tr>
                                <td><span style="font-size: x-small;">Unit kerja</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;"><?php echo $data2['departemen']; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">Nip</span></td>
                                <td width="8"><span style="font-size: x-small;">:</span></td>
                                <td width="200"><span style="font-size: x-small;"><?php echo $row['nip']; ?></span></td>
                            </tr>
                            <tr>
                                <td width="10"><span style="font-size: x-small;">Masa Kerja</span></td>
                                <td width="10"><span style="font-size: x-small;">:</span></td>
                                <td width="353"><span style="font-size: x-small;"><?php echo $row['masa_kerja']; ?></span></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">II. JENIS CUTI YANG DIAMBIL ** </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td width="151"><span style="font-size: x-small;">1. Cuti Tahunan</span></td>
                                <td width="150"><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Tahunan') echo 'checked'; ?>></span></td>
                            </tr>
                            <tr>
                                <td width="151"><span style="font-size: x-small;">3. Cuti Sakit</span></td>
                                <td width="150"><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Sakit') echo 'checked'; ?>></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">5. Cuti Karena Alasan Penting </span></td>
                                <td><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Karena Alasan Penting') echo 'checked'; ?>></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="171"><span style="font-size: x-small;">2. Cuti Besar</span></td>
                                <td width="130"><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Besar') echo 'checked'; ?>></span></td>
                            </tr>
                            <tr>
                                <td width="171"><span style="font-size: x-small;">4. Cuti Melahirkan</span></td>
                                <td width="130"><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Melahirkan') echo 'checked'; ?>></span></td>
                            </tr>
                            <tr>
                                <td width="171"><span style="font-size: x-small;">6. Cuti Di Luar Tanggungan Negara </span></td>
                                <td width="130"><span style="font-size: x-small;"><input type="checkbox" <?php if ($row['jenis_cuti'] == 'Cuti Di Luar Tanggungan Negara') echo 'checked'; ?>></span></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">III. ALASAN CUTI </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="top">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">&emsp;&emsp;<?php echo $row['alasan_cuti']; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">IV. LAMA CUTI </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td width="30"><span style="font-size: x-small;">Selama</span></td>
                                <td width="71"><span style="font-size: x-small;"><?php echo $row['lama_cuti']; ?> Hari</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">Mulai tanggal <?php echo $row['tanggal_mulai']; ?> s/d <?php echo $row['tanggal_selesai']; ?> </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">V. CATATAN CUTI *** </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td colspan="2" width="201"><span style="font-size: x-small;">1. CUTI TAHUNAN</span></td>
                                <td width="100"><span style="font-size: x-small;"><input type="checkbox" checked></span></td>
                            </tr>
                            <tr>
                                <td width="85"><span style="font-size: x-small;">Tahun</span></td>
                                <td width="85"><span style="font-size: x-small;">Sisa</span></td>
                                <td width="203"><span style="font-size: x-small;">Keterangan</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">N-2 </span></td>
                                <td><span style="font-size: x-small;"><?php echo $row['sisa_n2']; ?></span></td>
                                <td><span style="font-size: x-small;">Ditangguhkan</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">N-1 </span></td>
                                <td><span style="font-size: x-small;"><?php echo $row['sisa_n1']; ?></span></td>
                                <td><span style="font-size: x-small;">Ditangguhkan</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">N </span></td>
                                <td><span style="font-size: x-small;"><?php echo $data2['jumlah_cuti']; ?></span></td>
                                <td><span style="font-size: x-small;"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">2. Cuti Besar</span></td>
                            </tr>
                            <tr>
                                <td width="10"><span style="font-size: x-small;">3. Cuti Sakit</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">4. Cuti Melahirkan </span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">5. Cuti Karena Alasan Penting </span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">6. Cuti Di Luar Tanggungan Negara </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <td colspan="3">
                <table border="1" cellpadding="1" style="width: 704px;">
                    <tbody>
                        <tr>
                            <td colspan="3"><span style="font-size: x-small;">VI. ALAMAT SELAMA MENJALANKAN CUTI : &nbsp;&nbsp;<?php echo ucwords($row['alamat_cuti']); ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </td>
            </tr>
            <tr>
                <td colspan="3" valign="top">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td width="40"><span style="font-size: x-small;"></span></td>
                                <td width="41"><span style="font-size: x-small;">Telp : <?php echo $row['no_telpon']; ?></span></td>
                                <td width="71"><span style="font-size: x-small;"></span></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td width="40"><span style="font-size: x-small;"></span></td>
                                <td width="41"><span style="font-size: x-small;"></span></td>
                                <td width="71"><span style="font-size: x-small;">Hormat saya,</span>
                                    <br><br>
                                    <span style="font-size: x-small;"><?php echo ucwords($data2['nama']); ?></span><br>
                                    <span style="font-size: x-small;">NIP.<?php echo $data2['nip']; ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">VII. PERTIMBANGAN ATASAN LANGSUNG ** </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td width="15"><span style="font-size: x-small;">DISETUJUI</span></td>
                                <td width="15"><span style="font-size: x-small;">PERUBAHAN****</span></td>
                                <td width="15"><span style="font-size: x-small;">DITANGGUHKAN****</span></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td width="15"><span style="font-size: x-small;"></span><br><br></td>
                                <td width="15"><span style="font-size: x-small;"></span></td>
                                <td width="15"><span style="font-size: x-small;"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="1" valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="300"><span style="font-size: x-small;">TIDAK DISETUJUI****</span></td>

                            </tr>
                            <tr style="text-align: center;">
                                <?php
                                $atsan = $row['nip_atasan_langsung'];
                                $cek3 = mysqli_query($koneksi, "SELECT * FROM atasan WHERE nip_atasan='$atsan'");
                                $data3  = mysqli_fetch_array($cek3);
                                ?>
                                <td width="300"><span style="font-size: x-small;"></span>
                                    <br><br>
                                    <span style="font-size: x-small;"><?php echo $data3['nama_atasan']; ?></span><br>
                                    <span style="font-size: x-small;">NIP.<?php echo $row['nip_atasan_langsung']; ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="1" cellpadding="1" style="width: 704px;">
                        <tbody>
                            <tr>
                                <td colspan="3"><span style="font-size: x-small;">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI ** </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top">
                    <table border="1" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td width="15"><span style="font-size: x-small;">DISETUJUI</span></td>
                                <td width="15"><span style="font-size: x-small;">PERUBAHAN****</span></td>
                                <td width="15"><span style="font-size: x-small;">DITANGGUHKAN****</span></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td width="15"><span style="font-size: x-small;"></span><br><br></td>
                                <td width="15"><span style="font-size: x-small;"></span></td>
                                <td width="15"><span style="font-size: x-small;"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="1" valign="top">
                    <table border="1" cellpadding="1" style="width: 300px;">
                        <tbody>
                            <tr>
                                <td width="300"><span style="font-size: x-small;">TIDAK DISETUJUI****</span></td>

                            </tr>
                            <tr style="text-align: center;">

                                <td width="300"><span style="font-size: x-small;"></span>
                                    <br><br>
                                    <span style="font-size: x-small;">Dr. Ir. I Wayan Wirata, A.Ma, SE, M.Si</span><br>
                                    <span style="font-size: x-small;">NIP.196608052003121002</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;&nbsp;
                    <div class="row" style="float: left;">
                        <div class="col">
                            <table border="0">
                                <tbody>
                                    <tr>
                                        <td width="301"><span style="font-size: x-small;">Catatan :</span></td>
                                    </tr>
                                    <tr>
                                        <td width="301"><span style="font-size: x-small;">* Coret yang tidak perlu</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;">** Pilih salah satu dengan memberi tanda centang (√) </span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;">*** diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti </span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: x-small;">N = Cuti tahun berjalan</span></td>
                                    </tr>
                                    <tr>
                                        <td width="301"><span style="font-size: x-small;">N-1 =Sisa cuti 1 tahun sebelumnya </span></td>
                                    </tr>
                                    <tr>
                                        <td width="301"><span style="font-size: x-small;">N-2 =Sisa cuti 2 tahun sebelumnya </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <td colspan="3">
                <table border="0" cellpadding="1" style="width: 704px;">
                    <tbody>
                        <tr>
                            <td width="302"></td>
                            <td width="343"></td>
                            <td width="339"></td>
                        </tr>

                    </tbody>
                </table>
            </td>
            <script>
                window.print();
                window.onafterprint = window.close;
            </script>
</body>

</html>