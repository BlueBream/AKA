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
	<li class="active">Data Dosen</li>
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
			Data Dosen
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<!--<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Dosen</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="cari berdasarkan nama" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>-->		
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<div class="table-header">
				Results for Data Dosen
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIP</th>
						<th style="text-align:center;">Nama Dosen</th>
						<th style="text-align:center;">Kode & Nama matkul</th>
						
						<th style="text-align:center;">
							<a class="green" href="<?php echo base_url(); ?>p_jurusan/detail_matkul_dosen/<?php echo $id_dosen;?>">
								Tambah <i class="icon-plus bigger-130"></i> 
							</a>
						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($edit as $data) {			 
				?>
					<tr>
						<td style="text-align:center;" ><?php echo $no;?></td>
						<td style="text-align:center;" ><?php echo $data['nip']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td style="text-align:center;" ><?php echo $data['kode_mk']; ?> - <?php echo $data['nama_mk']; ?></td>
						
						<td  style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="<?php echo base_url(); ?>p_jurusan/detail_mahasiswa/<?php echo $data['nim']; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a><br>-->

								<!--<a class="green" href="<?php echo base_url(); ?>p_jurusan/edit_data_dosen/<?php echo $data['id_dosen']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>-->

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>p_jurusan/hapus_data_matkul_dosen/<?php echo $data['id_pengajar']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
								
							</div>

							
						</td>
					</tr>
					<?php
						$no++;
					}
					 ?>
				</tbody>
			</table>
			<div class="row-fluid">
			<div class="span6">
				
			</div>
		
</div>
</div><!--/.page-content-->


