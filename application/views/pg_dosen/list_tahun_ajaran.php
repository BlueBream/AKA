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
	<li class="active">Daftar Mahasiswa</li>
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
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>
<div class="page-content">
<div class="page-header position-relative">
	<h1>
		Daftar Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Tahun Ajaran
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Daftar Mahasiswa
					</h4>
				</div>
			<?php
				$this->m_aka->msg('msg','success');
			?>
		<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_dosen/mhs_peserta_list/<?php echo $kode_mk ;?>' enctype='multipart/form-data' />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Ajaran</label>

								<div class="controls">
											<select name='tahun_ajaran'>
										<?php foreach($data->result() as $row){
											?> 
												<option value='<?php echo $row->tahun_akademik ;?>'><?php echo $row->tahun_akademik ; ?></option>
											<?php
										}?>
											</select>										
								</div>
							</div>
							<div class="control-group">
														<input type="submit" value ="Kirim" class="btn btn-small btn-success" name='submit'>
														<i class="icon-arrow-right icon-on-right bigger-125"></i>


									
								</div>
							</div>							

						</form>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->


</div>
</div><!--/.page-content-->

