<div class="container-fluid">
	<!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_tagihan">
		<i class="fas fa-plus fa-sm"></i> Tambah Tagihan </button> -->
	<table class="table table-bordered">
		<tr class="text-center">
			<th>No</th>
			<th>Nomor Tagihan</th>
			<th>Nama Pelanggan</th>
			<th>Volume Air</th>
			<th>Nominal Tagihan</th>
			<th>Status</th>
			<th>Periode</th>
			<th>Action</th>
		</tr>

		<?php
		$no=1;
        foreach ($tagihan as $pay) : ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pay->no_tagihan ?></td>
			<td><?php echo $pay->nama ?></td>
			<td><?php echo $pay->volume ?></td>
			<td>Rp. <?php echo number_format($pay->nominal, 0, ',', '.'); ?></td>
			<td><?php echo $pay->status_tagihan ?></td>
			<td><?php echo $pay->bulan?> <?php echo $pay->tahun ?></td>
			<td>
			<a onclick="updateConfirm('<?php echo base_url().'c_admin/data_tagihan/update/'.$pay->no_tagihan ?>')"
				href="#!" class="btn btn-small btn-primary">Update</a>
			</td>
		</tr>
		<?php endforeach ?>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah_tagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH TAGIHAN</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url().'c_admin/data_tagihan/tambah' ?>" method="post"
					enctype="multipart/form-data">

					<input type="hidden" name="id_petugas" class="form-control"
						value="<?php echo $this->session->userdata('id_petugas');?>" readonly="readonly" />
					
					<input type="hidden" name="no_tagihan" class="form-control"
						value="TAG-<?php echo date("YmdHis"); ?>" readonly="readonly" />

					<div class="form-group">
						<label>Nama Pelanggan</label>
						<select class="form-control" name="no_meteran" id="no_meteran" required 
						oninvalid="this.setCustomValidity('Silahkan pilih terlebih dahulu.')" oninput="setCustomValidity('')">
							<option value="">No Selected</option>
							<?php foreach($meteran as $row):?>
							<option value="<?php echo $row->no_meteran;?>"><?php echo $row->no_meteran;?> :
								<?php echo $row->nama;?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label>Nominal Tagihan</label>
						<input type="text" name="nominal" id="nominal" class="form-control" required readonly/>
					</div>
					<div class="form-group">
						<label>Volume Air</label>
						<input type="text" name="volume" id="volume" class="form-control" required readonly/>
					</div>
					<div class="form-group">
						<label>Bulan</label>
						<select name="pilih_bulan" id="pilih_bulan" class="form-control" required
						oninvalid="this.setCustomValidity('Silahkan pilih terlebih dahulu')" oninput="setCustomValidity('')">
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
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="pilih_tahun" class="form-control" value="<?php echo date("Y");?>"
							readonly>
					</div>
					<div class="form-group">
						<input type="hidden" name="status_tagihan" class="form-control" value="Belum Lunas" readonly>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php
$this->load->view("/partials/modal.php") ?>
<script>
	function updateConfirm(url) {
		$('#btn-update').attr('href', url);
		$('#updateModal').modal();
	}
</script>