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
	<li class="active">Data Kelas</li>
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
		Kelas
		<small>
			<i class="icon-double-angle-right"></i>
			Data Kelas
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Kelas
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesinput_data_kelas' enctype='multipart/form-data' />
							<!--<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Kelas</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="kode_kelas" placeholder="" />
								</div>
							</div>-->

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Kelas</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="nama_kelas" placeholder="" />
								</div>
								<br>
					<label class="control-label" for="form-field-1">Program Studi</label>&nbsp &nbsp &nbsp				
					<select id="form-field-select-1" name="id_prodi">
						<option />- Pilih Program Studi -
						<?php	
						$k = $this->db->query("SELECT * FROM t_prodi");									
						$st = $k->result();
						foreach($st as $row){ 
						 ?>
						<option value="<?php echo $row->id_prodi; ?>"  name="program_studi"><?php echo $row->prodi;  ?> </option>
									
							<?php
							}
						?>
						
					</select>
							</div>
							

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
			?>
		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a data-toggle="tab" href="#Kimia_Analisis">
					<i class="green icon-leaf bigger-110"></i>
						Kimia Analisis

					</a>
				</li>

				<li class="">
					<a data-toggle="tab" href="#Penjaminan_Mutu_Industri_Pangan">
					<i class="green icon-folder-close bigger-110"></i>
						Penjaminan Mutu Industri Pangan
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#Pengolahan_Limbah_Industri">
					<i class="green icon-folder-open bigger-110"></i>
						Pengolahan Limbah Industri
					</a>
				</li>
			</ul>

			<div class="tab-content">
			<div id="Kimia_Analisis" class="tab-pane in active">
			<div class="table-header">
				Data Kelas Kimia Analisis
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama Kelas</th>
						<th>Prodi</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($prodi1 as $prodi1) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $prodi1['nama_kelas']; ?></td>
						<td><?php echo $prodi1['prodi']; ?></td>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a>-->
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_data_kelas/<?php echo $prodi1['id_kelas']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_data_kelas/<?php echo $prodi1['id_kelas']; ?>">
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
	<!--	<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php //echo $pagination; ?>
				</div>
			</div>
		</div> -->
	</div>
	<div id="Penjaminan_Mutu_Industri_Pangan" class="tab-pane">
					<div class="table-header">
				Data Kelas Penjaminan Mutu Industri Pangan
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama Kelas</th>
						<th>Prodi</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no1 = 1;
					foreach ($prodi2 as $prodi2) {			 
				?>
					<tr>
						<td><center><?php echo $no1;?></center></td>
						<td><?php echo $prodi2['nama_kelas']; ?></td>
						<td><?php echo $prodi2['prodi']; ?></td>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a>-->
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_data_kelas/<?php echo $prodi2['id_kelas']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_data_kelas/<?php echo $prodi2['id_kelas']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
						$no1++;
					} ?>

				</tbody>
				
			</table>
	<!--		<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php //echo $pagination; ?>
				</div>
			</div>
		</div> -->
	</div>
	<div id="Pengolahan_Limbah_Industri" class="tab-pane">
					<div class="table-header">
				Data Kelas Pengolahan Limbah Industri
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama Kelas</th>
						<th>Prodi</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no2 = 1;
					foreach ($prodi3 as $prodi3) {			 
				?>
					<tr>
						<td><center><?php echo $no2;?></center></td>
						<td><?php echo $prodi3['nama_kelas']; ?></td>
						<td><?php echo $prodi3['prodi']; ?></td>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a>-->
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_data_kelas/<?php echo $prodi3['id_kelas']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_data_kelas/<?php echo $prodi3['id_kelas']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
						$no2++;
					} ?>

				</tbody>
				
			</table>
		<!--	<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php //echo $pagination; ?>
				</div>
			</div>
		</div> -->
	</div>


	</div>
</div>
</div><!--/.page-content-->

