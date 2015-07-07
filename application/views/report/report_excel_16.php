<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR ABSEN HARIAN</title>

	<style type="text/css">
	body{
		font-family: "Opsensans", sans-serif;
	}
	.title_header{
		font-size: 25px;
		font-style: bold;
	}

	.title_alamat{
		font-size: 12px;
	}
	.line{
		width: 100%;
		height: 2px;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	.title_ket{
		font-size: 12px;
	}
	.title_name{
		font-size: 12px;
		background: #307ecc;
		color: #fff;
		border : 1px groove;
		padding-top: 7px;
		padding-bottom: 7px;
		font-style: bold;
	}
	.title_value{
		font-size: 11px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 3px;
	}

	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-color: #307ecc;
		border-collapse: collapse;
		font-family:"Open sans",sans-serif;
		font-size: 12px;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;		
	}
	table.gridtable td{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;

	}
	.geser{
		margin-right:7px;
	}
	.abu-abu td{
		background:#B8B6B0;
	}
	</style>
</head>
<body>


<table border="0" width="100%">
	<tr>
		<td width="5%" ><img src="assets/images/Kemenperin.jpg" width="170px"></td>
		<td align="center">
			KEMENTERIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">POLITEKNIK AKA BOGOR</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td width="17%" style="text-align:right" class="title_alamat">FR/BAAK-1.6.0.1<br><img class="geser" src="assets/images/LOGO.jpg" width="70px" height="70px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>

	</tr>
</table>

<table border="0" width="100%">
	<tr>
		<td colspan="5">
			<font align="left" class="title_ket"><b>DAFTAR KEHADIRAN SISWA KELAS <?php
			$id_kelas = $this->input->post("kelas_sec"); 
			$query = $this->db->query("SELECT * FROM t_kelas WHERE id_kelas = '$id_kelas'");
			$data_kelas = $query->row_array();
			echo $data_kelas['nama_kelas'];
		?></b><br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px">KODE MATA KULIAH</td>
		<td class="title_ket">: <?php 
							echo $loop_mk['kode_mk'];
						?></td>
		<td width="36%"></td>
		<td class="title_ket" style="padding-right:10px;text-align:right;">SEMESTER</td>
		
		<td class="title_ket">: <?php 
							$semester_absen = $ambil_mk_smt['semester'];
						 	if($semester_absen == "1" or $semester_absen == "2"){
						 		if($semester_absen%2 == 1){
						 			$bilangan = "Gasal";
						 			echo $bilangan;
						 		}else{
						 			$bilangan = "Genap";
						 			echo $bilangan;
						 		}
					 		}else{
					 			echo $semester_absen;
					 		}
									 ?></td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">NAMA MATA KULIAH</td>
		<td class="title_ket" width="290px"><?php echo ": ".$loop_mk['nama_mk']; ?></td>
		<td width="36%"></td>
		<td class="title_ket" style="padding-right:10px;text-align:right;">TAHUN AKADEMIK</td>
		
		<td class="title_ket"><?php echo ": ".$this->input->post('tahun_akademik_sec');?></td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>



<table class="gridtable" cellpadding="5">
	<tr class="abu-abu">
		<td rowspan="2" width="2%"  style="text-align:center;font-weight:bold;">NO</td>
		<td rowspan="2" width="7%"  style="text-align:center;font-weight:bold;">NIM</td>
		<td rowspan="2" width="15%"  style="text-align:center;font-weight:bold;">NAMA</td>
		<td rowspan="0" colspan="16"  style="text-align:center;font-weight:bold;">TANGGAL DAN PARAF</td>
	</tr>
	<tr height="20px">
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
        <td height="20px"></td>
    </tr>
	<?php 
		$no = 1;
	foreach ($data as $data) {
	
	?>
	<tr>
		<td style="text-align:center"><?php echo $no; ?></td>
		<td style="text-align:center"><?php echo $data['nim']; ?></td>
		<td style="text-align:left"><?php echo $data['nama']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php
	$no++;
		 }
	 ?>
	<tr height="50px">
		<td height="50px" colspan="3" width="24%" style="text-align:center;">Paraf Dosen Pengajar</td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
		<td height="50px"></td>
	</tr>
</table>
