<?php
include "../conn.php";
include "excel_reader2.php";

$dataUpload = $_GET['data'];
if ($dataUpload == 'atasan') {
	$data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['tmp_name']);
	$baris = $data->rowcount($sheet_index = 0);

	for ($i = 2; $i <= $baris; $i++) {
		$nip_atasan = $data->val($i, 2);
		$nama_atasan = $data->val($i, 3);
		
		if ($baris) {
			$import = mysqli_query($koneksi, "INSERT INTO atasan (nip_atasan,nama_atasan) 
			VALUES ('$nip_atasan','$nama_atasan')");

			if ($import) {
				header('location:atasan_importxls.php?status_import=sukses-import');
			} else {
				header('location:atasan_importxls.php?status_import=gagal-import');
				//   die(mysqli_error($koneksi));
			}
		}
	}
}
