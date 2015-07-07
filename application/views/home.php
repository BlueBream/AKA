
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon- home-icon"></i>
							<a href="#">Home</a>
						</li>
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

					<div class="row-fluid">
						<h1>Welcome <?php echo $this->session->userdata('name_s'); ?></h1><br>
						<h2>Selamat Menggunakan Aplikasi</h2>
						<?php
							if($waktu['update'] == "Ya") {
							$waktu_nilai = explode("-", $waktu['waktu_nilai']);
							$bulan = $waktu_nilai[1];
							if($bulan == "01"){
									$bulan_ex = "Januari";
								}else if($bulan == "02"){
									$bulan_ex = "Februari";
								}else if($bulan == "03"){
									$bulan_ex = "Maret";
								}else if($bulan == "04"){
									$bulan_ex = "April";
								}else if($bulan == "05"){
									$bulan_ex = "Mei";
								}else if($bulan == "06"){
									$bulan_ex = "Juni";
								}else if($bulan == "7"){
									$bulan_ex = "Juli"; 
								}else if($bulan == "8"){
									$bulan_ex = "Agustus";
								}else if($bulan == "9"){
									$bulan_ex = "September";
								}else if($bulan == "10"){
									$bulan_ex = "Oktober";
								}else if($bulan == "11"){
									$bulan_ex = "November";
								}else if($bulan == "12"){
									$bulan_ex = "Desember";
								}
								$tanggal_nilai = $waktu_nilai[2]." - ".$bulan_ex." - ".$waktu_nilai[0]; 
						?>
						
						<div class="alert alert-info"><i class="icon-exclamation-sign"></i> Batas Pengisian Nilai Sudah Habis Pada Tanggal <?php echo $tanggal_nilai; ?> Nilai Yang Masih Kosong Otomatis Akan Bernilai B</div>
						
						<?php 
							}
						?>
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->
