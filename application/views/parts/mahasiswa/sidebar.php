		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
		<?php
			$nim = $this->session->userdata('nim_s');
			$get_dum = $this->db->query("SELECT *,MAX(smt) as semes FROM t_dump WHERE nim='$nim'");
			$get_dump = $get_dum->row();
			$seme = $get_dump->semes;
			if($get_dum->num_rows() > 0 AND $seme > 2){
			?>
					<li>
						<a href="<?php echo base_url(); ?>p_mahasiswa/daftar_ulang">
							<i class="icon-home"></i>
							<span class="menu-text"> Daftar Ulang </span>
						</a>
					</li>
			<?php
			}
		?>			

					<li>
						<a href="<?php echo base_url(); ?>p_mahasiswa/frs_list">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Rencana Studi </span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>p_mahasiswa/input_ulang_mk">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Ulang Mata Kuliah </span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Nilai </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									<span class="menu-text"> Nilai Semester </span>
									<b class="arrow icon-angle-down"></b>
								</a>
								
								<ul class='submenu'>
						<?php 
							$nim = $this->session->userdata('nim_s');
							$id_mhs = $this->session->userdata('id_mhs');
							$sql=$this->db->query("SELECT DISTINCT semester FROM t_detail_frs WHERE id_mhs ='$id_mhs' ORDER BY semester ASC");
							foreach($sql->result() as $row){
							?>
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/nilai_semester_detail/<?php echo $row->semester; ?>">
											<i class="icon-table"></i>
											<span class="menu-text"> Semester <?php echo $row->semester; ?> </span>
										</a>
									</li>
						<?php
							}
						?>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>p_mahasiswa/nilai_kumulatif" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									<span class="menu-text"> Nilai Kumulatif </span>
									<b class="arrow icon-angle-down"></b>									
								</a>
								<ul class='submenu'>
									<?php 
										
										$sql=$this->db->query("SELECT DISTINCT semester FROM t_detail_frs WHERE id_mhs ='$id_mhs'");
	
										if($sql->num_rows() > 0){

										
									?>
												<li>
													<a href="<?php echo base_url(); ?>p_mahasiswa/nilai_IPK_akhir">
														<i class="icon-table"></i>
														<span class="menu-text">IPK Akhir </span>
													</a>
												</li>
									<?php
									} 
									?>																		
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Download </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class='submenu'>
							<li>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/jadwal_kuliah">
											<i class="icon-table"></i>
										<span class="menu-text"> Jadwal Kuliah </span>
										</a>												
									</li>

								</ul>								
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Jadwal / <br>Pengumuman </span>
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/jadwal_kuliah">
											<i class="icon-table"></i>
												<span class="menu-text"> Jadwal Kuliah </span>
										</a>										
									</li>
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/pengumuman_akademik">
											<i class="icon-table"></i>
												<span class="menu-text"> Pengumuman Akademik </span>
										</a>										
									</li>									
								</ul>								
							</li>							
						</ul>
					</li>						
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-edit"></i>
									<span class="menu-text"> Pesan Pembimbing </span>
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">									
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/buat_pesan">
											<i class="icon-table"></i>
												<span class="menu-text"> Buat Pesan Baru </span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>p_mahasiswa/daftar_percakapan">
											<i class="icon-table"></i>
												<span class="menu-text"> Daftar Percakapan</span>
										</a>
									</li>
								</ul>
							</li>

					</ul>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
