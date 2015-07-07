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
		Nilai Mahasiswa Per semester
	</h1>
</div><!--/.page-header-->
	<div class="alert alert-info">
		<i class="icon-exclamation-sign"></i> Anda Harus Mengisi Kuesioner Terlebih Dahulu Sebelum Melihat Nilai.
	</div>
<div class="row-fluid">
				
			<div class="row-fluid">
				
			<div class="table-header">
				Nilai Mahasiswa Semester <?php 


				echo $smt; ?> 
			<div class="kuisoner" style="text-align:right;margin-top:-40px;margin-right:10px;">
				<a href="<?php echo base_url(); ?>p_mahasiswa/tampil_kuesioner">
				<input type="submit" name="Kuesioner" class="btn btn-small btn-info" value="Kuesioner"></a></div>
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%"><center>No</center></th>
						<th style="text-align:center;">Kode MK</th>
						<th style="text-align:center;" width="25%">Nama Mata Kuliah</th>
						<th style="text-align:center;" width="5%">Jumlah SKS</th>
						<th style="text-align:center;">Huruf Mutu</th>

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
					<td><center><?php echo $data['jumlah_sks']; ?><center></td>
					<td><center><?php echo $data['huruf_mutu']; ?><center></td>
				</tr>
					<?php

						$no++;
					 	}
					 ?>
				<tr>
					<td style="text-align:center;"colspan='2'>Jumlah SKS :
			<?php
				$uri_s = $this->uri->segment(3);
				$nima = $nim;
				$smta =$smt;
				$jumlah_sks = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nima' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_detail_frs.semester = '$smta'");
				$data_jumlah_sks = $jumlah_sks->result_array();
				foreach ($data_jumlah_sks as $data_jumlah_sks) {			
					echo $data_jumlah_sks['total_sks'];
						}?>
					</td>
					<td style="text-align:center;" colspan="2"> Total Nilai : <?php 

						$tahun_akademik = $this->input->post("tahun_akademik");
						$nim = $this->input->post('nim');
						$semester = $this->input->post('semester'); 
						$jumlah_nilai_x_sks = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.semester = '$smta' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.nim = '$nima'");
						$data_jumlah_nilai_x_sks = $jumlah_nilai_x_sks->result_array();
						foreach ($data_jumlah_nilai_x_sks as $data_jumlah_nilai_x_sks) {			
						echo $data_jumlah_nilai_x_sks['total_nilai_semua'].".00";
						 }

					 ?></td>
					<td style="text-align:center;"> IP Semester <?php echo $uri_s; ?> : <?php 
						$jumlah_ip = $this->db->query("SELECT t_nilai.angka_huruf_mutu, SUM(t_nilai.angka_huruf_mutu * t_mk.jumlah_sks) AS total_nilai_semua, SUM(t_mk.jumlah_sks) AS jumlah_sks FROM t_detail_frs, t_mahasiswa, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.semester = '$smta' AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.ulang_mk = 'tidak' AND t_mahasiswa.nim = '$nima'");
						$data_jumlah_ip = $jumlah_ip->result_array();
						foreach ($data_jumlah_ip as $data_jumlah_ip) {
						$indeks_prestasi = $data_jumlah_ip['total_nilai_semua'] / $data_jumlah_ip['jumlah_sks'];			
						echo number_format($indeks_prestasi, 2);
							}
					 ?></td>

				</tr>					 
			</table>

			</div>
		
</div>
</div><!--/.page-content-->

