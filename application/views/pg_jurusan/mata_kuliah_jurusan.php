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
	<li class="active">Pengaturan buka/tutup penilaian</li>
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
		Dosen
		<small>
			<i class="icon-double-angle-right"></i>
			Administrasi data dosen
		</small>
	</h1>

</div><!--/.page-header-->
<div class="row-fluid">
<div class="alert alert-info"><i class='icon-exclamation-sign'></i> Anda dapat men-set pilihan penutupan/pembukaan pengisian nilai pada login dosen.</div>
			<?php
				$this->m_aka->msg('msg','error');
				$this->m_aka->msg('msg_success','success');
			?>
			<div class="table-header">
				Mata Kuliah
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">Kode MK</th>
						<th style="text-align:center;">Nama Mata Kuliah</th>
						<th style="text-align:center;">Status</th>
						<th style="text-align:center;">Waktu Penilaian</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no = 1;
					foreach ($mk as $mk) {
				?>
					<tr>
						
							<td><?php echo $no; ?></td>
							<td><?php echo $mk['kode_mk']; ?></td>
							<td><?php echo $mk['nama_mk']; ?></td>
							<td><?php echo $mk['status']; ?></td>
							<td>
								<?php if($mk['pengisian_nilai'] == "dibuka"){ ?>
									<a href="<?php echo base_url(); ?>p_jurusan/proses_buka_mk/<?php echo $mk['id_mk']; ?>"><button class="btn btn-small btn-success">Dibuka</button></a>
								<?php }else{ ?>
									<a href="<?php echo base_url(); ?>p_jurusan/proses_buka_mk/<?php echo $mk['id_mk']; ?>"><button class="btn btn-small btn-danger">Ditutup</button></a>
								<?php } ?>
							</td>
						
					</tr>
				<?php
				$no ++;
					}
				 ?>	
				</tbody>
			</table>
			<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php //echo $pagination; ?>
				</div>
			</div>
		
</div>
</div><!--/.page-content-->

