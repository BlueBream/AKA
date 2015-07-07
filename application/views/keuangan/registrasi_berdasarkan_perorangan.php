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
	<li class="active">Data Registrasi Berdasarkan Perorangan</li>
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
		Registrasi Pembayaran
		<small>
			<i class="icon-double-angle-right"></i>
			Data Mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Pembayaran</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="Cari Berdasarkan NIM" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>				
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			
			<div class="table-header">
				Results for Data registrasi mahasiswa
			</div>		
			<?php
				$this->m_aka->msg('msg','success');
			?>	
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama Mahasiswa</th>
						<th style="text-align:center;">Semester</th>
						<th style="text-align:center;">Tanggal Bayar</th>
						<th style="text-align:center;">Total Pembayaran</th>
						<th style="text-align:center;">Sks Teori</th>
						<th style="text-align:center;">Sks Praktek</th>
						<th style="text-align:center;">Jumlah Uang</th>
						<th style="text-align:center;">Sisa Cicilan</th>
						<th style="text-align:center;">Memo</th>
						<th style="text-align:center;">Action</th>
						<!--<th style="text-align:center;">
							<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_data_dosen">
								Tambah <i class="icon-plus bigger-130"></i> 
							</a>
						</th>-->
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {			 
				?>
					<tr>
						<td style="text-align:center;" ><?php echo $no;?></td>
						<td style="text-align:center;" ><?php echo $data['nim']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td style="text-align:center;" ><?php echo $data['semester']; ?></td>
						<td style="text-align:center;" ><?php echo $data['tanggal']; ?></td>
						<td style="text-align:center;" ><?php echo $data['total_bayar']; ?></td>
						<td style="text-align:center;" ><?php echo $data['sks_teori']; ?></td>
						<td style="text-align:center;" ><?php echo $data['sks_praktek']; ?></td>
						<td style="text-align:center;" ><?php echo $data['jumlah_uang']; ?></td>
						<td style="text-align:center;" ><?php echo $data['sisa_cicilan']; ?></td>
						<td style="text-align:center;" ><?php echo $data['memo']; ?></td>
						<td  style="text-align:center;" class="td-actions">
							<!--<div class="hidden-phone visible-desktop action-buttons">
								
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_data_dosen/<?php echo $data['id_dosen']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a><br>-->

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_registrasi_berdasarkan_perorangan/<?php echo $data['id_registrasi']; ?>">
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
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php echo $pagination; ?>
				</div>
			</div>
		
</div>
</div><!--/.page-content-->


