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
	<li class="active">Data Kuesioner </li>
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
		Data Kuesioner
	</h1>
</div><!--/.page-header-->
	
	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Judul Kuesioner
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
					<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_spm/prosesedit_data_kuesioner' enctype='multipart/form-data' />
							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Kelas</label>
								<div class="controls">
									<input type="hidden" id="form-field-1" required name="id_judul" value="<?php echo $data['id_judul'];?>"  placeholder="" />
									<input type="text" id="form-field-1" required name="judul" value="<?php echo $data['judul'];?>"  placeholder="" />
								</div>
								<br>
							</div>
							
							

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
					<?php
						}
					?>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
		
</div>
</div><!--/.page-content-->

