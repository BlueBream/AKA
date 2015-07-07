		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>p_spm/index">
							<i class="icon-home"></i>
							<span class="menu-text"> Utama</span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text">DATA SPM</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
										<a href="#" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>

											Data Kuesioner
											<b class="arrow icon-angle-down"></b>
										</a>
									<ul class="submenu">
											<li>
												<a href="<?php echo base_url(); ?>p_spm/Kuesioner">
													<i class="icon-table"></i>
													Mahasiswa
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>p_spm/Mata_Kuliah">
													<i class="icon-table"></i>
													Mata Kuliah
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>p_spm/Pegawai">
													<i class="icon-table"></i>
													Pegawai
												</a>
											</li>											
									</ul>
							</li>
							<li>
								<a href="<?php echo base_url();?>p_spm/report_kuesioner">
									<i class="icon-double-angle-right"></i>
									Report kuesioner								
								</a>
							</li>		
						</ul>
					</li>
				</ul>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
