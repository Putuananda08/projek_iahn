<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nip',
    1 => 'nama', 
	2 => 'jabatan',
	3 => 'masa_kerja',
	4 => 'jenis_cuti',
	5 => 'alasan_cuti',
    6 => 'lama_cuti',
    7 => 'tanggal_mulai',
    8 => 'tanggal_selesai',
    9 => 'sisa_cuti_n2',
    10 => 'sisa_cuti_n1',
    11 => 'sisa_cuti_n',
    12 => 'keterangan_cuti',
    13 => 'alamat_cuti',
    14 => 'no_telpon',
);

// getting total number records without any search
$sql = "SELECT nip, nama, jabatan, masa_kerja, jenis_cuti, alasan_cuti, lama_cuti, tanggal_mulai, tanggal_selesai, sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n, keterangan_cuti, alamat_cuti, no_telpon";
$sql.=" FROM pengajuan_cuti";
$query=mysqli_query($conn, $sql) or die("ajaxin-pengajuan-cuti.php: get pengajuan_cuti");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT nip, nama, jabatan, masa_kerja, jenis_cuti, alasan_cuti, lama_cuti, tanggal_mulai, tanggal_selesai, sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n, keterangan_cuti, alamat_cuti, no_telpon";
	$sql.=" FROM pengajuan_cuti";
	$sql.=" WHERE nip LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jabatan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR masa_kerja LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jenis_cuti '".$requestData['search']['value']."%' ";
	$sql.=" OR alasan_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR lama_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal_mulai LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal_selesai LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR sisa_cuti_n2 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR sisa_cuti_n1 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR sisa_cuti_n LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR keterangan_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR alamat_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR no_telpon LIKE '".$requestData['search']['value']."%' ";

	$query=mysqli_query($conn, $sql) or die("ajax-pengajuan-cuti.php: get pengajuan_cuti");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-pengajuan-cuti.php: get pengajuan_cuti"); // again run query with limit
	
} else {	

	$sql = "SELECT nip, nama, jabatan, masa_kerja, jenis_cuti, alasan_cuti, lama_cuti, tanggal_mulai, tanggal_selesai, sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n, keterangan_cuti, alamat_cuti, no_telpon";
	$sql.=" FROM pengajuan_cuti";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get pengajuan_cuti");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["nip"];
    $nestedData[] = $row["nama"];
	$nestedData[] = $row["jenis_cuti"];
	$nestedData[] = $row["alasan_cuti"];
	$nestedData[] = $row["lama_cuti"];
	$nestedData[] = $row["tanggal_mulai"];
	$nestedData[] = $row["tanggal_selesai"];
	$nestedData[] = $row["sisa_cuti_n2"];
	$nestedData[] = $row["sisa_cuti_n1"];
	$nestedData[] = $row["sisa_cuti_n"];
	$nestedData[] = $row["keterangan_cuti"];
	$nestedData[] = $row["alamat_cuti"];
	$nestedData[] = $row["no_telpon"];
    $nestedData[] = '<td><center>
                     <a href="detail-pengajuan-cuti.php?id='.$row['nip'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     <a href="edit-pengajuan-cuti.php?id='.$row['nip'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
                     <a target="_blank" href="cetak_cuti_pegawai.php?id='.$row['nip'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="pengajuan-cuti.php?aksi=delete&id='.$row['nip'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nip'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
