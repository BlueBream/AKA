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
			<?php echo $this->m_aka->msg('msg_error','alert-eror'); ?>	
			<?php echo $this->m_aka->msg('msg','alert-succes'); ?>				

			<div class="table-header">
				Results for "hasil pencarian Data Matakuliah" <a href='<?php echo base_url();?>c_index_aka/Kuota_mata_kuliah_pilihan'><button class="btn btn-small btn-success">
															lihat Semua
															<i class="icon-arrow-right icon-on-right bigger-110"></i>
														</button></a>
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
						<th>Kuota</th>
						<th>Status Kuota</th>

						<th>

							<a class="green" href="<?php echo base_url(); ?>c_index_aka/t_kuota_mata_kuliah_pilihan">
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
						<td><span class="label label-important arrowed"><?php echo $data['kuota']; ?></span></td>
				<?php
					if($data['kuota'] > 0){
						echo "<td><span class='label label-info arrowed-in arrowed-in-right'>Tersedia</span></td>";						
					}else{
						echo "<td><span class='label label-inverse arrowed'>Penuh</span></td>";						
					}
				?>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/l_edit_kuota_matkul_pilihan/<?php echo $data['kode_mk']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_kuota_matkul_pilihan/<?php echo $data['kode_mk']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
						$no++;
					} ?>
<?php 
//	echo $this->session->userdata("status");
?>
				</tbody>
				
			</table>
				<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php 
						echo $pagination;
					?>
				</div>
			</div>
</div>
</div><!--/.page-content-->

