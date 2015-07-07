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
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>
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
					<label class="control-label" for="form-field-1">Cari file jadwal Kuliah</label>
					<form method="post" action="<?php echo base_url(); ?>p_mahasiswa/jadwal_kuliah">
						<input type="text" id="form-field-1" name="nama" placeholder="Nama" />
						<input type="submit" name="src" class="btn btn-small btn-primary" style="margin-top:-10px;">
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
				Results for "hasil pencarian data jadwal kuliah"
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama</th>
						<th>Keterangan</th>
						<th>Nama Mata Kuliah</th>
						<th>File</th>
						<th>Opsi</th>
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
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['keterangan']; ?></td>
						<td><?php echo $data['nama_mk']; ?></td>
						<td><?php echo $data['path']; ?></td>

						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="blue" href="<?php echo base_url(); ?>assets/file/<?php echo $data['path']; ?>">
									<i class="icon-zoom-in bigger-130"></i> Download
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
</div>
</div><!--/.page-content-->

