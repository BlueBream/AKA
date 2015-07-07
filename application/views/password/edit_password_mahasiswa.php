<script type="text/javascript">
	function checkPass()
{
    //Store the password field objects into variables ...
    //var pass1 = document.getElementsByClassName('pass1');
    //var pass2 = document.getElementsByClassName('pass2');
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //var message = document.getElementsByClassName('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Sesuai!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Tidak Sesuai, tolong Sesuaikan!"
    }
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
<li class="active">Edit Data Mahasiswa</li>
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
	Akademi Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<h2>Form Ganti Password Mahasiswa</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Ganti Password Mahasiswa
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' id="loginForm" action='<?php echo base_url(); ?>c_index_aka/prosesedit_password_mahasiswa' enctype='multipart/form-data' />
				
							
									<input type="hidden" id="form-field-1" display="hidden" name="id_mahasiswa" placeholder="id dosen" value="<?php echo $data['id_mahasiswa'];?>" />
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Password </label>

								<div class="controls">
									<input type="password"  name="pass1" id="pass1" placeholder=""  />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Ulangi Password</label>

								<div class="controls">
									<input type="password" name="password" id="pass2" onkeyup="checkPass(); return false;" placeholder="" />
									<span id="confirmMessage" class="confirmMessage"></span>
								</div>
							</div>
							
							
						<div class="form-actions">
							<input type="submit" name="add_mahasiswa" value ="Save" class="btn btn-info" onClick="validatePassword();">
						</div>

						
					</form>
					<?php
					}
					?>
					</div>
				</div>
			
			</div>
</div>