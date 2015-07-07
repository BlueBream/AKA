<html>
<head>
	<title>IJAZAH</title>
	<style type="text/css">
		body{
			font-family: 'Roboto', sans-serif;	
		}
		.header{
			text-align: left;
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
		<td class="header">Pemilik Ijazah ini</td>
		<td class="header"></td>
	</tr>
	<tr>
		<td class="header" style="width: 200px;">Tahun Masuk</td>
		<td class="header">: 
		<?php 
			$angkatan_ex = explode("/", $d_nomor['angkatan']);
			echo $angkatan_ex[0];
		 ?></td>
	</tr>
	<tr>
		<td class="header" style="width: 200px;">Nomor Induk Mahasiswa</td>
		<td class="header">: <?php echo $d_nomor['nim']; ?></td>
	</tr>
	<tr>
		<td>
			<br>
			<br>
			<br>
			<br>
		</td>
		<td></td>
	</tr>
	<tr>
		<td class="header">Dinyatakan Lulus</td>
		<td class="header"></td>
	</tr>
	<tr>
		<td class="header" style="width: 200px;">Pada Tanggal</td>
		<td class="header">: 
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
		<td class="header" style="width: 200px;">Nomor Ijazah</td>
		<td class="header">: <?php echo $d_nomor['no_ijazah']; ?></td>
	</tr>
	<tr>
		<td>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</td>
		<td></td>
	</tr>
</table>
<table border="0" width="100%">
	<tr>
		<td class="header">Pembantu Direktur Bidang Akademik,</td>
		<td class="header"></td>
	</tr>
	<tr>
		<td>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</td>
		<td></td>
	</tr>
	<tr>
		<td class="header"><?php 
			$data_tanda_1 = $this->db->query("SELECT nama FROM t_kbaak WHERE status = 'pembantu_direktur_bi'");
			$ambil_data_tanda_1 = $data_tanda_1->row_array();
			echo $ambil_data_tanda_1['nama'];
		 ?></td>
		<td class="header"></td>
	</tr>
	<tr>
		<td class="header"><div class="line">NIP. <?php 
		$data_tanda_2 = $this->db->query("SELECT nip FROM t_kbaak WHERE status = 'pembantu_direktur_bi'");
			$ambil_data_tanda_2 = $data_tanda_2->row_array();
			echo $ambil_data_tanda_2['nip'];
		 ?></div></td>
		<td class="header"></td>
	</tr>
</table>
<?php 
	}
 ?>
<!--
<table border="0" width="100%">
	<tr>
		<td class="content">Diberikan kepada :</td>
	</tr>
	<tr>
		<td class="content nama">FEBBY NOVIYANTI SUPRIATNA</td>
	</tr>
	<tr>
		<td class="content">Lahir di Bandung, tanggal 14 November 1992</td>
	</tr>
	<tr>
		<td class="content">No. Induk Mahasiswa : 1166266</td>
	</tr>
	<br>
	<br>
	<tr>
		<td class="content">telah memenuhi persyaratan <font class="nama">LULUS</font> dari Program Studi</td>
	</tr>
	<tr>
		<td class="content">Diploma III Kimia Analisis</td>
	</tr>
	<tr>
		<td class="content">pada tanggal 15 Agustus 2014</td>
	</tr>
	<tr>
		<td class="content">dan memperoleh gelar</td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
		<td class="content nama">Ahli Madya Analisis Kimia (A.Md.A.K)</td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
		<td class="content">beserta segala hak dan kewajiban yang melekat pada gelar tersebut.</td>
	</tr>
	<tr>
		<td class="content">Dikeluarkan di Bogor, pada tanggal 19 September 2014</td>
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
		<td class="content">Sekretaris Jenderal,</td>
		<td width="400px"></td>
		<td class="content">Direktur,</td>
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
		<td class="content">Ir. Ansari Nukhari, MBA</td>
		<td width="400px"></td>
		<td class="content">Ir. Maman Sukiman, M.Si</td>
	</tr>
	<tr>
		<td class="content"><div class="line">NIP. 195502121980031001</div></td>
		<td width="400px"></td>
		<td class="content"><div class="line">NIP. 195907171986021001</div></td>
	</tr>
</table>
-->
</body>
</html>