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
	<li class="active">Data Bahan Kuliah</li>
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
		Posting Pengumuman
		<small>
			<i class="icon-double-angle-right"></i>
			Bahan Kuliah
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data bahan Kuliah</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="Cari Berdasarkan Nama" />
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
				Results for "hasil pencarian data bahan kuliah"
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Mata kuliah</th>
						<th>Nama</th>
						<th>Keterangan </th>
						<th>Path</th>
						<th>Tampil</th>
						<th>

							<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_bahan_kuliah">
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
						<td><?php echo $data['kode_mk']; ?> - <?php echo $data['nama_mk']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['keterangan']; ?></td>
						<td><?php echo $data['path']; ?></td>
						<td><span class="label label-info arrowed arrowed-righ"><?php echo $data['is_tampil']; ?></span></td>


						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="blue" href="<?php echo base_url(); ?>assets/file/<?php echo $data['path']; ?>">
									<i class="icon-zoom-in bigger-130"></i> Download
								</a>
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_bahan_kuliah/<?php echo $data['id']; ?>/<?php echo $data['path']; ?>">
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

