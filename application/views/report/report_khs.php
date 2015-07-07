<!DOCTYPE html>
<html>
<head>
	<title>PRINT KHS MAHASISWA</title>

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
		font-weight:bold;
		font-size: 12px;
		padding-top: 7px;
		padding-bottom: 7px;
	}
	.title_value{
		font-size: 11px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 3px;
	}

	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-color: #307ecc;
		border-collapse: collapse;
		font-family:"Open sans",sans-serif;
		font-size: 12px;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;		
	}
	table.gridtable td{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;

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
		<td width="20%" style="text-align:right" class="title_alamat">FR/BAAK-1.6.0.1<br><img class="geser" src="assets/images/LOGO.jpg" width="70px" height="70px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>

	</tr>
</table>


<table border="0" width="100%">
	
	<tr>
		<td  align="center">
			<font class="title_jd"><b>KARTU HASIL STUDI</b><br></font>
		</td>
	</tr>
</table>
<table border="0" width="100%">

	<tr>
		<td class="title_ket" style="padding-right:10px"><b>NIM</b></td>
		<td class="title_ket"><b>: <?php echo $this->input->post('nim'); ?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px"><b>TAHUN AKADEMIK</b></td>
		<td class="title_ket"><b>: <?php echo $this->input->post('tahun_akademik'); ?></b></td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px"><b>NAMA</b></td>
		<td class="title_ket" width="290px"><b>: <?php 
			$nim = $this->input->post('nim');
			$ambil_data_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
			$data_mhs = $ambil_data_mhs->row_array();
			echo $data_mhs['nama'];
		 ?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px"><b>SEMESTER</b></td>
		<td class="title_ket"><b>: <?php echo $this->input->post('semester'); ?></b></td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>

<table class="gridtable">
	<tr class="abu-abu">
		<td colspan="3" align="center" class="title_name">Mata Kuliah</td>
		<td rowspan = "2" align="center" class="title_name">Nilai</td>
		<td rowspan = "2" align="center" class="title_name">Keterangan</td>
	</tr>

	<tr class="abu-abu">
		<td align="left" class="title_name">Kode</td>
		<td align="left" class="title_name">Nama Mata Kuliah</td>
		<td align="center" class="title_name">SKS</td>
	</tr>
	<?php foreach ($data as $data){ ?>
		

		<tr>
			<td align="left" class="title_value"><?php echo $data['kode_mk']; ?></td>
			<td align="left" class="title_value"><?php echo $data['nama_mk']; ?></td>
			<td align="center" class="title_value"><?php echo $data['jumlah_sks']; ?></td>
			<td align="center" class="title_value"><?php echo $data['huruf_mutu']; ?></td>
			<td align="center" class="title_value"></td>
		</tr>

	<?php } ?>

</table>

<table border="0" width="100%">
	<tr>
		<td colspan="4"><br></td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px"><b>Total SKS</b></td>
		<td class="title_ket"><b>: <?php
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_sks = $jumlah_sks->result_array();
			foreach ($data_jumlah_sks as $data_jumlah_sks) {			
			echo $data_jumlah_sks['total_sks'].".00";
			}
			?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Bogor, 
		<?php 
			echo date("d")." ";
				$bulan =  date("m");
				if($bulan == "01"){
					echo "Januari";
				}else if($bulan == "02"){
					echo "Februari";
				}else if($bulan == "03"){
					echo "Maret";
				}else if($bulan == "04"){
					echo "April";
				}else if($bulan == "05"){
					echo "Mei";
				}else if($bulan == "06"){
					echo "Juni";
				}else if($bulan == "7"){
					echo "Juli"; 
				}else if($bulan == "8"){
					echo "Agustus";
				}else if($bulan == "9"){
					echo "September";
				}else if($bulan == "10"){
					echo "Oktober";
				}else if($bulan == "11"){
					echo "November";
				}else if($bulan == "12"){
					echo "Desember";
				}
				echo " ".date("Y");
		 ?>
		</td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px"><b>Total Nilai</b></td>
		<td class="title_ket" width="290px"><b>: 
			<?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_nilai = $this->db->query("SELECT SUM(t_nilai.angka_huruf_mutu) AS total_nilai FROM t_detail_frs, t_mahasiswa, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_nilai = $jumlah_nilai->result_array();
			foreach ($data_jumlah_nilai as $data_jumlah_nilai) {			
			echo $data_jumlah_nilai['total_nilai'].".00";
			 }?></b>
		</td>
		<td></td>
	
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px"><b>Total SKS X Nilai</b></td>
		<td class="title_ket"><b>: <?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_nilai_x_sks = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_nilai_x_sks = $jumlah_nilai_x_sks->result_array();
			foreach ($data_jumlah_nilai_x_sks as $data_jumlah_nilai_x_sks) {			
			echo $data_jumlah_nilai_x_sks['total_nilai_semua'].".00";
			 }
		 ?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">a.n.Direktur</td>
		
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px"><b>Index Prestasi</b></td>
		<td class="title_ket" width="290px"><b>: <?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_ip = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$semester' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_ip = $jumlah_ip->result_array();
			foreach ($data_jumlah_ip as $data_jumlah_ip) {
			$indeks_prestasi = $data_jumlah_ip['total_nilai_semua'] / $data_jumlah_ip['jumlah_sks'];			
			echo number_format($indeks_prestasi, 2);
				}
		 ?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Kepala Sub Bagian BAAK</td>
	</tr>
	<?php 
		$semester = $this->input->post('semester');
		if($semester > 1){
	 ?>
	<tr>
		<td class="title_ket" style="padding-right:10px"><b>Index Prestasi Kumulatif</b></td>
		<td class="title_ket" width="290px"><b>: <?php 
			$tahun_akademik = $this->input->post("tahun_akademik");
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester'); 
			$jumlah_ip_kumulatif = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_ip_kumulatif = $jumlah_ip_kumulatif->result_array();
			foreach ($data_jumlah_ip_kumulatif as $data_jumlah_ip_kumulatif) {
			$indeks_prestasi_kumulatif = $data_jumlah_ip_kumulatif['total_nilai_semua'] / $data_jumlah_ip_kumulatif['jumlah_sks'];			
			echo number_format($indeks_prestasi_kumulatif, 2);
				}
		 ?></b></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px"></td>
	</tr>
	<?php } ?>


	<tr>
		<td class="title_ket" style="padding-right:10px"></td>
		<td class="title_ket" width="290px"></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">
		<br>
		<br>
		<b>
		<br>
			<?php  
				$data_tanda = $this->db->query("SELECT * FROM t_kbaak WHERE status = 'direktur_kepala_baak'");
				$ambil_data_tanda = $data_tanda->row_array();
				echo $ambil_data_tanda['nama'];	
			?>
			<br>
			NIP. <?php echo $ambil_data_tanda['nip'];	 ?></b>
		</td>
	</tr>

	
	
	
</table>

</body>
</html>