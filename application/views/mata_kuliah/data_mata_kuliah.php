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
			?>
			<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active" style="width:180px;text-align:center;">
					<a data-toggle="tab">
					<i class="green icon-leaf bigger-110"></i>
					</a>
				</li>
				<li class="active" style="width:310px;text-align:center;">
					<a data-toggle="tab">
					<i class="green icon-leaf bigger-110"></i>
						Analisis Kimia

					</a>
				</li>
				<li class="active" style="width:311px;text-align:center;">
					<a data-toggle="tab">
					<i class="green icon-leaf bigger-110"></i>
						Penjaminan Mutu Industri Pangan

					</a>
				</li>
				<li class="active" style="width:310px;text-align:center;">
					<a data-toggle="tab">
					<i class="green icon-leaf bigger-110"></i>
						Pengolahan Limbah Industri

					</a>
				</li>
			</ul>
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a data-toggle="tab" href="#semesterother">
			
						Mata Kuliah Ganjil/Genap

					</a>
				</li>

				<li class="">
					<a data-toggle="tab" href="#semester1A">
					<i class="green icon-folder-close bigger-110"></i>
						kuliah Semester 1
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#semester2A">
					<i class="green icon-folder-open bigger-110"></i>
						Kuliah Semester 2
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#semester1B">
					<i class="green icon-folder-close bigger-110"></i>
						kuliah Semester 1
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#semester2B">
					<i class="green icon-folder-open bigger-110"></i>
						Kuliah Semester 2
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#semester1C">
					<i class="green icon-folder-close bigger-110"></i>
						Kuliah Semester 1
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#semester2C">
					<i class="green icon-folder-open bigger-110"></i>
						Kuliah Semester 2
					</a>
				</li>
			</ul>
			<div class="tab-content">
			<div id="semesterother" class="tab-pane in active">
				<div class="table-header">
					Data mata kuliah semester Gasal/Genap
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
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
							<td><?php echo $data['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $data['status']; ?></span></td>
							<td><?php echo $data['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $data['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $data['id_mk']; ?>">
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

				<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php 
						echo $pagination;
					?>
				</div>
			</div>
				</div>
				<div id="semester1A" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 1
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php

						//Loop data
						$no1 = 1;
						foreach ($semester1A as $semester1A) {			 
					?>
						<tr>
							<td><center><?php echo $no1;?></center></td>
							<td><?php echo $semester1A['kode_mk']; ?></td>
							<td><?php echo $semester1A['nama_mk']; ?></td>
							<td><?php echo $semester1A['jumlah_sks']; ?></td>
							<td><?php echo $semester1A['semester']; ?></td>
							<td value="<?php echo $semester1A['id_prodi']; ?>"><?php echo $semester1A['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester1A['status']; ?></span></td>
							<td><?php echo $semester1A['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<!--<a class="blue" href="#">
										<i class="icon-zoom-in bigger-130"></i>
									</a>-->

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester1A['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester1A['id_mk']; ?>">
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
				</div>
				<div id="semester2A" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 2
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php
						$no2 = 1;
						foreach ($semester2A as $semester2A) {			 
					?>
						<tr>
							<td><center><?php echo $no2;?></center></td>
							<td><?php echo $semester2A['kode_mk']; ?></td>
							<td><?php echo $semester2A['nama_mk']; ?></td>
							<td><?php echo $semester2A['jumlah_sks']; ?></td>
							<td><?php echo $semester2A['semester']; ?></td>
							<td value="<?php echo $semester2A['id_prodi']; ?>"><?php echo $semester2A['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester2A['status']; ?></span></td>
							<td><?php echo $semester2A['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester2A['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester2A['id_mk']; ?>">
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
			</div>
				<div id="semester1B" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 1
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php

						//Loop data
						$no3 = 1;
						foreach ($semester1B as $semester1B) {			 
					?>
						<tr>
							<td><center><?php echo $no3;?></center></td>
							<td><?php echo $semester1B['kode_mk']; ?></td>
							<td><?php echo $semester1B['nama_mk']; ?></td>
							<td><?php echo $semester1B['jumlah_sks']; ?></td>
							<td><?php echo $semester1B['semester']; ?></td>
							<td value="<?php echo $semester1B['id_prodi']; ?>"><?php echo $semester1B['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester1B['status']; ?></span></td>
							<td><?php echo $semester1B['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<!--<a class="blue" href="#">
										<i class="icon-zoom-in bigger-130"></i>
									</a>-->

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester1B['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester1B['id_mk']; ?>">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								
							</td>
						</tr>
						<?php
							$no3++;
						} ?>

					</tbody>
					
				</table>
				</div>
				<div id="semester2B" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 2
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php
						$no4 = 1;
						foreach ($semester2B as $semester2B) {			 
					?>
						<tr>
							<td><center><?php echo $no4;?></center></td>
							<td><?php echo $semester2B['kode_mk']; ?></td>
							<td><?php echo $semester2B['nama_mk']; ?></td>
							<td><?php echo $semester2B['jumlah_sks']; ?></td>
							<td><?php echo $semester2B['semester']; ?></td>
							<td value="<?php echo $semester2B['id_prodi']; ?>"><?php echo $semester2B['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester2B['status']; ?></span></td>
							<td><?php echo $semester2B['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester2B['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester2B['id_mk']; ?>">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								
							</td>
						</tr>
						<?php
							$no4++;
						} ?>

					</tbody>
				</table>
			</div>
				<div id="semester1C" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 1
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php

						//Loop data
						$no5 = 1;
						foreach ($semester1C as $semester1C) {			 
					?>
						<tr>
							<td><center><?php echo $no5;?></center></td>
							<td><?php echo $semester1C['kode_mk']; ?></td>
							<td><?php echo $semester1C['nama_mk']; ?></td>
							<td><?php echo $semester1C['jumlah_sks']; ?></td>
							<td><?php echo $semester1C['semester']; ?></td>
							<td value="<?php echo $semester1C['id_prodi']; ?>"><?php echo $semester1C['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester1C['status']; ?></span></td>
							<td><?php echo $semester1C['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<!--<a class="blue" href="#">
										<i class="icon-zoom-in bigger-130"></i>
									</a>-->

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester1C['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester1C['id_mk']; ?>">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								
							</td>
						</tr>
						<?php
							$no5++;
						} ?>

					</tbody>
					
				</table>
				</div>
				<div id="semester2C" class="tab-pane">
				<div class="table-header">
					Data mata kuliah semester 2
				</div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th>Kode Mata Kuliah</th>
							<th>Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Semester</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Praktikum</th>
							<th>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_mata_kuliah">
									<i class="icon-plus bigger-130"></i> Tambah
								</a>

							</th>
						</tr>
					</thead>

					<tbody>
						
					<?php
						$no6 = 1;
						foreach ($semester2C as $semester2C) {			 
					?>
						<tr>
							<td><center><?php echo $no6;?></center></td>
							<td><?php echo $semester2C['kode_mk']; ?></td>
							<td><?php echo $semester2C['nama_mk']; ?></td>
							<td><?php echo $semester2C['jumlah_sks']; ?></td>
							<td><?php echo $semester2C['semester']; ?></td>
							<td value="<?php echo $semester2C['id_prodi']; ?>"><?php echo $semester2C['prodi']; ?></td>
							<td><span class="label label-info arrowed arrowed-righ"><?php echo $semester2C['status']; ?></span></td>
							<td><?php echo $semester2C['is_pratikum']; ?></td>
							

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">

									<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mata_kuliah/<?php echo $semester2C['id_mk']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mata_kuliah/<?php echo $semester2C['id_mk']; ?>">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								
							</td>
						</tr>
						<?php
							$no6++;
						} ?>

					</tbody>
					
				</table>
				</div>
				</div>
			</div>
</div><!--/.page-content-->

