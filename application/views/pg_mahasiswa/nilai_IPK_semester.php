<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
	<li>
		<i class="icon- home-icon"></i>
		<a href="#">Home</a>

		<span class="divider">
			<i class="icon-angle-right arrow-icon"></i>
		</span>
	</li>
	<li class="active">Nilai per mahasiswa	</li>
</ul><!--.breadcrumb-->

<div class="nav-search" id="nav-search">
	<form class="form-search" />
		<span class="input-icon">
			<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
			<i class="icon-search nav-search-icon"></i>
		</span>
	</form>
</div><!--#nav-search-->
</div>

<div class="page-content">
<div class="page-header position-relative">
	<h1>
		Nilai Akademik
	</h1>
</div><!--/.page-header-->

	<br>
<div class="row-fluid">
				
			<div class="row-fluid">
				
			<div class="table-header">
				Nilai mahasiswa
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%"><center>No</center></th>
						<th style="text-align:center;">Kode MK</th>
						<th style="text-align:center;" width="25%">Nama Mata Kuliah</th>
						<th style="text-align:center;">SKS</th>
						<th style="text-align:center;">Huruf Mutu</th>
						<th style="text-align:center;">Angka Mutu Mutu</th>
						<th style="text-align:center;">Nilai Mutu</th>

					</tr>
				</thead>
					<?php
						$no =1 ; 
						foreach($data as $data){
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['kode_mk']; ?></td>
					<td><?php echo $data['nama_mk']; ?></td>
					<td><?php echo $data['jumlah_sks']; ?></td>
					<td><?php echo $data['huruf_mutu']; ?></td>
					<td><?php echo $data['angka_huruf_mutu']; ?></td>
					<td><?php echo $data['jumlah_sks'] * $data['angka_huruf_mutu']; ?></td>
					
				</tr>
					<?php
						$no++;
					 	}
					 ?>
	<tr>
		<td colspan="7" align="left" class="title_value">MATA KULIAH PILIHAN</td>
	</tr>					 
	<tr>
		<td colspan="3" >Jumlah</td>
		<td >
			<?php 
				$nim = $nim;
				$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_detail_frs.semester = '$smt'");
				$data_jumlah_sks = $jumlah_sks->result_array();
				foreach ($data_jumlah_sks as $data_jumlah_sks) {			
					echo $data_jumlah_sks['total_sks'];
				}
			 ?>
		</td>
		<td colspan="3">
		<center>
		<?php 
			$nim = $nim;
			$jumlah_nilai = $this->db->query("SELECT SUM(t_mk.jumlah_sks * t_nilai.angka_huruf_mutu) AS total_nilai FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak' AND t_detail_frs.semester = '$smt'");
			$data_jumlah_nilai = $jumlah_nilai->result_array();
			foreach ($data_jumlah_nilai as $data_jumlah_nilai) {			
				echo $data_jumlah_nilai['total_nilai'];
			}
		 ?>
		</center></td>
	</tr>
<tr>
<td class="title_ket" width="220px" colspan='3'>
			Indeks Prestasi Kumulatif (IPK)
		</td>
		<td class="title_ket" colspan='3'>
			 <u>Jumlah Nilai Mutu</u> = 
		</td>
		<td><?php 
			$nim = $nim;
			$jumlah_ip_kumulatif = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_detail_frs.semester = '$smt'");
			$jumlah=$jumlah_ip_kumulatif->num_rows();
			if($jumlah){
				$data_jumlah_ip_kumulatif = $jumlah_ip_kumulatif->result_array();
				foreach ($data_jumlah_ip_kumulatif as $data_jumlah_ip_kumulatif) {
					$indeks_prestasi_kumulatif = $data_jumlah_ip_kumulatif['total_nilai_semua'] / $data_jumlah_ip_kumulatif['jumlah_sks'];			
						echo number_format($indeks_prestasi_kumulatif, 2);
					}
			}else{
				echo "";
			}
			 ?>
		</td>
</tr>	
			</table>


			</div>
		
</div>
</div><!--/.page-content-->

