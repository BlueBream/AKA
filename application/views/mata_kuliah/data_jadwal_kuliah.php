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
	<li class="active">Data Jadwal Kuliah</li>
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
		Mata Kuliah
		<small>
			<i class="icon-double-angle-right"></i>
			Jadwal Kuliah
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari File Jadwal Kuliah</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="Cari Berdasarkan Nama File" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
			?>
			<div class="table-header">
				Results For "Hasil Pencarian Data Jadwal Kuliah"
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Tingkat</th>
						<th>Keterangan</th>
						<th>File</th>
						<th>

							<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_jadwal_kuliah">
								<i class="icon-plus bigger-130"></i> Tambah
							</a>

						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $data['tingkat']; ?></td>
						<td><?php echo $data['keterangan']; ?></td>
						<td><?php echo $data['path']; ?></td>

						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="blue" href="<?php echo base_url(); ?>assets/file/<?php echo $data['path']; ?>">
									<i class="icon-zoom-in bigger-130"></i> Download
								</a>

								<!--<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mahasiswa/<?php echo $data['id_mahasiswa']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>-->

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_jadwal_kuliah/<?php echo $data['id']; ?>/<?php echo $data['path']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
						$no++;
					} ?>
				</tbody>
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
</div><!--/.page-content-->

