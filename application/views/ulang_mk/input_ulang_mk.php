<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script>
function get_Mata_kuliah(){
                var id_prodi = $("#prodi").val();
                $.ajax({ 
                    type: 'POST', 
                    url: "<?php echo site_url('c_index_aka/get_mata_kuliah'); ?>", 
                    data:"id_prodi="+id_prodi, 
                    success: function(msg) {
                            $("#mata_kuliah").html(msg);
                    }
                });
                }
</script>
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
<li class="active">Ulang Mata Kuliah</li>
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
	<h3>Form Input Ulang Mata Kuliah</h3>
	<?php $this->m_aka->msg('msg','success'); ?>
	<?php $this->m_aka->msg('msg_error','error'); ?>
		<form action="<?php echo base_url(); ?>c_index_aka/input_ulang_mk" method="post">
				<div class="control-group">
					<label class="control-label" for="form-field-1">NIM</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nim" placeholder="NIM" required/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Mata Kuliah Yang Diulang</label>
					<div class="controls">
						<select name="mk_ulang">
						<?php 
							foreach ($mk as $mk) {
						?>
							<option value="<?php echo $mk['kode_mk']; ?>"><?php echo $mk['kode_mk']." / ".$mk['nama_mk']; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Nilai mata kuliah sebelumnya</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nilai_sebelum" placeholder="Nilai Sebelumnya" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Nilai mata kuliah Sesudahnya</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nilai_sesudah" placeholder="Nilai Sesudahnya" required/>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Keterangan
					</label>

					<div class="controls">
						<textarea rows = "7" id="form-field-1" name="keterangan"></textarea>
					</div>	

				</div>

				<input type="submit" name="add_ulang_mk" value ="Save" class="btn btn-info btn-small">
			
	</form>
	<?php $this->m_aka->msg('msg_error_src', 'error'); ?>
	<form action="<?php echo base_url(); ?>c_index_aka/input_ulang_mk" method="post">
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="form-field-1">Parameter</label>
				<select name="parameter" id="form-field-1">
					<option value="nim">Berdasarkan NIM</option>
					<option value="nama">Berdasarkan Nama</option>
				</select>
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Masukan Data</label>
				<input type="text" name="data_cari" placeholder = "Masukan Data">
			</div>

			<input type="submit" name="cari_ulang" value ="Cari" class="btn btn-info btn-small">
		</div>
	</form>
			<div class="table-header">
				Daftar Ulang Mata Kuliah
		</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah</th>
					<th>Nilai Sebelumnya</th>
					<th>Nilai Sesudahnya</th>
					<th>Keterangan</th>
					<th>Semester</th>
					<th>Tahun Akademik</th>
				</tr>
				<?php 
					$no = 1;

					foreach($data as $data){
				 ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['kode_mk']; ?></td>
					<td><?php echo $data['nama_mk']; ?></td>
					<td><?php echo $data['nilai_sebelum']; ?></td>
					<td><?php echo $data['nilai_sesudah']; ?></td>
					<td><?php echo $data['keterangan']; ?></td>
					<td><?php echo $data['semester_mk_run']; ?></td>
					<td><?php echo $data['tahun_akademik']; ?></td>
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