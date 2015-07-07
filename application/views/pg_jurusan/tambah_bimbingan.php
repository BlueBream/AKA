<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			
		$("#nim").change(function(){
			var nim 		= $("#nim").val();	
			$.ajax({
				type : 'POST',
				url : "<?php echo base_url();?>p_jurusan/cek_tambah_bimbingan",
				data : "nim="+nim,
				beforeSend:function(){
					$("#h_nim").html("Loading");
				},
				success:function(response){
					$("#h_nim").html(response);
				}
			});
		});
	});
</script>
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
	<li class="active"> Data Bimbingan</li>
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
		Data Bimbingan
		<small>
			<i class="icon-double-angle-right"></i>
			Tambah bimbingan
		</small>
	</h1>
</div><!--/.page-header-->
			<?php echo $this->m_aka->msg('msg_error','alert-eror'); ?>	
			<?php echo $this->m_aka->msg('msg','alert-succes'); ?>
	<div class="row-fluid">
<div class="span4">
									<form action='<?php echo base_url(); ?>p_jurusan/tambah_mhs_bimbingan' method='POST'>
										<div class="widget-box">
											<div class="widget-header">
												<h4>Tambah Bimbingan </h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="">NIM	</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
										<?php
											foreach($data->result_array() as $data){
										?>
											<input name='id_dosen' type='hidden' value='<?php echo $data['id_dosen']?>'>
										<?php
											}
										?>
															<input id="nim" name="nim" type='text' placeholder='NIM' value=''>
														</div>
<div class='row-fluid'>
	<div id="h_nim"></div>
</div>														
													</div>

											<br>
													<div class="row-fluid">
														<label for="">Keterangan</label>
													</div>
													<div class="control-group">
														<div class="row-fluid input-append">
<div class="row-fluid">
														<label for="form-field-9"></label>

														<textarea class="span12 limited" id="form-field-9" data-maxlength="50" maxlength="50" name='keterangan'></textarea>
													</div>															
													</div>
													</div>

												
							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info" id="submit">
							</div>

												</div>	
											</div>
											</form>											
										</div>
									</div>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

