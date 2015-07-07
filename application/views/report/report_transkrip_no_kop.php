	<style type="text/css">
	body{
		font-family: "Opsensans", sans-serif;
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
	.title_h3{
		font-size: 10px;
	}
	.list-table{
		float: left;
		display: inline-block;
		width:50%;
	}
	.geser{
		margin-right:7px;
	}
	.abu-abu td{
		background:#B8B6B0;
	}
	
	.abu-abu td{
		background:#B8B6B0;
	}
	.garis{
		width:30px;
		height:2px;
		background: #000;
		position: absolute;
	}
	.garis2{
		border-bottom: 1px solid black;
	}
	.gaje{
		font-size: 1px !important;
		margin-top: 10px;
	}
	</style>
<br>
<br>
<br>
<br>
<hr>
<table border="0" width="100%">
	<tr>
		<td colspan="5" align="center">
			<font class="title_h1">
				<b>TRANSKRIP AKADEMIK</b><br>				
			</font>
			<font class="title_h3">
				<?php 
					$nim = $this->input->post("nim");
					$data_nomor = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
					$ambil_nomor = $data_nomor->row_array();
					echo $ambil_nomor['no_transkrip'];
				 ?>
			</font>
		</td>
	</tr>
	<tr>
		<td><br></td>
	</tr>
	<?php 
		$nim = $this->input->post('nim');
		$data_mhs_2 = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
		$ambil_data_2 = $data_mhs_2->row_array();
	 ?>
	<tr>
		<td align="left" class="title_ket" style="width: 170px;">Nama Mahasiswa</td>
		<td class="title_ket">: <?php echo $ambil_data_2['nama']; ?></td>		
	</tr>
	<tr>
		<td align="left" class="title_ket" style="width: 170px;">Nomor Induk Mahasiswa</td>
		<td class="title_ket">: <?php echo $ambil_data_2['nim']; ?></td>
	</tr>
	<tr>
		<td align="left" class="title_ket" style="width: 170px;">Tempat / Tgl Lahir</td>
		<td class="title_ket">: <?php echo $ambil_data_2['ttl']; ?></td>
	</tr>
	<tr>
		<td align="left" class="title_ket" style="width: 170px;">Program Studi</td>
		<td class="title_ket">: Kimia Analisis</td>
	</tr>
	<tr>
		<td align="left" class="title_ket" style="width: 170px;">Tahun Masuk</td>
		<td class="title_ket">: <?php 
			$ex_tahun = explode("/", $ambil_data_2['angkatan']);
			echo $ex_tahun[0];
		 ?></td>
	</tr>

	
	<tr>
		<td colspan="2"><br></td>
	</tr>
	
</table>



<table class="gridtable" cellpadding="7">
	<tr class="abu-abu">
		<td align="center" class="title_name">Kode</td>
		<td align="center" class="title_name">Mata Kuliah</td>
		<td align="center" class="title_name">SKS</td>
		<td align="center" class="title_name">Huruf Mutu</td>
		<td align="center" class="title_name">Angka Mutu</td>
		<td align="center" class="title_name">Nilai Mutu</td>
	</tr>
	<tr>
		<td align="center" class="title_name">1</td>
		<td align="center" class="title_name">2</td>
		<td align="center" class="title_name">3</td>
		<td align="center" class="title_name">4</td>
		<td align="center" class="title_name">5</td>
		<td align="center" class="title_name">6</td>
	</tr>
	<tr>
		<td colspan="6" align="left" class="title_value">MATA KULIAH WAJIB</td>
	</tr>
	<?php foreach($data as $data){ ?>
	<tr  cellpadding="10">
		<td align="left" class="title_value"><?php echo $data['kode_mk']; ?></td>
		<td align="left" class="title_value"><?php echo $data['nama_mk']; ?></td>
		<td align="center" class="title_value"><?php echo $data['jumlah_sks']; ?></td>
		<td align="center" class="title_value"><?php echo $data['huruf_mutu']; ?></td>
		<td align="center" class="title_value"><?php echo $data['angka_huruf_mutu']; ?></td>
		<td align="center" class="title_value"><?php echo $data['jumlah_sks'] * $data['angka_huruf_mutu']; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="6" align="left" class="title_value">MATA KULIAH PILIHAN</td>
	</tr>
	<tr >
		<td style="border-right:0px;border-left:0px;" colspan="2" align="center" class="title_value">Jumlah</td>
		<td style="border-right:0px;border-left:0px;" align="center" class="title_value">
			<?php 
				$nim = $this->input->post('nim');
				$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_detail_frs.id_nilai = t_nilai.id_nilai");
				$data_jumlah_sks = $jumlah_sks->result_array();
				foreach ($data_jumlah_sks as $data_jumlah_sks) {			
					echo $data_jumlah_sks['total_sks'];
				}
			 ?>
		</td>
		<td style="border-right:0px;border-left:0px;" align="center" ></td>
		<td style="border-right:0px;border-left:0px;" align="center" ></td>
		<td style="border-right:0px;border-left:0px;" align="center" class="title_value">
		<?php 
			$nim = $this->input->post('nim');
			$jumlah_nilai = $this->db->query("SELECT SUM(t_mk.jumlah_sks * t_nilai.angka_huruf_mutu) AS total_nilai FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak'");
			$data_jumlah_nilai = $jumlah_nilai->result_array();
			foreach ($data_jumlah_nilai as $data_jumlah_nilai) {			
				echo $data_jumlah_nilai['total_nilai'];
			}
		 ?></td>
	</tr>
</table>

<br>


<div class="ket_lulus list-table">

	<table border="0" width="100%">
		<tr>
			<td colspan="3"><br></td>
		</tr>
		<tr>
			<td height="10px" class="title_ket" style="width:180px">
				Indeks Prestasi Kumulatif (IPK)
			</td>
			<td>:</td>
			<td height="10px" class="title_ket" style="position:relative;">
				<div class="garis"></div>
				<span><span class="garis2">Jumlah Nilai Mutu</span> = <?php 
				$nim = $this->input->post('nim');
				$jumlah_ip_kumulatif = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
				$data_jumlah_ip_kumulatif = $jumlah_ip_kumulatif->result_array();
				foreach ($data_jumlah_ip_kumulatif as $data_jumlah_ip_kumulatif) {
				$indeks_prestasi_kumulatif = $data_jumlah_ip_kumulatif['total_nilai_semua'] / $data_jumlah_ip_kumulatif['jumlah_sks'];			
				echo number_format($indeks_prestasi_kumulatif, 2);

					}

				?>
				</span>
				  
				  Jumlah SKS
			</td>
		</tr>
		
		<tr>
			<td colspan="3" height="20px"></td>
		</tr>
		<tr>
			<td class="title_ket" style="width:180px">
				Lulus Dengan Predikat
			</td>
			<td>:</td>
			<td class="title_ket">
				<b><?php 

				$nim = $this->input->post('nim');
				$jumlah_ip_kumulatif = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak'");
				$data_jumlah_ip_kumulatif = $jumlah_ip_kumulatif->result_array();
				foreach ($data_jumlah_ip_kumulatif as $data_jumlah_ip_kumulatif) {
				$indeks_prestasi_kumulatif = $data_jumlah_ip_kumulatif['total_nilai_semua'] / $data_jumlah_ip_kumulatif['jumlah_sks'];			
				
				$filter_indeks = number_format($indeks_prestasi_kumulatif, 2);
				
				if($filter_indeks >= 2.76 AND $filter_indeks <= 3.50){
					echo "Sangat Memuaskan";
				}else if($filter_indeks >= 3.51 AND  $filter_indeks <= 4.00){
					echo "Cumlaude";
				}else{
					echo "Memuaskan";
				}
					}

				 ?></b>
			</td>
		</tr>
		<tr>
			<td class="title_ket" style="width:180px">
				Pada Tanggal
			</td>
			<td>:</td>
			<td class="title_ket">
				<?php 
					echo $this->input->post('tanggallulus')." ";
					$bulan = $this->input->post("bulanlulus");
					if($bulan == "1"){
						echo "Januari";
					}else if($bulan == "2"){
						echo "Februari";
					}else if($bulan == "3"){
						echo "Maret";
					}else if($bulan == "4"){
						echo "April";
					}else if($bulan == "5"){
						echo "Mei";
					}else if($bulan == "6"){
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
					echo " ".$this->input->post("tahunlulus");
				 ?>
		
			</td>
		</tr>
		<tr >
			<td colspan="3" height="57px;"><br></td>
		</tr>

	</table>

</div>
<div class="ket_photo list-table">
	<table border="0" width="100%">
		<tr>
			<td width="113px" height= "170px" style="text-align:center;border-collapse:collapse;border:1px solid black;">
				Foto 4 x 6
			</td>
			<td width="10px"></td>
			<td class="title_ket">
				Bogor, 
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
				<br>
				<?php 
					$data_tanda = $this->db->query("SELECT * FROM t_kbaak WHERE status = 'pembantu_direktur_bi'");
					$ambil_data_tanda = $data_tanda->row_array();
				 ?>
				<?php echo $ambil_data_tanda['jabatan']; ?>
				<br>
				Pembantu Direktur I,
				<br>
				<br>
				<br>
				<br>
				<br>
				<b><?php 
						
						echo $ambil_data_tanda['nama'];
					 ?>
				</b>
				<br>
				<b>NIP. <?php echo $ambil_data_tanda['nip']; ?></b>
			</td>
		</tr>
	</table>
</div>