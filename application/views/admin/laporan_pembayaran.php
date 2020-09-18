<div class="container-fluid">
<form action="<?php echo base_url().'c_admin/data_laporan/index' ?>" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td width="50%">
				Pilih Bulan
			</td>
		</tr>
		<tr>
			<td>
				<select name="pilih_bulan" id="pilih_bulan" required
				oninvalid="this.setCustomValidity('Silahkan pilih terlebih dahulu.')" oninput="setCustomValidity('')">
					<option value="" selected>-Pilih Bulan-</option>
					<option value="Januari">Januari</option>
					<option value="Februari">Februari</option>
					<option value="Maret">Maret</option>
					<option value="April">April</option>
					<option value="Mei">Mei</option>
					<option value="Juni">Juni</option>
					<option value="Juli">Juli</option>
					<option value="Agustus">Agustus</option>
					<option value="September">September</option>
					<option value="Oktober">Oktober</option>
					<option value="November">November</option>
					<option value="Desember">Desember</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Pilih Tahun
			</td>
		</tr>
		<tr>
			<td>
				<select name="pilih_tahun" id="pilih_tahun" required
					oninvalid="this.setCustomValidity('Silahkan pilih terlebih dahulu.')" 
					oninput="setCustomValidity('')">
					<?php 
					for($i = 2015 ; $i <= date('Y'); $i++){
						echo "<option>$i</option>";
					}
					?>
				</select>
			</td>
		</tr>
	</table>
	<br>
	<button class="btn btn-primary">Tampilkan Data</button>
</form>
</div>
