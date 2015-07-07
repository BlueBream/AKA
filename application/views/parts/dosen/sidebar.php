		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>p_dosen">
							<i class="icon-home"></i>
							<span class="menu-text"> Utama</span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Data Dosen </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Data Password
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
									<li>
									<a href="<?php echo base_url();?>p_dosen/password_simak">	
										<i class="icon-double-angle-right"></i>						
										<span class="menu-text"> Password Simak </span>
									</a>
								</li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Biodata
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
									<li>
										<a href="<?php echo base_url();?>p_dosen/biodata" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
											Biodata Dosen
										</a>
							</li>
								</ul>								
							</li>
						</ul>
					</li>
						<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Perkulihan </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									Mata kuliah
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
							<?php 
								$nip=$this->session->userdata('nip_s');
								$get_id_dosen= $this->db->query("SELECT * FROM t_dosen where nip='$nip'")->row();
								$id_dosen = $get_id_dosen->id_dosen;
								$check_mk = $this->db->query("SELECT *  FROM t_pengajar as a,t_dosen as b, t_mk as c WHERE a.id_dosen=b.id_dosen AND a.id_mk=c.id_mk AND a.id_dosen='$id_dosen'");
								foreach($check_mk->result() as $row){
							?>									
									<li>
										<a href="" class="dropdown-toggle">	
											<i class="icon-double-angle-right"></i>						
												<span class="menu-text"><?php echo $row->nama_mk;?> </span>
											<b class="arrow icon-angle-down"></b>
										</a>
										<ul class='submenu'>
											<li>
												<a href="<?php echo base_url();?>p_dosen/mhs_peserta/<?php echo $row->kode_mk;?>">		
													<span class="menu-text">Mahasiswa Peserta</span>
												</a>												
											</li>
											<li>
												<a href="<?php echo base_url();?>p_dosen/bahan_kuliah/<?php echo $row->id_mk;?>">																
													<span class="menu-text">Bahan Kuliah</span>
												</a>												
											</li>
											<li>
												<a href="<?php echo base_url();?>p_dosen/nilai_permahasiswa/<?php echo $row->id_mk;?>">																
													<span class="menu-text">Nilai</span>
												</a>												
											</li>
										</ul>
									</li>
							<?php } ?>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text">Bimbingan</span>
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class='submenu'>
							<?php 
								$id= $this->session->userdata('id_dosen');;
								$cek = $this->db->query("SELECT c.nama as nama_mhs,c.id_mahasiswa as id_mhs,c.nim , b.id_bimbingan as id_bimbingan FROM t_dosen as a,t_bimbingan as b, t_mahasiswa as c WHERE a.id_dosen=b.id_dosen AND b.id_mahasiswa = c.id_mahasiswa AND b.id_dosen='$id' ORDER BY b.id_bimbingan DESC");
								foreach($cek->result() as $data){
							?>									

										<li>
										<a href="#" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>									
												<span class="menu-text"><?php echo $data->nama_mhs;?> (<?php echo $data->nim;?>)</span>
												<b class="arrow icon-angle-down"></b>
										</a>
												<ul class='submenu'>
													<li>
														<a href="<?php echo base_url(); ?>p_dosen/buat_pesan/<?php echo $data->id_mhs;?>">
															<i class="icon-table"></i>
																<span class="menu-text"> Buat Pesan Baru </span>
														</a>
													</li>
													<li>
														<a href="<?php echo base_url(); ?>p_dosen/daftar_percakapan/<?php echo $data->id_mhs;?>">
															<i class="icon-table"></i>
																<span class="menu-text"> Daftar Percakapan</span>
														</a>
													</li>													
												</ul>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>p_dosen/nilai/<?php echo $data->id_mhs;?>" >
													<i class="icon-list-alt"></i>
													<span class='menu-text'>Nilai</span>
												</a>
											</li>											
								
								
							<?php } ?>
								</ul>								
							</li>
						</ul>
					</li>
				</ul>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
