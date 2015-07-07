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
<li class="active">Permohonan Cuti</li>
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
	<h3>Form Input Permohonan Cuti</h3>
	<?php $this->m_aka->msg('msg_input','success'); ?>
	<?php $this->m_aka->msg('msg_input_error','error'); ?>
		<form action="<?php echo base_url(); ?>c_index_aka/cuti_akademik" method="post">
				<div class="control-group">
					<label class="control-label" for="form-field-1">NIM</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nim" placeholder="NIM" required/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Ajuan Cuti</label>
					<div class="controls">
						<select name="semester_ajuan">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
							?>
							<option value="<?php echo $angka; ?>"><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Cuti</label>
					<div class="controls">
						<select name="semester_cuti">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
							?>
							<option value="<?php echo $angka; ?>"><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Masuk</label>
					<div class="controls">
						<select name="semester_masuk">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
							?>
							<option value="<?php echo $angka; ?>"><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Alasan
					</label>

					<div class="controls">
						<textarea rows = "7" id="form-field-1" name="alasan"></textarea>
					</div>	

				</div>

				<input type="submit" name="add_cuti" value ="Save" class="btn btn-info btn-small">
			
	</form>
	<br>
	<?php $this->m_aka->msg('msg','error'); ?>
	<?php $this->m_aka->msg('msg_success','success'); ?>
	<div class="row-fluid">
		<div class="row-fluid">
		<form action="<?php echo base_url(); ?>c_index_aka/cuti_akademik" method="post"echo >
		<div class="controls">
			<label for = "id-cari">Pencarian</label>
			<select name="cari_cuti_tahun">
				<?php foreach($tahun_akademik as $tahun_akademik){
				?>
					<option value="<?php echo $tahun_akademik['tahun_akademik']; ?>"><?php echo $tahun_akademik['tahun_akademik']; ?></option>
				<?php
					}
				?>
			</select>
			
			</div>

			<div class="controls">
				<input type="submit" class="btn-small btn-primary btn" value="Cari" name="cari_cuti">
			</div>
		</div>
		</form>
		<br>
		<div class="table-header">
				Daftar cuti mahasiswa
		</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Tanggal</th>
					<th>Semester Ajuan</th>
					<th>Semester Cuti</th>
					<th>Semester Masuk</th>
					<th>Tahun Akademik</th>
					<th>Alasan</th>
					<th>Opsi</th>
				</tr>

				<?php 
					$no = 1;
					foreach($data as $data){

					//Generated Tanggal
					$tanggal = explode("-", $data['tgl_cuti']);

					if($tanggal[1] == '01'){
						$bulan = "Januari";
					}
					else if($tanggal[1] == '02'){
						$bulan = "Febuari";
					}
					else if($tanggal[1] == '03'){
						$bulan = "Maret";
					}
					else if($tanggal[1] == '04'){
						$bulan = "April";

					}else if($tanggal[1] == '05'){
						$bulan = "Mei";
					}
					else if($tanggal[1] == '06'){
						$bulan = "Juni";
					}
					else if($tanggal[1] == '07'){
						$bulan = "Juli";
					}
					else if($tanggal[1] == '08'){
						$bulan = "Agustus";
					}
					else if($tanggal[1] == '09'){
						$bulan = "September";
					}
					else if($tanggal[1] == '10'){
						$bulan = "Oktober";
					}
					else if($tanggal[1] == '11'){
						$bulan = "November";
					}
					else if($tanggal[1] == '12'){
						$bulan = "Desember";
					}
					$all_tanggal = $tanggal[2]." - ".$bulan." - ".$tanggal[0];

				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $all_tanggal ?></td>
					<td><?php echo $data['semester_ajuan_cuti']; ?></td>
					<td><?php echo $data['semester_cuti']; ?></td>
					<td><?php echo $data['semester_cuti_masuk']; ?></td>
					<td><?php echo $data['tahun_akademik']; ?></td>
					<td><?php echo $data['alasan'];?></td>
					<td>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_cuti/<?php echo $data['id']; ?>">
								<i class="icon-pencil bigger-130"></i>
							</a><br>

							<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_cuti/<?php echo $data['id']; ?>/<?php echo $data['nim']; ?>">
								<i class="icon-trash bigger-130"></i>
							</a>
						</div>
					</td>
				</tr>
				<?php
					$no++;
					 }
				?>
			</table>
				<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php echo $pagination; ?>
				</div>
			</div>
		
</div>	
		</div>
	</div>	
</div>