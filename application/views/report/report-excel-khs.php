<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename = report_khs.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Report Excel</title>
	<style type="text/css">
	.title_header{
		font-size: 30px;
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
	.title_jd{
		font-size: 18px;
	}
	.title_name{
		font-size: 12px;
		background: #307ecc;
		color: #fff;
		border : 1px groove;
		padding-top: 7px;
		padding-bottom: 7px;
		font-style: bold;
	}
	.title_value{
		font-size: 11px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 3px;
	}
	/* style grid table */
	</style>
</head>

<body>
	<table border="0" width="1000px" class="gridtable">
	<tr>
		<td colspan="5" align="center">
			KEMENTRIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">AKADEMI KIMIA ANALISIS</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
	</tr>
	<tr>
		<td colspan="5">
			NIM : <?php echo $this->input->post('nim'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="5">
			Nama : 
			<?php
				$nim = $this->input->post('nim');
				$ambil_data_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
				$data_mhs = $ambil_data_mhs->row_array();
				echo $data_mhs['nama'];
			?>
		</td>
	</tr>
	<tr>
		<td colspan="5">
			Tahun Akademik : <?php echo $this->input->post('tahun_akademik'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="5">
			Semester : <?php echo $this->input->post('semester'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center"> Mata Kuliah</td>
		<td align="center">Nilai</td>
		<td align="center">Keterangan</td>
	</tr>
	<tr>
		<td>Kode</td>
		<td>Nama Mata Kuliah</td>
		<td>SKS</td>
		<td></td>
		<td></td>
	</tr>
	<!-- LOOP -->
	<?php foreach ($data as $data){ ?>
		

		<tr>
			<td align="left" class="title_value"><?php echo $data['kode_mk']; ?></td>
			<td align="left" class="title_value"><?php echo $data['nama_mk']; ?></td>
			<td align="center" class="title_value"><?php echo $data['jumlah_sks']; ?></td>
			<td align="center" class="title_value"><?php echo $data['huruf_mutu']; ?></td>
			<td align="center" class="title_value"></td>
		</tr>

	<?php } ?>
	<tr>
		<td colspan="5" height="20px"></td>
	</tr>
	<tr>
		<td colspan="5"> Total SKS : <?php
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_sks = $jumlah_sks->result_array();
			foreach ($data_jumlah_sks as $data_jumlah_sks) {			
			echo $data_jumlah_sks['total_sks'].".00";
			}
			?></td>
	</tr>
	<tr>
		<td colspan="5"> Total Nilai :
			<?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_nilai = $this->db->query("SELECT SUM(t_nilai.angka_huruf_mutu) AS total_nilai FROM t_detail_frs, t_mahasiswa, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_nilai = $jumlah_nilai->result_array();
			foreach ($data_jumlah_nilai as $data_jumlah_nilai) {			
			echo $data_jumlah_nilai['total_nilai'].".00";
			 }?>
		</td>
	</tr>
	<tr>
		<td colspan="5"> Total SKS X Nilai :
			<?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_nilai_x_sks = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_nilai_x_sks = $jumlah_nilai_x_sks->result_array();
			foreach ($data_jumlah_nilai_x_sks as $data_jumlah_nilai_x_sks) {			
			echo $data_jumlah_nilai_x_sks['total_nilai_semua'].".00";
			 }
			 ?>
		</td>
	</tr>
	<tr>
		<td colspan="5"> Indek Prestasi : 
		<?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_ip = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_ip = $jumlah_ip->result_array();
			foreach ($data_jumlah_ip as $data_jumlah_ip) {
			$indeks_prestasi = $data_jumlah_ip['total_nilai_semua'] / $data_jumlah_ip['jumlah_sks'];			
			echo number_format($indeks_prestasi, 2);
				}
		 ?></td>
	</tr>
	<tr>
		<td> <?php
		$semester = $this->input->post('semester');
		if($semester > 1){
		?>
		Indek Prestasi Kumulatif : 
		<?php
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_ip_kumulatif = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_ip_kumulatif = $jumlah_ip_kumulatif->result_array();
			foreach ($data_jumlah_ip_kumulatif as $data_jumlah_ip_kumulatif) {
			$indeks_prestasi_kumulatif = $data_jumlah_ip_kumulatif['total_nilai_semua'] / $data_jumlah_ip_kumulatif['jumlah_sks'];			
			echo number_format($indeks_prestasi_kumulatif, 2);
				}
			}
		 ?></td>
	</tr>
</table>
</body>
</html>