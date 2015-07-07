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
<li class="active">Input Nilai Per Mahasiswa</li>
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
	Akademik Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<h2>Form Input Nilai Per Mahasiswa</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Bahan Kuliah
					</h4>
				</div>
				<?php echo $this->session->userdata('nim_mahasiswa'); ?>
				<?php echo $this->session->userdata('kode_mk_mahasiswa'); ?>
				<?php echo $this->session->userdata('tahun_akademik_mahasiswa'); ?>
				<div class="widget-body">
					<div class="widget-main">
						<?php 
							$uri3 = $this->uri->segment(3);
						 ?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_dosen/isi_nilai_mahasiswa/<?php echo $uri3; ?>'/>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">NIM</label>
								<div class="controls">
									<input type='text' value="<?php echo $this->session->userdata('nim_mahasiswa'); ?>" name='nim'>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Akademik</label>

								<div class="controls">
									<select name="tahun_akademik">
										<?php foreach ($tahun_akademik as $tahun_akademik): ?>
											<option value="<?php echo $tahun_akademik['tahun_akademik']; ?>"><?php echo $tahun_akademik['tahun_akademik']; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="control-group">

						<div class="form-actions">
							<input type="submit" value ="Cari" name='cari_mahasiswa' class="btn btn-info">
						</div>
						
					</form>

								<div class="table-header">
				Nilai per mata kuliah
			</div>
			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;" width="25%">Nama Mahasiswa</th>
						<th style="text-align:center;">Nilai UTS</th>
						<th style="text-align:center;">Nilai UAS</th>
						<th style="text-align:center;">Nilai Tugas</th>
						<th style="text-align:center;">Nilai Rata-rata</th>
						<th style="text-align:center;">Huruf Mutu</th>
						<th style="text-align:center;">Opsi</th>
					</tr>
				</thead>
					<?php 

					$no = 1;
				foreach ($data as $data) {
				
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php  echo $data['nama'];?></td>
					<td><?php echo $data['nilai_uts']; ?></td>
					<td><?php echo $data['nilai_uas']; ?></td>
					<td><?php echo $data['nilai_tugas']; ?></td>
					<td><?php echo $data['bobot_nilai']; ?></td>
					<td><?php echo $data['huruf_mutu']; ?></td>
					<td style="text-align:center;">
						<?php  
							if($data['pengisian_nilai'] == "dibuka"){
						?>
						<?php
							if($data['huruf_mutu'] == "" || $data['nilai_uts'] == "0" || $data['nilai_uas'] == "0" || $data['nilai_tugas'] == "0"){ ?>
								<a href="<?php echo base_url(); ?>c_index_aka/input_nilai/<?php echo $data['id_mhs']; ?>/<?php echo $data['id_mk']; ?>"><button class="btn btn-small btn-success">Isi Nilai</button></a>
							<?php }else{ ?>
								<a href="<?php echo base_url(); ?>c_index_aka/edit_nilai/<?php echo $data['id_mhs']; ?>/<?php echo $data['id_mk']; ?>"><button class="btn btn-small btn-primary">Edit Nilai</button></a>
							<?php } ?>
						<?php
							}else{
						?>
							<button class="btn btn-danger btn-small" disabled="disabled"> Ditutup</button>
						<?php
							}
						?>
					</td>
				</tr>
				<?php
				$no++; 
					}
				?>			
			</table>
	
					</div>
				</div>
			
			</div>
</div>