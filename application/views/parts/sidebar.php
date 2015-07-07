		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<a style="text-decoration:none;" href="<?php echo base_url(); ?>c_index_aka/pengisian_registrasi">
							<button class="btn btn-small btn-success">
								<i class="icon-book"></i>
							</button>
						</a>
						<a style="text-decoration:none;" href="<?php echo base_url(); ?>c_index_aka/kuota_mata_kuliah_pilihan">
							<button class="btn btn-small btn-info">
								<i class="icon-bookmark"></i>
							</button>
						</a>	

						<a style="text-decoration:none;" href="<?php echo base_url(); ?>c_index_aka/data_mahasiswa">
							<button class="btn btn-small btn-warning">
								<i class="icon-group"></i>
							</button>
						</a>

						<a style="text-decoration:none;" href="<?php echo base_url(); ?>c_index_aka/data_dosen">
							<button class="btn btn-small btn-danger">
								<i class="icon-leaf"></i>
							</button>
						</a>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url(); ?>c_index_aka/index2">
							<i class="icon-home"></i>
							<span class="menu-text"> Utama </span>
						</a>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Keuangan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/pengisian_registrasi">
									<i class="icon-double-angle-right"></i>
									Registrasi pembayaran
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/pengisian_registrasi" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Data pembayaran<br>SPP
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/registrasi_berdasarkan_perorangan">
											<i class="icon-table"></i>
											Berdasarkan perorangan
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/registrasi_berdasarkan_tanggal">
											<i class="icon-table"></i>
											Berdasarkan<br>Tanggal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/registrasi_berdasarkan_semester">
											<i class="icon-table"></i>
											Berdasarkan Semester
										</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="set_up_biaya.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Set up biaya
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_biaya_kuliah">
											<i class="icon-table"></i>
											Edit biaya kuliah
										</a>
									</li>
									
								</ul>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Jurusan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="dosen.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Dosen
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_dosen">
											<i class="icon-table"></i>
											Data dosen
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>c_index_aka/bimbingan">
											<i class="icon-table"></i>
											Bimbingan
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/data_matakuliah" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Mata kuliah
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_mata_kuliah">
											<i class="icon-table"></i>
											Data mata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/kuota_mata_kuliah_pilihan">
											<i class="icon-table"></i>
											Kuota mata kuliah pilihan
										</a>
									</li>
									
								</ul>
							</li>
							
							<li>
								<a href="jadwal.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Jadwal
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_jadwal_kuliah">
											<i class="icon-table"></i>
											Data jadwal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_kalender_akademik">
											<i class="icon-table"></i>
											Kalender akademik
										</a>
									</li>									
								</ul>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Akademik </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Mata kuliah
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_mata_kuliah">
											<i class="icon-table"></i>
											Data mata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_jadwal_kuliah">
											<i class="icon-table"></i>
											Jadwal kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_tahun_ajaran">
											<i class="icon-table"></i>
											Tahun ajaran
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="mahasiswa.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Mahasiswa
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_mahasiswa">
											<i class="icon-table"></i>
											Data mahasiswa
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/input_ulang_mk">
											<i class="icon-table"></i>
											Input ulang mata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/nilai_akademik">
											<i class="icon-table"></i>
											Input nilai per mata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/nilai_akademik_mahasiswa">
											<i class="icon-table"></i>
											Input nilai per mahasiswa
										</a>
									</li>
										<li>
										<a href="<?php echo base_url(); ?>c_index_aka/cari_nim">
											<i class="icon-table"></i>
											Pengisian FRS
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/manipulasi_frs">
											<i class="icon-table"></i>
											Manipulasi FRS
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/daftar_ulang">
											<i class="icon-table"></i>
											Waktu daftar ulang
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>/c_index_aka/cuti_akademik">
											<i class="icon-table"></i>
											Permohonan cuti akademik
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>c_index_aka/data_pengumuman_akademik">
											<i class="icon-table"></i>
											Posting pengumuman akademik
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/data_kbaak">
									<i class="icon-double-angle-right"></i>

									Data Kbaak
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/data_kelas" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Data Kelas
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/program_studi" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Prody(Program Study)
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/waktu_nilai">
									<i class="icon-double-angle-right"></i>

									Waktu Pengisian Nilai
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>c_index_aka/password_generate">
									<i class="icon-double-angle-right"></i>

									Password Generate
								</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Dosen </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Administrasi Data<br>Dosen
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_dosen">
											<i class="icon-table"></i>
											Biodata
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Administrasi Dosen Perkuliahan
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/mata_kuliah_jurusan">
											<i class="icon-table"></i>
											Nilai
										</a>
									</li>
									
								</ul>
							</li>											
							<li>
									<a href="<?php echo base_url();?>c_index_aka/data_bahan_kuliah">
										<i class="icon-double-angle-right"></i>
											Posting Pengumuman Bahan kuliah
											</a>
							</li>
										
						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Report </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="rep_jurusan.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Jurusan
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/report_dosen">
											<i class="icon-table"></i>
											Data dosen
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/report_data_mata_kuliah">
											<i class="icon-table"></i>
											Data mata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/keuangan">
											<i class="icon-table"></i>
											Data Keuangan
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="rep_akademik.html" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Akademik
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_kohort">
											<i class="icon-table"></i>
											Kohort Data Mahasiswa
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/kohort_excel">
											<i class="icon-table"></i>
											Kohort Data Mahasiswa Excel
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/absen_ujian">
											<i class="icon-table"></i>
											Daftar hadir ujian
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/absen_16_minggu">
											<i class="icon-table"></i>
											Daftar hadir harian
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_matkul">
											<i class="icon-table"></i>
											Nilai permata kuliah
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/index_prestasi">
											<i class="icon-table"></i>
											Indeks prestasi
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/daerah_asal">
											<i class="icon-table"></i>
											Daerah asal mahasiswa
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_cuti_report">
											<i class="icon-table"></i>
											Data cuti akademik mahasiswa
										</a>
									</li>
									

									<li>
										<a href="#" class="dropdown-toggle">
											<i class="icon-double-angle-right"></i>

											Transkrip
											<b class="arrow icon-angle-down"></b>
										</a>

										<ul class="submenu">
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/transkrip">
													<i class="icon-table"></i>
													Transkrip lengkap
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/transkrip">
													<i class="icon-table"></i>
													Transkrip sementara
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/transkrip_no_kop">
													<i class="icon-table"></i>
													Transkrip tanpa kop surat
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/khs">
													<i class="icon-table"></i>
													KHS umum
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/khs_excel">
													<i class="icon-table"></i>
													KHS umum Excel
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>c_index_aka/ijazah">
													<i class="icon-table"></i>
													Ijazah
												</a>
											</li>
											
										</ul>
									</li>
									
								</ul>
							</li>


						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-table"></i>
							<span class="menu-text"> Admin </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Password
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/password_akademik">
											<i class="icon-table"></i>
											Password<br>akademik
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/password_mahasiswa">
											<i class="icon-table"></i>
											Password<br>mahasiswa
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/password_keuangan">
											<i class="icon-table"></i>
											Password<br>keuangan
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/password_jurusan">
											<i class="icon-table"></i>
											Password<br>jurusan
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/password_dosen">
											<i class="icon-table"></i>
											Password<br>dosen
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Data staff
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_staff_akademik">
											<i class="icon-table"></i>
											Staff akademik
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_staff_keuangan">
											<i class="icon-table"></i>
											Staff keuangan
										</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>c_index_aka/data_staff_jurusan">
											<i class="icon-table"></i>
											Staff jurusan
										</a>
									</li>
									
								</ul>
							</li>

						

						</ul>
					</li>

				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
