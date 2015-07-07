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
<li class="active">Biodata</li>
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
	Akademik Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Biodata
					</h4>
				</div>
				<?php foreach($data->result() as $row){ ?>
				<div class="widget-body">
					<div class="widget-main">
							<div>
								<div id="user-profile-1" class="user-profile row-fluid">
									<div class="span3 center">
										<div>
											<span class="profile-picture">
												<img id="avatar" class="editable" alt="Alex's Avatar" src="<?php echo base_url();?>assets/images/<?php echo $row->foto;?>" />
											</span>

											<div class="space-4"></div>

											<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
												<div class="inline position-relative">
													<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
														<i class="icon-circle light-green middle"></i>
														&nbsp;
														<span class="white middle bigger-120"><?php echo $row->nama;?></span>
													</a>
												</div>
											</div>
										</div>
											<div class="profile-contact-links align-left">
														
											</div>
										
									</div>

									<div class="span9">


										<div class="space-12"></div>

										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Username </div>

												<div class="profile-info-value">
													<span class="editable" id="username"><?php echo $row->username;?></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Nip </div>

												<div class="profile-info-value">
													<span class="editable" id="nip"><?php echo $row->nip;?></span>
												</div>
											</div>											
											<div class="profile-info-row">
												<div class="profile-info-name"> Gelar </div>

												<div class="profile-info-value">
													<span class="editable" id="nip"><?php echo $row->gelar;?></span>
												</div>
											</div>	
											<div class="profile-info-row">
												<div class="profile-info-name"> Location </div>

												<div class="profile-info-value">
													<i class="icon-map-marker light-orange bigger-110"></i>
													<span class="editable" id="country"><?php echo $row->alamat;?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Tanggal Lahir </div>

												<div class="profile-info-value">
													<span class="editable" id="ttl"><?php echo $row->ttl;?></span>
												</div>
											</div>

											<div class="profile-info-row">
		

												<div class="profile-info-value">
													<span class="editable" id="ttl"><a href='<?php echo base_url();?>p_dosen/change_biodata'><button class="btn btn-small btn-success">
															Change
															<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button></a></span>
												</div>
											</div>											
										</div>

										<div class="space-20"></div>

									</div>
								</div>
							</div>
						
					</div>
				</div>
				</form>
				<?php } ?>
			</div>
</div>