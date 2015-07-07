		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>p_keuangan/index">
							<i class="icon-home"></i>
							<span class="menu-text"> Utama</span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Keuangan </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="<?php echo base_url();?>p_keuangan/pengisian_registrasi">
									<i class="icon-double-angle-right"></i>
									Register Pembayaran
									
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>p_keuangan/keuangan">
									<i class="icon-double-angle-right"></i>
									Report Keuangan								
								</a>
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Data Pembayaran SPP
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url();?>p_keuangan/registrasi_berdasarkan_perorangan" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Berdasarkan Perorangan
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>p_keuangan/registrasi_berdasarkan_tanggal" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Berdasarkan Tanggal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>p_keuangan/registrasi_berdasarkan_semester" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Berdasarkan Semester
										</a>
									</li>																		
								</ul>								
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Set Up Biaya
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url();?>p_keuangan/data_biaya_kuliah" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Edit Biaya Kuliah
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
