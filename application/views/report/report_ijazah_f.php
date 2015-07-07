<html>
<head>
	<title>IJAZAH</title>
	<style type="text/css">
		body{
			font-family: 'Roboto', sans-serif;	
		}
		.header{
			text-align: right;
			font-size: 16px;
			font-weight: 400;
		}
		.content{
			text-align: center;
			font-size: 16px;
			font-weight: 400;
		}
		.nama{
			font-family: 'Roboto', sans-serif;
			font-weight: 900;
			font-size: 20px !important;
		}
		.line{
			border-top: 1px solid #000;
		}
	</style>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
	$id_mhs = $this->uri->segment(3); 
	$q_nomor = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = '$id_mhs'");
	$d_nomor = $q_nomor->result_array();
 ?>
<table border="0" width="100%">
	<?php foreach($d_nomor as $d_nomor){ ?>
	<tr>
		<td class="header">Nomor : 
			<?php echo $d_nomor['no_ijazah']; ?>
		</td>
	</tr>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</table>

<table border="0" width="100%">
	<tr>
		<td class="content">Diberikan kepada :</td>
	</tr>
	<tr>
		<td class="content nama"><b><?php echo $d_nomor['nama']; ?></b></td>
	</tr>
	<tr>
		<td class="content">Lahir di
		<?php 
			$tanggal_ex = explode(",", $d_nomor['ttl']);
		 ?>
		 <?php echo $tanggal_ex[0]; ?>, tanggal
		<?php 
		
			$ex_tanggal = explode("-", $tanggal_ex[1]);
		 ?>
		  <?php echo $ex_tanggal[0]." ".$ex_tanggal[1]." ".$ex_tanggal[2]; ?></td>
	</tr>
	<tr>
		<td class="content">No. Induk Mahasiswa : <?php echo $d_nomor['nim']; ?></td>
	</tr>
	<br>
	<br>
	<tr>
		<td class="content">telah memenuhi persyaratan <font class="nama">LULUS</font> dari Program Studi</td>
	</tr>
	<tr>
		<td class="content">Diploma III <?php echo $d_nomor['program_studi']; ?></td>
	</tr>
	<tr>
		<td class="content">pada tanggal 
		<?php 
			$ex_lulus = explode("-", $d_nomor['tanggal_lulus']);
			$bulan_ex = $ex_lulus[1];
			if($bulan_ex == "1"){
				$bulan = "Januari";
				}else if($bulan_ex == "2"){
					$bulan = "Februari";
				}else if($bulan_ex == "3"){
					$bulan = "Maret";
				}else if($bulan_ex == "4"){
					$bulan = "April";
				}else if($bulan_ex == "5"){
					$bulan = "Mei";
				}else if($bulan_ex == "6"){
					$bulan = "Juni";
				}else if($bulan_ex == "7"){
					$bulan = "Juli"; 
				}else if($bulan_ex == "8"){
					$bulan = "Agustus";
				}else if($bulan_ex == "9"){
					$bulan = "September";
				}else if($bulan_ex == "10"){
					$bulan = "Oktober";
				}else if($bulan_ex == "11"){
					$bulan = "November";
				}else if($bulan_ex == "12"){
					$bulan = "Desember";
					}			
			echo $ex_lulus[0]." ".$bulan." ".$ex_lulus[2];
		 ?>
		</td>
	</tr>
	<tr>
		<td class="content">dan memperoleh gelar</td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
		<td class="content nama"><b>Ahli Madya Analisis Kimia (A.Md.A.K)</b></td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
		<td class="content">beserta segala hak dan kewajiban yang melekat pada gelar tersebut.</td>
	</tr>
	<tr>
		<td class="content">Dikeluarkan di Bogor, pada tanggal 
		<?php 
			$ex_yudisium = explode("-", $d_nomor['tahun_yudisium']);
			$bulan_ex = $ex_yudisium[1];
			if($bulan_ex == "1"){
				$bulan = "Januari";
				}else if($bulan_ex == "2"){
					$bulan = "Februari";
				}else if($bulan_ex == "3"){
					$bulan = "Maret";
				}else if($bulan_ex == "4"){
					$bulan = "April";
				}else if($bulan_ex == "5"){
					$bulan = "Mei";
				}else if($bulan_ex == "6"){
					$bulan = "Juni";
				}else if($bulan_ex == "7"){
					$bulan = "Juli"; 
				}else if($bulan_ex == "8"){
					$bulan = "Agustus";
				}else if($bulan_ex == "9"){
					$bulan = "September";
				}else if($bulan_ex == "10"){
					$bulan = "Oktober";
				}else if($bulan_ex == "11"){
					$bulan = "November";
				}else if($bulan_ex == "12"){
					$bulan = "Desember";
					}			
			echo $ex_yudisium[0]." ".$bulan." ".$ex_yudisium[2];
			?>
		</td>
	</tr>
	<br>
	<br>
	<br>
</table>

<table border="0" width="100%">
	<tr>
		<td class="content">A.n. Menteri Perindustrian</td>
		<td width="400px"></td>
		<td class="content">Akademi Kimia Analisis</td>
	</tr>
	<tr>
		<td class="content"><?php 
			$data_tanda_5 = $this->db->query("SELECT jabatan FROM t_kbaak WHERE status = 'sekretaris_jendral'");
			$ambil_data_tanda_5 = $data_tanda_5->row_array();
			echo $ambil_data_tanda_5['jabatan'];
		 ?></td>
		<td width="400px"></td>
		<td class="content"><?php 
			$data_tanda_6 = $this->db->query("SELECT jabatan FROM t_kbaak WHERE status = 'direktur'");
			$ambil_data_tanda_6 = $data_tanda_6->row_array();
			echo $ambil_data_tanda_6['jabatan'];
		 ?>,</td>
	</tr>
	<tr>
		<td>
			
	<br>
	<br>
	<br>
	<br>
		</td>
	</tr>
	<tr>
		<td class="content"><?php 
			$data_tanda_1 = $this->db->query("SELECT nama FROM t_kbaak WHERE status = 'sekretaris_jendral'");
			$ambil_data_tanda_1 = $data_tanda_1->row_array();
			echo $ambil_data_tanda_1['nama'];	
		 ?></td>
		<td width="400px"></td>
		<td class="content">
		<?php 
			$data_tanda_2 = $this->db->query("SELECT nama FROM t_kbaak WHERE status = 'direktur'");
			$ambil_data_tanda_2 = $data_tanda_2->row_array();
			echo $ambil_data_tanda_2['nama'];
		 ?>
		</td>
	</tr>
	<tr>
		<td class="content"><div class="line">NIP. <?php 
		$data_tanda_3 = $this->db->query("SELECT nip FROM t_kbaak WHERE status = 'sekretaris_jendral'");
		$ambil_data_tanda_3 = $data_tanda_3->row_array();
		echo $ambil_data_tanda_3['nip'];  ?></div></td>
		<td width="400px"></td>
		<td class="content"><div class="line">NIP. <?php 
			$data_tanda_4 = $this->db->query("SELECT nip FROM t_kbaak WHERE status = 'direktur'");
			$ambil_data_tanda_4 = $data_tanda_4->row_array();
			echo $ambil_data_tanda_4['nip'];  ?>
		</div></td>
	</tr>
</table>
<?php } ?>
</body>
</html>