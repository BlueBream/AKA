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
	<li class="active">Data Mahasiswa</li>
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
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Data mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/data_mahasiswa'>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="" name="data_mahasiswa_a" required autocomplete="off"/>
				</div>
				<div class="controls">
					<label class="control-label" for="form-field-1">Parameter Pencarian</label>				
					<select id="form-field-select-1" name="parameter">
										<option value="nim" />NIM
										<option value="mahasiswa" />Nama Mahasiswa
										<option value="angkatan" />Angkatan
									</select><br><br>
				<input style="margin-top:-10px;"type="submit" name="parameter_pencarian" class="btn btn-small btn-primary" value="Cari">
				</div>
		</div>
		</form>
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
				$this->m_aka->msg('msg','error');
				$this->m_aka->msg('msg_success','success');
			?>
			<div style="text-align:right;"class="row-fluid">
				<form action="<?php echo base_url(); ?>c_index_aka/hapus_multiple" Method = "Post" >
				<button class="btn btn-small btn-danger"> <i class="icon-trash bigger-130"></i> Hapus Yang Ditandai</button>
			</div>
			<br>
			<div class="table-header">
			<?php

				$parameter = $this->input->post("parameter");
				$data_cari = $this->input->post("data_mahasiswa_a");
				$cari = $this->input->post("parameter_pencarian");
				if($cari){
					if($parameter == "nim"){
						$parameter_output = "NIM mahasiswa dengan data '$data_cari'";
					}
					if($parameter == "mahasiswa"){
						$parameter_output = "Nama mahasiswa dengan data '$data_cari'";
					}
					if($parameter == "angkatan"){
						$parameter_output = "Angkatan dengan data '$data_cari'";
					}
				}else{
					$parameter_output = "Data Mahasiswa";
				}

			?>		
				<?php echo $parameter_output; ?>
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th width = "10px"></th>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama Mahasiswa</th>
						<th style="text-align:center;">Kelas</th>
						<th style="text-align:center;">Status Kuliah</th>
						<th style="text-align:center;">Foto</th>
						<th style="text-align:center;">

							<a class="green" href="<?php echo base_url(); ?>c_index_aka/add_data_mahasiswa">
								Tambah <i class="icon-plus bigger-130"></i> 
							</a>

						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = $this->uri->segment(3);
					if( empty($no) ){
						$no = 1;
					}else{
						$no = $no + 1;
					}
					foreach ($data as $data) {			 
				?>
					<tr class="table_mahasiswa">
						<td>
							<label>
								<input name="hapus_multiple[]" class="checkboxmhs" value="<?php echo $data['nim']; ?>"type="checkbox">

								<span class="lbl"></span>
								<input name="foto[]" class="checkboxmhs1" value="<?php echo $data['foto']; ?>" style="display:none;"type="text">
							</label>
						</td>
						<td style="text-align:center;" ><center><?php echo $no;?></center></td>
						<td style="text-align:center;" ><?php echo $data['nim']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama_kelas']; ?></td>
						<td style="text-align:center;" ><?php echo $data['status_kuliah']; ?></td>
						<td  style="text-align:center;">

							<?php if(!empty($data['foto'])){ ?>

							<img width="150px" height="150px"src="<?php echo base_url(); ?>assets/images/<?php echo $data['foto']; ?>" alt="">
							<?php }else{ ?>
							<img width="150px" height="150px"src="<?php echo base_url(); ?>assets/images/dummyperson.jpg" alt="">
							<?php } ?>
						</td>
						<td  style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="blue" href="<?php echo base_url(); ?>c_index_aka/detail_mahasiswa/<?php echo $data['nim']; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a><br>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mahasiswa/<?php echo $data['id_mahasiswa']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a><br>

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mahasiswa/<?php echo $data['nim']; ?>/<?php echo $data['foto']; ?>">
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
			</form>
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

