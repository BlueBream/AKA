		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>p_jurusan/index">
							<i class="icon-home"></i>
							<span class="menu-text"> Utama</span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Manajemen Jurusan </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Dosen
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
									<li>
										<a href="<?php echo base_url();?>p_jurusan/data_dosen">	
											<i class="icon-double-angle-right"></i>						
											<span class="menu-text"> Data Dosen </span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>p_jurusan/bimbingan">	
											<i class="icon-double-angle-right"></i>						
											<span class="menu-text"> Bimbingan </span>
										</a>
									</li>									
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Mata Kuliah
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url();?>p_jurusan/data_mata_kuliah" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>							
											Data Mata Kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>p_jurusan/kuota_mata_kuliah_pilihan" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>						
											Kuota Mata Kuliah Pilihan
										</a>
									</li>									
								</ul>								
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Jadwal
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url();?>p_jurusan/data_jadwal_kuliah" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Data Jadwal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>p_jurusan/data_kalender_akademik" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Kalender Akademik
										</a>
									</li>									
								</ul>								
							</li>							
						</ul>
					</li>
				</ul>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
