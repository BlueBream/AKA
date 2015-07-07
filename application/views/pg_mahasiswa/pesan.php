
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
	<li class="active">Data Mata Kuliah</li>
</ul><!--.breadcrumb-->
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>
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
		Detail Percakapan
		<small>
			<i class="icon-double-angle-right"></i>
			Detail Percakapan
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','alert-success');
			?>
<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="smaller">Percakapan</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">

											<?php foreach($from->result() as $from){
												?>
																	Nama <a class="user" href="#"> : <?php echo $from->nama; ?></a>
																	<br>

																	<i class="pull-left no-hover">
																		<img src="<?php echo base_url(); ?>assets/images/<?php echo $from->foto; ?>" alt="" style='width:100px;height:100px;'>
																	</i>																	

											<?php
											}						
											?>
											<br>					
<div class="space-6">
</div>				
<div class="space-6">
</div>				
<div class="space-6">
</div>				
<div class="space-6">
</div>				
<div class="space-6">
</div>				
<div class="space-6">
</div>				<br>				<br>				<br>
									
											<?php foreach($data->result() as $row){
?>
											Tanggal : <?php echo $row->tanggal; ?>
											<br>																	
											Subject : <?php echo $row->subject; ?>
											<hr>
											Pesan : 	<br><?php echo $row->pesan; ?>
<?php
											}
											?>
										<hr>
										<a href='<?php echo base_url();?>p_mahasiswa/daftar_percakapan'><button class="btn btn-small btn-primary">Daftar Percakpan</button></a>
												</div>
											</div>
										</div>
									</div>				
									
</div><!--/.page-content-->

