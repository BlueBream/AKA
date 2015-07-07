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
<li class="active">Tambah Data Program Studi</li>
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
	<h2>Form Input Data Program Studi</h2>
	<div class="row-fluid">
	<?php $this->m_aka->msg('msg', 'success'); ?>
	<div class="table-header">
		Data Program Studi
	</div>
	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>ID Prodi</th>
			<th>Nama Prodi</th>
			<th>
				<a class="green" href="<?php echo base_url(); ?>c_index_aka/tambah_program_studi">
								<i class="icon-plus bigger-130"></i> Tambah
				</a>
			</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($data as $data): ?>

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['id_prodi']; ?></td>
				<td><?php echo $data['prodi']; ?></td>
				<td>
					<a href="<?php echo base_url(); ?>c_index_aka/edit_program_studi/<?php echo $data['id_prodi']; ?>"><button class="btn btn-info btn-small">Edit</button></a>
					<a href="<?php echo base_url(); ?>c_index_aka/hapus_prodi/<?php echo $data['id_prodi']; ?>"><button class="btn btn-danger btn-small">Hapus</button></a>
				</td>
			</tr>

		<?php
		$no++;
		endforeach; ?>
	</table>
	</div>
</div>