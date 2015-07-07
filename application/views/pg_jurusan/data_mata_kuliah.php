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
	<li class="active">Data Mata Kuliah</li>
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
			Data Mata Kuliah
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Nama Mata Kuliah</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
				$this->m_aka->msg('msg_success','success');
			?>
			<div class="table-header">
				Results for "hasil pencarian Data Matakuliah"
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Kode Mata Kuliah</th>
						<th>Mata Kuliah</th>
						<th>Jumlah SKS</th>
						<th>Semester</th>
						<th>Status</th>
						<th>Praktikum</th>
						<th>

							<a class="green" href="<?php echo base_url(); ?>p_jurusan/input_mata_kuliah">
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
						<td><?php echo $data['kode_mk']; ?></td>
						<td><?php echo $data['nama_mk']; ?></td>
						<td><?php echo $data['jumlah_sks']; ?></td>
						<td><?php echo $data['semester']; ?></td>
						<td><span class="label label-info arrowed arrowed-righ"><?php echo $data['status']; ?></span></td>
						<td><?php echo $data['is_pratikum']; ?></td>
						

						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a>-->

								<a class="green" href="<?php echo base_url(); ?>p_jurusan/edit_mata_kuliah/<?php echo $data['id_mk']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>p_jurusan/hapus_mata_kuliah/<?php echo $data['id_mk']; ?>">
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

