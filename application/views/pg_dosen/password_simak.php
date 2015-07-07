
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
	<li class="active">Password Simak</li>
</ul><!--.breadcrumb-->
<div class="page-content">
<div class="page-header position-relative">
	<h1>
		Dosen
		<small>
			<i class="icon-double-angle-right"></i>
			Passwod Simak
		</small>
	</h1>
</div><!--/.page-header-->
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>
	<div class="row-fluid">
<div class="span4">
									<form action='<?php echo base_url(); ?>p_dosen/proses_password_simak' method='POST'>
										<div class="widget-box">
											<div class="widget-header">
												<h4>Password Simak</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="">Password Lama</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">													
															<input type='password' name='password_lama' class=''>
														</div>
													</div>
											
													<div class="row-fluid">
														<label for="">Password Baru</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
															<input type='password' name='password_baru' id="password_baru">
														</div>
													</div>
											
													<div class="row-fluid">
														<label for="">Password Baru konfirmasi</label>
													</div>
													<div class="control-group">
														<div class="row-fluid input-append">
															<input type='password' name='konf_password_baru' id="konf_password_baru">
														</div>
													</div>	

													<div class="form-actions">
														<input type="submit" value ="Save" class="btn btn-info">
													</div>

												</div>	
											</div>
											</form>											
										</div>
									</div>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

