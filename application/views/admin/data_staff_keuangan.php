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
	<li class="active">Data Staff keuangan</li>
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
		Admin
		<small>
			<i class="icon-double-angle-right"></i>
			Data Staff keuangan
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Staff keuangan</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="cari berdasarkan nama" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>				
		</div>
	</div><!--/.row-fluid-->
	<br>
	<?php 
		/*$f_mahasiswa = $this->input->post("data_mahasiswa_a");
		$f_parameter = $this->input->post("parameter");
		
		if($f_parameter == 'nim'){
			$peringatan = "NIM dengan data '$f_mahasiswa' tidak ditemukan";
		}elseif($f_parameter == 'mahasiswa'){
			$peringatan = "Nama mahasiswa dengan data '$f_mahasiswa' tidak ditemukan";
		}else{
			$peringatan = "Tahun Ajaran dengan data '$f_mahasiswa' tidak ditemukan";
		}
		*/
		

	 ?>
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
			?>
			<div class="table-header">
				Results for Data Staff keuangan
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIP</th>
						<th style="text-align:center;">Nama Staff</th>
						<th style="text-align:center;">Alamat</th>
						<th style="text-align:center;">Nomor telp</th>
						<th style="text-align:center;">Gelar</th>
						<th style="text-align:center;">TTL</th>
						<th style="text-align:center;">Username</th>
						<th style="text-align:center;">Level</th>
						<th style="text-align:center;">Foto</th>
						<th style="text-align:center;">
							<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_data_staff_keuangan">
								Tambah <i class="icon-plus bigger-130"></i> 
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
						<td style="text-align:center;" ><?php echo $no;?></td>
						<td style="text-align:center;" ><?php echo $data['nip']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td style="text-align:center;" ><?php echo $data['alamat']; ?></td>
						<td style="text-align:center;" ><?php echo $data['no_telp']; ?></td>
						<td style="text-align:center;" ><?php echo $data['gelar']; ?></td>
						<td style="text-align:center;" ><?php echo $data['tempat_lahir']; ?> <?php echo $data['tgl_lahir']; ?></td>
						<td style="text-align:center;" ><?php echo $data['username']; ?></td>
						<td style="text-align:center;" ><?php echo $data['level']; ?></td>
						<td  style="text-align:center;">
							<?php if(!empty($data['foto'])){ ?>

							<img width="150px" height="150px"src="<?php echo base_url(); ?>assets/images/<?php echo $data['foto']; ?>" alt="">
							<?php }else{ ?>
							<img width="150px" height="150px"src="<?php echo base_url(); ?>assets/images/dummyperson.jpg" alt="">
							<?php } ?>
						</td>
						<td  style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="<?php echo base_url(); ?>c_index_aka/detail_mahasiswa/<?php echo $data['nim']; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a><br>-->

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_data_staff_keuangan/<?php echo $data['id_user']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a><br>

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_data_staff_keuangan/<?php echo $data['id_user']; ?>/<?php echo $data['foto']; ?>">
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


