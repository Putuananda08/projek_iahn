<?php
include "session.php";
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=cuti-karyawan.xls");
 
																  
											//	$sql = mysqli_query($koneksi, "SELECT * FROM t_inventoryitems WHERE f_partcode='$id'");
		
			?>
	  
 
	<h3>Data Cuti Pegawai/Dosen</h3>
	  
	<!-- <table>
	
			<tr>
			 <td width="0px">Plant :</td>  <td><?php //echo $plantname ?></td> 
			 <td width="0px">From : <?php //echo date("d-m-Y",strtotime($_GET['date1'])) ?></td>  
			 <td width="0px">Until : <?php //echo date("d-m-Y",strtotime($_GET['date2'])) ?></td> 
			 
		 </tr>
	</table>-->	
    <table>
	
			<tr>
			
			 <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>  
			 
			 
		 </tr>
	</table>	
		 
		<table bordered="1">  
			<thead bgcolor="eeeeee" align="center">
			<tr bgcolor="eeeeee" >
               <th>No</th>
               <th>NIP</th>
               <th>Nama</th>
	           <th>Jenis Cuti</th>
			   <th>Alasan Cuti</th>
			   <th>Lama Cuti</th>
               <th>Tanggal Mulai</th>
               <th>Tanggal Selesai</th>
               <th>Sisa Cuti N-2</th>
			   <th>Sisa Cuti N-1</th>
			   <th>Sisa Cuti N</th>
			   <th>Keterangan Cuti</th>
			   <th>Alamat Cuti</th>
			   <th>No Telpon</th>

			  </tr>
			</thead>
			<tbody>
	 	
					
		</tbody>

		</div>
    </div>
</div>
   <?php
	//query menampilkan data
	$sql = mysqli_query($koneksi, "SELECT pengajuan_cuti.*, karyawan.nip, karyawan.nama FROM pengajuan_cuti, karyawan where pengajuan_cuti.nip=karyawan.nip");
	$no = 1;
	while($rowshow = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$rowshow['nip'].'</td>
			<td>'.$rowshow['nama'].'</td>
			<td>'.$rowshow['jenis_cuti'].'</td>
			<td>'.$rowshow['alasan_cuti'].'</td>
			<td>'.$rowshow['lama_cuti'].'</td>
            <td>'.$rowshow['tanggal_mulai'].'</td>
            <td>'.$rowshow['tanggal_selesai'].'</td>
			<td>'.$rowshow['sisa_cuti_n2'].'</td>
			<td>'.$rowshow['sisa_cuti_n1'].'</td>
			<td>'.$rowshow['sisa_cuti_n'].'</td>
			<td>'.$rowshow['keterangan_cuti'].'</td>
			<td>'.$rowshow['alamat_cuti'].'</td>
			<td>'.$rowshow['no_telpon'].'</td>




		</tr>
		';
		$no++;
	}
	
						
					 ?>
  </table>   