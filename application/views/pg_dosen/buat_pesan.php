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
	<li class="active">Buat Pesan</li>
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
		Pembimbing
		<small>
			<i class="icon-double-angle-right"></i>
			Buat Pesan
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Buat Pesan
					</h4>
				</div>
			<?php
				$this->m_aka->msg('msg','success');
			?>
		<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_dosen/kirim_pesan' enctype='multipart/form-data' />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Subject</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="subject" placeholder="Subject" />
									<input type="hidden" value='<?php echo $uri3;?>' id="form-field-1" required name="id_mhs" placeholder="Subject" />

								</div>
							</div>
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Pesan</label>

								<div class="controls">
									<textarea class="span12 limited" id="form-field-9" data-maxlength="1000" maxlength="1000" style="margin: 0px; width: 500px; height: 300px;" name='pesan' placeholder='Isi Pesan'></textarea>
									
														
											
												</div>
												<br>
								<div class="controls">
									<input type="submit" value ="Kirim" class="btn btn-small btn-success">
								</div>
	

									
								</div>
							</div>							

						</form>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->


</div>
</div><!--/.page-content-->

