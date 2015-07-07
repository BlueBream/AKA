<?php echo $this->m_aka->msg('pesan','alert-eror'); ?>

<div class='row-fluid'>
	<div class='control-group'>
		<div class='controls'>
			<div class="table-header">
			Pengecekan
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">				
				<tbody>
					<tr>
						<th>No</th>

						<th>Nama kelas</th>	
						<th>Kode MK</th>						
						<th>Mata Kuliah</th>
						<th>SKS</th>					
					</tr>

					<?php
					 $no=1;
					foreach ($this->cart->contents() as $t => $items):?>
	<tr>
		<td><?php echo $no; ?></td>
	  	<td style="text-align:right"><strong><?php echo $items['nama_kelas']; ?></strong></td>		
	 	<td style="text-align:right"><strong><?php echo $items['kode_mk']; ?></strong></td>	
	 	<td style="text-align:right"><strong><?php echo $items['name']; ?></strong></td>
	  	<td style="text-align:right"><strong><?php echo $items['price']; ?></strong></td>	  
	</tr>
<?php $no++; ?>

<?php endforeach; ?>
	<tr>
		<td colspan='4' style="text-align:right">Total SKS yang di ambil</td>
		<td colspan='1' style="text-align:right"><?php echo $this->cart->total(); ?></td>

	</tr>
	<tr>
		<td colspan='2' style="text-align:right">						
			<a href='<?php echo base_url(); ?>c_index_aka/dell/10003'>dee</a></td>
		<td colspan='2' style="text-align:right">						
			<a href='<?php echo base_url(); ?>c_index_aka/simpan_frs'>Simpan</a></td>
	</tr>

				</tbody>
			</table>				
		</div>
	</div>
</div>
