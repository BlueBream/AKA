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
	<li class="active">Nilai Mahasiswa</li>
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
		Nilai Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span6">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#permahasiswa">
													<i class="green icon-home bigger-110"></i>
													Permahasiswa
												</a>
											</li>

											<li class="">
												<a data-toggle="tab" href="#perkelas">
													Perkelas
													<span class="badge badge-important"></span>
												</a>
											</li>

											<li class="">
												<a data-toggle="tab" href="#keseluruhan">
													keseluruhan
													<span class="badge badge-important"></span>
												</a>
											</li>
										</ul>

										<div class="tab-content">
											<div id="permahasiswa" class="tab-pane active">
												<form method="post" action='<?php echo base_url();?>p_dosen/nilai_permahasiswa/<?php echo $this->uri->segment(3);?>'>
												<div id="matakuliah" class="control-group">
												<div class="controls">
													<label class="control-label" for="form-field-1">Cari berdsarkan</label>				
														
														<select name='cari_berdasarkan' id='form-field-select-1'>
															<option value='nim'>Nim</option>
															<option value='nama'>Nama</option>
														</select>
														
												</div>
												<div class="controls">
													<label class="control-label" for="form-field-1">NIM / Nama</label>				
														<input name='nim/nama' type='text' placeholder='Nim / Nama'>
													<input style="margin-top:-10px;"type="submit" name="cari" class="btn btn-small btn-primary" value="Cari">				
												</div>					
												</div>
												</form>
											</div>

											<div id="perkelas" class="tab-pane">
												<form method="post" action='<?php echo base_url();?>p_dosen/nilai_permahasiswa/<?php echo $this->uri->segment(3);?>'>
												<div id="matakuliah" class="control-group">
												<div class="controls">
													<label class="control-label" for="form-field-1">Kelas</label>				
														
														<select name='perkelas' id='form-field-select-1'>
								<?php 
								$kelas = $this->db->get('t_kelas')->result();
								foreach($kelas as $row){
									?>
														<option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas;?></option>
									<?php
								}
								?>							
														</select>
														
												</div>
												<div class="controls">
													<input style="margin-top:-10px;"type="submit" name="cari_perkelas" class="btn btn-small btn-primary" value="Cari">				
												</div>					
												</div>
												</form>											</div>

											<div id="keseluruhan" class="tab-pane">
												<form method="post" action='<?php echo base_url();?>p_dosen/nilai_permahasiswa/<?php echo $this->uri->segment(3);?>'>
												<div id="matakuliah" class="control-group">
												<div class="controls">
													<label class="control-label" for="form-field-1">Tahun Ajaran</label>				
														
														<select name='per_tahun_ajaran' id='form-field-select-1'>
								<?php 
								$tahun = $this->db->get('t_tahun_akademik')->result();
								foreach($tahun as $row){
									?>
														<option value="<?php echo $row->tahun_akademik; ?>"><?php echo $row->tahun_akademik;?></option>
									<?php
								}
								?>							
														</select>
												</div>
												<div class="controls">
													<input style="margin-top:-10px;"type="submit" name="cari_keseluruhan" class="btn btn-small btn-primary" value="Cari">				
												</div>					
												</div>
											</form>
										</div>
										</div>
									</div>
								</div>


		
		
	</div><!--/.row-fluid-->
	<?php $this->m_aka->msg('msg','error'); ?>
		<?php $this->m_aka->msg('msg_success','success'); ?>
		<?php $this->m_aka->msg('msg_info','info'); ?>
		<?php $this->m_aka->msg('msg_info_e','info'); ?>
	<br>
<div class="row-fluid">
				
			<div class="row-fluid">
				<?php if($data != ""){ ?>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<tr>
					<th width="50%">
						Kode Mata Kuliah
					</th>
					<th width="50%"> Semester </th>
				</tr>
				<tr>
					<td>
						<?php 
							echo $loop_mk['kode_mk'];
						?>
					</td>
					<td>
					<?php
						$semester_absen = $ambil_mk_smt['semester'];
						if($semester_absen){
					 		if($semester_absen%2 == 1){
					 			$bilangan = "Gasal";
					 		}else{
					 			$bilangan = "Genap";
					 		}
							echo $bilangan;
						}
					 ?>
					 </td>
				</tr>
				<tr>
					<th width="50%">
						Nama Mata Kuliah
					</th>
					<th width="50%"> Tahun Akademik </th>
				</tr>
				<tr>
					<td><?php 
					 		
					 		echo $loop_mk['nama_mk'];
					 	
					 ?></td>
					<td>
					<?php		
						$kode_mk = $this->session->userdata('id_uri');
						$get_kode = $this->db->query("SELECT * FROM t_mk WHERE id_mk='$kode_mk'")->row();
						$kode_mk_s = $get_kode->kode_mk;							
						$get_tahun = $this->db->query("SELECT DISTINCT tahun_akademik FROM t_detail_frs WHERE id_mk='$kode_mk_s'");
						$thn = $get_tahun->row();
						if($get_tahun->num_rows() > 0){
							echo $thn->tahun_akademik;
						}else{
							echo "";
						}
					?></td>
				</tr>
				</table>
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
								<a href="<?php echo base_url(); ?>p_dosen/input_nilai/<?php echo $data['id_mhs']; ?>/<?php echo $data['id_mk']; ?>"><button class="btn btn-small btn-success">Isi Nilai</button></a>
							<?php }else{ ?>
								<a href="<?php echo base_url(); ?>p_dosen/edit_nilai/<?php echo $data['id_mhs']; ?>/<?php echo $data['id_mk']; ?>"><button class="btn btn-small btn-primary">Edit Nilai</button></a>
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
			<?php } ?>
			</div>
		
</div>
</div><!--/.page-content-->

