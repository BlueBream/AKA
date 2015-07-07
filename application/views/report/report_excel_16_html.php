<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style>
	table,table tr,table tr td{
		border-collapse:collapse;
		font-family: 'Open Sans', sans-serif;
	}
</style>
<table style="text-align:center;border-collapse:collapse" width="100%" border="0">

	<tr>
		<td colspan="19" align="center">KEMENTRIAN PERINDUSTRIAN REPUBLIK INDONESIA</td>
	</tr>
	<tr>
		<td colspan="19" align="center"><h1>AKADEMI KIMIA ANALISIS</h1></td>
	</tr>
	<tr>
		<td colspan="19" align="center">Jalan Pangeran Sogiri Nomor 283 Tanah Baru - Bogor 16158</td>
	</tr>
	<tr>
		<td colspan="19" align="center">Telp.(0251) 8650351 Fax. (0251) 8650352</td>
	</tr>
	
	<tr>
		<td colspan="19"></td>
	</tr>
	<tr>
		<td colspan="10"><div></div></td>
	</tr>

	<tr>
		<td colspan="19" align="left">DAFTAR KEHADIRAN SISWA 
		<?php
			$id_kelas = $this->input->post("kelas_sec"); 
			$query = $this->db->query("SELECT * FROM t_kelas WHERE id_kelas = '$id_kelas'");
			$data_kelas = $query->row_array();
			echo $data_kelas['nama_kelas'];
		?></td>
	</tr>

	<tr>
		<td colspan="19"></td>
	</tr>

	<tr>
		<td colspan="3" align="left"><?php 
							echo "Kode Mata Kuliah : ".$loop_mk['kode_mk'];
						?></td>
		<td colspan="13"></td>		
		<td colspan="3" align="right"><?php 
							$semester = $data_frs['semester'];
					 		if($semester%2 == 1){
					 			$bilangan = "Gasal";
					 		}else{
					 			$bilangan = "Genap";
					 		}
							echo "Semester : ".$bilangan;
									 ?></td>		
	</tr>

	<tr>
		<td colspan="3" align="left"><?php echo "Nama Mata Kuliah : ".$loop_mk['nama_mk']; ?></td>
		<td colspan="13"></td>		
		<td colspan="3" align="right"><?php echo "Tahun Akademik : ".$this->input->post('tahun_akademik_sec');?></td>		
	</tr>
		<td colspan="19"></td>
	</tr>
</table>


<table width="100%" border="1">
	<tr style="font-weight:bold;">
		<td width="5%"align="center" heigth="90px">NO</td>
		<td width="10%"align="center">NIM</td>
		<td width="20%" align="center">NAMA</td>
		<td colspan="16" align="center">TANGGAL DAN PARAF</td>
	</tr>
	<?php 
		$no = 1;
	foreach ($data as $data) {
	
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['nim']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php
	$no++;
		 }
	 ?>
</table>
