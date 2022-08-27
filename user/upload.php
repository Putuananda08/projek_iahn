<?php
include "../conn.php";
include "excel_reader2.php";

$dataUpload = $_GET['data'];
if ($dataUpload == 'pegawai') {
	$data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['tmp_name']);
	$baris = $data->rowcount($sheet_index = 0);

	for ($i = 2; $i <= $baris; $i++) {
		$nip = $data->val($i, 2);
		$nama = $data->val($i, 3);
		$tanggal_masuk = $data->val($i, 4);
		$departemen = $data->val($i, 5);
		$status = $data->val($i, 6);
		$jumlah_cuti = $data->val($i, 7);
		$username = $data->val($i, 8);
		$password1 = $data->val($i, 9);
		$password = sha1("password1");
		$level = $data->val($i, 10);
		$gambar = $data->val($i, 11);
		if ($baris) {
			$import = mysqli_query($koneksi, "INSERT INTO karyawan (nip,nama,tanggal_masuk,departemen,status,jumlah_cuti,username,password,level,gambar) 
			VALUES ('$nip','$nama','$tanggal_masuk','$departemen','$status','$jumlah_cuti','$username','$password','$level','$gambar')");

			if ($import) {
				header('location:karyawan_importxls.php?status_import=sukses-import');
			} else {
				header('location:karyawan_importxls.php?status_import=gagal-import');
				//   die(mysqli_error($koneksi));
			}
		}
	}
}

