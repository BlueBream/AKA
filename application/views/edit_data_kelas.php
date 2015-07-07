<script type="text/javascript">
	var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
    }
</script>

<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
	<li>
		<i class="icon- home-icon"></i>
		<a href="#">Home</a>

		<span class="divider">
			<i class="icon-angle-right arrow-icon"></i>
		</span>
	</li>
	<li class="active">Data Kelas</li>
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
<div class="page-header position-relative">
	<h1>
		Kelas
		<small>
			<i class="icon-double-angle-right"></i>
			Data Kelas
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Data Kelas
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
					<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_data_kelas' enctype='multipart/form-data' />
							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Kelas</label>
								<div class="controls">
									<input type="hidden" id="form-field-1" required name="id_kelas" value="<?php echo $data['id_kelas'];?>"  placeholder="" />
									<input type="text" id="form-field-1" required name="nama_kelas" value="<?php echo $data['nama_kelas'];?>"  placeholder="" />
								</div>
								<br>
								<label class="control-label" for="form-field-1">Program Studi</label>&nbsp &nbsp &nbsp				
									<select id="form-field-select-1" name="id_prodi">
										<option />- Pilih Program Studi -
										<?php	
										$k = $this->db->query("SELECT * FROM t_prodi");									
										$st = $k->result();
										foreach($st as $row){ 
										 ?>
										<option value="<?php echo $row->id_prodi; ?>" name="program_studi"><?php echo $row->prodi;  ?> </option>
													
											<?php
											}
										?>
										
									</select>
							</div>
							
							

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
					<?php
						}
					?>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
	
</div>
</div><!--/.page-content-->

