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
	<li class="active">Data kalender akademik</li>
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
		kalender akademik
		<small>
			<i class="icon-double-angle-right"></i>
			Data kalender akademik
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data kalender akademik</label>
					<form method="post">
						<?php
							$k = $this->db->get('t_tahun_akademik');
							$ta = $k->result();
						 ?>
						<select id="form-field-select-1" name="src">
							<option></option>
							<?php 
								foreach($ta as $row){ ?>
								<option value="<?php echo $row->id;?>"><?php echo $row->tahun_akademik;?></option>
								
								<?php
								}
								?>
						</select>
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
				Results for Data kalender akademik
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">Tahun Ajaran</th>
						<th style="text-align:center;">Kegiatan</th>
						<th style="text-align:center;">Tanggal</th>
						<th style="text-align:center;">
							<a class="green" href="<?php echo base_url(); ?>p_jurusan/input_data_kalender_akademik">
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
						<td style="text-align:center;" ><?php echo $data['tahun_akademik']; ?></td>
						<td style="text-align:center;" ><?php echo $data['kegiatan']; ?></td>
						<td style="text-align:center;" ><?php echo $data['tanggal']; ?></td>
						<td style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<!--<a class="blue" href="<?php echo base_url(); ?>c_index_aka/detail_mahasiswa/<?php echo $data['nim']; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a><br>-->

								<a class="green" href="<?php echo base_url(); ?>p_jurusan/edit_data_kalender_akademik/<?php echo $data['id']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>p_jurusan/hapus_data_kalender_akademik/<?php echo $data['id']; ?>">
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


