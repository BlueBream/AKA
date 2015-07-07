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
	<li class="active">Data Biaya Kuliah</li>
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
		Keuangan
		<small>
			<i class="icon-double-angle-right"></i>
			Data Biaya Kuliah
		</small>
	</h1>
</div><!--/.page-header-->
<!--
	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Biaya Kuliah
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_keuangan/prosesinput_data_biaya_kuliah' enctype='multipart/form-data' />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Biaya</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="nama" placeholder="" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Harga</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="harga" placeholder="Rp." />
								</div>
							</div>

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
				</div>
		</div>
	</div>
	</div>--><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
				$this->m_aka->msg('msg_success','success');
			?>
			<div class="table-header">
				Data Biaya Kuliah
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama Biaya</th>
						<th>Harga</th>
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
						<td>Rp. <?php echo $data['harga']; ?></td>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a>-->

								<a class="green" href="<?php echo base_url(); ?>p_keuangan/edit_data_biaya_kuliah/<?php echo $data['id']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<!--
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>p_keuangan/hapus_data_biaya_kuliah/<?php echo $data['id']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>-->
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

