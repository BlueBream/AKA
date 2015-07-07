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
	<li class="active">Data Mahasiswa</li>
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
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Data mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/password_generate'>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa Berdasarkan Angkatan</label>
					<select name="angkatan" id="form-field-select-1">
						<option />- Pilih Tahun Angkatan -
						<?php foreach ($tahun as $tahun): ?>
							<option value="<?php echo $tahun['tahun_akademik']; ?>"><?php echo $tahun['tahun_akademik']; ?></option>
						<?php endforeach; ?>
					</select>
					<label class="control-label" for="form-field-1">Program Studi</label>			
					<select id="form-field-select-1" name="program_studi">
						<option />- Pilih Program Studi -
						<?php	
						$k = $this->db->query("SELECT * FROM t_prodi");									
						$st = $k->result();
						foreach($st as $row){ 
						 ?>
						<option value="<?php echo $row->prodi; ?>" name="program_studi"><?php echo $row->prodi;  ?> </option>
									
							<?php
							}
						?>
						
					</select>
				</div>

				<div class="controls">
					<input type="submit" name="save_password" class="btn btn-small btn-primary" value="Cari">
				</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
<?php if($data != ""){ ?>
<div class="row-fluid">
		<div style="text-align:right;">
		<form method="post" action='<?php echo base_url();?>c_index_aka/password_generate'>
			<input type="submit" name="generate_password" class="btn btn-small btn-info" value="Generate">
		</form>
		</div>
			<?php
				$this->m_aka->msg('msg','error');
				$this->m_aka->msg('msg_success','success');
			?>
			<div style="text-align:right;"class="row-fluid">
			</div>
			<br>
			<div class="table-header">
				Password Generate
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nim</th>
						<th>Nama</th>
						<th>Angkatan</th>
						<th>Password</th>
					</tr>
				</thead>

				<tbody>
				<form method="post" action='<?php echo base_url();?>c_index_aka/proses_generate_password'>
				<?php $angkatan_label = $this->session->userdata('angkatan_mhs'); ?>
				<input type="hidden" name="label_angkatan" value="<?php echo $angkatan_label; ?>">
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {	 
				?>
					<tr>
						<td>
						<?php echo $no; ?>
						<input type="hidden" name="id_mhs[]" value="<?php echo $data['id_mahasiswa']; ?>">
						</td>
						<td>
							<?php echo $data['nim']; ?>
							<input type="hidden" name="nim_loop[]" value="<?php echo $data['nim']; ?>">
						</td>
						<td>
							<?php echo $data['nama']; ?>
							<input type="hidden" name="nama_loop[]" value="<?php echo $data['nama']; ?>">
						</td>
						<td>
							<?php echo $data['angkatan']; ?>
							<input type="hidden" name="angkatan_loop[]" value="<?php echo $data['angkatan']; ?>">
						</td>
						<td width="250px">
							<?php

								$generate_password = $this->input->post('generate_password');

								if($generate_password){
									$jumlah = $data['id_mahasiswa'] + 2;
							?>
								<input type="text" name="password_mhs[]" value="<?php echo $data['nim'].$huruf_password.$jumlah.$no; ?>">
							<?php
								}
							?>
						</td>
					</tr>
					<?php
						$no++;
					}
					 ?>
				</tbody>
			</table>
			<?php 
				if($generate_password){
			 ?>
			<div style="text-align:right" class="row-fluid">

					<input type="submit" name="save_password_generate" class="btn btn-small btn-success" value="Save Password">
				
			</div>
			<?php 
				}
			 ?>
			 </form>

</div><!--/.page-content-->
<?php } ?>

