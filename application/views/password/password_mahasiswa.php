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
	<li class="active">Data Staff Mahasiswa</li>
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
			Data Mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/password_mahasiswa'>
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
<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','error');
			?>
			<div class="table-header">
				Results for Data Akademik
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama</th>
						<th style="text-align:center;">
							Action
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
						<td style="text-align:center;" ><?php echo $data['nim']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_password_mahasiswa/<?php echo $data['id_mahasiswa']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
								<br>
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


