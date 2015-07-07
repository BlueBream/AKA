<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR KEHADIRAN 16 MINGGU</title>

	<style type="text/css">
	body{
		font-family: "Opensans",sans-serif;
	}
	.title_header{
		font-size: 25px;
		font-style: bold;
	}

	.title_alamat{
		font-size: 12px;
	}
	.line{
		width: 100%;
		height: 2px;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	.title_ket{
		font-size: 12px;
	}
	.title_name{
		font-size: 12px;
		font-weight:bold;
		padding-top: 7px;
		padding-bottom: 7px;
	}
	.title_value{
		font-size: 11px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 3px;
	}
	/* style grid table */
	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-collapse: collapse;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;		
	}
	table.gridtable td{
		border-width: 1px;
		border-style: solid;

	}
	.geser{
		margin-right:7px;
	}
	.abu-abu td{
		background:#B8B6B0;
	}
	</style>
</head>
<body>


<table border="0" width="100%">
	<tr>
		<td width="5%" ><img src="assets/images/Kemenperin.jpg" width="150px"></td>
		<td align="center">
			KEMENTERIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">POLITEKNIK AKA BOGOR</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td width="18%" style="text-align:right" class="title_alamat">FR/BAAK-1.6.0.1<br><img class="geser" src="assets/images/LOGO.jpg" width="70px" height="70px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>

	</tr>
</table>

<table border="0" width="100%">
	<tr>
		<td colspan="5" align="center">
			<font class="title_ket"><b>DAFTAR INDEKS PRESTASI MAHASISWA</b><br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px">Tahun Akademik</td>
		<td class="title_ket">: <?php echo $this->input->post('tahun_akademik'); ?></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">SEMESTER</td>
		<td class="title_ket">: 
		<?php 
			$range = $this->input->post("range_ip");
			
			if($range == 'range_1'){
				$parameter_range = "0.00 s/d 1.99";
				$filter_range_1 = "0.00";
				$filter_range_2  = "1.99";
			}else if($range == 'range_2'){
				$parameter_range = "2.00 s/d 2.75";
				$filter_range_1 = "2.00";
				$filter_range_2  = "2.75";
			}else if($range == 'range_3'){
				$parameter_range = "2.76 s/d 3.50";
				$filter_range_1 = "2.76";
				$filter_range_2  = "3.50";
			}else if($range == 'range_4'){
				$parameter_range = "3.51 s/d 4.00";
				$filter_range_1 = "3.51";
				$filter_range_2  = "4.00";
			}

			$semester1 = $this->input->post('1');
			$semester2 = $this->input->post('2');
			$semester3 = $this->input->post('3');
			$semester4 = $this->input->post('4');
			$semester5 = $this->input->post('5');
			$semester6 = $this->input->post('6');
			$semester7 = $this->input->post('7');
			$semester8 = $this->input->post('8');
			$semester9 = $this->input->post('9');
			$semester10 = $this->input->post('10');

			$replace = array($semester1, $semester2, $semester3, $semester4, $semester5, $semester6, $semester7, $semester8, $semester9, $semester10);
			$filter_replace = implode(" ", $replace);
			$replace2= array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X');
			$replaceall = str_replace($replace, $replace2, $filter_replace);
			$ex_replace = explode(" ", $replaceall);
			$remove_null_number = true;
			$new_array = $this->m_aka->array_empty_remover($ex_replace, $remove_null_number);
			$implode_replace = implode(", ", $new_array);
			echo $implode_replace;

		?>
		</td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Mahasiswa Angkatan</td>
		<td class="title_ket" width="290px">: 
		<?php 
			$angkatan = $this->input->post('angkatan');
			$angkatan_ex = explode("/", $angkatan);
			echo $angkatan_ex[0];
		 ?></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Range IP</td>
		<td class="title_ket">: 
		<?php 
			echo $parameter_range;
		 ?></td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>



<table class="gridtable" cellpadding="5">
	<tr class="abu-abu">
		<td width="10px" align="center" class="title_name">NO</td>
		<td align="center" class="title_name">NIM</td>
		<td align="center" class="title_name">NAMA MAHASISWA</td>
		<td align="center" class="title_name">N X K</td>
		<td align="center" class="title_name">JUMLAH SKS</td>
		<td align="center" class="title_name">INDEKS PRESTASI</td>
	</tr>

	<?php 
		$no = 1;
		$tahun_akademik = $this->input->post('tahun_akademik');
		$angkatan = $this->input->post('angkatan');

		$semesterall = $semester1.$semester2.$semester3.$semester4.$semester5.$semester6.$semester7.$semester8.$semester9.$semester10;
		$a = explode("-", $semesterall);
		array_pop($a);

		foreach($data as $data){

		$angka_mutu = "WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ".implode(" OR t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ", $a);
		$jumlah_angka_huruf_mutu = $this->db->query("SELECT SUM(t_nilai.angka_huruf_mutu) AS total FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai $angka_mutu ORDER BY t_mahasiswa.nama ASC");
		$data_angka_huruf_mutu = $jumlah_angka_huruf_mutu->row_array();

		$angka_sks = "WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ".implode(" OR t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ", $a);
		$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai $angka_sks ORDER BY t_mahasiswa.nama ASC");
		$data_sks = $jumlah_sks->row_array();

		$angka_ip = "WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ".implode(" OR t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.angkatan = '$angkatan' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.id_mahasiswa = '$data[id_mhs]' AND t_detail_frs.semester = ", $a);
		$jumlah_ip = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk $angka_ip ORDER BY t_mahasiswa.nama ASC");
		$data_ip = $jumlah_ip->row_array();
		$data_ip_hasil = $data_ip['total_nilai_semua'] / $data_ip['jumlah_sks']; 

		if($data_ip_hasil >= $filter_range_1 && $data_ip_hasil <= $filter_range_2){
	?>
	<tr>
		<td align="center" class="title_value"><?php echo $no; ?></td>
		<td align="center" class="title_value"><?php 
			echo $data['nim'];	
		 ?></td>
		<td align="center" class="title_value"><?php echo $data['nama']; ?></td>
		<td align="center" class="title_value">
			<?php 
			
				
				echo $data_angka_huruf_mutu['total'];
			 ?>
		</td>
		<td align="center" class="title_value"><?php 
				
				echo $data_sks['total_sks'];
			 ?></td>
		<td align="center" class="title_value">
			<?php 
			 	echo number_format($data_ip_hasil, 2);
			 ?>

		</td>
	</tr>
	<?php }
	?>
	<?php 
		$no ++;
	} ?>
</table>

</body>
</html>