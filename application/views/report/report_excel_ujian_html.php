<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style>
	table,table tr,table tr td{
		border-collapse:collapse;
		font-family: 'Open Sans', sans-serif;
	}
</style>
<table style="text-align:center;width:1340px;" border="0">
	<tr>
		<td colspan="3">
			
		</td>
		<td colspan="4" align="center">
			<h1>AKADEMI KIMIA ANALISIS</h1>
			
			
		</td>
		<td colspan="3"></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><!-- gambar --></td>
		<td align="center" colspan="4">Jalan Pangeran Sogiri Nomor 283 Tanah Baru - Bogor 16158</td>
		<td colspan="3" align="center"><!-- gambar --></td>
	</tr>

	<tr>
		<td colspan="3"></td>
		<td colspan="4" align="center">Telp.(0251) 8650351 Fax. (0251) 8650352</td>
		<td colspan="3"></td>
	</tr>

	<tr>
		<td colspan="10"><div style="width: 100%; height: 1px; background: #000;"></div></td>
	</tr>
<!--   ======================================= -->

	<tr>
		<td colspan="10" align="center">DAFTAR HADIR UJIAN DAN NILAI</td>
	</tr>
	<tr>
		<td colspan="10"></td>
	</tr>
	<tr>
		<td colspan="2">Nama Dosen </td>
		<td>: OKKY SETIAWAN</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2">Tahun Akademik : </td>
		<td><?php echo $this->input->post('tahun_akademik_sec');?></td>
	</tr>

	<tr>
		<td colspan="2">Kode Mata Kuliah : </td>
		<td><?php echo $loop_mk['kode_mk'];?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2">Semester : </td>
		<td align="left"><?php 
							$semester = $data_frs['semester'];
					 		if($semester%2 == 1){
					 			$bilangan = "Gasal";
					 		}else{
					 			$bilangan = "Genap";
					 		}
							echo $bilangan;
									 ?></td>
	</tr>

	<tr>
		<td colspan="2">Nama Mata Kuliah : </td>
		<td align="left"><?php echo $loop_mk['nama_mk']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2" align="left">Sks : </td>
		<td> <?php echo $loop_mk['jumlah_sks']; ?></td>
	</tr>
	<tr>
		<td colspan="10"></td>
	</tr>

</table>

<table style="text-align:center;width:1340px;" border="1">
	<tr style="background: steelblue;color: #fff;">
		<td colspan="3" align="center">MAHASISWA</td>
		<td align="center">TTD</td>
		<td colspan="4" align="center">Nilai</td>
		<td align="center">Huruf Mutu</td>
		<td align="center">Keterangan</td>
	</tr>
	<tr style="background: steelblue;color: #fff;">
		<td align="center" width="5px">No</td>
		<td align="center">NIM</td>
		<td align="center">Nama</td>
		<td></td>
		<td align="center">UTS</td>
		<td align="center">UAS</td>
		<td align="center">Tugas</td>
		<td align="center">Rata-rata</td>
		<td></td>
		<td></td>
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
	</tr>
<?php 
$no++;
}
?>
</table>
